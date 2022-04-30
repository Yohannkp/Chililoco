<?php

namespace App\Controller;

use App\Entity\Responsable;
use App\Form\ResponsableType;
use App\Repository\ResponsableRepository;
use App\Repository\AdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


#[Route('/responsable')]
class ResponsableController extends AbstractController
{

    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params=$params;
    }

    #[Route('/', name: 'responsable', methods: ['GET'])]
    public function index(AdminRepository $adminRepository,ResponsableRepository $responsableRepository): Response
    {
        return $this->render('admin/AcceuilAdmin.html.twig', [
            'admins' => $adminRepository->findAll(),
            'responsables' => $responsableRepository->findAll(),
        ]);
    }

    #[Route('/AjouterUnResponsable', name: 'AjouterResponsable', methods: ['GET', 'POST'])]
    public function new(Request $request, ResponsableRepository $responsableRepository,UserPasswordHasherInterface $passwordhash): Response
    {
        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class, $responsable);
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
            $webpath=$this->params->get("kernel.project_dir").'/public/images/ResponsableImages/';
            $chemin=$webpath.$_FILES['responsable']["name"]["image"];
            $destination=move_uploaded_file($_FILES['responsable']['tmp_name']['image'],$chemin);
            $responsable->setimage($_FILES['responsable']['name']['image']);
            $responsable->setEnable(True);
            $responsable->setRoles(["ROLE_RESPONSABLE"]);
            $hashdePassword=$passwordhash->hashPassword($responsable,$responsable->getpassword());
            $responsable->setpassword($hashdePassword);
            $responsable->setCreerPar($username); 
            $responsable->setCreerLe($date);
            $responsableRepository->add($responsable);
            return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Responsable/AjouterResponsable.html.twig', [
            'Responsable' => $responsable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_responsable_show', methods: ['GET'])]
    public function show(Responsable $responsable): Response
    {
        return $this->render('responsable/show.html.twig', [
            'responsable' => $responsable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_responsable_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Responsable $responsable, ResponsableRepository $responsableRepository): Response
    {
        $form = $this->createForm(ResponsableType::class, $responsable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $responsableRepository->add($responsable);
            return $this->redirectToRoute('app_responsable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('responsable/edit.html.twig', [
            'responsable' => $responsable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_responsable_delete', methods: ['POST'])]
    public function delete(Request $request, Responsable $responsable, ResponsableRepository $responsableRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$responsable->getId(), $request->request->get('_token'))) {
            $responsableRepository->remove($responsable);
        }

        return $this->redirectToRoute('app_responsable_index', [], Response::HTTP_SEE_OTHER);
    }
}
