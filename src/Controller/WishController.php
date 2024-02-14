<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function Symfony\Component\Clock\now;

#[Route('/wish', name: 'wish_')]
class WishController extends AbstractController
{

    #[Route('', name: 'list')]
    public function list(WishRepository $wishRepository): Response
    {
        //todo : filter par date
        $wishes = $wishRepository->findAll();
        //dd($wishes);

        return $this->render('wish/list.html.twig', [
            "wishes" => $wishes
        ]);
    }

    #[Route('/details/{id}', name: 'details')]
    public function details(int $id, WishRepository $wishRepository): Response
    {
        $wish = $wishRepository->find($id);
        return $this->render('wish/details.html.twig', [
            "wish"=>$wish
        ]);
    }

    /*#[Route('/create', name: 'create')]
    public function create(Request $request): Response
    {
        dump($request);
        return $this->render('wish/create.html.twig');
    }*/

    /*#[Route('/demo', name: 'em-demo')]
    public function demo(EntityManagerInterface $entityManager):Response
    {
        //création d'une instance wish
        $wish = new Wish();

        //hydratation de mon instance
        $wish->setTitle('TestWish');
        $wish->setDescription('blablabli');
        $wish->setAuthor('Chatan');
        $wish->setDateCreated(new \DateTime());

        dump($wish);

        //ajouter le wish
        $entityManager->persist($wish);
        $entityManager->flush();

        dump($wish);

        return $this->render('wish/create.html.twig');
    }*/
}
