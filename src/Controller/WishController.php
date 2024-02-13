<?php

namespace App\Controller;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/wish', name: 'wish_')]
class WishController extends AbstractController
{

    #[Route('', name: 'list')]
    public function list(): Response
    {
        //todo : aller chercher les wishes en bdd et les passer à twig pour affichage
        return $this->render('wish/list.html.twig');
    }

    #[Route('', name: 'details')]
    public function details(): Response
    {
        //todo : aller chercher le wish en bdd et le passer à twig pour affichage
        return $this->render('wish/details.html.twig');
    }
}
