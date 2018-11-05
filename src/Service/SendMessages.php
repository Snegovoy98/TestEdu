<?php

namespace App\Service;

class SendMessages
{
    public function index($surname,$name, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Вас приветствует команда разработчиков платформы testEdu'))
            ->setFrom('TestEducationTeam@gmail.com')
            ->setTo($name)
            ->setDescription("Здравствуйте , уважаемый, $surname $name, рады приветсвовать Вас на нашей платформе")
            ;

        $mailer->send($message);
    }
}