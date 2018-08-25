<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    public function index()
    {
        return $this->render('user/user.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
