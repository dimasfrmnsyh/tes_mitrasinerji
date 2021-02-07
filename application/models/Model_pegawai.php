<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pegawai extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('pegawai')->num_rows();
    }

    public function insert($data = array()) {  
        return $this->db->insert('pegawai', $data);
    }

    public function update($data = array(), $id_pegawai) {
        $this->db->where('id_pegawai', $id_pegawai);
        return $this->db->update('pegawai', $data);
    } 

    public function get($id_pegawai) {
        return $this->db->where('id_pegawai', $id_pegawai)->get('pegawai')->row();
    }    
 

    public function delete($id_pegawai) {
        $this->db->where('id_pegawai', $id_pegawai); 
        return $this->db->delete('pegawai');
    } 

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset)->get('pegawai');        
        } else {
            $query = $this->db->get('pegawai');
        }
        return $query->result();
    } 
    public function cek_nip($nip) {
		$query = $this->db->where('nip', $nip)->get('pegawai');
		return ($query->num_rows() > 0) ? true : false;
    }
    
	public function getLogin($input) {
		return $this->db->where('nip', $input)->get('pegawai')->result();
    }
    
	public function getNama($id_pegawai) {
        $this->db->select('nama_pegawai');
		return $this->db->where('id_pegawai', $id_pegawai)->get('pegawai')->result();
	}
}