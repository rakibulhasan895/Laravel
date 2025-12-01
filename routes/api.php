<?php

use App\Http\Controllers\SmsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Facades\SendSms;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/send-sms', [SmsController::class, 'send']);

Route::get('/test-sms', function () {
    return SendSms::send('01700000000', 'Test message');
});
