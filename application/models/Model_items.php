<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_items extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('m_barang')->num_rows();
    }

    public function insert($data = array()) {

        return $this->db->insert('m_barang', $data);
    }

    public function update($data = array(), $id) {
        $this->db->where('id', $id);
        return $this->db->update('m_barang', $data);
    } 

    public function get($id) {
        return $this->db->where('id', $id)->get('m_barang')->row();
    }   

    public function delete($id) {
        $this->db->where('id', $id); 
        return $this->db->delete('m_barang');
    } 

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset);        
        } else {
            $query = $this->db->get('m_barang');
        }
        return $query->result();
    }
}