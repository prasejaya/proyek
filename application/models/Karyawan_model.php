
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

    public $table = 'karyawan';
    public $id = 'idkaryawan';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $karyawan = $this->Karyawan_model->get_all();

        $data = array(
            'karyawan_data' => $karyawan
        );

        $this->template->display('karyawan_data/tb_karyawan_list', $data);
    }
    // get all
     function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_data(){
        $this->db->select('k.*,u.passwords')
                ->from ('karyawan k')
                ->join('users u', 'u.username = k.nik') 
                ->order_by('idusers', 'asc');
        return $this->db->get()->result();
    }


    function get_rows() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get_where($this->table, array('idkaryawan' =>$id))->num_rows();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    // get data by id
    function get_databy_id($id) {
        $this->db->select('k.*,u.*')
                 ->from('karyawan k')
                 ->join('users u ','u.username = k.nik')
                 ->where('k.idkaryawan',$id);
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idkaryawan', $q);
        $this->db->or_like('nik ', $q);
        $this->db->or_like('namakaryawan', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
         $this->db->like('idkaryawan', $q);
        $this->db->or_like('nik ', $q);
        $this->db->or_like('namakaryawan', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

}

/* End of file Karyawan_model.php */
/* Location: ./application/models/Karyawan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:09:25 */
/* http://harviacode.com */
