<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('model_api');
    }
     public function index_post()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
        $token = $this->input->post('token');
        $result = $this->model_api->LoginApi($nip, $password);
        if ($result !== []) {
            $response['status'] = true;
            $response['message'] = 'berhasil login';
            $response['data'] = $result;
            $data = array(
                'token' => $token
            );
            $this->model_api->update($data, $nip);
            $this->response($response, 200);
        } else {
            $response['status'] = false;
            $response['message'] = 'gagal login';
            $response['data'] = null;   
                $this->response($response, 502);
            }
        // if($result = null){
        //     $this->response( [
        //         'status' => true,
        //         'message' => 'Succesfully Login'
        //     ], 200 );
        // } 
        // $this->response( [
        //     'status' => false,
        //     'message' => 'No users were found'
        // ], 400 );
    }
    //Masukan function selanjutnya disini
}
?>