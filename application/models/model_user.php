<?php
class Model_User extends CI_Model{
    function __construct(){
        parent::__construct();
    }

     function cek_login($table,$where){     
        return $this->db->get_where($table,$where);
    }   

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }
}
