<?php

namespace App\Listeners;

use App\Events\PostPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
class PostNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostPublished $event): void
    {
        Mail::raw('This is a plain text email form "' . $event->post->title . '"', function ($message) {
            $message->to('rakibulhasan.rh895@gmail.com')->subject('Plain Text Email');
        });

    }
}
