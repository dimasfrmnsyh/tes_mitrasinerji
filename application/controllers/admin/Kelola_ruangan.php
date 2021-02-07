<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_ruangan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->admin_login) {
            $this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
            redirect(site_url('login'));
        }
        $this->load->model('model_ruangan');
    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
 
        $data['result'] = $this->model_ruangan->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('admin/layout/header', array('title' => 'Kelola ruangan', 'menu' => 'kelola_ruangan', 'css' => $css));
        $this->load->view('admin/kelola_ruangan/list', $data);
    }

    public function delete($id_ruangan = 0) {
        $referred_from = $this->agent->referrer();
        if($id_ruangan == 0) {
            $this->session->set_flashdata('info', 'ruangan tidak ditemukan.');
        } else { 
            if($this->model_ruangan->delete($id_ruangan)) {
                $this->session->set_flashdata('sukses', 'Berhasil menghapus Data ruangan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus Data ruangan.');
            } 
        }
        redirect($referred_from, 'refresh');
    }
 
    public function tambah() {
        if($this->input->post('submit')) { 
            
            // validasi 
            $this->form_validation->set_rules('nama_ruangan', 'nama_ruangan', 'trim|required'); 

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Tambah ruangan', 'menu' => 'kelola_ruangan'));
                $this->load->view('admin/kelola_ruangan/tambah');
            } else {

                $data['nama_ruangan'] = $this->input->post('nama_ruangan'); 

                if($this->model_ruangan->insert($data)) {
                    $this->session->set_flashdata('sukses', 'Berhasil menambah Data ruangan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambah Data ruangan.');
                }
                redirect(site_url('admin/kelola_ruangan'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Tambah ruangan', 'menu' => 'kelola_ruangan'));
            $this->load->view('admin/kelola_ruangan/tambah'); 
        }
    }

    public function edit($id_ruangan = 0) {
        $data['ruangan'] = $this->model_ruangan->get($id_ruangan); 
        if(($id_ruangan == 0) || (!$data['ruangan'])) {
            $this->session->set_flashdata('info', 'ruangan tidak ditemukan.');
            redirect(site_url('admin/kelola_ruangan'), 'refresh');
        } 
        $data['id_ruangan'] = $id_ruangan;
        if($this->input->post('submit')) {

                $data_edit['nama_ruangan'] = $this->input->post('nama_ruangan'); 

            // validasi  
            if($data['ruangan']->nama_ruangan != $data_edit['nama_ruangan']) {
            $this->form_validation->set_rules('nama_ruangan', 'nama_ruangan', 'trim|required'); 
            }  
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit ruangan - ' . $data['ruangan']->nama_ruangan, 'menu' => 'kelola_ruangan'));
                $this->load->view('admin/kelola_ruangan/edit', $data);
            } else {

                if($this->model_ruangan->update($data_edit, $id_ruangan)) {
                    $this->session->set_flashdata('sukses', 'Berhasil mengubah Data ruangan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah Data ruangan.');
                }
                redirect(site_url('admin/kelola_ruangan'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit ruangan - ' . $data['ruangan']->nama_ruangan, 'menu' => 'kelola_ruangan'));
            $this->load->view('admin/kelola_ruangan/edit', $data); 
        }
    }  

}
