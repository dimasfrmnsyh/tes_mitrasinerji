<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rapat extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('rapat')->num_rows();
    }

    public function insert($data = array()) {  
        return $this->db->insert('rapat', $data);
    }

    public function update($data = array(), $id_rapat) {
        $this->db->where('id_rapat', $id_rapat);
        return $this->db->update('rapat', $data);
    } 

    public function get($id_rapat) {
        return $this->db->where('id_rapat', $id_rapat)->get('rapat')->row();
    }    
 

    public function delete($id_rapat) {
        $this->db->where('id_rapat', $id_rapat); 
        return $this->db->delete('rapat');
    } 

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset)->get('rapat');        
        } else {
            $this->db->join('ruangan', 'ruangan.id_ruangan = rapat.id_ruangan');
            $query = $this->db->get('rapat');
        }
        return $query->result();
    } 


    public function getListBulan(){
      return $this->db->query('
        SELECT distinct MONTHNAME(tanggal) as bulan, YEAR(tanggal) as tahun FROM `rapat`')->result();
    }

    public function laporan($bulan, $tahun){
       $this->db->select('rapat.*,ruangan.nama_ruangan'); 
       $this->db->join('ruangan', 'ruangan.id_ruangan = rapat.id_ruangan');
       if($bulan != 'all'){
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->where('MONTHNAME(tanggal)', $bulan);
       }
       return $this->db->get('rapat')->result();  
    }
    public function get_ruangan(){
            $query = $this->db->select('id_ruangan,nama_ruangan');
            $this->db->from('ruangan');
            return $query->result();
    }
    public function today() {
        $this->db->select('*');
        $this->db->where('DATE(tanggal) = DATE(NOW())');
        return $this->db->get('rapat')->result();  
    }     
    public function todayy() {
        $this->db->select('*');
        $this->db->where('DATE(tanggal) = DATE(NOW())');
        $this->db->join('ruangan', 'ruangan.id_ruangan = rapat.id_ruangan');
        return $this->db->get('rapat')->result();  
    } 


    public function get_ruangan_by_rapat($id) {
        $data = $this->db->select("*")
        ->from('rapat')
        ->join('ruangan', 'rapat.id_ruangan = ruangan.id_ruangan')
        ->where('id_rapat', $id)
        ->get()
        ->row();
        return $data;
    }
}