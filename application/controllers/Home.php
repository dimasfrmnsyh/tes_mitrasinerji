<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  

    public function __construct() {
        parent::__construct();
        $this->load->model('model_kegiatan');

        $this->load->model('model_pesan');
    }


	public function index() {  
		$this->load->helper('custom_helper');
		$this->load->model('model_kegiatan');

        $data['today'] = $this->model_kegiatan->today();
        $data['result'] = $this->model_kegiatan->show();
        $data['pesan'] = $this->model_pesan->show();
        $data['sedang_berjalan'] = $this->model_kegiatan->sedang_berjalan(1);
        $data['sedang_berjalan2'] = $this->model_kegiatan->sedang_berjalan(2);
		$this->load->view('home',$data);
		// redirect(base_url('login'));
	
	}



}