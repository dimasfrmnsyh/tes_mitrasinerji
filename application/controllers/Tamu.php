<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tamu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_tamu');
        $this->load->model('model_pegawai');
        $this->load->library('PushNotif');
           
    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
            $data['result'] = $this->model_tamu->show();
            $data['pegawai'] = $this->model_pegawai->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        // $this->load->view('admin/layout', array('title' => 'Kelola Tamu', 'menu' => 'kelola_tamu', 'css' => $css));
        $this->load->view('tamu',$data);
        
    }

    public function delete($id_tamu = 0) {
        $referred_from = $this->agent->referrer();
        if($id_tamu == 0) {
            $this->session->set_flashdata('info', 'Tamu tidak ditemukan.');
        } else { 
            if($this->model_tamu->delete($id_tamu)) {
                $this->session->set_flashdata('sukses', 'Berhasil menghapus Data Tamu.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus Data Tamu.');
            } 
        }
        redirect($referred_from, 'refresh');
    }
 
    public function tambah()
	{
		$nama = $this->input->post('nama', true);
		$instansi = $this->input->post('instansi', true);
		$keperluan = $this->input->post('keperluan', true);
		$nik = $this->input->post('nik', true);
		$id_pegawai = $this->input->post('id_pegawai', true);
        $foto = $this->input->post('foto', true);
        $foto = str_replace('data:foto/jpeg;base64,','', $foto);
        $foto = str_replace('[removed]','', $foto);
        $foto = base64_decode($foto);
        $filename = 'foto'.time().'.jpeg';
        file_put_contents(FCPATH.'/uploads/'.$filename,$foto);		
        $data = array(
			'nama' => $nama,
			'instansi' => $instansi,
			'nik' => $nik,
			'keperluan' => $keperluan,
			'id_pegawai' => $id_pegawai,
			'foto' => $filename,
        );
           echo json_encode($data);
           $token = $this->model_tamu->getToken($id_pegawai);
           $notifMessage =  "Tamu dengan nama'  $nama  'ingin menemui anda";
           $notifTitle = "Ada tamu yang ingin menemui anda";
           $res = $this->pushnotif->send_notification_FCM($token->token, $notifTitle, $notifMessage, "id", "type", "");
           $this->model_tamu->insert($data);
           $this->load->view('page'); 
    }

}

