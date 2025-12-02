<?php

namespace App\Providers;

use App\Mail\SendGridTransport;
use App\Services\Sms\NexmoSms;
use App\Services\Sms\SmsGatewayInterface;
use App\Services\Sms\TwilioSms;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SmsGatewayInterface::class, NexmoSms::class);
        //   $this->app->bind(SmsGatewayInterface::class, TwilioSms::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Mail::extend('sendgrid', function () {
            return new SendGridTransport(
                $this->app['config']->get('services.sendgrid.api_key')
            );
        });
    }
}
