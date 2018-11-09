<?php

namespace App\Service;


class SendMessages
{
    private $receiver;
    private $message;
    private $firstName;
    private $lastName;
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index()
    {
        
    }
}