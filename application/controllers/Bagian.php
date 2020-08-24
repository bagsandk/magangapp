<?php

class Bagian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bagian_model');
        admincek();
    }

    /*
     * Listing of tbl_bagian
     */
    function index()
    {
        $data['tbl_bagian'] = $this->Bagian_model->get_all_tbl_bagian();
        $data['tittle'] = 'Data Bagian';
        $data['_view'] = 'bagian/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new bagian
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required|max_length[25]');

        if ($this->form_validation->run()) {
            $params = array(
                'nama_bagian' => $this->input->post('nama_bagian'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $bagian_id = $this->Bagian_model->add_bagian($params);
            redirect('bagian/index');
        } else {
            $data['tittle'] = 'Tambah Data Bagian';
            $data['_view'] = 'bagian/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a bagian
     */
    function edit($id_bagian)
    {
        // check if the bagian exists before trying to edit it
        $data['bagian'] = $this->Bagian_model->get_bagian($id_bagian);

        if (isset($data['bagian']['id_bagian'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required|max_length[25]');

            if ($this->form_validation->run()) {
                $params = array(
                    'nama_bagian' => $this->input->post('nama_bagian'),
                    'updated_at' => date('Y-m-d H:i:s')

                );

                $this->Bagian_model->update_bagian($id_bagian, $params);
                redirect('bagian/index');
            } else {
                $data['tittle'] = 'Edit Data Bagian';
                $data['_view'] = 'bagian/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The bagian you are trying to edit does not exist.');
    }

    /*
     * Deleting bagian
     */
    function remove($id_bagian)
    {
        $bagian = $this->Bagian_model->get_bagian($id_bagian);

        // check if the bagian exists before trying to delete it
        if (isset($bagian['id_bagian'])) {
            $this->Bagian_model->delete_bagian($id_bagian);
            redirect('bagian/index');
        } else
            show_error('The bagian you are trying to delete does not exist.');
    }
}
