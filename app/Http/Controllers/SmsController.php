<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Sms\SmsService;
class SmsController extends Controller
{
        public function send()
    {
        $sms = app(SmsService::class);

        return $sms->sendSms('01700000000', 'Hello from Laravel SMS Service!');
    }
}
