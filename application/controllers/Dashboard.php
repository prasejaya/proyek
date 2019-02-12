<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Proyek_model');
        //chek_session();
    }

    function index() {
       $data['title'] = "Home";
        $uid = $this->session->userdata('idusers');
        $now = Date("Y-m-d");
        
            $data['harga'] = $this->db->query("SELECT SUM(nilaiproyek) AS harga FROM proyek ")->result();
            $this->template->display('dashboard/dashboard', $data);
        
    }

}
