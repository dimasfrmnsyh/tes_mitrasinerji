<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kelola_pesan extends CI_Controller {
      
    public function __construct() {
        parent::__construct();
        if(!$this->session->admin_login) {
            $this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
            redirect(site_url('login'));
        }
        $this->load->model('model_pesan');

    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );

        $data['result'] = $this->model_pesan->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('admin/layout/header', array('title' => 'Kelola pesan', 'menu' => 'kelola_pesan', 'css' => $css));
        $this->load->view('admin/kelola_pesan/list', $data);
    }

    public function delete($id_pesan = 0) {
        $referred_from = $this->agent->referrer();
        if($id_pesan == 0) {
            $this->session->set_flashdata('info', 'pesan tidak ditemukan.');
        } else { 
            if($this->model_pesan->delete($id_pesan)) {
                $this->session->set_flashdata('sukses', 'Berhasil menghapus Data pesan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus Data pesan.');
            } 
        }
        redirect($referred_from, 'refresh');
    }
 
    public function tambah() {

        if($this->input->post('submit')) { 
            // validasi 
            $this->form_validation->set_rules('pesan', 'pesan Pesan', 'trim|required'); 

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Tambah pesan', 'menu' => 'kelola_pesan'));
                $this->load->view('admin/kelola_pesan/tambah');
            } else {

                $data['pesan'] = $this->input->post('pesan'); 


                if($this->model_pesan->insert($data)) {
                    $this->session->set_flashdata('sukses', 'Berhasil menambah Data pesan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambah Data pesan.');
                }
                redirect(site_url('admin/kelola_pesan'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Tambah pesan', 'menu' => 'kelola_pesan'));
            $this->load->view('admin/kelola_pesan/tambah'); 
        }
    }

    public function edit($id_pesan = 0) {
        $data['pesan'] = $this->model_pesan->get($id_pesan); 
        if(($id_pesan == 0) || (!$data['pesan'])) {
            $this->session->set_flashdata('info', 'pesan tidak ditemukan.');
            redirect(site_url('admin/kelola_pesan'), 'refresh');
        } 
        $data['id_pesan'] = $id_pesan;
        if($this->input->post('submit')) {

                $data_edit['pesan'] = $this->input->post('pesan'); 
            // validasi  
            if($data['pesan']->pesan != $data_edit['pesan']) {
            $this->form_validation->set_rules('pesan', 'Nama pesan', 'trim|required'); 
            }   
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit pesan - ' . $data['pesan']->pesan, 'menu' => 'kelola_pesan'));
                $this->load->view('admin/kelola_pesan/edit', $data);
            } else {

                if($this->model_pesan->update($data_edit, $id_pesan)) {
                    $this->session->set_flashdata('sukses', 'Berhasil mengubah Data pesan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah Data pesan.');
                }
                redirect(site_url('admin/kelola_pesan'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit pesan - ' . $data['pesan']->pesan, 'menu' => 'kelola_pesan'));
            $this->load->view('admin/kelola_pesan/edit', $data); 
        }
    }

}
