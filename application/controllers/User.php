<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        authcek();
    }

    /*
     * Listing of users
     */
    function index()
    {
        admincek();
        $data['users'] = $this->User_model->get_all_users();
        $data['tittle'] = 'Data User';
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new user
     */
    function add()
    {
        admincek();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required|max_length[1]');
        $this->form_validation->set_rules('aktif', 'Aktif', 'required|max_length[1]');

        if ($this->form_validation->run()) {
            $params = array(
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role'),
                'aktif' => $this->input->post('aktif'),
                'created_at' => date('Y-m-d H:i:s')

            );

            $user_id = $this->User_model->add_user($params);
            redirect('user/index');
        } else {
            $data['tittle'] = 'Tambah Data User';
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a user
     */
    function edit($id_user)
    {
        admincek();
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id_user);

        if (isset($data['user']['id_user'])) {
            $this->load->library('form_validation');
            if ($this->input->post('password') !== "") {
                $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
            } else {
                $pass = $data['user']['password'];
            }
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
            $this->form_validation->set_rules('role', 'Role', 'required|max_length[1]');
            $this->form_validation->set_rules('aktif', 'Aktif', 'required|max_length[1]');

            if ($this->form_validation->run()) {
                $params = array(
                    'password' => $pass,
                    'email' => $this->input->post('email'),
                    'role' => $this->input->post('role'),
                    'aktif' => $this->input->post('aktif'),
                    'updated_at' => date('Y-m-d H:i:s')

                );

                $this->User_model->update_user($id_user, $params);
                redirect('user/index');
            } else {
                $data['tittle'] = 'Edit Data User';
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The user you are trying to edit does not exist.');
    }

    /*
     * Deleting user
     */
    function remove($id_user)
    {
        admincek();
        $user = $this->User_model->get_user($id_user);

        // check if the user exists before trying to delete it
        if (isset($user['id_user'])) {
            $this->User_model->delete_user($id_user);
            redirect('user/index');
        } else
            show_error('The user you are trying to delete does not exist.');
    }

    function profile()
    {
        $this->load->model('Mhs_magang_model');
        $this->load->model('Pegawai_model');
        if ($this->session->userdata('role') == 2) {
            $data['profil'] = $this->Pegawai_model->get_pegawai_user($this->session->userdata('email'));
            $id = $data['profil']['kode_pegawai'];
        } else if ($this->session->userdata('role') == 3) {
            $data['profil'] = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
            $id = $data['profil']['id_mhs'];
        } else {
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('image', 'Image', 'required');
        if (isset($_FILES["image"])) {
            $up_image = $_FILES["image"];
            // var_dump($up_image);
            // die;
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2000';
            $this->load->library('upload', $config);
            // var_dump($this->upload->do_upload('image'));
            // die;
            if ($this->upload->do_upload('image')) {
                $new = $this->upload->data('file_name');
                $foto_lama = $data['profil']['foto'];
                if ($foto_lama != 'default.png') {
                    unlink(FCPATH . 'assets/img/profile/' . $foto_lama);
                }
                if ($this->session->userdata('role') == 2) {
                    $this->Pegawai_model->update_pegawai($id, ['foto' => $new]);
                } else if ($this->session->userdata('role') == 3) {
                    $this->Mhs_magang_model->update_mhs_magang($id, ['foto' => $new]);
                }
                redirect('user/profile');
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $data['tittle'] = 'Profile';
            $data['_view'] = 'user/profile';
            $this->load->view('layouts/main', $data);
        }
    }
    function editprofile()
    {

        $this->load->model('Mhs_magang_model');
        $this->load->model('Pegawai_model');
        if ($this->session->userdata('role') == 2) {
            $data['profil'] = $this->Pegawai_model->get_pegawai_user($this->session->userdata('email'));
            $id = $data['profil']['kode_pegawai'];
        } else if ($this->session->userdata('role') == 3) {
            $data['profil'] = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
            $id = $data['profil']['id_mhs'];
        } else {
        }
        $this->load->library('form_validation');
        if ($this->session->userdata('role') == 2) {
            $this->form_validation->set_rules('nama_pegawai', 'Nama_pegawai', 'required|max_length[25]');
        } else {
            $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]');
            $this->form_validation->set_rules('no_hp', 'No Hp', 'max_length[13]');
        }
        $this->form_validation->set_rules('tmp_lahir', 'Tmp Lahir', 'required|max_length[20]');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jk', 'max_length[1]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');

        if ($this->form_validation->run()) {
            if ($this->session->userdata('role') == 2) {
                $params = array(
                    'jk' => $this->input->post('jk'),
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'tmp_lahir' => $this->input->post('tmp_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'alamat' => $this->input->post('alamat'),
                    // 'foto' => $this->input->post('foto'),
                    'updated_at' => date('Y-m-d H:i:s')

                );
            } else {
                $params = array(
                    'jk' => $this->input->post('jk'),
                    'nama' => $this->input->post('nama'),
                    'tmp_lahir' => $this->input->post('tmp_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'alamat' => $this->input->post('alamat'),
                    'no_hp' => $this->input->post('no_hp'),
                    // 'foto' => $this->input->post('foto'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            }
            if ($this->session->userdata('role') == 2) {
                $this->Pegawai_model->update_pegawai($id, $params);
            } else if ($this->session->userdata('role') == 3) {
                $this->Mhs_magang_model->update_mhs_magang($id, $params);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil di ubah </div>');
            redirect('user/profile');
        } else {
            $data['tittle'] = 'Profile';
            $data['_view'] = 'user/editprofile';
            $this->load->view('layouts/main', $data);
        }
    }
    function changepass()
    {

        $this->load->model('Mhs_magang_model');
        $this->load->model('Pegawai_model');
        if ($this->session->userdata('role') == 2) {
            $data['profil'] = $this->Pegawai_model->get_pegawai_user($this->session->userdata('email'));
            $id = $data['profil']['kode_pegawai'];
        } else if ($this->session->userdata('role') == 3) {
            $data['profil'] = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
            $id = $data['profil']['id_mhs'];
        } else {
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('newpass', 'Newpass', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
        if ($this->form_validation->run()) {
            $newpass =  password_hash($this->input->post('newpass'), PASSWORD_DEFAULT);
            $params = array(
                'password' => $newpass,
                'email' => $this->input->post('email'),
                'updated_at' => date('Y-m-d H:i:s')

            );
            if (password_verify($this->input->post('password'), $data['profil']['password'])) {
                $this->User_model->update_user($data['profil']['id_user'], $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di ubah </div>');
                redirect('user/profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password gagal di ubah </div>');
                redirect('user/profile');
                echo 'password salah';
            }
        } else {
            $data['tittle'] = 'Profile';
            $data['_view'] = 'user/changepass';
            $this->load->view('layouts/main', $data);
        }
    }
}
