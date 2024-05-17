<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Panier;
use App\Entity\Ajouter;
use App\Entity\Capote;
use App\Repository\CapoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PanierController extends AbstractController
{
    #[Route('/panier',name:'app_panier')]
    public function Panier(CapoteRepository $Capote):Response
    {
        $capote = $Capote->findAll();
        $panier = $this->getUser()->getPanier()->getAjouters();
        return $this->render('panier/panier.html.twig',[
            'panier' => $panier,
            'capote' => $capote,
        ]);
    }

    #[Route('/private-ajout-panier/{id}', name:'app_ajout_panier')]
    public function ajoutPanierMaillot(Request $request, Capote $capote, EntityManagerInterface $em): Response
    {
        if($capote!=null){
            if($this->getUser()->getPanier()==null){
                $panier = new Panier();
            } else {
                $panier = $this->getUser()->getPanier();
            }
            $ajouter = new Ajouter();
            $ajouter->setPanier($panier);
            $ajouter->setCapote($capote);
            $ajouter->setQuantite(1);
            $panier->addajouter($ajouter);
            $this->getUser()->setPanier($panier);
            $em->persist($ajouter);
            $em->persist($panier);
            $em->persist($this->getUser());
            $em->flush();
        }
        return $this->redirectToRoute('app_produit');
    }
}

