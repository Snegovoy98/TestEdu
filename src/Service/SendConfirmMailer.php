<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class SendConfirmMailer implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    private $mailer;
    private $teamMail = 'TestEducationTeam@gmail.com';

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**This action use for send confirm message for User which do registration
     * @param array $data
     * @return bool
     */
    public function send(array $data): bool
    {
        $message = (new \Swift_Message("Добро пожаловать на сервис testEdu, команда разработчиков TestEdu рада приветствовать Вас!"))
            ->setFrom($this->teamMail)
            ->setTo($data['email'])
            ->setBody('Спасибо вам огромное за то, что выбрали нас!');
        ;
        return (bool) $this->mailer->send($message);
    }
}