<?php

class Pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        admincek();
    }

    /*
     * Listing of tbl_pegawai
     */
    function index()
    {
        $data['tbl_pegawai'] = $this->Pegawai_model->get_all_tbl_pegawai();
        $data['tittle'] = 'Data Pegawai';
        $data['_view'] = 'pegawai/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new pegawai
     */
    function add()
    {
        $countpegawai = $this->db->get('tbl_pegawai')->num_rows();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('jk', 'Jk', 'required|max_length[1]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[50]');
        $this->form_validation->set_rules('id_bagian', 'Id Bagian', 'required|integer');
        $this->form_validation->set_rules('id_jabatan', 'Id Jabatan', 'required|integer');
        $this->form_validation->set_rules('id_user', 'Id User', 'required|integer');
        $this->form_validation->set_rules('nama_pegawai', 'Nama_pegawai', 'required|max_length[25]');
        $this->form_validation->set_rules('tmp_lahir', 'Tmp Lahir', 'required|max_length[20]');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required');

        if ($this->form_validation->run()) {
            $f_foto = 'default.png';
            if (isset($_FILES["foto"])) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|img';
                $config['max_size']     = '2000';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')) {
                    $f_foto = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $params = array(
                'kode_pegawai' => time() . $countpegawai,
                'jk' => $this->input->post('jk'),
                'id_bagian' => $this->input->post('id_bagian'),
                'id_jabatan' => $this->input->post('id_jabatan'),
                'id_user' => $this->input->post('id_user'),
                'alamat' => $this->input->post('alamat'),
                'foto' => $f_foto,
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'tmp_lahir' => $this->input->post('tmp_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->Pegawai_model->add_pegawai($params);
            redirect('pegawai/index');
        } else {
            $this->load->model('Bagian_model');
            $data['all_tbl_bagian'] = $this->Bagian_model->get_all_tbl_bagian();

            $this->load->model('Jabatan_model');
            $data['all_tbl_jabatan'] = $this->Jabatan_model->get_all_tbl_jabatan();

            $this->load->model('User_model');
            $data['all_users'] = $this->User_model->get_free_users();
            $data['tittle'] = 'Tambah Data Pegawai';

            $data['_view'] = 'pegawai/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a pegawai
     */
    function edit($kode_pegawai)
    {
        // check if the pegawai exists before trying to edit it
        $data['pegawai'] = $this->Pegawai_model->get_pegawai($kode_pegawai);

        if (isset($data['pegawai']['kode_pegawai'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('jk', 'Jk', 'required|max_length[1]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[50]');
            $this->form_validation->set_rules('id_bagian', 'Id Bagian', 'required|integer');
            $this->form_validation->set_rules('id_jabatan', 'Id Jabatan', 'required|integer');
            $this->form_validation->set_rules('id_user', 'Id User', 'required|integer');
            $this->form_validation->set_rules('nama_pegawai', 'Nama_pegawai', 'required|max_length[25]');
            $this->form_validation->set_rules('tmp_lahir', 'Tmp Lahir', 'required|max_length[20]');
            $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required');

            if ($this->form_validation->run()) {
                $foto = $data['pegawai']['foto'];
                if (isset($_FILES["foto"])) {
                    $up_foto = $_FILES["foto"];
                    $config['upload_path'] = './assets/img/profile/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']     = '2000';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('foto')) {
                        $new = $this->upload->data('file_name');
                        $foto_lama = $data['pegawai']['foto'];
                        if ($foto_lama != 'default.png') {
                            unlink(FCPATH . 'assets/img/profile/' . $foto_lama);
                        }
                        $foto = $new;
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $params = array(
                    'jk' => $this->input->post('jk'),
                    'id_bagian' => $this->input->post('id_bagian'),
                    'id_jabatan' => $this->input->post('id_jabatan'),
                    'id_user' => $this->input->post('id_user'),
                    'alamat' => $this->input->post('alamat'),
                    'foto' => $foto,
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'tmp_lahir' => $this->input->post('tmp_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->Pegawai_model->update_pegawai($kode_pegawai, $params);
                redirect('pegawai/index');
            } else {
                $this->load->model('Bagian_model');
                $data['all_tbl_bagian'] = $this->Bagian_model->get_all_tbl_bagian();

                $this->load->model('Jabatan_model');
                $data['all_tbl_jabatan'] = $this->Jabatan_model->get_all_tbl_jabatan();

                $this->load->model('User_model');
                $data['all_users'] = $this->User_model->get_all_users();

                $data['tittle'] = 'Edit Data Pegawai';
                $data['_view'] = 'pegawai/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The pegawai you are trying to edit does not exist.');
    }

    /*
     * Deleting pegawai
     */
    function remove($kode_pegawai)
    {
        $pegawai = $this->Pegawai_model->get_pegawai($kode_pegawai);

        // check if the pegawai exists before trying to delete it
        if (isset($pegawai['kode_pegawai'])) {
            $this->Pegawai_model->delete_pegawai($kode_pegawai);
            redirect('pegawai/index');
        } else
            show_error('The pegawai you are trying to delete does not exist.');
    }
}
