
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tmp_model extends CI_Model {

    public $table = 'tmpperamalan';
    public $id = 'idtmpperamalan';
    public $order = 'desc';

    function __construct() {
        parent::__construct();
    }


    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_data_tglrata(){
     $this->db->select('FROM_UNIXTIME(avg(UNIX_TIMESTAMP(tglrata))) as rata ')
                ->from ('tmpperamalan')
                ->order_by('tglrata','desc');
        return $this->db->get()->row_array();
    }

    function cek_data_customer($idcustomer){
        $this->db->select('*')
                ->from('tmpperamalan')
                ->where('idcustomer',$idcustomer);
        return $this->db->get()->row_array();
    }
    
function cek_data_user($id){
        $this->db->select('*')
                ->from ('tmpperamalan')
                ->where('norangka',$id);
      return $this->db->get()->row_array();
    }

}

/* End of file Peramalan_model.php */
/* Location: ./application/models/Peramalan_model.php */