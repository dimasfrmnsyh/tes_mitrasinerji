<?php
defined('BASEPATH') OR exit('No direct script access allowed');

      
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kelola_rapat extends CI_Controller {
      
    public function __construct() {
        parent::__construct();
        if(!$this->session->admin_login) {
            $this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
            redirect(site_url('login'));
        }
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

        $data['result'] = $this->model_rapat->show();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';


        $this->load->view('admin/layout/header', array('title' => 'Kelola rapat', 'menu' => 'kelola_rapat', 'css' => $css));
        $this->load->view('admin/kelola_rapat/list', $data);
    }

    public function delete($id_rapat = 0) {
        $referred_from = $this->agent->referrer();
        if($id_rapat == 0) {
            $this->session->set_flashdata('info', 'rapat tidak ditemukan.');
        } else { 
            if($this->model_rapat->delete($id_rapat)) {
                $this->session->set_flashdata('sukses', 'Berhasil menghapus Data rapat.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus Data rapat.');
            } 
        }
        redirect($referred_from, 'refresh');
    }
 
    public function tambah() {
        $data['data_ruangan'] = $this->model_ruangan->get_nama_ruangan();
        if($this->input->post('submit')) { 
            // validasi 
            $this->form_validation->set_rules('nama_rapat', 'Nama Rapat', 'trim|required'); 
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required'); 
            $this->form_validation->set_rules('jam', 'Jam ', 'trim|required'); 

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Tambah rapat', 'menu' => 'kelola_rapat'));
                $this->load->view('admin/kelola_rapat/tambah',$data);
            } else {

                $data['nama_rapat'] = $this->input->post('nama_rapat'); 
                $data['tanggal'] = $this->input->post('tanggal'); 
                $data['jam'] = $this->input->post('jam'); 
                $data['id_ruangan'] = $this->input->post('id_ruangan'); 


                if($this->model_rapat->insert($data)) {
                    $this->session->set_flashdata('sukses', 'Berhasil menambah Data rapat.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambah Data rapat.');
                }
                redirect(site_url('admin/kelola_rapat'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Tambah rapat', 'menu' => 'kelola_rapat'));
            $this->load->view('admin/kelola_rapat/tambah',$data); 
        }
    }

    public function edit($id_rapat = 0) {
        $data['data_ruangan'] = $this->model_ruangan->get_nama_ruangan();
   
        $data['rapat'] = $this->model_rapat->get($id_rapat); 
        if(($id_rapat == 0) || (!$data['rapat'])) {
            $this->session->set_flashdata('info', 'rapat tidak ditemukan.');
            redirect(site_url('admin/kelola_rapat'), 'refresh');
        } 
        $data['id_rapat'] = $id_rapat;
        if($this->input->post('submit')) {

                $data_edit['nama_rapat'] = $this->input->post('nama_rapat'); 
                $data_edit['tanggal'] = $this->input->post('tanggal'); 
                $data_edit['jam'] = $this->input->post('jam'); 
                $data_edit['id_ruangan'] = $this->input->post('id_ruangan'); 

            // validasi  
            if($data['rapat']->nama_rapat != $data_edit['nama_rapat']) {
            $this->form_validation->set_rules('nama_rapat', 'Nama Rapat', 'trim|required'); 
            }  
            if($data['rapat']->tanggal != $data_edit['tanggal']) {
            $this->form_validation->set_rules('tanggal', ' Tanggal', 'trim|required'); 
            }  
            if($data['rapat']->jam != $data_edit['jam']) {
            $this->form_validation->set_rules('jam', 'Jam ', 'trim|required'); 
            }   
            if($data['rapat']->id_ruangan != $data_edit['id_ruangan']) {
            $this->form_validation->set_rules('id_ruangan', 'id_ruangan ', 'trim|required'); 
            }  
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit rapat - ' . $data['rapat']->nama_rapat, 'menu' => 'kelola_rapat'));
                $this->load->view('admin/kelola_rapat/edit', $data);
            } else {

                if($this->model_rapat->update($data_edit, $id_rapat)) {
                    $this->session->set_flashdata('sukses', 'Berhasil mengubah Data rapat.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah Data rapat.');
                }
                redirect(site_url('admin/kelola_rapat'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit rapat - ' . $data['rapat']->nama_rapat, 'menu' => 'kelola_rapat'));
            $this->load->view('admin/kelola_rapat/edit', $data); 
        }
    }
      public function print(){

        $tahun = '';
        $bulan = '';
        $periode = $this->input->get('periode');
        if($periode != 'all'){
            $tahun = explode('-', $periode)[1];
            $bulan = explode('-', $periode)[0];
        }else{
            $tahun = '';
            $bulan = 'all';

        }

        //echo $bulan . $tahun;
        $data =  $this->model_rapat->laporan($bulan, $tahun);

        //print_r($data);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); 

        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30);

 
        $sheet->setCellValue('B1' , "Laporan Rapat Bulan $bulan Tahun $tahun"); 
        $sheet->setCellValue('B2' , 'Nama_rapat'); 
        $sheet->setCellValue('C2' , 'Tanggal'); 
        $sheet->setCellValue('D2' , 'Jam'); 
        $sheet->setCellValue('E2' , 'Tempat'); 


        $styleArray = array(
              'borders' => array(
                  'outline' => array(
                      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                      'color' => array('rgb' => '333333'),
                  ),
              ),
          );


        foreach (array('B','C','D','E') as $alpha) { 
            $sheet ->getStyle($alpha . "2")->applyFromArray($styleArray);
            $sheet ->getStyle($alpha . "2")->getAlignment()->setWrapText(true); 
        }

        foreach ($data as $idx => $val) {  
           $sheet->setCellValue('B' . ($idx+3), $val->nama_rapat); 
           $sheet->setCellValue('C' . ($idx+3), $val->tanggal); 
           $sheet->setCellValue('D' . ($idx+3), $val->jam); 
           $sheet->setCellValue('E' . ($idx+3), $val->nama_ruangan); 

           $index = $idx + 3;
           foreach (array('B','C','D','E') as $alpha) { 
            $sheet ->getStyle("$alpha$index")->applyFromArray($styleArray); 
            $sheet ->getStyle("$alpha$index")->getAlignment()->setWrapText(true); 
           }
        }
         
 
 

        $writer = new Xlsx($spreadsheet);

        $filename = "Laporan Rapat Bulan $bulan Tahun $tahun";

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output'); 
    }  
}
