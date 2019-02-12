<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        chek_session();
    }

    public function index() {
        $user = $this->User_model->get_all();

        $data = array(
            'user_data' => $user
        );

        $this->template->display('user/tb_user_list', $data);
    }

    public function read($id) {
        $row = $this->user_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idusers'=>$row->$idusers,
                'username' => $row->username,
                'userdesc' => $row->userdesc,
            );
            $this->template->display('user/tb_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
            'username' => set_value('username'),
            'password' => md5(set_value('password')),
        );
        $this->template->display('user/tb_user_form', $data);
    }

    public function create_action() {
        //$this->_rules();
        /*if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {*/
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'userdesc' => $this->input->post('userdesc', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
            );
            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        //}
    }

    public function update($id) {
        $row = $this->user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
                'username' => set_value('username', $row->username),
                'userdesc' => set_value('userdesc', $row->userdesc),
                'password' => md5(set_value('password', $row->password)),
            );
            $this->template->display('user/tb_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function update_action() {
        //$this->_rules();

        /*if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcustomer', TRUE));
        } else {*/
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'userdesc' => $this->input->post('userdesc', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
            );

            $this->user_model->update($this->input->post('iduser', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        //}
    }

    public function delete($id) {
        $row = $this->user_model->get_by_id($id);

        if ($row) {
            $this->user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('userdesc', 'userdesc', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "tb_user.xls";
        $judul = "tb_user";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Username");
        xlsWriteLabel($tablehead, $kolomhead++, "Userdesc");
        xlsWriteLabel($tablehead, $kolomhead++, "Password");

        foreach ($this->user_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->username);
            xlsWriteLabel($tablebody, $kolombody++, $data->userdesc);
            xlsWriteNumber($tablebody, $kolombody++, $data->password);


            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:09:25 */
/* http://harviacode.com */