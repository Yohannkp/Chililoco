<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie')]
class CategorieController extends AbstractController
{
    #[Route('/', name: 'categorie', methods: ['GET'])]
    public function Acceuil(CategorieRepository $categorieRepository): Response
    {
        return $this->render('categorie/AcceuilCategorie.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

    #[Route('/AjouterUneCategorie', name: 'AjouterCategorie', methods: ['GET', 'POST'])]
    public function Ajouter(Request $request, CategorieRepository $categorieRepository): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);
        $user = $this->getUser();
        $username=$user->getUserIdentifier();
        $date=new \DateTime('@'.strtotime('now'));
        if ($form->isSubmitted() && $form->isValid()) {
            $categorie->setCreerPar($username);
            $categorie->setCreerLe($date);
            $categorie->setEnable(true);
            $categorieRepository->add($categorie);
            return $this->redirectToRoute('categorie', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie/AjouterCategorie.html.twig', [
            'categorie' => $categorie,
            'form' => $form,
        ]);
    }

    #[Route('/InformationsDeLaCategorieN/{id}', name: 'InfosCategorie', methods: ['GET'])]
    public function Informations(Categorie $categorie): Response
    {
        return $this->render('categorie/InfosCategorie.html.twig', [
            'categorie' => $categorie,
        ]);
    }

    #[Route('/ModifierLaCategorieN/{id}', name: 'ModifierCategorie', methods: ['GET', 'POST'])]
    public function Modifier(Request $request, Categorie $categorie, CategorieRepository $categorieRepository): Response
    {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieRepository->add($categorie);
            return $this->redirectToRoute('categorie', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie/ModifierCategorie.html.twig', [
            'categorie' => $categorie,
            'form' => $form,
        ]);
    }

    #[Route('/SupprimerLaCategorieN/{id}', name: 'SupprimerCategorie', methods: ['GET', 'POST'])]
    public function delete(Request $request, Categorie $categorie, CategorieRepository $categorieRepository): Response
    {
            $categorieRepository->remove($categorie);

        return $this->redirectToRoute('categorie', [], Response::HTTP_SEE_OTHER);
    }
}
