<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->pegawai_login) {
            redirect(site_url('pegawai/signin'));
        }   
        $this->load->model('model_pegawai');
	}

	public function index() {   
		$this->load->view('pegawai/layout/header', array('menu' => 'dashboard', 'title' => 'Dashboard Pegawai'));
        $this->load->view('pegawai/dashboard');
	}



}