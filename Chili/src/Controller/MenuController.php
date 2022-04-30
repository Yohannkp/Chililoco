<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MenuController extends AbstractController
{
    #[Route('/Menu', name: 'Menu')]
    public function index(): Response
    {
        return $this->render('Pages/Menu.html.twig', [
            'controller_name' => 'MenuController',
            'active'=>'active'
        ]);
    }
}
