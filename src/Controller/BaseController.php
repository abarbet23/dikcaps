<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CapoteRepository;

class BaseController extends AbstractController
{
    #[Route('/', name: 'app_base')]
    public function index(CapoteRepository $capoteRepository): Response
    {
        $capotes = $capoteRepository->findBy(array(),array('nom'=>'ASC'));
        return $this->render('base/index.html.twig', [
            'capotes'=>$capotes
        ]);
    }


    #[Route('/produit', name: 'app_produit')]
    public function Produit(): Response
    {
        return $this->render('base/produit.html.twig', [
        ]);
    }

    
}
