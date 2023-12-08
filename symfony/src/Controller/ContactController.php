<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManger;
    public function __construct(EntityManagerInterface $entityManger) {
        $this -> entityManger = $entityManger;
    }
    public function index(Request $request): Response
    {   
        // La méthode createForm permet de créer un formulaire en se basant sur formType
        $form = $this -> createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $contact = $form->getData();
            // Methode persist d'entity manager prépare les données avant insertion
            $this -> entityManger -> persist($contact);
            //Methode flush insère les données dans la BDD
            $this -> entityManger -> flush();
            //Petit message de confirmation
            $this -> addFlash("success","Contact Added !");
            //Redirection vers une page
            return $this -> redirectToRoute('accueil');
        }

        return $this->render('contact/index.html.twig', ['form' => $form -> createView()]);
    }

    //Methode pour modifier notre contact Arguments: id (quel contact on modifie + on recupere ses infos)
    public function modify(ContactRepository $contactRepository, Request $request, $id) {
        //recup via id 
        $contact = $contactRepository -> find($id);
        //génere un formulaire avec en paramètre le formulaire + les infos du contact (préremplissage formulaire)
        $form = $this -> createForm(ContactType::class, $contact);
        //Comme avant, on met un handleRequest
        $form->handleRequest($request);
        //Même logique que pour l'ajout de formulaire
        if ($form->isSubmitted() && $form->isValid()) 
        {
           // Methode persist d'entity manager prépare les données avant insertion
           $this->entityManger ->persist($contact);
           //Methode flush insère les données dans la BDD
           $this -> entityManger -> flush();
           //Petit message de confirmation
           $this -> addFlash("success","Contact modification done !");
           //Redirection vers une page
           return $this -> redirectToRoute('accueil');
        }
        //nouvelle vue de mon formulaire
        return $this -> render('contact/modify.html.twig', ['form' => $form -> createView()]);
    }

    public function delete(ContactRepository $contactRepository, Request $request, $id) {
        $contact = $contactRepository -> find($id);

        if($contact) {
            //La méthode remove() permet de supprimer un element
            $contactRepository -> remove($contact, $flush = true);
            //Petit message de confirmation
           $this -> addFlash("success","Contact is removed !");
           //Redirection vers une page
           return $this -> redirectToRoute('accueil');
        }

        return $this -> redirectToRoute('accueil');
    }

    public function getContact(EntityManagerInterface $entityManager, int $id): Response
    {
        // Récupérer le contact par son ID
        $contact = $entityManager -> getRepository(Contact::class) -> find($id);

        // Traiter la réponse, par exemple, la retourner sous forme de JSON
        return $this->json($contact);
    }
}
