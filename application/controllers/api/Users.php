<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    /**
     * Send to a single device
     */


    public function sendNotification()
    {

        $token = 'dPvxq7B3R6CkMBIN4OGKby:APA91bE7ewrBqvk9KMO2DDpY4YzyZK_A25FYu_qgckvqiW19cI72YO-gx8AVR8QmdmeIiCQb6WOprTn0DN68ZywPYPEcnVBHbmgLGWnRQb-MhPwk59FM6a7DbA-A1hDffm2xrW9KTI2v'; // push token
        $message = "Test notification message";

        $this->load->library('PushNotif');
        $res = $this->pushnotif->send_notification_FCM($token, "iduy memek", $message, "id", "type", "");
        if($res == 1){
            $result['status'] = true;
            $result['message'] = 'Notifikasi Berhasil Dikirim';
            $result['data'] = array();
           // success code
        }else{
          // fail code
            $result['status'] = false;
            $result['message'] = 'Notifikasi Gagal Dikirim';
            $result['data'] = array();
        }
        return json_encode($result);
        print_r($res);
    }
        // print_r($test);
        // die();
        // $this->load->library('fcm');
        // $this->fcm->setTitle('Test FCM Notification');
        // $this->fcm->setMessage($message);
        // $title = 'test';
        // /**
        //  * set to true if the notificaton is used to invoke a function
        //  * in the background
        //  */

        // /**
        //  * payload is userd to send additional data in the notification
        //  * This is purticularly useful for invoking functions in background
        //  * -----------------------------------------------------------------
        //  * set payload as null if no custom data is passing in the notification
        //  */
        // $json = $this->fcm->getPush();

        // $payload =  array('notification' => $json);
        // $this->fcm->setPayload($payload);

        // /**
        //  * Send images in the notification
        //  */
        // $this->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');

        // /**
        //  * Get the compiled notification data as an array
        //  */

        // $p = $this->fcm->send($test,$json);


        // print_r($token);
        // print_r($p);        

    /**
     * Send to multiple devices
     */
    public function sendToMultiple()
    {
        $token = array('Registratin_id1', 'Registratin_id2'); // array of push tokens
        $message = "Test notification message";
        $this->load->library('fcm');
        $this->fcm->setTitle('Test FCM Notification');
        $this->fcm->setMessage($message);
        $this->fcm->setIsBackground(false);
        // set payload as null
        $payload = array('notification' => '');
        $this->fcm->setPayload($payload);
        $this->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');
        $json = $this->fcm->getPush();

        /** 
         * Send to multiple
         * 
         * @param array  $token     array of firebase registration ids (push tokens)
         * @param array  $json      return data from getPush() method
         */
        $result = $this->fcm->sendMultiple($token, $json);
    }
}