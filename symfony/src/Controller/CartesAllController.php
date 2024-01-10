<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartesAllController extends AbstractController
{
    #[Route('/cartes/all', name: 'app_cartes_all')]
    public function index(): Response
    {
        return $this->render('cartes_all/index.html.twig', [
            'controller_name' => 'CartesAllController',
        ]);
    }
}
