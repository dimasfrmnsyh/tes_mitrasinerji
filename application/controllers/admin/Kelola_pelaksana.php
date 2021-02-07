<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kelola_pelaksana extends CI_Controller {
      
    public function __construct() {
        parent::__construct();
        if(!$this->session->admin_login) {
            $this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
            redirect(site_url('login'));
        }
        $this->load->model('model_pelaksana');

    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );

        $data['result'] = $this->model_pelaksana->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('admin/layout/header', array('title' => 'Kelola pelaksana', 'menu' => 'kelola_pelaksana', 'css' => $css));
        $this->load->view('admin/kelola_pelaksana/list', $data);
    }

    public function delete($id_pelaksana = 0) {
        $referred_from = $this->agent->referrer();
        if($id_pelaksana == 0) {
            $this->session->set_flashdata('info', 'pelaksana tidak ditemukan.');
        } else { 
            if($this->model_pelaksana->delete($id_pelaksana)) {
                $this->session->set_flashdata('sukses', 'Berhasil menghapus Data pelaksana.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus Data pelaksana.');
            } 
        }
        redirect($referred_from, 'refresh');
    }
 
    public function tambah() {

        if($this->input->post('submit')) { 
            // validasi 
            $this->form_validation->set_rules('nama_pelaksana', 'Nama_pelaksana pelaksana', 'trim|required'); 
            $this->form_validation->set_rules('warna', 'warna', 'trim|required'); 

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Tambah pelaksana', 'menu' => 'kelola_pelaksana'));
                $this->load->view('admin/kelola_pelaksana/tambah');
            } else {

                $data['nama_pelaksana'] = $this->input->post('nama_pelaksana'); 
                $data['warna'] = $this->input->post('warna');


                if($this->model_pelaksana->insert($data)) {
                    $this->session->set_flashdata('sukses', 'Berhasil menambah Data pelaksana.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambah Data pelaksana.');
                }
                redirect(site_url('admin/kelola_pelaksana'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Tambah pelaksana', 'menu' => 'kelola_pelaksana'));
            $this->load->view('admin/kelola_pelaksana/tambah'); 
        }
    }

    public function edit($id_pelaksana = 0) {
        $data['pelaksana'] = $this->model_pelaksana->get($id_pelaksana); 
        if(($id_pelaksana == 0) || (!$data['pelaksana'])) {
            $this->session->set_flashdata('info', 'pelaksana tidak ditemukan.');
            redirect(site_url('admin/kelola_pelaksana'), 'refresh');
        } 
        $data['id_pelaksana'] = $id_pelaksana;
        if($this->input->post('submit')) {

                $data_edit['nama_pelaksana'] = $this->input->post('nama_pelaksana'); 
                $data_edit['warna'] = $this->input->post('warna'); 
            // validasi  
            if($data['pelaksana']->nama_pelaksana != $data_edit['nama_pelaksana']) {
            $this->form_validation->set_rules('nama_pelaksana', 'Nama_pelaksana pelaksana', 'trim|required'); 
            }  
            if($data['pelaksana']->warna != $data_edit['warna']) {
            $this->form_validation->set_rules('warna', ' warna', 'trim|required'); 
            }  
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit pelaksana - ' . $data['pelaksana']->nama_pelaksana, 'menu' => 'kelola_pelaksana'));
                $this->load->view('admin/kelola_pelaksana/edit', $data);
            } else {

                if($this->model_pelaksana->update($data_edit, $id_pelaksana)) {
                    $this->session->set_flashdata('sukses', 'Berhasil mengubah Data pelaksana.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah Data pelaksana.');
                }
                redirect(site_url('admin/kelola_pelaksana'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit pelaksana - ' . $data['pelaksana']->nama_pelaksana, 'menu' => 'kelola_pelaksana'));
            $this->load->view('admin/kelola_pelaksana/edit', $data); 
        }
    }

}
