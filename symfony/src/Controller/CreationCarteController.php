<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationCarteController extends AbstractController
{
    #[Route('/creation/carte', name: 'app_creation_carte')]
    public function index(): Response
    {
        return $this->render('creation_carte/index.html.twig', [
            'controller_name' => 'CreationCarteController',
        ]);
    }
}
