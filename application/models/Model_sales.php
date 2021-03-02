<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sales extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function count() {
        return $this->db->get('t_sales')->num_rows();
    }

    public function insert($data = array()) {

        return $this->db->insert('t_sales', $data);
    }

    public function insert_detail($data = array()) {

        return $this->db->insert_batch('t_sales_det', $data);
    }

    public function update($data = array(), $id) {
        $this->db->where('id', $id);
        return $this->db->update('t_sales', $data);
    } 

    public function get($id) {
        return $this->db->where('id', $id)->get('t_sales')->row();
    }   

    public function delete($id) {
        $this->db->where('id', $id); 
        return $this->db->delete('t_sales');
    } 

    public function showw($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset);        
        } else {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('t_sales');
        }
        return $query->row();
    }

    public function show($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset);        
        } else {
            $this->db->join('m_customer', 'm_customer.id = t_sales.cust_id','left');
            $this->db->join('t_sales_det', 't_sales_det.sales_id = t_sales.id','left');
            $this->db->join('m_barang', 't_sales_det.barang_id = m_barang.id','left');
            $query = $this->db->get('t_sales');
        }
        return $query->result();
    }
    public function showe($limit = 0, $offset = 0) {
        if($limit != 0) {
            $query = $this->db->limit($limit, $offset);        
        } else {
            $this->db->join('t_sales', 't_sales.id= t_sales_det.sales_id ','left');
            $this->db->join('m_customer', 'm_customer.id = t_sales.cust_id','left');
            $this->db->join('m_barang', 't_sales_det.barang_id = m_barang.id','left');
            $query = $this->db->get('t_sales_det');
        }
        return $query->result();
    }
}