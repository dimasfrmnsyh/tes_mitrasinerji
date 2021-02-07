<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->admin_login) {
            $this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
            redirect(site_url('login'));
        }
        $this->load->model('model_pegawai');
    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
 
        $data['result'] = $this->model_pegawai->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('admin/layout/header', array('title' => 'Kelola pegawai', 'menu' => 'kelola_pegawai', 'css' => $css));
        $this->load->view('admin/kelola_pegawai/list', $data);
    }

    public function delete($id_pegawai = 0) {
        $referred_from = $this->agent->referrer();
        if($id_pegawai == 0) {
            $this->session->set_flashdata('info', 'pegawai tidak ditemukan.');
        } else { 
            if($this->model_pegawai->delete($id_pegawai)) {
                $this->session->set_flashdata('sukses', 'Berhasil menghapus Data pegawai.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus Data pegawai.');
            } 
        }
        redirect($referred_from, 'refresh');
    }
 
    public function tambah() {
        if($this->input->post('submit')) { 
            
            // validasi 
            $this->form_validation->set_rules('nip', 'nip', 'trim|required'); 
            $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'trim|required'); 
            $this->form_validation->set_rules('password', 'password', 'trim|required'); 
            $this->form_validation->set_rules('warna', 'warna', 'trim|required'); 

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Tambah pegawai', 'menu' => 'kelola_pegawai'));
                $this->load->view('admin/kelola_pegawai/tambah');
            } else {

                $data['nip'] = $this->input->post('nip'); 
                $data['nama_pegawai'] = $this->input->post('nama_pegawai'); 
                $data['password'] = $this->input->post('password'); 
                $data['warna'] = $this->input->post('warna'); 

                if($this->model_pegawai->insert($data)) {
                    $this->session->set_flashdata('sukses', 'Berhasil menambah Data pegawai.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambah Data pegawai.');
                }
                redirect(site_url('admin/kelola_pegawai'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Tambah pegawai', 'menu' => 'kelola_pegawai'));
            $this->load->view('admin/kelola_pegawai/tambah'); 
        }
    }

    public function edit($id_pegawai = 0) {
        $data['pegawai'] = $this->model_pegawai->get($id_pegawai); 
        if(($id_pegawai == 0) || (!$data['pegawai'])) {
            $this->session->set_flashdata('info', 'pegawai tidak ditemukan.');
            redirect(site_url('admin/kelola_pegawai'), 'refresh');
        } 
        $data['id_pegawai'] = $id_pegawai;
        if($this->input->post('submit')) {

            $data_edit['nip'] = $this->input->post('nip'); 
            $data_edit['nama_pegawai'] = $this->input->post('nama_pegawai'); 
            $data_edit['password'] = $this->input->post('password'); 
            $data_edit['warna'] = $this->input->post('warna'); 
            // validasi  
            if($data['pegawai']->id_pegawai = $data['id_pegawai']) {
                $this->form_validation->set_rules('nip', 'nip', 'trim|required'); 
                $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'trim|required'); 
                $this->form_validation->set_rules('password', 'password', 'trim|required'); 
                $this->form_validation->set_rules('warna', 'warna'); 
            }  
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit pegawai - ' . $data['pegawai']->nama_pegawai, 'menu' => 'kelola_pegawai'));
                $this->load->view('admin/kelola_pegawai/edit', $data);
            } else {

                if($this->model_pegawai->update($data_edit, $id_pegawai)) {
                    $this->session->set_flashdata('sukses', 'Berhasil mengubah Data pegawai.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah Data pegawai.');
                }
                redirect(site_url('admin/kelola_pegawai'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit pegawai - ' . $data['pegawai']->nama_pegawai, 'menu' => 'kelola_pegawai'));
            $this->load->view('admin/kelola_pegawai/edit', $data); 
        }
    }  

}
