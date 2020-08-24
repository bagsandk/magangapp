<?php
class Complete extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        nc();
    }

    function index()
    {
        $this->load->model('Mhs_magang_model');
        $data['mhs_magang'] = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
        if (isset($data['mhs_magang']['id_mhs'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('jk', 'Jk', 'max_length[1]');
            $this->form_validation->set_rules('asal_ptn', 'Asal Ptn', 'required|max_length[50]');
            $this->form_validation->set_rules('npm', 'Npm', 'required|max_length[8]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
            // $this->form_validation->set_rules('surat_tugas', 'Surat Tugas', 'required');
            // $this->form_validation->set_rules('foto', 'Foto', 'required');

            // die;
            if ($this->form_validation->run()) {
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
                //pdf
                $configpdf['upload_path'] = './file/surat_tugas/';
                $configpdf['allowed_types'] = 'pdf';
                $configpdf['max_size']     = '5000';
                $this->load->library('upload', $configpdf);
                $this->upload->initialize($configpdf);
                if ($this->upload->do_upload('surat_tugas')) {
                    $f_surat = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
                $params = array(
                    'jk' => $this->input->post('jk'),
                    'asal_ptn' => $this->input->post('asal_ptn'),
                    'npm' => $this->input->post('npm'),
                    'alamat' => $this->input->post('alamat'),
                    'foto' => $f_foto,
                    'Surat_tugas' => $f_surat,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->Mhs_magang_model->update_mhs_magang($data['mhs_magang']['id_mhs'], $params);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Permohonan magang kamu sedang diverifikasi!</b><br> Pemberitahuan akan di kirim melalui email  </div>');
                $this->session->unset_userdata('bl');
                redirect('auth');
            } else {
                $this->load->model('Mhs_magang_model');
                $data['mhs'] = $this->Mhs_magang_model->get_mhs_user($this->session->userdata('email'));
                $data['judul'] = 'Lengkapi data magang';
                $data['_view'] = 'auth/complete';
                $this->load->view('layouts/auth', $data);
            }
        } else
            show_error('The mhs_magang you are trying to edit does not exist.');
    }
}
