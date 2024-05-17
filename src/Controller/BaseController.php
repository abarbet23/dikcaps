<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CapoteRepository;
use App\Repository\TailleRepository;
use App\Repository\UserRepository; 
use App\Entity\User;
use App\Entity\Ajouter;

class BaseController extends AbstractController
{
    #[Route('/', name: 'app_base')]
    public function index(CapoteRepository $capoteRepository , UserRepository $UserRepository): Response
    {
       
        $users = $UserRepository->findAll();
        $capotes = $capoteRepository->findAll();
        return $this->render('base/index.html.twig', [
            'capotes'=>$capotes,
            'users'=>$users,
        ]);
    }


    #[Route('/produit', name: 'app_produit')]
    public function Produit(TailleRepository $tailleRepository , CapoteRepository $capoteRepository): Response
    {
        $tailles = $tailleRepository->findAll();  
        $capotes = $capoteRepository->findAll();
        if ($this->getUser() != null) {
            $panier = $this->getUser()->getPanier()->getAjouters();
            
            }
        return $this->render('base/produit.html.twig', [
            'tailles'=>$tailles,
            'capotes'=>$capotes,
            'panier'=>$panier,
        ]);
    }

    #[Route('/panier', name: 'app_panier')]
    public function panier(TailleRepository $tailleRepository , CapoteRepository $capoteRepository): Response
    {
        $tailles = $tailleRepository->findAll();  
        $capotes = $capoteRepository->findAll();
        if ($this->getUser() != null) {
            $panier = $this->getUser()->getPanier()->getAjouters();
            
            }
        return $this->render('base/produit.html.twig', [
            'tailles'=>$tailles,
            'capotes'=>$capotes,
            'panier'=>$panier,
        ]);
    }

    #[Route('/mod-admin', name: 'app_admin')]
    public function lister_user(UserRepository $UserRepository): Response
    {
        $users = $UserRepository->findAll();
        return $this->render('base/admin.html.twig', [
            'users'=>$users

     ]);
    }

    
}
