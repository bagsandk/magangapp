<?php

class Mhs_magang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mhs_magang_model');
        admincek();
    }

    /*
     * Listing of tbl_mhs_magang
     */
    function index()
    {
        $data['tbl_mhs_magang'] = $this->Mhs_magang_model->get_all_mhs_magang();
        $data['tittle'] = 'Data Mahasiswa Magang';
        $data['_view'] = 'mhs_magang/index';
        $this->load->view('layouts/main', $data);
    }
    function pending()
    {
        $data['tbl_mhs_magang'] = $this->Mhs_magang_model->get_all_mhs_magang_pending();
        $data['tittle'] = 'Permintaan Mahasiswa Magang';
        $data['_view'] = 'mhs_magang/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new mhs_magang
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]');
        $this->form_validation->set_rules('tmp_lahir', 'Tmp Lahir', 'required|max_length[20]');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jk', 'max_length[1]');
        $this->form_validation->set_rules('asal_ptn', 'Asal Ptn', 'required|max_length[50]');
        $this->form_validation->set_rules('npm', 'Npm', 'required|max_length[8]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'max_length[13]');
        $this->form_validation->set_rules('surat_tugas', 'Surat Tugas', 'max_length[90]');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('foto', 'Foto', 'required|max_length[30]');

        if ($this->form_validation->run()) {
            $params = array(
                'id_user' => $this->input->post('id_user'),
                'jk' => $this->input->post('jk'),
                'nama' => $this->input->post('nama'),
                'tmp_lahir' => $this->input->post('tmp_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'asal_ptn' => $this->input->post('asal_ptn'),
                'npm' => $this->input->post('npm'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'surat_tugas' => $this->input->post('surat_tugas'),
                'status' => $this->input->post('status'),
                'foto' => $this->input->post('foto'),
                'created_at' => date('Y-m-d H:i:s')

            );

            $mhs_magang_id = $this->Mhs_magang_model->add_mhs_magang($params);
            redirect('mhs_magang/index');
        } else {
            $this->load->model('User_model');
            $data['all_users'] = $this->User_model->get_free_users();

            $data['tittle'] = 'Tambah Data Mahasiswa Magang';

            $data['_view'] = 'mhs_magang/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a mhs_magang
     */
    function edit($id_mhs)
    {
        // check if the mhs_magang exists before trying to edit it
        $data['mhs_magang'] = $this->Mhs_magang_model->get_mhs_magang($id_mhs);

        if (isset($data['mhs_magang']['id_mhs'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]');
            $this->form_validation->set_rules('tmp_lahir', 'Tmp Lahir', 'required|max_length[20]');
            $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required');
            $this->form_validation->set_rules('jk', 'Jk', 'max_length[1]');
            $this->form_validation->set_rules('asal_ptn', 'Asal Ptn', 'required|max_length[50]');
            $this->form_validation->set_rules('npm', 'Npm', 'required|max_length[8]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
            $this->form_validation->set_rules('no_hp', 'No Hp', 'max_length[13]');
            $this->form_validation->set_rules('surat_tugas', 'Surat Tugas', 'max_length[90]');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('foto', 'Foto', 'required|max_length[30]');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_user' => $this->input->post('id_user'),
                    'jk' => $this->input->post('jk'),
                    'nama' => $this->input->post('nama'),
                    'tmp_lahir' => $this->input->post('tmp_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'asal_ptn' => $this->input->post('asal_ptn'),
                    'npm' => $this->input->post('npm'),
                    'alamat' => $this->input->post('alamat'),
                    'no_hp' => $this->input->post('no_hp'),
                    'surat_tugas' => $this->input->post('surat_tugas'),
                    'status' => $this->input->post('status'),
                    'foto' => $this->input->post('foto'),
                    'updated_at' => date('Y-m-d H:i:s')

                );

                $this->Mhs_magang_model->update_mhs_magang($id_mhs, $params);
                redirect('mhs_magang/index');
            } else {
                $this->load->model('User_model');
                $data['all_users'] = $this->User_model->get_all_users();

                $data['tittle'] = 'Edit Data Mahasiswa Magang';

                $data['_view'] = 'mhs_magang/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The mhs_magang you are trying to edit does not exist.');
    }

    /*
     * Deleting mhs_magang
     */
    function remove($id_mhs)
    {
        $mhs_magang = $this->Mhs_magang_model->get_mhs_magang($id_mhs);

        // check if the mhs_magang exists before trying to delete it
        if (isset($mhs_magang['id_mhs'])) {
            $this->Mhs_magang_model->delete_mhs_magang($id_mhs);
            if ($mhs_magang['status'] == 't') {
                redirect('mhs_magang/');
            } else {
                redirect('mhs_magang/pending');
            }
        } else
            show_error('The mhs_magang you are trying to delete does not exist.');
    }
    function info($id_mhs)
    {
        $data['mhs'] = $this->Mhs_magang_model->get_mhs_user_by_id($id_mhs);
        $data['tittle'] = 'Info Mahasiswa Magang';
        $data['_view'] = 'mhs_magang/info';
        $this->load->view('layouts/main', $data);
    }
    function verif($id_mhs)
    {
        admincek();
        $this->load->model('Pegawai_model');
        $this->load->model('Bagian_model');
        $this->load->model('Magang_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_bagian', 'Id Bagian', 'required|integer');
        $this->form_validation->set_rules('kode_pegawai', 'Kode Pegawai', 'required|max_length[10]');
        $data['all_tbl_pegawai'] = $this->Pegawai_model->get_all_tbl_pegawai();
        $data['all_tbl_bagian'] = $this->Bagian_model->get_all_tbl_bagian();
        if ($this->form_validation->run()) {
            $params = array(
                'id_mhs' => $id_mhs,
                'id_bagian' => $this->input->post('id_bagian'),
                'kode_pegawai' => $this->input->post('kode_pegawai'),
                'status_magang' => 'f',
                'created_at' => date('Y-m-d H:i:s')
            );
            $mhs = $this->Mhs_magang_model->get_mhs_user_by_id($id_mhs);
            if ($this->_sendEmail(null, 'magang', $mhs['email'])) {
                //send email
                $this->Magang_model->add_magang($params);
                $this->Mhs_magang_model->update_mhs_magang($id_mhs, ['status' => 't']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil menerima mahasiswa magang </div>');
                redirect('mhs_magang/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifkasi gagal terjadi kesalahan pada server </div>');
                redirect('mhs_magang');
            }
        } else {
            $data["idmhs"] = $id_mhs;
            $data['tittle'] = 'Tambah Data Magang';
            $data['_view'] = 'mhs_magang/terima_magang';
            $this->load->view('layouts/main', $data);
        }
    }
}
