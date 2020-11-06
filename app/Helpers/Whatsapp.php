<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;

class Whatsapp
{
    public static function sendMSG($to, $msg) {

        $userkey = 't8xergy5pgmwp1r2w6h8';
        $passkey = '4rn0k85oxu4n75s4ylgl';
        $instanceID = '159175';
        $telepon = $to;
        $message = $msg;
        $url = 'http://bellezkin.zenziva.co.id/api/WAsendMsg/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'instance' => $instanceID,
            'nohp' => $telepon,
            'pesan' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);

        return $results;
    }
}