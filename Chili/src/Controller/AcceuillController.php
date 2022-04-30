<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuillController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuill')]
    public function index(): Response
    {
        return $this->render('Pages/Acceuil.html.twig', [
            'controller_name' => 'AcceuillController',
        ]);
    }
}
