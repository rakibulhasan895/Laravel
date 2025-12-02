<?php

namespace App\Mail;

use SendGrid\Mail\Mail;

class SendGridService
{
    public function sendEmail($to, $subject, $content)
    {
        $email = new Mail();
        $email->setFrom("no-reply@yourdomain.com", "My App");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/html", $content);

        $sg = new \SendGrid(env("SENDGRID_API_KEY"));

        return $sg->send($email);
    }
}
