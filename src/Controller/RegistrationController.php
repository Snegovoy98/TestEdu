<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegistrationType;
class RegistrationController extends AbstractController
{
    public function index(Request $request)
    {
         $form = $this->createForm(RegistrationType::class);

         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $data = $form->getData();
         }
        return $this->render('registration/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
