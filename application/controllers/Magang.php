<?php


class Magang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Magang_model');
        authcek();
    }

    /*
     * Listing of tbl_magang
     */
    function index()
    {
        $this->load->model('Pegawai_model');
        $this->load->model('Mhs_magang_model');

        if ($this->session->userdata('role') == 2) {
            $kd = $this->Pegawai_model->get_pegawai_user($this->session->userdata('email'));
            $data['tbl_magang'] = $this->Magang_model->get_tbl_magang_to_pegawai($kd['kode_pegawai']);
        } else if ($this->session->userdata('role') == 3) {
            $kd = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
            $data['tbl_magang'] = $this->Magang_model->get_tbl_magang_to_mhs($kd['id_mhs']);
            if ($this->session->userdata('email') and $kd['status'] == 'p') {
                $data['tittle'] = 'Data Magang';
                $data['message'] = 'Permohonan magang kamu sedang di verifikasi! Pengumuman akan dikirim melalui email';
                $data['_view'] = 'magang/status';
            }
        } else {
            $data['tbl_magang'] = $this->Magang_model->get_all_tbl_magang();
        }
        $data['tittle'] = 'Data Magang';
        $data['_view'] = 'magang/index';
        $this->load->view('layouts/main', $data);
    }
    /*
     * Adding a new magang
     */
    function add()
    {
        admincek();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_mhs', 'Id Mhs', 'required|integer');
        $this->form_validation->set_rules('id_bagian', 'Id Bagian', 'required|integer');
        $this->form_validation->set_rules('kode_pegawai', 'Kode Pegawai', 'required|max_length[10]');
        $this->form_validation->set_rules('status_magang', 'Status_magang', 'required|max_length[1]');


        if ($this->form_validation->run()) {
            $params = array(
                'id_mhs' => $this->input->post('id_mhs'),
                'id_bagian' => $this->input->post('id_bagian'),
                'kode_pegawai' => $this->input->post('kode_pegawai'),
                'n_kedis' => $this->input->post('n_kedis'),
                'n_keakt' => $this->input->post('n_keakt'),
                'n_motiv' => $this->input->post('n_motiv'),
                'n_kemam' => $this->input->post('n_kemam'),
                'n_kerja' => $this->input->post('n_kerja'),
                'n_kehad' => $this->input->post('n_kehad'),
                'n_kesop' => $this->input->post('n_kesop'),
                'n_kerap' => $this->input->post('n_kerap'),
                'status_magang' => $this->input->post('status_magang'),
                'created_at' => date('Y-m-d H:i:s')

            );

            $magang_id = $this->Magang_model->add_magang($params);
            redirect('magang/index');
        } else {
            $this->load->model('Mhs_magang_model');

            $data['all_tbl_mhs_magang'] = $this->Mhs_magang_model->get_all_free_mhs_magang();

            $this->load->model('Pegawai_model');

            $data['all_tbl_pegawai'] = $this->Pegawai_model->get_all_tbl_pegawai();

            $this->load->model('Bagian_model');

            $data['all_tbl_bagian'] = $this->Bagian_model->get_all_tbl_bagian();

            $data['tittle'] = 'Tambah Data Magang';
            $data['_view'] = 'magang/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a magang
     */
    function edit($id_magang)
    {
        admincek();
        // check if the magang exists before trying to edit it
        $data['magang'] = $this->Magang_model->get_magang($id_magang);

        if (isset($data['magang']['id_magang'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_mhs', 'Id Mhs', 'required|integer');
            $this->form_validation->set_rules('id_bagian', 'Id Bagian', 'required|integer');
            $this->form_validation->set_rules('kode_pegawai', 'Kode Pegawai', 'required|max_length[10]');
            $this->form_validation->set_rules('status_magang', 'Status_magang', 'required|max_length[1]');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_mhs' => $this->input->post('id_mhs'),
                    'id_bagian' => $this->input->post('id_bagian'),
                    'kode_pegawai' => $this->input->post('kode_pegawai'),
                    'n_kedis' => $this->input->post('n_kedis'),
                    'n_keakt' => $this->input->post('n_keakt'),
                    'n_motiv' => $this->input->post('n_motiv'),
                    'n_kemam' => $this->input->post('n_kemam'),
                    'n_kerja' => $this->input->post('n_kerja'),
                    'n_kehad' => $this->input->post('n_kehad'),
                    'n_kesop' => $this->input->post('n_kesop'),
                    'n_kerap' => $this->input->post('n_kerap'),
                    'status_magang' => $this->input->post('status_magang'),
                    'updated_at' => date('Y-m-d H:i:s')

                );

                $this->Magang_model->update_magang($id_magang, $params);
                redirect('magang/index');
            } else {
                $this->load->model('Mhs_magang_model');

                $data['all_tbl_mhs_magang'] = $this->Mhs_magang_model->get_all_free_edit_mhs_magang($data['magang']['id_mhs']);

                $this->load->model('Pegawai_model');

                $data['all_tbl_pegawai'] = $this->Pegawai_model->get_all_tbl_pegawai();

                $this->load->model('Bagian_model');

                $data['all_tbl_bagian'] = $this->Bagian_model->get_all_tbl_bagian();

                $data['tittle'] = 'Edit Data Magang';
                $data['_view'] = 'magang/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The magang you are trying to edit does not exist.');
    }

    /*
     * Deleting magang
     */
    function remove($id_magang)
    {
        admincek();
        $magang = $this->Magang_model->get_magang($id_magang);

        // check if the magang exists before trying to delete it
        if (isset($magang['id_magang'])) {
            $this->Magang_model->delete_magang($id_magang);
            redirect('magang/index');
        } else
            show_error('The magang you are trying to delete does not exist.');
    }
    function info($id_magang)
    {
        $data['mhs'] = $this->Magang_model->get_info_mhs($id_magang);
        $data['pegawai'] = $this->Magang_model->get_info_pegawai($id_magang);
        $data['tittle'] = 'Info Magang';
        $data['_view'] = 'magang/info';
        $this->load->view('layouts/main', $data);
    }
    function nilai($id_magang)
    {
        pegawaicek();
        $data['magang'] = $this->Magang_model->get_magang($id_magang);
        if (isset($data['magang']['id_magang'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('n_kedis', 'n_kedis', 'max_length[3]|numeric');
            $this->form_validation->set_rules('n_keakt', 'n_keakt', 'max_length[3]|numeric');
            $this->form_validation->set_rules('n_motiv', 'N_motiv', 'max_length[3]|numeric');
            $this->form_validation->set_rules('n_kemam', 'N_kemam', 'max_length[3]|numeric');
            $this->form_validation->set_rules('n_kerja', 'N_kerja', 'max_length[3]|numeric');
            $this->form_validation->set_rules('n_kehad', 'N_kehad', 'max_length[3]|numeric');
            $this->form_validation->set_rules('n_kesop', 'N_kesop', 'max_length[3]|numeric');
            $this->form_validation->set_rules('n_kerap', 'N_kerap', 'max_length[3]|numeric');
            if ($this->form_validation->run()) {
                $params = array(
                    'n_kedis' => $this->input->post('n_kedis'),
                    'n_keakt' => $this->input->post('n_keakt'),
                    'n_motiv' => $this->input->post('n_motiv'),
                    'n_kemam' => $this->input->post('n_kemam'),
                    'n_kerja' => $this->input->post('n_kerja'),
                    'n_kehad' => $this->input->post('n_kehad'),
                    'n_kesop' => $this->input->post('n_kesop'),
                    'n_kerap' => $this->input->post('n_kerap'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->Magang_model->update_magang($id_magang, $params);
                redirect('magang/index');
            } else {
                $data['mhs'] = $this->Magang_model->get_info_mhs($id_magang);
                $data['tittle'] = 'Input Nilai Magang';
                $data['_view'] = 'magang/nilai';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The magang you are trying to edit does not exist.');
    }
    function kegiatan($id_magang)
    {
        pegawaicek();
        $data['kegiatan'] = $this->Magang_model->get_kegiatan_mhs($id_magang);
        $data['mhs'] = $this->Magang_model->get_info_mhs($id_magang);
        $data['tittle'] = 'Kegiatan Magang';
        $data['_view'] = 'magang/kegiatan';
        $this->load->view('layouts/main', $data);
    }
}
