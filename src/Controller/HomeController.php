<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Form\AppointmentType;
use App\Service\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Affiche la page d'accueil
     * Traite et affiche le formulaire de contact
     * 
     * @Route("/", name="homepage")
     */
    public function index(Request $request, Email $email)
    {
        $contact = new Appointment();
        $form = $this->createForm(AppointmentType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email->sendEmail($contact);
            
            $this->addFlash('success', "Email sent successfully");
            return $this->redirect($request->getUri());
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
