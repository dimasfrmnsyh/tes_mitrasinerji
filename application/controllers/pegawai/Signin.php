<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('model_pegawai');
		if($this->agent->is_robot()) {
			$this->output->set_status_header('404');
		}
	}

	public function index() {
		$this->load->view('pegawai/signin');
	}

	public function check() {
		$nip = $this->input->post('nip');
		$password = $this->input->post('password');
		$result = $this->model_pegawai->getLogin($nip);
		if($result) { 
			$result = $result[0];
			if($password == $result->password) { 
				$session_data = array(
						'id_pegawai' => $result->id_pegawai,
						'pegawai_login' => true,
						'login' => true,
					);
				$this->session->set_userdata($session_data); 
				redirect(site_url('pegawai/dashboard')); 
			} else {
				$this->session->set_flashdata('warning', 'NIP atau Password salah.');
				redirect('pegawai/signin', 'refresh');
			}
		} else {
			$this->session->set_flashdata('warning', 'Pengguna tidak ditemukan.');
			redirect(site_url('pegawai/signin'), 'refresh');
		}
	}

	public function destroy() {
		$session = array('id_pegawai', 'pegawai_login', 'user');
		$this->session->unset_userdata($session);
		$this->session->set_flashdata('warning','Anda berhasil logout!');
		redirect(site_url('pegawai/signin'));
	}

	 


}