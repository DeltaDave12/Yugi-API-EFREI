<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationController extends AbstractController
{
    //$contactRepository détient la classe ContactRepository
    public function index(ContactRepository $contactRepository): Response
    {
     
        return $this->render('creation/index.html.twig');
            
        
    }
}
