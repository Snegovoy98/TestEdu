<?php

namespace App\Controller;

use App\Entity\Users;
use App\Service\SendConfirmMailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegistrationType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /** This Controller use for registration user in platform
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param SendConfirmMailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder, SendConfirmMailer $mailer)
    {
        $users = new Users();
        $form = $this->createForm(RegistrationType::class, $users);

         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $password = $passwordEncoder->encodePassword($users, $users->getPassword());
             $users->setPassword($password);
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($users);
             $entityManager->flush();
             $mailer->send($form->getData());
             return $this->redirectToRoute('login');
         }
        return $this->render('registration/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
