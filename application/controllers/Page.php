<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
  

    public function __construct() {
        parent::__construct();
        $this->load->model('model_rapat_detail');
        $this->load->model('model_rapat');
        $this->load->model('model_ruangan');
 
    }


	public function index() { 
   	$this->load->view('page');
		// redirect(base_url('login'));
	
	}



}