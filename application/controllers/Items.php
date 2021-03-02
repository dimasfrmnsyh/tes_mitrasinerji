<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_items');
    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
 
        $data['result'] = $this->model_items->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('admin/layout/header', array('title' => 'Items', 'menu' => 'items', 'css' => $css));
        $this->load->view('admin/items/list', $data);
    }
    public function tambah() {
        if($this->input->post('submit')) {
            $this->form_validation->set_rules('kode', 'kode', 'trim|required');
            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('harga', 'harga', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Items', 'menu' => 'items'));
                $this->load->view('admin/items/tambah');
            } else {
                $data['kode'] = $this->input->post('kode');
                $data['nama'] = $this->input->post('nama');
                $data['harga'] = $this->input->post('harga');
                
                if($this->model_items->insert($data)) {
                    $this->session->set_flashdata('sukses', 'Success Add items.');
                } else {
                    $this->session->set_flashdata('error', 'Failed To Add items.');
                }
                redirect(site_url('items'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Add Customer', 'menu' => 'items'));
            $this->load->view('admin/items/tambah'); 
        }
    }

    public function delete($id = 0) {
        $referred_from = $this->agent->referrer();
        if($id == 0) {
            $this->session->set_flashdata('info', 'Customer didnt not found.');
        } else { 
            if($this->model_items->delete($id)) {
                $this->session->set_flashdata('sukses', 'Success Delete Customer.');
            } else {
                $this->session->set_flashdata('error', 'Failed While Deleting Customer.');
            } 
        }
        redirect($referred_from, 'refresh');
    }

    public function edit($id = 0) {
        $data['items'] = $this->model_items->get($id); 
        if(($id == 0) || (!$data['items'])) {
            $this->session->set_flashdata('info', 'Failed items not found.');
            redirect(site_url('items'), 'refresh');
        } 
        $data['id'] = $id;
        if($this->input->post('submit')) {

            $data_edit['kode'] = $this->input->post('kode');
            $data_edit['nama'] = $this->input->post('nama');
            $data_edit['harga'] = $this->input->post('harga');
            

            // validasi  
            if($data['items']->kode = $data_edit['kode']) {
                $this->form_validation->set_rules('kode', 'kode', 'trim|required'); 
                }   
            if($data['items']->nama = $data_edit['nama']) {
                $this->form_validation->set_rules('nama', 'nama', 'trim|required'); 
                }    
            if($data['items']->harga = $data_edit['harga']) {
                $this->form_validation->set_rules('harga', 'harga', 'trim|required'); 
                }         
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit items - ' . $data['items']->nama, 'menu' => 'items'));
                $this->load->view('admin/items/edit', $data);
            } else {

                if($this->model_items->update($data_edit, $id)) {
                    $this->session->set_flashdata('sukses', 'Success Update Data Items.');
                } else {
                    $this->session->set_flashdata('error', 'Failed Edit Data Items.');
                }
                redirect(site_url('items'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit items - ' . $data['items']->nama, 'menu' => 'items'));
            $this->load->view('admin/items/edit', $data); 
        }
    }  

}
