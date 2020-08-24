<?php
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    function verif()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['created_at'] < (60 * 60 * 60)) {
                    $this->db->set('aktif', 't');
                    $this->db->where('email', $email);
                    $this->db->update('tbl_user');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aktifasi berhasil, Silahkan login! </div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user_token', ['email' => $email]);
                    $cek['user'] = $this->User_model->get_user_auth($email);
                    $this->db->delete('tbl_mhs_magang', ['id_user' => $cek['user']['id_user']]);
                    $this->db->delete('tbl_user', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktifasi gagal! melebihi batas waktu aktivasi </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktifasi gagal! token Salah </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktifasi gagal! email Salah </div>');
            redirect('auth');
        }
    }
    function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email|trim|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[8]trim|');
        if ($this->form_validation->run()) {
            $this->login();
        } else {
            $data['judul'] = 'Selamat datang di aplikasi magang PTPN7';
            $data['_view'] = 'auth/index';
            $this->load->view('layouts/auth', $data);
        }
    }
    function register()
    {
        $this->load->model('Mhs_magang_model');

        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]|trim');
        $this->form_validation->set_rules('jk', 'Jk', 'required|max_length[1]');
        $this->form_validation->set_rules('tmp_lahir', 'Tmp_lahir', 'required|max_length[20]|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email|trim|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|max_length[13]trim|numeric');
        $this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]|min_length[8]|trim', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password2]|min_length[8]|matches[password2]|trim');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email', true);
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'created_at' => time()
            ];
            //input ke usr
            $params1 = array(
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => '3',
                'aktif' => 'f',
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->User_model->add_user($params1);
            $cek['user'] = $this->User_model->get_user_auth($this->input->post('email'));
            //input mhs
            $params2 = array(
                'id_user' => $cek['user']['id_user'],
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'tmp_lahir' => $this->input->post('tmp_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
                'jk' => $this->input->post('jk'),
                'foto' => 'default.png',
                'created_at' => date('Y-m-d H:i:s')
            );
            if ($this->_sendEmail($token, 'verif', null)) {
                $this->Mhs_magang_model->add_mhs_magang($params2);
                $this->db->insert('user_token', $user_token);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun anda berhasil dibuat, mohon cek email untuk melakukan verifikasi </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pendaftaran gagal terjadi kesalahan pada server </div>');
                redirect('auth');
            }
        } else {
            $data['judul'] = 'Pendaftaran mahasiswa magang';
            $data['_view'] = 'auth/register';
            $this->load->view('layouts/auth', $data);
        }
    }
    function reset()
    {
        $data['_view'] = 'auth/reset';
        $this->load->view('layouts/auth', $data);
    }
    function login()
    {
        $email =  $this->input->post('email');
        $password =  $this->input->post('password');
        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['aktif'] == 't') {
                if (password_verify($password, $user['password'])) {
                    $this->User_model->update_user($user['id_user'], ['last_login' => date('Y-m-d H:i:s')]);
                    $this->load->model('Pegawai_model');
                    $this->load->model('Mhs_magang_model');
                    if ($this->Pegawai_model->get_pegawai_user($email)) {
                        $info = $this->Pegawai_model->get_pegawai_user($email);
                        $nama = $info['nama_pegawai'];
                        $data = [
                            'role' => $user['role'],
                            'email' => $user['email'],
                            'nama' => $nama,
                            'foto' => $info['foto']
                        ];
                    } else if ($this->Mhs_magang_model->get_mhs_user($email)) {
                        $info = $this->Mhs_magang_model->get_mhs_user($email);
                        $nama = $info['nama'];
                        $status_mhs = $info['status'];
                        $data = [
                            'role' => $user['role'],
                            'email' => $user['email'],
                            'nama' => $nama,
                            'status' => $info['status'],
                            'foto' => $info['foto']
                        ];
                    } else {
                        $info['foto'] = 'default.png';
                        $nama = $email;
                        $data = [
                            'role' => $user['role'],
                            'email' => $user['email'],
                            'nama' => $nama,
                            'foto' => $info['foto']
                        ];
                    }
                    $this->session->set_userdata($data);
                    if ($user['role'] == 1) {
                        redirect('dashboard');
                    } else {
                        $this->load->model('Mhs_magang_model');
                        $mhs = $this->Mhs_magang_model->get_mhs_user($user['email']);
                        if ($user['role'] == 3 && $mhs['surat_tugas'] == null) {
                            redirect('Complete');
                            $this->session->set_userdata(['bl' => 'belum lengkap']);
                            if ($status_mhs != 't') {
                                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><b>Permohonan magang kamu belum diverifikasi!</b><br> Pemberitahuan akan di kirim melalui email  </div>');
                                redirect('user/profile');
                            }
                        } else {
                            redirect('user/profile');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf password yang anda masukan salah! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf akun anda belum terverifikasi! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf akun anda belum terdaftar! </div>');
            redirect('auth');
        }
        // $this->User_model->add_user($params1);
        // redirect('dashboard');
    }
    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('bl');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout! </div>');
        redirect('auth');
    }
}
