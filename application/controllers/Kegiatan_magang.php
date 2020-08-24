<?php

class Kegiatan_magang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        authcek();
        $this->load->model('Kegiatan_magang_model');
    }

    private function get_id_magang()
    {
        $this->load->model('Magang_model');
        $this->load->model('Mhs_magang_model');
        $this->load->model('Pegawai_model');
        $kd = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
        $mg = $this->Magang_model->get_tbl_magang_to_mhs($kd['id_mhs']);
        return ($mg[0]['id_magang']);
    }
    /*
     * Listing of tbl_kegiatan_magang
     */
    function index()
    {
        if ($this->session->userdata('role') == 1) {
            $data['tbl_kegiatan_magang'] = $this->Kegiatan_magang_model->get_all_tbl_kegiatan_magang();
        } else if ($this->session->userdata('role') == 3) {
            $data['tbl_kegiatan_magang'] = $this->Kegiatan_magang_model->get_kegiatan_magang_mhs($this->get_id_magang());
        } else {
            $this->load->model('Pegawai_model');
            $kd = $this->Pegawai_model->get_pegawai_user($this->session->userdata('email'));
            $data['tbl_kegiatan_magang'] = $this->Kegiatan_magang_model->get_kegiatan_magang_pegawai($kd['kode_pegawai']);
        }
        $data['tittle'] = 'Data Kegiatan Mahasiswa Magang';
        $data['_view'] = 'kegiatan_magang/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new kegiatan_magang
     */
    function add()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('role') == 1) {
            $this->form_validation->set_rules('id_magang', 'Id Magang', 'required|integer');
            $this->form_validation->set_rules('verif', 'Verif', 'required|max_length[1]');
            $idm = $this->input->post('id_magang');
            $v = $this->input->post('verif');
        } else {
            $idm = $this->get_id_magang();
            $v = 'p';
        }
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|max_length[20]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|max_length[100]');
        $this->form_validation->set_rules('alat', 'Alat', 'max_length[30]');
        $this->form_validation->set_rules('bahan', 'Bahan', 'max_length[30]');
        $this->form_validation->set_rules('tgl_kegiatan', 'Tgl_kegiatan', 'required');


        if ($this->form_validation->run()) {
            $params = array(
                'id_magang' => $idm,
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'alat' => $this->input->post('alat'),
                'bahan' => $this->input->post('bahan'),
                'verif' => $v,
                'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
                'created_at' => date('Y-m-d H:i:s')

            );

            $kegiatan_magang_id = $this->Kegiatan_magang_model->add_kegiatan_magang($params);
            redirect('kegiatan_magang/index');
        } else {
            $this->load->model('Magang_model');
            // if ($this->session->userdata('role') == 3) {
            //     $data['idmg'] = $this->get_id_magang();
            // }
            // var_dump($data['idmg']);
            $data['all_tbl_magang'] = $this->Magang_model->get_all_tbl_magang();
            $data['tittle'] = 'Tambah Data Kegiatan Mahasiswa Magang';
            $data['_view'] = 'kegiatan_magang/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a kegiatan_magang
     */
    function edit($id_kegiatan)
    {
        mhscek();
        // check if the kegiatan_magang exists before trying to edit it
        $data['kegiatan_magang'] = $this->Kegiatan_magang_model->get_kegiatan_magang($id_kegiatan);

        if (isset($data['kegiatan_magang']['id_kegiatan'])) {
            $this->load->library('form_validation');
            if ($this->session->userdata('role') == 1) {
                $this->form_validation->set_rules('id_magang', 'Id Magang', 'required|integer');
                $this->form_validation->set_rules('verif', 'Verif', 'required|max_length[1]');
                $idm = $this->input->post('id_magang');
                $v = $this->input->post('verif');
            } else {
                $idm = $this->get_id_magang();
                $v = 'p';
            }

            $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|max_length[20]');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|max_length[100]');
            $this->form_validation->set_rules('alat', 'Alat', 'max_length[30]');
            $this->form_validation->set_rules('bahan', 'Bahan', 'max_length[30]');
            $this->form_validation->set_rules('tgl_kegiatan', 'Tgl_kegiatan', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_magang' => $idm,
                    'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'alat' => $this->input->post('alat'),
                    'bahan' => $this->input->post('bahan'),
                    'verif' => $v,
                    'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
                    'updated_at' => date('Y-m-d H:i:s')

                );

                $this->Kegiatan_magang_model->update_kegiatan_magang($id_kegiatan, $params);
                redirect('kegiatan_magang/index');
            } else {
                $this->load->model('Magang_model');
                $data['all_tbl_magang'] = $this->Magang_model->get_all_tbl_magang();
                $data['tittle'] = 'Edit 
                Kegiatan Mahasiswa Magang';
                $data['_view'] = 'kegiatan_magang/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The kegiatan_magang you are trying to edit does not exist.');
    }

    /*
     * Deleting kegiatan_magang
     */
    function remove($id_kegiatan)
    {
        mhscek();
        $kegiatan_magang = $this->Kegiatan_magang_model->get_kegiatan_magang($id_kegiatan);
        // check if the kegiatan_magang exists before trying to delete it
        if (isset($kegiatan_magang['id_kegiatan'])) {
            $this->Kegiatan_magang_model->delete_kegiatan_magang($id_kegiatan);
            redirect('kegiatan_magang/index');
        } else
            show_error('The kegiatan_magang you are trying to delete does not exist.');
    }
    function verif($id_magang, $id_kegiatan, $var)
    {
        pegawaicek();
        $this->load->model('Magang_model');
        $data['mhs'] = $this->Magang_model->get_info_mhs($id_magang);
        $data['kegiatan'] = $this->Kegiatan_magang_model->get_kegiatan_magang($id_kegiatan);
        if (isset($data['kegiatan']['id_kegiatan'])) {
            if ($var == 't') {
                $st = 'terima';
            } else {
                $st = 'tolak';
            }
            if ($this->_sendEmail(null, $st, $data['mhs']['email'])) {
                $this->Kegiatan_magang_model->update_kegiatan_magang($id_kegiatan, array('verif' => $var));
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat verifikasi berhasil </div>');
                redirect('magang/kegiatan/' . $id_magang);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifkasi gagal terjadi kesalahan pada server </div>');
                redirect('magang/kegiatan/' . $id_magang);
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifkasi gagal ID tidak ada </div>');
            redirect('magang/kegiatan/' . $id_magang);;
        }
    }
}
