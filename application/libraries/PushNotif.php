<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PushNotif 
{

    public static function send_notification_FCM($notification_id, $title, $message, $id, $type, $click_action) 
    {
        $accesstoken = 'AAAA2ZzV8-w:APA91bEExav1kuXctNAYdmg6iBMvYBe-Y-P4apoTFQAIJVbEDYTl07hmJ5SmbCBkps-gfvaRNi20_SE_D3Q3GWZdrE1cyQ_BvzB9ybKjVFvlF7ve7TbV7OnfjubTHTZOjAtT1gv4pEO7';
        // print_r($accesstoken);
        $URL = 'https://fcm.googleapis.com/fcm/send';
     
        $post_data = '{
            "to" : "' . $notification_id . '",
            "notification" : {
                    "body" : "' . $message . '",
                    "title" : "' . $title . '",
                    "type" : "' . $type . '",
                    "id" : "' . $id . '",
                    "message" : "",
                "icon" : "new",
                "sound" : "default",
                },
    
            }';
            //   dd($post_data);
            // print_r($post_data);die;
        
        print_r($post_data);
        //     die();
        $crl = curl_init();
     
        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization:key= ' . $accesstoken;
        // print_r($headr);die;
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
     
        curl_setopt($crl, CURLOPT_URL, $URL);
        curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);
     
        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        // print_r($crl);
        $rest = curl_exec($crl);
        print_r($rest);
        if ($rest === false) {
            // throw new Exception('Curl error: ' . curl_error($crl));
            // print_r('Curl error: ' . curl_error($crl));
            $result_noti = 0;
        } else {
     
            $result_noti = 1;
        }
     
        // curl_close($crl);
        //print_r($result_noti);die;
        return $result_noti;
    }
}
?>