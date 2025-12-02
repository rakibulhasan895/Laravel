<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class SendGridWebhookController extends Controller
{

    public function handle(Request $request)
    {
        Mail::to("rakibulhasan.rh895@gmail.com")->send(new WelcomeMail("Rakib"));
    }
}