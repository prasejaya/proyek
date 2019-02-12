<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class History extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('History_model');
        //$this->load->library('form_validation');
        //chek_session();
    }

    public function index() {
        $history = $this->History_model->get_all();

        $data = array(
            'history_data' => $history
        );

        $this->template->display('history/tb_history_list', $data);
    }

    public function read($id) {
        $row = $this->History_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idhistory' => $row->idhistory,
                'kontrakhistory' => $row->kontrakhistory,
                'namahistory' => $row->namahistory,
                'tglhistory' => $row->tglhistory,
                'nilaihistory' => $row->nilaihistory,
                'lokasi' => $row->lokasi, 
                'owner' => $row->owner,
            );
            $this->template->display('history/tb_history_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('history'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('history/create_action'),
            'idhistory' => set_value('idhistory'),
            'kontrakhistory' => set_value('kontrakhistory'),
            'namahistory' => set_value('namahistory'),
            'tglhistory' => set_value('tglhistory'),
            'nilaihistory' => set_value('nilaihistory'),
            'lokasi' => set_value('lokasi'),
            'owner' => set_value('owner'),
        );
        $this->template->display('history/tb_history_form', $data);
    }

    public function create_action() {
        //$this->_rules();

        /*if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {*/
            $data = array(
                'kontrakhistory' => $this->input->post('kontrakhistory', TRUE),
                'namahistory' => $this->input->post('namahistory', TRUE),
                'tglhistory' => $this->input->post('tglhistory', TRUE),
                'nilaihistory' => $this->input->post('nilaihistory', TRUE),
                'lokasi' => $this->input->post('lokasi', TRUE),
                'owner' => $this->input->post('owner', TRUE),
            );

            $this->History_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('history'));
        //}
    }

    public function update($id) {
        $row = $this->History_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('history/update_action'),
                'idhistory' => set_value('idhistory', $row->idhistory),
                'kontrakhistory' => set_value('kontrakhistory', $row->kontrakhistory),
                'namahistory' => set_value('namahistory', $row->namahistory),
                'tglhistory' => set_value('tglhistory', $row->tglhistory),
                'nilaihistory' => set_value('nilaihistory', $row->nilaihistory),
                'lokasi' => set_value('lokasi', $row->lokasi),
                'owner' => set_value('owner', $row->owner),
            );
            $this->template->display('history/tb_history_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('history'));
        }
    }

    public function update_action() {
        //$this->_rules();

        /*if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idhistory', TRUE));
        } else {*/
            $data = array(
                'kontrakhistory' => $this->input->post('kontrakhistory', TRUE),
                'namahistory' => $this->input->post('namahistory', TRUE),
                'tglhistory' => $this->input->post('tglhistory', TRUE),
                'nilaihistory' => $this->input->post('nilaihistory', TRUE),
                'lokasi' => $this->input->post('lokasi', TRUE),
                'owner' => $this->input->post('owner', TRUE),
            );

            $this->History_model->update($this->input->post('idhistory', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('history'));
        //}
    }

    public function delete($id) {
        $row = $this->History_model->get_by_id($id);

        if ($row) {
            $this->History_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('history'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('history'));
        }
    }

    /*public function _rules() {
        $this->form_validation->set_rules('jenis_history', 'jenis_history', 'trim|required');
        $this->form_validation->set_rules('idhistory', 'id_history', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }*/

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "history.xls";
        $judul = "history";
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
        xlsWriteLabel($tablehead, $kolomhead++, "jenis_history");

        foreach ($this->History_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->history);     

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file history.php */
/* Location: ./application/controllers/history.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:06:57 */
/* http://harviacode.com */
