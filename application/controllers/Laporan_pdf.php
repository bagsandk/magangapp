<?php
class Laporan_pdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_magang_model');
        authcek();
        mhscek();
    }

    public function cetaknilai($id_mhs)
    {
        $this->load->model('Magang_model');
        $f = $this->Magang_model->get_tbl_magang_to_mhs($id_mhs);
        $data['form'] = $f[0];
        $ar = [
            $data['form']['n_kedis'],
            $data['form']['n_keakt'],
            $data['form']['n_motiv'],
            $data['form']['n_kemam'],
            $data['form']['n_kerja'],
            $data['form']['n_kehad'],
            $data['form']['n_kesop'],
            $data['form']['n_kerap'],
        ];

        $data['sum'] = array_sum($ar);
        $data['av'] = ($data['sum'] / 8);
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('mhs_magang/laporan_pdf', $data);
    }
}
