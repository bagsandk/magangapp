<?php

class Jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        admincek();
        $this->load->model('Jabatan_model');
    }

    /*
    * Listing of tbl_jabatan
    */
    function index()
    {
        $data['tbl_jabatan'] = $this->Jabatan_model->get_all_tbl_jabatan();
        $data['tittle'] = 'Data Jabatan';
        $data['_view'] = 'jabatan/index';
        $this->load->view('layouts/main', $data);
    }
    /*
     * Adding a new jabatan
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|max_length[30]');

        if ($this->form_validation->run()) {
            $params = array(
                'nama_jabatan' => $this->input->post('nama_jabatan'),
                'created_at' => date('Y-m-d H:i:s')

            );

            $jabatan_id = $this->Jabatan_model->add_jabatan($params);
            redirect('jabatan/index');
        } else {
            $data['tittle'] = 'Tambah Data Jabatan';
            $data['_view'] = 'jabatan/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a jabatan
     */
    function edit($id_jabatan)
    {
        // check if the jabatan exists before trying to edit it
        $data['jabatan'] = $this->Jabatan_model->get_jabatan($id_jabatan);

        if (isset($data['jabatan']['id_jabatan'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|max_length[30]');

            if ($this->form_validation->run()) {
                $params = array(
                    'nama_jabatan' => $this->input->post('nama_jabatan'),
                    'updated_at' => date('Y-m-d H:i:s')

                );

                $this->Jabatan_model->update_jabatan($id_jabatan, $params);
                redirect('jabatan/index');
            } else {
                $data['_view'] = 'jabatan/edit';
                $data['tittle'] = 'Edit Data Jabatan';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The jabatan you are trying to edit does not exist.');
    }

    /*
     * Deleting jabatan
     */
    function remove($id_jabatan)
    {
        $jabatan = $this->Jabatan_model->get_jabatan($id_jabatan);

        // check if the jabatan exists before trying to delete it
        if (isset($jabatan['id_jabatan'])) {
            $this->Jabatan_model->delete_jabatan($id_jabatan);
            redirect('jabatan/index');
        } else
            show_error('The jabatan you are trying to delete does not exist.');
    }
}
