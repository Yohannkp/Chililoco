<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use App\Repository\AdminRepository;
use App\Repository\ResponsableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/admin')]
class AdminController extends AbstractController
{

    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params=$params;
    }
    
    #[Route('/', name: 'admin', methods: ['GET'])]
    public function index(AdminRepository $adminRepository,responsableRepository $responsableRepository): Response
    {
        return $this->render('admin/AcceuilAdmin.html.twig', [
            'admins' => $adminRepository->findAll(),
            'responsables' => $responsableRepository->findAll(),
        ]);
    }

    #[Route('/CreerUnCompteAdmin', name: 'AjouterAdmin', methods: ['GET', 'POST'])]
    public function Ajouter(Request $request, AdminRepository $adminRepository,UserPasswordHasherInterface $passwordhash): Response
    {
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);
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
            $webpath=$this->params->get("kernel.project_dir").'/public/images/AdminImages/';
            $chemin=$webpath.$_FILES['admin']["name"]["image"];
            $destination=move_uploaded_file($_FILES['admin']['tmp_name']['image'],$chemin);
            $admin->setimage($_FILES['admin']['name']['image']);
            $admin->setEnable(True);
            $admin->setRoles(["ROLE_ADMIN"]);
            $hashdePassword=$passwordhash->hashPassword($admin,$admin->getpassword());
            $admin->setpassword($hashdePassword);
            $admin->setCreerPar($username); 
            $admin->setCreerLe($date);
            $adminRepository->add($admin);
            return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/AjouterAdmin.html.twig', [
            'admin' => $admin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_show', methods: ['GET'])]
    public function show(Admin $admin): Response
    {
        return $this->render('admin/show.html.twig', [
            'admin' => $admin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Admin $admin, AdminRepository $adminRepository): Response
    {
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adminRepository->add($admin);
            return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/edit.html.twig', [
            'admin' => $admin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Admin $admin, AdminRepository $adminRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$admin->getId(), $request->request->get('_token'))) {
            $adminRepository->remove($admin);
        }

        return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
