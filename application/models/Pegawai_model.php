<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Pegawai_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get pegawai by kode_pegawai
     */
    function get_pegawai($kode_pegawai)
    {
        return $this->db->get_where('tbl_pegawai', array('kode_pegawai' => $kode_pegawai))->row_array();
    }
    function get_pegawai_user($email)
    {

        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_bagian', 'tbl_pegawai.id_bagian = tbl_bagian.id_bagian');
        $this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_pegawai.id_jabatan');
        $this->db->join('tbl_user', 'tbl_pegawai.id_user = tbl_user.id_user');
        $this->db->where('tbl_user.email', $email);
        return $this->db->get()->row_array();
    }

    /*
     * Get all tbl_pegawai
     */
    function get_all_tbl_pegawai()
    {
        // $this->db->order_by('kode_pegawai', 'desc');
        // return $this->db->get('tbl_pegawai')->result_array();
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_bagian', 'tbl_pegawai.id_bagian = tbl_bagian.id_bagian');
        $this->db->join('tbl_jabatan', 'tbl_pegawai.id_jabatan = tbl_jabatan.id_jabatan');
        $this->db->join('tbl_user', 'tbl_pegawai.id_user = tbl_user.id_user');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new pegawai
     */
    function add_pegawai($params)
    {
        $this->db->insert('tbl_pegawai', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update pegawai
     */
    function update_pegawai($kode_pegawai, $params)
    {
        $this->db->where('kode_pegawai', $kode_pegawai);
        return $this->db->update('tbl_pegawai', $params);
    }

    /*
     * function to delete pegawai
     */
    function delete_pegawai($kode_pegawai)
    {
        return $this->db->delete('tbl_pegawai', array('kode_pegawai' => $kode_pegawai));
    }
}
