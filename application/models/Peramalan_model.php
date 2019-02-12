
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peramalan_model extends CI_Model {

    public $table = 'peramalan';
    public $id = 'idperamalan';
    public $order = 'ASC';

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

    //getCustomer
    function getDataCustomer($id){
        $this->db->select('c.*')
                ->from ('peramalan p')
                ->join('customer c', 'p.idcustomer = c.idcustomer')
                ->where('idperamalan',$id);
      return $this->db->get()->row_array();
    }

    //getCustomer
    function getShortData(){
        $this->db->select('*')
                ->from ('peramalan p');
      return $this->db->get()->row_array();
    }

function cek_data_customer($id){
        $this->db->select('*')
                ->from ('peramalan')
                ->where('norangka',$id);
      return $this->db->get()->row_array();
    }
/*function cek_data_customer($idcustomer){
        $this->db->select('*')
                ->from('peramalan')
                ->where('idcustomer',$idcustomer);
        return $this->db->get()->row_array();
    }*/

    // get data by id
    function get_by_id($id) {
        $this->db->select('s.*, c.namacustomer,c.telphp')
                ->from ('kendaraan s')
                ->join('customer c', 'c.idcustomer = s.idcustomer')
                ->where('idservis',$id);
        return $this->db->get()->row_array();
    }

    //send email
    function sendEMail($id){
        $data = static::getDataCustomer($id);
        $this->email->clear();
        $this->email->to($data['email']);
        $this->email->from('itatskp@gmail.com');
        $this->email->subject('Reminder Service');
        $this->email->message('Hi '.$data['namacustomer'].' Silahkan servis.');
        $this->email->send();
    }

    //send sms
    function senSms($id){
        $data = static::getDataCustomer($id);
        $userkey = "ef7h1i"; //userkey lihat di zenziva
        $passkey = "ef7h1i"; // set passkey di zenziva
        $telepon = $data['telepon'];
        $message = "Waktu servis anda sebentar lagi";
        $url = "https://reguler.zenziva.net/apps/smsapi.php";
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($message));
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);

        $XMLdata = new SimpleXMLElement($results);
        $status = $XMLdata->message[0]->text;
        echo $status;
    }

}

/* End of file Peramalan_model.php */
/* Location: ./application/models/Peramalan_model.php */