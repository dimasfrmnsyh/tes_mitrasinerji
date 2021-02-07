<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pesan extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('pesan')->num_rows();
    }

    public function insert($data = array()) {  
        return $this->db->insert('pesan', $data);
    }

    public function update($data = array(), $id_pesan) {
        $this->db->where('id_pesan', $id_pesan);
        return $this->db->update('pesan', $data);
    } 

    public function get($id_pesan) {
        return $this->db->where('id_pesan', $id_pesan)->get('pesan')->row();
    }    
 

    public function delete($id_pesan) {
        $this->db->where('id_pesan', $id_pesan); 
        return $this->db->delete('pesan');
    } 

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset)->get('pesan');        
        } else {
            $query = $this->db->get('pesan');
        }
        return $query->result();
    } 

}