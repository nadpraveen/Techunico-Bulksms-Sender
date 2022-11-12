<?php

namespace Techunico\BulkSmsSender;

//require '../vendor/autoload.php';

use Curl\Curl;

class SendSms {
    
    const SMS_URL = 'http://bulksms.techunico.com/vb/apikey.php';
    private $apiKey;
    private $senderId;

    public function __construct($apiKey, $senderId) {
        $this->apiKey = $apiKey;
        $this->senderId = $senderId;
    }

    public function sendSms($message, $contact,$templatId) {
        $curl = new Curl();
        $curl->get(self::SMS_URL, [
            'apikey' => $this->apiKey,
            'senderid' => $this->senderId,
            'templateid' => $templatId,
            'number' => $contact,
            'message' => $message,
        ]);
        
        return $curl;
    }

}
