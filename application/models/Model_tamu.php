<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tamu extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('tamu')->num_rows();
    }

    public function insert($data = array()) {

        return $this->db->insert('tamu', $data);
    }

    public function update($data = array(), $id_tamu) {
        $this->db->where('id_tamu', $id_tamu);
        return $this->db->update('tamu', $data);
    } 

    public function get($id_tamu) {
        return $this->db->where('id_tamu', $id_tamu)->get('tamu')->row();
    }   

    public function delete($id_tamu) {
        $this->db->where('id_tamu', $id_tamu); 
        return $this->db->delete('tamu');
    } 

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset);        
        } else {
            $this->db->join('pegawai', 'pegawai.id_pegawai = tamu.id_pegawai','left');
            $query = $this->db->get('tamu');
        }
        return $query->result();
    }
    public function getToken($id_pegawai) {
        $this->db->join('pegawai', 'pegawai.id_pegawai = tamu.id_pegawai','left');
        $this->db->select('token');
        return $this->db->where('tamu.id_pegawai', $id_pegawai)->get('tamu')->row();
    }
}