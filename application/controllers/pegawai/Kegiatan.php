<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kegiatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->pegawai_login) {
            $this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
            redirect(site_url('pegawai/signin'));
        }   
        $this->load->model('model_kegiatan');

           
    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
 
        $data['result'] = $this->model_kegiatan->showw();
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('pegawai/layout/header', array('title' => 'Kelola Kegiatan', 'menu' => 'kelola_kegiatan', 'css' => $css));
        $this->load->view('pegawai/kegiatan', $data);
    }

    public function delete($id_kegiatan = 0) {
        $referred_from = $this->agent->referrer();
        if($id_kegiatan == 0) {
            $this->session->set_flashdata('info', 'Kegiatan tidak ditemukan.');
        } else { 
            if($this->model_kegiatan->delete($id_kegiatan)) {
                $this->session->set_flashdata('sukses', 'Berhasil menghapus Data Kegiatan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus Data Kegiatan.');
            } 
        }
        redirect($referred_from, 'refresh');
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
        $data =  $this->model_kegiatan->laporan($bulan, $tahun);

        //print_r($data);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); 

        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(30);

 
        $sheet->setCellValue('B1' , "Laporan Kegiatan Bulan $bulan Tahun $tahun"); 
        $sheet->setCellValue('B2' , 'tanggal'); 
        $sheet->setCellValue('C2' , 'Jam Mulai'); 
        $sheet->setCellValue('D2' , 'Jam Selesai'); 
        $sheet->setCellValue('E2' , 'Uraian Kegiatan'); 
        $sheet->setCellValue('F2' , 'Tempat Kegiatan'); 
        $sheet->setCellValue('G2' , 'Alamat');  
        $sheet->setCellValue('H2' , 'keterangan');
        $sheet->setCellValue('I2' , 'Pegawai'); 


        $styleArray = array(
              'borders' => array(
                  'outline' => array(
                      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                      'color' => array('rgb' => '333333'),
                  ),
              ),
          );


        foreach (array('B','C','D','E','F','G','H','I') as $alpha) { 
            $sheet ->getStyle($alpha . "2")->applyFromArray($styleArray);
            $sheet ->getStyle($alpha . "2")->getAlignment()->setWrapText(true); 
        }

        foreach ($data as $idx => $val) {  
           $sheet->setCellValue('B' . ($idx+3), $val->tanggal); 
           $sheet->setCellValue('C' . ($idx+3), $val->jam_mulai); 
           $sheet->setCellValue('D' . ($idx+3), $val->jam_selesai); 
           $sheet->setCellValue('E' . ($idx+3), $val->uraian_kegiatan); 
           $sheet->setCellValue('F' . ($idx+3), $val->tempat_kegiatan); 
           $sheet->setCellValue('G' . ($idx+3), $val->alamat);
           $sheet->setCellValue('H' . ($idx+3), $val->keterangan); 
           $sheet->setCellValue('I' . ($idx+3), $val->nama_pegawai); 
           
           $index = $idx + 3;
           foreach (array('B','C','D','E','F','G','H','I') as $alpha) { 
            $sheet ->getStyle("$alpha$index")->applyFromArray($styleArray); 
            $sheet ->getStyle("$alpha$index")->getAlignment()->setWrapText(true); 
           }
        }
         
 
 

        $writer = new Xlsx($spreadsheet);

        $filename = "Laporan Kegiatan Bulan $bulan Tahun $tahun";

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output'); 
    }
}
