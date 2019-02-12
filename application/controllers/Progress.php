<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Progress extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Progress_model');
        //$this->load->library('form_validation');
        //chek_session();
    }

    public function index() {
        $progress = $this->Progress_model->get_all();

        $data = array(
            'progress_data' => $progress
        );

        $this->template->display('Progress/tb_Progress_list', $data);
    }

    public function read($id) {
        $row = $this->Progress_model->get_by_id($id);

        if ($row) {
            $data = array(
                'idprogress' => $row->idprogress,
                'idproyek' => $row->idproyek,
                'nilairencana' => $row->nilairencana,
                'nilairealisasi' => $row->nilairealisasi,
                'timeline' => $row->timeline,
                'gambarrealisasi' => $row->gambarrealisasi,
            );
            $this->template->display('Progress/tb_progress_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Progress'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Progress/create_action'),
            'idprogress' => set_value('idprogress'),
            'idproyek' => set_value('idproyek'),
            'nilairencana' => set_value('nilairencana'),
            'nilairealisasi' => set_value('nilairealisasi'),
            'timeline' => set_value('timeline'),
            'gambarrealisasi' => set_value('gambarrealisasi'),
        );
        $this->template->display('Progress/tb_Progress_form', $data);
    }

    public function create_action() {
        //$this->_rules();

        /*if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {*/
            $data = array(
                'idproyek' => $this->input->post('idproyek', TRUE),
                'nilairencana' => $this->input->post('nilairencana', TRUE),
                'nilairealisasi' => $this->input->post('nilairealisasi', TRUE),
                'timeline' => $this->input->post('timeline', TRUE),
                'gambarrealisasi' => $this->input->post('gambarrealisasi', TRUE),
            );

            $this->Progress_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Progress'));
        //}
    }

     public function uploadexcel(){
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $fileName = time().$_FILES['file']['name'];

        $config['upload_path'] =APPPATH.'uploads/'; //buat folder dengan nama uploads di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        //print_r($fileName);die();
        $inputFileName = APPPATH.'uploads/'.$fileName;
        
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
          
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                              
                 $data = array(
                    "idproduk"=> $rowData[0][1],
                    "nilairencana"=> $rowData[0][2],
                    "nilairealisasi"=> $rowData[0][3],
                    "timeline"=> $rowData[0][4],
                    "gambarrealisasi"=> $rowData[0][5],
                );
               
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("progress",$data);
                //delete_files($media['file_path']);
            }
        
        redirect('progress');
    }

    public function update($id) {
        $row = $this->Progress_model->get_by_id($id);
        /*
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        */
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Progress/update_action'),
                'idprogress' => set_value('idprogress', $row->idprogress),
                'nilairencana' => set_value('nilairencana', $row->nilairencana),
                'nilairealisasi' => set_value('nilairealisasi', $row->nilairealisasi),
                'timeline' => set_value('timeline', $row->timeline),
                'gambarrealisasi' => set_value('gambarrealisasi', $row->timeline),
            );
            $this->template->display('Progress/tb_Progress_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Progress'));
        }
    }

    public function update_action() {
        //$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idProgress', TRUE));
        } else {
            $data = array(
                'idproyek' => $this->input->post('idproyek', TRUE),
                'nilairencana' => $this->input->post('nilairencana', TRUE),
                'nilairealisasi' => $this->input->post('nilairealisasi', TRUE),
                'timeline' => $this->input->post('timeline', TRUE),
                'gambarrealisasi' => $this->input->post('gambarrealisasi', TRUE),
            );

            $this->Progress_model->update($this->input->post('idprogress', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Progress'));
        }
    }

    public function delete($id) {
        $row = $this->Progress_model->get_by_id($id);

        if ($row) {
            $this->Progress_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Progress'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Progress'));
        }
    }

    /*public function _rules() {
        $this->form_validation->set_rules('jenis_Progress', 'jenis_Progress', 'trim|required|numeric|max_length[7]');
        $this->form_validation->set_rules('idProgress', 'idProgress', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-red">', '</span>');
    }*/

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "Progress.xls";
        $judul = "Progress";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nilai Rencana");
        xlsWriteLabel($tablehead, $kolomhead++, "Nilai Realisasi");
        xlsWriteLabel($tablehead, $kolomhead++, "Timeline");
        xlsWriteLabel($tablehead, $kolomhead++, "Gambar Realisasi");

        foreach ($this->Progress_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $idproyek);
            xlsWriteNumber($tablebody, $kolombody++, $data->nilairencana);
            xlsWriteNumber($tablebody, $kolombody++, $data->nilairealisasi);
            xlsWriteNumber($tablebody, $kolombody++, $data->timeline);
            xlsWriteNumber($tablebody, $kolombody++, $data->gambarrealisasi);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Progress.php */
/* Location: ./application/controllers/Progress.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-14 11:04:07 */
/* http://harviacode.com */
