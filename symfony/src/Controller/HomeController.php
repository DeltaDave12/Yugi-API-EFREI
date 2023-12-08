<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    //$contactRepository détient la classe ContactRepository
    public function index(ContactRepository $contactRepository): Response
    {
        //récupération des contacts de la table "contact"
        $contacts = $contactRepository -> findAll();
        // Retourne nos contacts
        //dump($contacts);
        //On passe nos contacts en paramètre
        return $this->render('home/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
