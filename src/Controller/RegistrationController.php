<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegistrationController extends AbstractController
{
    public function index()
    {
        return $this->render('registration/registration.html.twig');
    }
}
