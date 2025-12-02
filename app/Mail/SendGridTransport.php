<?php

namespace App\Mail;

use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mime\Email;
use SendGrid\Mail\Mail as SendGridMail;

class SendGridTransport extends AbstractTransport
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        parent::__construct(); // Call AbstractTransport constructor
    }

    protected function doSend(SentMessage $message): void
    {
        /** @var Email $email */
        $email = $message->getOriginalMessage();

        $sgEmail = new SendGridMail();

        // From
        foreach ($email->getFrom() as $from) {
            $sgEmail->setFrom($from->getAddress(), $from->getName());
        }

        // To
        foreach ($email->getTo() as $to) {
            $sgEmail->addTo($to->getAddress(), $to->getName());
        }

        // CC
        foreach ($email->getCc() ?? [] as $cc) {
            $sgEmail->addCc($cc->getAddress(), $cc->getName());
        }

        // BCC
        foreach ($email->getBcc() ?? [] as $bcc) {
            $sgEmail->addBcc($bcc->getAddress(), $bcc->getName());
        }

        // Subject
        $sgEmail->setSubject($email->getSubject());

        // HTML Body
        if ($email->getHtmlBody()) {
            $sgEmail->addContent("text/html", $email->getHtmlBody());
        }

        // Text Body
        if ($email->getTextBody()) {
            $sgEmail->addContent("text/plain", $email->getTextBody());
        }

        // Send via SendGrid
        $client = new \SendGrid($this->apiKey);
        $client->send($sgEmail);
    }

    public function __toString(): string
    {
        return 'sendgrid';
    }
}
