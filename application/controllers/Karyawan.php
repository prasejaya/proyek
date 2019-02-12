<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Jabatanuser_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        //chek_session();
    }

    public function index() {
        $Karyawan = $this->Karyawan_model->get_data();
        
        $data = array(
            'Karyawan_data' => $Karyawan
        );

        $this->template->display('Karyawan/tb_Karyawan_list', $data);
    }

    public function read($id) {
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idkaryawan' => $row->idkaryawan,
                'nik' => $row->nik,
                'namakaryawan' => $row->namakaryawan,
                'nohp' => $row->nohp,
                'password' => $row->password,
            );
            $this->template->display('Karyawan/tb_karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Karyawan'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Karyawan/create_action'),
            'idkaryawan' => set_value('idkaryawan'),
            'nohp' => set_value('nohp'),
            'nik' => set_value('nik'),
            'namakaryawan' => set_value('namakaryawan'),
            'password' => set_value('password'),

        );
        $this->template->display('Karyawan/tb_karyawan_form', $data);
    }

    public function create_action() {
        //$this->_rules();
        /*
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {*/
            $data = array(
                'nik' => $this->input->post('nik', TRUE),
                'namakaryawan' => $this->input->post('namakaryawan', TRUE),
                'nohp' => $this->input->post('nohp', TRUE),
            );

            $data1 = array(
                'nik'  => $this->input->post('nik'),
                'namajabatan' => $this->input->post('namajabatan'),
            );
            
            $data2 = array(
                'username'  => $this->input->post('nik'),
                'password' => md5($this->input->post('password')),
            );

            $this->Karyawan_model->insert($data);
            $this->Jabatanuser_model->insert($data1);
            $this->User_model->insert($data2);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Karyawan'));
        //}
    }

    public function update($id) {
        $row = $this->Karyawan_model->get_databy_id($id);
       
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Karyawan/update_action'),
                'idkaryawan' => set_value('idkaryawan', $row->idkaryawan),
                'nohp' => set_value('nohp', $row->nohp),
                'nik' => set_value('jenis_Karyawan', $row->nik),
                'namakaryawan' => set_value('jenis_Karyawan', $row->namakaryawan),
                'password' => set_value('password', $row->password),
            );
            $this->template->display('Karyawan/tb_karyawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Karyawan'));
        }
    }

    public function update_action() {
        //$this->_rules();
        $user = $this->Karyawan_model->get_rows();
        /*
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkaryawan', TRUE));
            $this->update($this->input->post('nik', TRUE));
            $this->update($this->input->post('namakaryawan', TRUE));
        } else {*/
            $data = array(
                'nik' => $this->input->post('nik', TRUE),
                'namakaryawan' => $this->input->post('namakaryawan', TRUE),
                'nohp' => $this->input->post('nohp', TRUE),
            );

            $this->Karyawan_model->update($this->input->post('idkaryawan', TRUE), $data);

            $data1 = array(
                'namajabatan' => $this->input->post('namajabatan'),
            );
            
            $data2 = array(
                'password' => $this->input->post('password'),
            );
            
            $this->Jabatanuser_model->update($this->input->post('nik', TRUE), $data1);
            $this->User_model->update($this->input->post('password', TRUE), $data2);
            
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Karyawan'));
        //}
    }

    public function delete($id) {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Karyawan'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nik', 'nik', 'numeric|xss_clean');
        $this->form_validation->set_rules('namakaryawan', 'namakaryawan', 'xss_clean');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "Karyawan.xls";
        $judul = "Karyawan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No Rangka");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Karyawan");

        foreach ($this->Karyawan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->nik);     
            xlsWriteLabel($tablebody, $kolombody++, $data->namakaryawan);     

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */