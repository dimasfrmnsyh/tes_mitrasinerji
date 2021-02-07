<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kegiatan extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('kegiatan')->num_rows();
    }

    public function insert($data = array()) {

        return $this->db->insert('kegiatan', $data);
    }

    public function update($data = array(), $id_kegiatan) {
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->update('kegiatan', $data);
    } 

    public function get($id_kegiatan) {
        return $this->db->where('id_kegiatan', $id_kegiatan)->get('kegiatan')->row();
    }   


    public function today() {
        $this->db->select('*');
        $this->db->where('DATE(tanggal) = DATE(NOW())');
    } 

    
    public function sedang_berjalan($ruang_id) {
        $query = $this->db->select('rapat.*, (SELECT nama_ruangan FROM ruangan WHERE ruangan.id_ruangan = rapat.id_ruangan) as nama_ruangan')->where('DATE(tanggal) = DATE(NOW())')->where('jam IN (SELECT max(jam) FROM rapat WHERE DATE(tanggal) = DATE(NOW()) and jam <= curtime())')->where('id_ruangan', $ruang_id)->get('rapat')->row();
        return (isset($query->id_rapat)) ? $query : false;
    } 

    public function cekBerapaRapatHariIni($ruang_id) {
        $this->db->where('DATE(tanggal) = DATE(NOW())'); 
        return $this->db->where('id_ruangan', $ruang_id)->get('rapat')->num_rows();
        //where('curtime() > jam')->
    } 

    public function getRapatTunggal($ruang_id) {
        $this->db->select('rapat.*, (SELECT nama_ruangan FROM ruangan WHERE ruangan.id_ruangan = rapat.id_ruangan) as nama_ruangan')->where('DATE(tanggal) = DATE(NOW())')->where('id_ruangan', $ruang_id)->get('rapat')->row();
    }

    public function selanjutnya($jam = '', $ruang_id = '') { 
        $query = $this->db->select('rapat.*, (SELECT nama_ruangan FROM ruangan WHERE ruangan.id_ruangan = rapat.id_ruangan) as nama_ruangan')->where('DATE(tanggal) = DATE(NOW())')->where("jam > ", $jam)->where('id_ruangan', $ruang_id)->get('rapat')->row();
        if($jam != ''){
            return (isset($query->id_rapat)) ? $query : false;
        }
    }    
 

    public function delete($id_kegiatan) {
        $this->db->where('id_kegiatan', $id_kegiatan); 
        return $this->db->delete('kegiatan');
    } 

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset)->get('kegiatan');
        } else {
            $query = $this->db->join('pegawai', 'kegiatan.id_pegawai = pegawai.id_pegawai');  
            $query = $this->db->get('kegiatan');
        }
        return $query->result();
    } 
    public function showw($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset)->get('kegiatan');
        } else {
            $query = $this->db->join('pegawai', 'kegiatan.id_pegawai = pegawai.id_pegawai');  
            $this->db->where('kegiatan.id_pegawai',$this->session->id_pegawai );

            $query = $this->db->get('kegiatan');
        }
        return $query->result();
    } 


    public function getListBulan(){
      return $this->db->query('
        SELECT distinct MONTHNAME(tanggal) as bulan, YEAR(tanggal) as tahun FROM `kegiatan`')->result();
    }

    public function laporan($bulan, $tahun){
       $this->db->select('kegiatan.*,,pegawai.nama_pegawai'); 
       $this->db->join('pegawai', 'kegiatan.id_pegawai = pegawai.id_pegawai');      
       $this->db->where('kegiatan.id_pegawai',$this->session->id_pegawai );   
       if($bulan != 'all'){
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->where('MONTHNAME(tanggal)', $bulan);
       }
       return $this->db->get('kegiatan')->result();  
    } 
    
    // public function get_nama_pegawai() {
    //         $this->db->select('nama_pegawai,id_pegawai');
    //         $this->db->where('id_pegawai',$this->session->id_pegawai);
    //         $query = $this->db->get('pegawai');
    //         return $query->result_array();
    // } 
    public function get_nama_pegawai() {
        $this->db->select('nama_pegawai,id_pegawai');
        return $this->db->get('pegawai')->result();  
}     
}