<?php

class Kobosms80 {
    protected $username;
    protected $password;
    protected $apiKey;
    protected $senderName;
    protected $apiUrl = "https://api.80kobosms.com/v2/app/sms";

    public function __construct($array = [])
    {
        // you can modify properties here
        $this->username = 'email will be here';
        $this->password = 'password will be here';

        $this->apiKey   = '';
        
        $this->senderName   = 'From Rostom';
    }

    public function send( $to, $message )
    {
        $retArray = ['status'=> false, 'msg'=>''];
        
        $postData = [
            'email'       => $this->username,
            'password'    => $this->password,
            'message'     => $message,
            'sender_name' => substr($this->senderName, 0, 11),
            'recipients'  => $to,
        ];

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $postData
        ]);

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $response = curl_exec($ch);
        //Print error if any
        if ( curl_errno($ch) ) {
            $retArray['msg']    = 'error:' . curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($response, true);
        if($response['status'] == 1) {
            $retArray['status'] = true;
            $retArray['msg']    = $response['msg'];
        }
        $retArray['msg']    = $response['msg'] ?? '';
        return $retArray;
    }
}

$kobosms  = new Kobosms80();
$response = $kobosms->send('8801793589850', 'from library');

echo $response['msg'];
