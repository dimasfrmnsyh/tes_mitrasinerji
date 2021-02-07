<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kelola_tamu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->admin_login) {
            $this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
            redirect(site_url('login'));
        }
        $this->load->model('model_tamu');
        // $this->load->model('model_pegawai');

           
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
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('admin/layout/header', array('title' => 'Kelola Tamu', 'menu' => 'kelola_tamu', 'css' => $css));
        $this->load->view('admin/kelola_tamu/list', $data);
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
 
    public function tambah() { 
        if($this->input->post('submit')) { 
            
            // validasi 
            $this->form_validation->set_rules('nama', 'nama', 'trim|required'); 
            $this->form_validation->set_rules('instansi', 'Instansi', 'trim|required'); 
            $this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required'); 
            $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Tambah Tamu', 'menu' => 'kelola_tamu'));
                $this->load->view('admin/kelola_tamu/tambah',$data);
            } else {

                $data_insert['nama'] = $this->input->post('nama'); 
                $data_insert['instansi'] = $this->input->post('instansi'); 
                $data_insert['keperluan'] = $this->input->post('keperluan'); 
                $data_insert['id_pegawai'] = $this->input->post('id_pegawai'); 
                $data_insert['foto'] = $this->input->post('image');
		        $data_insert['foto'] = str_replace('data:image/jpeg;base64,','', $data_insert['foto']);
		        $data_insert['foto'] = base64_decode($data_insert['foto']);
		        $filename = 'image_'.time().'.png';
		        file_put_contents(FCPATH.'/uploads/'.$filename,$image);

                if($this->model_tamu->insert($data_insert)) {
                    $this->session->set_flashdata('sukses', 'Berhasil menambah Data Tamu.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambah Data Tamu.');
                }
                redirect(site_url('admin/kelola_tamu'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Tambah Kegiatan', 'menu' => 'kelola_tamu'));
            $this->load->view('tamu'); 
        }
    }

    public function edit($id_tamu = 0) {
        $data['data_pelaksana'] = $this->model_tamu->get_data_pelaksana(); 
        $data['kegiatan'] = $this->model_tamu->get($id_tamu); 
        if(($id_tamu == 0) || (!$data['kegiatan'])) {
            $this->session->set_flashdata('info', 'Kegiatan tidak ditemukan.');
            redirect(site_url('admin/kelola_kegiatan'), 'refresh');
        } 
        $data['id_tamu'] = $id_tamu;
        if($this->input->post('submit')) {

                $data_edit['tanggal'] = $this->input->post('tanggal'); 
                $data_edit['jam_mulai'] = $this->input->post('jam_mulai'); 
                $data_edit['jam_selesai'] = $this->input->post('jam_selesai'); 
                $data_edit['uraian_kegiatan'] = $this->input->post('uraian_kegiatan'); 
                $data_edit['tempat_kegiatan'] = $this->input->post('tempat_kegiatan'); 
                $data_edit['alamat'] = $this->input->post('alamat'); 
                $data_edit['keterangan'] = $this->input->post('keterangan'); 
                $data_edit['id_pelaksana'] = $this->input->post('id_pelaksana'); 
            // validasi  
            if($data['kegiatan']->tanggal != $data_edit['tanggal']) {
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required'); 
            }  
            if($data['kegiatan']->jam_mulai != $data_edit['jam_mulai']) {
            $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim|required'); 
            }  
            if($data['kegiatan']->jam_selesai != $data_edit['jam_selesai']) {
            $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim|required'); 
            }   
            if($data['kegiatan']->uraian_kegiatan != $data_edit['uraian_kegiatan']) {
            $this->form_validation->set_rules('uraian_kegiatan', 'Uraian Kegiatan', 'trim|required'); 
            }  
            if($data['kegiatan']->tempat_kegiatan != $data_edit['tempat_kegiatan']) {
            $this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'trim|required'); 
            }  
            if($data['kegiatan']->alamat != $data_edit['alamat']) {
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required'); 
            }  
            if($data['kegiatan']->keterangan != $data_edit['keterangan']) {
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required'); 
            }  
            if($data['kegiatan']->id_pelaksana != $data_edit['id_pelaksana']) {
            $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'trim|required'); 
            }                                   
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit Kegiatan - ' . $data['kegiatan']->tanggal, 'menu' => 'kelola_kegiatan'));
                $this->load->view('admin/kelola_kegiatan/edit', $data);
            } else {

                if($this->model_tamu->update($data_edit, $id_tamu)) {
                    $this->session->set_flashdata('sukses', 'Berhasil mengubah Data Kegiatan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah Data Kegiatan.');
                }
                redirect(site_url('admin/kelola_kegiatan'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit Kegiatan - ' . $data['kegiatan']->tanggal, 'menu' => 'kelola_kegiatan'));
            $this->load->view('admin/kelola_kegiatan/edit', $data); 
        }
    }  

    // public function print(){

    //     $tahun = '';
    //     $bulan = '';
    //     $periode = $this->input->get('periode');
    //     if($periode != 'all'){
    //         $tahun = explode('-', $periode)[1];
    //         $bulan = explode('-', $periode)[0];
    //     }else{
    //         $tahun = '';
    //         $bulan = 'all';

    //     }

    //     //echo $bulan . $tahun;
    //     $data =  $this->model_tamu->laporan($bulan, $tahun);

    //     //print_r($data);

    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet(); 

    //     $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(13);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(13);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(30);

 
    //     $sheet->setCellValue('B1' , "Laporan Kegiatan Bulan $bulan Tahun $tahun"); 
    //     $sheet->setCellValue('B2' , 'tanggal'); 
    //     $sheet->setCellValue('C2' , 'Jam Mulai'); 
    //     $sheet->setCellValue('D2' , 'Jam Selesai'); 
    //     $sheet->setCellValue('E2' , 'Uraian Kegiatan'); 
    //     $sheet->setCellValue('F2' , 'Tempat Kegiatan'); 
    //     $sheet->setCellValue('G2' , 'Alamat');  
    //     $sheet->setCellValue('H2' , 'keterangan');
    //     $sheet->setCellValue('I2' , 'Pelaksana'); 


    //     $styleArray = array(
    //           'borders' => array(
    //               'outline' => array(
    //                   'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                   'color' => array('rgb' => '333333'),
    //               ),
    //           ),
    //       );


    //     foreach (array('B','C','D','E','F','G','H','I') as $alpha) { 
    //         $sheet ->getStyle($alpha . "2")->applyFromArray($styleArray);
    //         $sheet ->getStyle($alpha . "2")->getAlignment()->setWrapText(true); 
    //     }

    //     foreach ($data as $idx => $val) {  
    //        $sheet->setCellValue('B' . ($idx+3), $val->tanggal); 
    //        $sheet->setCellValue('C' . ($idx+3), $val->jam_mulai); 
    //        $sheet->setCellValue('D' . ($idx+3), $val->jam_selesai); 
    //        $sheet->setCellValue('E' . ($idx+3), $val->uraian_kegiatan); 
    //        $sheet->setCellValue('F' . ($idx+3), $val->tempat_kegiatan); 
    //        $sheet->setCellValue('G' . ($idx+3), $val->alamat);
    //        $sheet->setCellValue('H' . ($idx+3), $val->keterangan); 
    //        $sheet->setCellValue('I' . ($idx+3), $val->nama_pelaksana); 
           
    //        $index = $idx + 3;
    //        foreach (array('B','C','D','E','F','G','H','I') as $alpha) { 
    //         $sheet ->getStyle("$alpha$index")->applyFromArray($styleArray); 
    //         $sheet ->getStyle("$alpha$index")->getAlignment()->setWrapText(true); 
    //        }
    //     }
         
 
 

    //     $writer = new Xlsx($spreadsheet);

    //     $filename = "Laporan Kegiatan Bulan $bulan Tahun $tahun";

    //     header('Content-Type: application/vnd.ms-excel');
    //     header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
    //     header('Cache-Control: max-age=0');

    //     $writer->save('php://output'); 
    // }
}
