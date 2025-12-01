<?php

namespace App\Services\Sms;

class NexmoSms implements SmsGatewayInterface
{
    public function send(string $phone, string $message)
    {
        // Your Nexmo API code here
        return "SMS sent to $phone via Nexmo: $message";
    }
}
