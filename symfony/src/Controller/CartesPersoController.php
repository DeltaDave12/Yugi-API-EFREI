<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartesPersoController extends AbstractController
{
    #[Route('/cartes/perso', name: 'app_cartes_perso')]
    public function index(): Response
    {
        return $this->render('cartes_perso/index.html.twig', [
            'controller_name' => 'CartesPersoController',
        ]);
    }
}
