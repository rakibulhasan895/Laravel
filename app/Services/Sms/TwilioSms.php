<?php

namespace App\Services\Sms;

class TwilioSms implements SmsGatewayInterface
{
    public function send(string $phone, string $message)
    {
        // Your Twilio API code here
        return "SMS sent to $phone via Twilio: $message";
    }
}
