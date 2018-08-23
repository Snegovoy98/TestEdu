<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthorizationController extends AbstractController
{
    public function index()
    {
        return $this->render('authorization/authorization.html.twig');
    }
}
