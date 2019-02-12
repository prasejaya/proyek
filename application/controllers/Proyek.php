<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proyek extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Proyek_model');
        //$this->load->library('form_validation');
        //chek_session();
    }

    public function index() {
        $proyek = $this->Proyek_model->get_all();

        $data = array(
            'proyek_data' => $proyek
        );

        $this->template->display('proyek/tb_proyek_list', $data);
    }

    public function read($id) {
        $row = $this->Proyek_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idproyek' => $row->idproyek,
                'kontrakproyek' => $row->kontrakproyek,
                'namaproyek' => $row->namaproyek,
                'tglproyek' => $row->tglproyek,
                'nilaiproyek' => $row->nilaiproyek,
                'lokasi' => $row->lokasi, 
                'owner' => $row->owner,
            );
            $this->template->display('proyek/tb_proyek_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proyek'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('proyek/create_action'),
            'idproyek' => set_value('idproyek'),
            'kontrakproyek' => set_value('kontrakproyek'),
            'namaproyek' => set_value('namaproyek'),
            'tglproyek' => set_value('tglproyek'),
            'nilaiproyek' => set_value('nilaiproyek'),
            'lokasi' => set_value('lokasi'),
            'owner' => set_value('owner'),
        );
        $this->template->display('proyek/tb_proyek_form', $data);
    }

    public function create_action() {
//        $this->_rules();

        /*if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {*/
            $data = array(
                'kontrakproyek' => $this->input->post('kontrakproyek', TRUE),
                'namaproyek' => $this->input->post('namaproyek', TRUE),
                'tglproyek' => $this->input->post('tglproyek', TRUE),
                'nilaiproyek' => $this->input->post('nilaiproyek', TRUE),
                'lokasi' => $this->input->post('lokasi', TRUE),
                'owner' => $this->input->post('owner', TRUE),
            );

            $this->proyek_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('proyek'));
        //}
    }

    public function update($id) {
        $row = $this->proyek_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proyek/update_action'),
                'idproyek' => set_value('idproyek', $row->idproyek),
                'kontrakproyek' => set_value('kontrakproyek', $row->kontrakproyek),
                'namaproyek' => set_value('namaproyek', $row->namaproyek),
                'tglproyek' => set_value('tglproyek', $row->tglproyek),
                'nilaiproyek' => set_value('nilaiproyek', $row->nilaiproyek),
                'lokasi' => set_value('lokasi', $row->lokasi),
                'owner' => set_value('owner', $row->owner),
            );
            $this->template->display('proyek/tb_proyek_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proyek'));
        }
    }

    public function update_action() {
        //$this->_rules();

        /*if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idproyek', TRUE));
        } else {*/
            $data = array(
                'kontrakproyek' => $this->input->post('kontrakproyek', TRUE),
                'namaproyek' => $this->input->post('namaproyek', TRUE),
                'tglproyek' => $this->input->post('tglproyek', TRUE),
                'nilaiproyek' => $this->input->post('nilaiproyek', TRUE),
                'lokasi' => $this->input->post('lokasi', TRUE),
                'owner' => $this->input->post('owner', TRUE),
            );

            $this->proyek_model->update($this->input->post('idproyek', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proyek'));
        //}
    }

    public function delete($id) {
        $row = $this->proyek_model->get_by_id($id);

        if ($row) {
            $this->proyek_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proyek'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proyek'));
        }
    }

    /*public function _rules() {
        $this->form_validation->set_rules('jenis_proyek', 'jenis_proyek', 'trim|required');
        $this->form_validation->set_rules('idproyek', 'id_proyek', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }*/

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "proyek.xls";
        $judul = "proyek";
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
        xlsWriteLabel($tablehead, $kolomhead++, "jenis_proyek");

        foreach ($this->proyek_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->proyek);     

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file proyek.php */
/* Location: ./application/controllers/proyek.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */
