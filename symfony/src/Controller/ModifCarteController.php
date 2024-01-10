<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifCarteController extends AbstractController
{
    #[Route('/modif/carte', name: 'app_modif_carte')]
    public function index(): Response
    {
        return $this->render('modif_carte/index.html.twig', [
            'controller_name' => 'ModifCarteController',
        ]);
    }
}
