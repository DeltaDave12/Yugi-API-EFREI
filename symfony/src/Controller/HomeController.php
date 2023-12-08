<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    //$contactRepository détient la classe ContactRepository
    public function index(ContactRepository $contactRepository, Request $request): Response

     
    {
     
        //récupération des contacts de la table "contact"
        $contacts = $contactRepository -> findAll();
        $cards = $this->getCardInfo($request);
        // Retourne nos contacts
        dump($cards);
        //On passe nos contacts en paramètre
        return $this->render('home/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getCardInfo(Request $request): Response
    {
        $cardName = $request->query->get('name');
        $language = $request->query->get('language', 'fr');

        $response = $this->httpClient->request('GET', 'https://db.ygoprodeck.com/api/v7/cardinfo.php', [
            'query' => [
                'name' => $cardName,
                'language' => $language,
            ],
        ]);

        $data = $response->toArray();

        // Do something with $data, for example, return a JSON response
        dump('La méthode getCardInfo est appelée.');

        return new JsonResponse($data);
    }
}

