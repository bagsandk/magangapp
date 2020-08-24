
<?php
if (!function_exists('admincek')) {

    function admincek()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        if (!$CI->session->has_userdata('role')) {
            redirect('auth');
        }
        if ($CI->session->userdata('role') != 1) {
            show_404();
        }
    }
    function authcek()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        if (!$CI->session->has_userdata('email')) {
            redirect('auth');
        }
    }
    function pegawaicek()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        if ($CI->session->userdata('role') == 3) {
            show_404();
        }
    }
    function mhscek()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        if ($CI->session->userdata('role') == 2) {
            show_404();
        }
    }
    // belum komplte mahasisawa
    function nc()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        if ($CI->session->has_userdata('bl')) {
            show_404();
        }
    }
}
