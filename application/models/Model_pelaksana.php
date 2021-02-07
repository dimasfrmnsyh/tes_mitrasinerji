<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pelaksana extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('pelaksana')->num_rows();
    }

    public function insert($data = array()) {  
        return $this->db->insert('pelaksana', $data);
    }

    public function update($data = array(), $id_pelaksana) {
        $this->db->where('id_pelaksana', $id_pelaksana);
        return $this->db->update('pelaksana', $data);
    } 

    public function get($id_pelaksana) {
        return $this->db->where('id_pelaksana', $id_pelaksana)->get('pelaksana')->row();
    }    
 

    public function delete($id_pelaksana) {
        $this->db->where('id_pelaksana', $id_pelaksana); 
        return $this->db->delete('pelaksana');
    } 

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset)->get('pelaksana');      
        } else {
            $query = $this->db->get('pelaksana');
        }
        return $query->result();
    } 

}