<?php

namespace App\Services\Sms;

class SmsService
{
    protected SmsGatewayInterface $gateway;

    public function __construct(SmsGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function sendSms(string $phone, string $message)
    {
        return $this->gateway->send($phone, $message);
    }
}
