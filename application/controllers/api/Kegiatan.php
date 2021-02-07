<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kegiatan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }
    function index_get() {
        $id_pegawai = $this->get('id_pegawai');
        $id_kegiatan = $this->get('id_kegiatan');
        if ($id_kegiatan == '') {
            $kegiatan = $this->db->where('DATE(tanggal) = DATE(NOW())');
            $kegiatan = $this->db->where('id_pegawai', $id_pegawai);
            $kegiatan = $this->db->get('kegiatan')->result();
        } else {
            $kegiatan = $this->db->where('DATE(tanggal) = DATE(NOW())');
            $kegiatan = $this->db->get('kegiatan')->result();
        }
        if($kegiatan == null){
            $response['status'] = false;
            $response['message'] = 'tidak ada kegiatan hari ini';
            $response['data'] = null;        
            $this->response($response, 502);
        }else{
            $response['status'] = true;
            $response['message'] = 'data kegiatan hari ini';
            $response['data'] = $kegiatan;        
            $this->response($response, 200);
        }
    }
    //Masukan function selanjutnya disini
}
?>