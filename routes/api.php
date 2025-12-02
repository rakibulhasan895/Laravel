<?php

use App\Facades\SendSms;
use App\Http\Controllers\SendGridWebhookController;
use App\Http\Controllers\SmsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SendGrid\Mail\Mail;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/send-sms', [SmsController::class, 'send']);

Route::get('/test-sms', function () {
    return SendSms::send('01700000000', 'Test message');
});

Route::get('/sendgrid', [SendGridWebhookController::class, 'handle']);


Route::get('/test-sendgrid', function() {
    $email = new Mail();
    $email->setFrom('no-reply@yourdomain.com', 'My App');
    $email->setSubject('Test SendGrid Email');
    $email->addTo('rakibulhasan.rh895@gmail.com');
    $email->addContent('text/html', '<h1>Hello from SendGrid</h1>');

    $sg = new \SendGrid(env('SENDGRID_API_KEY'));
    $response = $sg->send($email);

    return response()->json([
        'status' => $response->statusCode(),
        'body' => $response->body(),
        'headers' => $response->headers()
    ]);
});

