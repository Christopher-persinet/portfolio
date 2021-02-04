<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $projets = $this->getDoctrine()
        ->getRepository(Projet::class)
        ->findAll();
        return $this->render('home/index.html.twig', [
            'projets' => $projets,
        ]);
    }
}
