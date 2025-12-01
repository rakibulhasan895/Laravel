<?php
namespace App\Services\Sms;


class SendSmsService
{
    public function send($number, $message)
    {
        return "SMS sent to {$number} with message: {$message}";
    }
}