<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    #[Route('/Apropos', name: 'APropos')]
    public function index(): Response
    {
        return $this->render('Pages/About.html.twig', [
            'controller_name' => 'AcceuillController',
        ]);
    }
}
