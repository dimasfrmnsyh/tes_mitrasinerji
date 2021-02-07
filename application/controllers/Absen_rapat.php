<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Absen_rapat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_rapat_detail');
        $this->load->model('model_rapat');
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
            $data['result'] = $this->model_rapat_detail->show();
            $data['rapat'] = $this->model_rapat->today();
            $data['ruangan'] = $this->model_rapat->todayy();
            // var_dump($data['ruangan']);die;
            
            $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
            $data['query'] = '';
// $this->load->view('admin/layout/header', array('title' => 'Kelola Tamu', 'menu' => 'kelola_tamu', 'css' => $css));
        $this->load->view('absen_rapat',$data);
    }

 
    public function tambah()
	{
		$id_rapat = $this->input->post('id_rapat', true);
		$id_ruangan = $this->input->post('id_ruangan', true);
        $nama_tamu_rapat = $this->input->post('nama_tamu_rapat', true);
        $instansi = $this->input->post('instansi', true);
        $foto = $this->input->post('foto', true);
        
        // $foto = str_replace('data:foto/jpeg;base64,','', $foto);
        $foto = str_replace('[removed]','', $foto);
        $foto = base64_decode($foto);
        $filename = 'foto'.time().'.jpeg';
        file_put_contents(FCPATH.'/uploads/absen_rapat/'.$filename,$foto);		
        $data = array(
			'id_rapat' => $id_rapat,
			'id_ruangan' => $id_ruangan,
			'nama_tamu_rapat' => $nama_tamu_rapat,
			'instansi' => $instansi,
			'foto' => $filename,
        );
        
        $this->load->model('model_rapat_detail');
        $this->model_rapat_detail->insert($data);
		echo json_encode($data);
    }

    public function get_ruangan($id) {
        $this->load->model('model_rapat');
        $ruangan = $this->model_rapat->get_ruangan_by_rapat($id);
        echo json_encode($ruangan);
    }
}
