<?php

namespace App\Controller;

use App\Service\ConsoleWriterService;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{      
    private $consoleWriterService;
    public function __construct(ConsoleWriterService $consoleWriterService) {
        $this->consoleWriterService = $consoleWriterService;
    }
    public function getAllContacts(HttpClientInterface $httpClient) {
        $response = $httpClient->request('GET', 'http://127.0.0.1:8000/api/contacts');

        $this->consoleWriterService->write_to_console($response);
    }   
    //$contactRepository détient la classe ContactRepository
    public function index(ContactRepository $contactRepository): Response
    {   
        // Créez une instance de HttpClientInterface
        //$httpClient = HttpClient::create();
        // Appel de la méthode getAllContacts avec $httpClient en tant que paramètre
        //$this->getAllContacts($httpClient);
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
