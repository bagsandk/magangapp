<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Jabatan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get jabatan by id_jabatan
     */
    function get_jabatan($id_jabatan)
    {
        return $this->db->get_where('tbl_jabatan',array('id_jabatan'=>$id_jabatan))->row_array();
    }
        
    /*
     * Get all tbl_jabatan
     */
    function get_all_tbl_jabatan()
    {
        $this->db->order_by('id_jabatan', 'desc');
        return $this->db->get('tbl_jabatan')->result_array();
    }
        
    /*
     * function to add new jabatan
     */
    function add_jabatan($params)
    {
        $this->db->insert('tbl_jabatan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update jabatan
     */
    function update_jabatan($id_jabatan,$params)
    {
        $this->db->where('id_jabatan',$id_jabatan);
        return $this->db->update('tbl_jabatan',$params);
    }
    
    /*
     * function to delete jabatan
     */
    function delete_jabatan($id_jabatan)
    {
        return $this->db->delete('tbl_jabatan',array('id_jabatan'=>$id_jabatan));
    }
}
