<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_customer');
    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
 
        $data['result'] = $this->model_customer->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('admin/layout/header', array('title' => 'Customer', 'menu' => 'customer', 'css' => $css));
        $this->load->view('admin/customer/list', $data);
    }
    public function tambah() {
        $data['customer'] = $this->model_customer->get();
        if($this->input->post('submit')) {
            $this->form_validation->set_rules('code', 'code', 'trim|required');
            $this->form_validation->set_rules('name', 'name', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Customer', 'menu' => 'customer'));
                $this->load->view('admin/customer/tambah');
            } else {
                $data['code'] = $this->input->post('code');
                $data['name'] = $this->input->post('name');
                $data['telp'] = $this->input->post('telp');
                
                if($this->model_customer->insert($data)) {
                    $this->session->set_flashdata('sukses', 'Success Add Customer.');
                } else {
                    $this->session->set_flashdata('error', 'Failed To Add Customer.');
                }
                redirect(site_url('customer'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Add Customer', 'menu' => 'customer'));
            $this->load->view('admin/customer/tambah'); 
        }
    }

    public function delete($id = 0) {
        $referred_from = $this->agent->referrer();
        if($id == 0) {
            $this->session->set_flashdata('info', 'Customer didnt not found.');
        } else { 
            if($this->model_customer->delete($id)) {
                $this->session->set_flashdata('sukses', 'Success Delete Customer.');
            } else {
                $this->session->set_flashdata('error', 'Failed While Deleting Customer.');
            } 
        }
        redirect($referred_from, 'refresh');
    }

    public function edit($id = 0) {
        $data['customer'] = $this->model_customer->get($id); 
        if(($id == 0) || (!$data['customer'])) {
            $this->session->set_flashdata('info', 'Failed customer not found.');
            redirect(site_url('customer'), 'refresh');
        } 
        $data['id'] = $id;
        if($this->input->post('submit')) {

            $data_edit['code'] = $this->input->post('code');
            $data_edit['name'] = $this->input->post('name');
            $data_edit['telp'] = $this->input->post('telp');
            

            // validasi  
            if($data['customer']->code = $data_edit['code']) {
                $this->form_validation->set_rules('code', 'code', 'trim|required'); 
                }   
            if($data['customer']->name = $data_edit['name']) {
                $this->form_validation->set_rules('name', 'name', 'trim|required'); 
                }       
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit customer - ' . $data['customer']->name, 'menu' => 'customer'));
                $this->load->view('admin/customer/edit', $data);
            } else {

                if($this->model_customer->update($data_edit, $id)) {
                    $this->session->set_flashdata('sukses', 'Success Update Data customer.');
                } else {
                    $this->session->set_flashdata('error', 'Failed Edit Data customer.');
                }
                redirect(site_url('customer'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit customer - ' . $data['customer']->name, 'menu' => 'customer'));
            $this->load->view('admin/customer/edit', $data); 
        }
    }  

}
