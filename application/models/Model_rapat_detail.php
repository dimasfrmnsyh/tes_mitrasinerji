<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rapat_detail extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//     public function show($limit = 0, $offset = 0) {
//         if($limit != 0) {
//             $query = $this->db->limit($limit, $offset)->get('rapat_detail');        
//         } else {
//             $this->db->join('rapat', 'rapat.id_rapat = rapat_detail.id_rapat');
//             $this->db->join('pegawai', 'pegawai.id_pegawai = rapat_detail.id_pegawai');
//             $this->db->join('ruangan', 'ruangan.id_ruangan = rapat_detail.id_ruangan');
//             $query = $this->db->get('rapat_detail');
//         }
//         return $query->result();
// }

    public function show($limit = 0, $offset = 0)
    {
        if($limit != 0) {
    $this->db->limit($limit,$offset);
        }else{
            $this->db->group_by('rapat_detail.id_rapat');
    $this->db->join('rapat','rapat.id_rapat=rapat_detail.id_rapat','left');
    $this->db->join('ruangan','ruangan.id_ruangan=rapat_detail.id_ruangan','left');
    $query = $this->db->select('rapat_detail.id_rapat_detail,rapat_detail.id_rapat,rapat.nama_rapat,ruangan.nama_ruangan,rapat.tanggal,rapat_detail.foto')->get('rapat_detail');
    
    }
    return $query->result();
    }

    public function insert($data = array()) {  
        return $this->db->insert('rapat_detail', $data);
    }

    public function getrapatByid($id_rapat = 0){
		$this->db->select('rapat.nama_rapat,rapat.tanggal,rapat.jam,rapat_detail.*');
        $this->db->join('rapat','rapat.id_rapat=rapat_detail.id_rapat','left');
		return $this->db->where('rapat_detail.id_rapat', $id_rapat)->get('rapat_detail')->result();
    } 
    

    public function getNamaRapat($id_rapat = 0){
		$this->db->select('rapat.nama_rapat,rapat.tanggal,rapat.jam,rapat_detail.*');
        $this->db->join('rapat','rapat.id_rapat=rapat_detail.id_rapat','left');
		return $this->db->where('rapat_detail.id_rapat', $id_rapat)->get('rapat_detail')->row();
    } 
    

    public function count() {
        return $this->db->get('rapat_detail')->num_rows();
    }
}