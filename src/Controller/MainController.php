<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_home', methods: ['GET', 'POST'])]
    public function home()
    {
        return$this->render('main/home.html.twig');
    }

    #[Route('/aboutUs', name: 'main_infos', methods: ['GET', 'POST'])]
    public function infos()
    {
        $rawData = file_get_contents('../data/team.json');

        $teamMembers = json_decode($rawData,true);
        return$this->render('main/infos.html.twig', [
            'teamMembers' => $teamMembers
        ]);
    }
}