<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Form\PlatType;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


#[Route('/plat')]
class PlatController extends AbstractController
{

    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params=$params;
    }


    #[Route('/', name: 'ListePlat', methods: ['GET'])]
    public function index(PlatRepository $platRepository): Response
    {
        return $this->render('Pages/Menu.html.twig', [
            'plats' => $platRepository->findAll(),
        ]);
    }

    #[Route('/AjouterUnPlat', name: 'AjouterPlat', methods: ['GET', 'POST'])]
    public function new(Request $request, PlatRepository $platRepository): Response
    {
        $plat = new Plat();
        $form = $this->createForm(PlatType::class, $plat);
        $form->handleRequest($request);
        $user = $this->getUser();
        if($user!=null){
            $username=$user->getUserIdentifier();
        }
        else{
            $username="YohanMajoie";
        }
        $date=new \DateTime('@'.strtotime('now'));

        if ($form->isSubmitted() && $form->isValid()) {
            $webpath=$this->params->get("kernel.project_dir").'/public/images/PlatImages/';
            $chemin=$webpath.$_FILES['plat']["name"]["image"];
            $destination=move_uploaded_file($_FILES['plat']['tmp_name']['image'],$chemin);
            $plat->setimage($_FILES['plat']['name']['image']);
            $plat->setCreerPar($username); 
            $plat->setCreerLe($date);
            $plat->setEnable(True);
            $platRepository->add($plat);
            return $this->redirectToRoute('Menu', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plat/AjouterUnPlat.html.twig', [
            'plat' => $plat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_plat_show', methods: ['GET'])]
    public function show(Plat $plat): Response
    {
        return $this->render('plat/show.html.twig', [
            'plat' => $plat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_plat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Plat $plat, PlatRepository $platRepository): Response
    {
        $form = $this->createForm(PlatType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $platRepository->add($plat);
            return $this->redirectToRoute('Menu', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('plat/edit.html.twig', [
            'plat' => $plat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_plat_delete', methods: ['POST'])]
    public function delete(Request $request, Plat $plat, PlatRepository $platRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plat->getId(), $request->request->get('_token'))) {
            $platRepository->remove($plat);
        }

        return $this->redirectToRoute('Menu', [], Response::HTTP_SEE_OTHER);
    }
}
