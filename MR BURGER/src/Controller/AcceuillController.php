<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlatRepository;

#[Route('/')]
class AcceuillController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PlatRepository $platRepository): Response
    {
        return $this->render('Pages/Acceuil.html.twig', [
            'controller_name' => 'AcceuillController',
            "plats"=>$platRepository->findlastPlat()
        ]);
    }
}
