<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ruangan extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('ruangan')->num_rows();
    }

    public function insert($data = array()) {

        return $this->db->insert('ruangan', $data);
    }

    public function update($data = array(), $id_ruangan) {
        $this->db->where('id_ruangan', $id_ruangan);
        return $this->db->update('ruangan', $data);
    } 

    public function get($id_ruangan) {
        return $this->db->where('id_ruangan', $id_ruangan)->get('ruangan')->row();
    }   

    public function delete($id_ruangan) {
        $this->db->where('id_ruangan', $id_ruangan); 
        return $this->db->delete('ruangan');
    } 

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset)->get('ruangan');
        } else {
            $query = $this->db->get('ruangan');
        }
        return $query->result();
    }  
    public function get_nama_ruangan() {
        $this->db->select('nama_ruangan,id_ruangan');
        return $this->db->get('ruangan')->result();  
} 

    // public function today($id_rapat) {
    //     $this->db->select('*');
    //     $this->db->where('DATE(tanggal) = DATE(NOW())');
    //     $this->db->join('rapat', 'rapat.id_ruangan = ruangan.id_ruangan');
    //     $this->db->where('id_rapat', $id_rapat);
    //     return $this->db->get('ruangan')->result();  
    // } 
}