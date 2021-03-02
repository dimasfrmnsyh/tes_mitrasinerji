<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_sales');
        $this->load->model('model_customer');
        $this->load->model('model_items');
        $this->load->library('cart');
    }

    public function index($offset = 0) {
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
 
        $data['result'] = $this->model_sales->show();
        // var_dump($data);die;
        $data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';

        $this->load->view('admin/layout/header', array('title' => 'Sales', 'menu' => 'sales', 'css' => $css));
        $this->load->view('admin/sales/list', $data);
    }
    public function get_cust_name(){
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where('id',$id);
        $result = $this->db->get()->row();
        echo $result->name;
    }
    public function get_cust_telp(){
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->from('m_customer');
        $this->db->where('id',$id);
        $result = $this->db->get()->row();
        echo $result->telp;
    }
    public function tambah() {
        $data['customer'] = $this->model_customer->show();
        $data['sales'] = $this->model_sales->showe();
        // var_dump($data['sales']);die;
        $data['nomor'] = $this->model_sales->showw();
        // var_dump(        $data['nomor']);die;
        $css = array(
            'assets/plugins/datatables/dataTables.bootstrap.css'
            );
        $data['js'] = array(
            'assets/plugins/datatables/jquery.dataTables.min.js',
            'assets/plugins/datatables/dataTables.bootstrap.min.js' 
            );
        $data['result'] = $this->model_items->show();
        //$data['curr_page'] = ($offset != '') ? $offset + 1: 1;
        $data['query'] = '';
        if($this->input->post('submit')) {
            //$this->form_validation->set_rules('kode', 'kode', 'trim|required');
            //$this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('id_pegawai', 'Customer', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Sales', 'menu' => 'sales'));
                $this->load->view('admin/sales/tambah',$data);
            } else {
                $data['kode'] = $this->input->post('kode');
                $data['name'] = $this->input->post('name');
                $data['telp'] = $this->input->post('telp');
                
                $cust_id = $this->input->post('id_pegawai');
                $subtotal = $this->input->post('subtotal');
                $diskon = $this->input->post('diskon_akhir');
                $ongkir = $this->input->post('ongkir');
                $total_bayar = $this->input->post('total_bayar');
                $sales = array(
                    'kode' => $this->input->post('no'),
                    'tgl' => $this->input->post('tgl'),    
                    'cust_id' => $cust_id,
                    'subtotal' => $subtotal,    
                    'diskon' => $diskon,
                    'ongkir' => $ongkir,
                    'total_bayar' => $total_bayar
                );

                if($this->model_sales->insert($sales)) {
                    $detail = array();
                    foreach($this->cart->contents() as $item) {
                        $detail[] = array(
                            'barang_id' => $item['id'],
                            'harga_bandrol' => $item['item']->harga,
                            'qty' => $item['qty'],
                            'diskon_pct' => $item['diskon'],
                            'diskon_nilai' => $item['diskon_nilai'],
                            'harga_diskon' => $item['diskon_harga'],
                            'total' => $item['subtotal']
                        );
                    }
                    $this->model_sales->insert_detail($detail);
                    $this->cart->destroy();
                    $this->session->set_flashdata('sukses', 'Success Add sales.');
                } else {
                    $this->session->set_flashdata('error', 'Failed To Add sales.');
                    die("ASU");
                }
                redirect(site_url('sales'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Add Sales', 'menu' => 'sales'));
            $this->load->view('admin/sales/tambah',$data); 
        }
    }

    public function delete($id = 0) {
        $referred_from = $this->agent->referrer();
        if($id == 0) {
            $this->session->set_flashdata('info', 'Customer didnt not found.');
        } else { 
            if($this->model_sales->delete($id)) {
                $this->session->set_flashdata('sukses', 'Success Delete Customer.');
            } else {
                $this->session->set_flashdata('error', 'Failed While Deleting Customer.');
            } 
        }
        redirect($referred_from, 'refresh');
    }

    public function edit($id = 0) {
        $data['customer'] = $this->model_sales->get($id); 
        if(($id == 0) || (!$data['customer'])) {
            $this->session->set_flashdata('info', 'Failed customer not found.');
            redirect(site_url('customer'), 'refresh');
        } 
        $data['id'] = $id;
        if($this->input->post('submit')) {

            $data_edit['kode'] = $this->input->post('kode');
            $data_edit['name'] = $this->input->post('name');
            $data_edit['telp'] = $this->input->post('telp');
            

            // validasi  
            if($data['customer']->kode = $data_edit['kode']) {
                $this->form_validation->set_rules('kode', 'kode', 'trim|required'); 
                }   
            if($data['customer']->name = $data_edit['name']) {
                $this->form_validation->set_rules('name', 'name', 'trim|required'); 
                }       
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/header', array('title' => 'Edit customer - ' . $data['customer']->name, 'menu' => 'customer'));
                $this->load->view('admin/sales/edit', $data);
            } else {

                if($this->model_sales->update($data_edit, $id)) {
                    $this->session->set_flashdata('sukses', 'Success Update Data customer.');
                } else {
                    $this->session->set_flashdata('error', 'Failed Edit Data customer.');
                }
                redirect(site_url('customer'), 'refresh');
            }
        } else {
            $this->load->view('admin/layout/header', array('title' => 'Edit customer - ' . $data['customer']->name, 'menu' => 'customer'));
            $this->load->view('admin/sales/edit', $data); 
        }
    }  

    public function add_cart($id) {
        $item = $this->model_items->get($id);

        $contents = $this->cart->contents();

        $rowid = '';
        foreach($contents as $content) {
            if ($id == $content['id']) {
                $rowid = $content['rowid'];
                $qty = $content['qty'];
                $diskon_harga = $content['diskon_harga'];
                $data = array(
                    'rowid'  => $rowid,
                    'qty'    => $qty + 1,
                    'price'  => $diskon_harga
                );
                $this->cart->update($data);
                print_r($content);
                break;
            }
        }
        if ($rowid == '') {
            $data = array(
                'id'      => $item->id,
                'qty'     => 1,
                'price'   => $item->harga,
                'name'    => $item->nama,
                'item'   => $item,
                'diskon' => 0,
                'diskon_harga' => 0,
                'diskon_nilai' => 0
            );
            
            $this->cart->insert($data);
        }
        redirect(site_url('sales/tambah'));
    }

    public function del_cart($rowid) {
        $this->cart->remove($rowid);
        redirect(site_url('sales/tambah'));
    }

    public function update_cart($rowid) {
        $qty = $this->input->post('qty');
        $diskon = $this->input->post('discount');
        
        $item = $this->cart->get_item($rowid);
        
        $harga = $item['item']->harga;
        $diskon_nilai = ($harga * ($diskon / 100));
        $diskon_harga = $harga - $diskon_nilai;
        $data = array(
            'rowid'  => $rowid,
            'qty'    => $qty,
            'price'  => $diskon_harga,
            'diskon' => $diskon,
            'diskon_harga' => $diskon_harga,
            'diskon_nilai' => $diskon_nilai
        );
        $this->cart->update($data);
        $item = $this->cart->get_item($rowid);
        $response = array(
            'diskon_harga' => $diskon_harga,
            'diskon_nilai' => $diskon_nilai,
            'subtotal' => $item['subtotal'],
            'total'=> $this->cart->total()
        );
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

}
