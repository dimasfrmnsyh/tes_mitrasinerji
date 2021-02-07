<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kelola_absen_rapat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->admin_login) {
            $this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
            redirect(site_url('login'));
        }
        $this->load->model('model_rapat_detail');
    }

    public function index($offset = 0,$id_rapat=0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
        $data['result'] = $this->model_rapat_detail->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';
        $this->load->view('admin/layout/header', array('title' => 'Kelola Absen Rapat', 'menu' => 'kelola_absen_rapat', 'css' => $css));
        $this->load->view('admin/kelola_absen_rapat/list', $data);
    }

    public function get_detail($id_rapat = 0){
        $data['detail_rapat'] = $this->model_rapat_detail->getrapatByid($id_rapat); 
        $data['get'] = $this->model_rapat_detail->getNamaRapat($id_rapat); 
            $this->load->view('admin/layout/header', array('title' => 'Kelola Absen Rapat', 'menu' => 'kelola_absen_rapat'));
            $this->load->view('admin/kelola_absen_rapat/get_rapat_detail',$data);
    }

}
