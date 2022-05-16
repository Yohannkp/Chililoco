<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    #[Route('/Contact', name: 'Contact')]
    public function index(): Response
    {
        return $this->render('Pages/Contact.html.twig', [
            'controller_name' => 'AcceuillController',
        ]);
    }
}
