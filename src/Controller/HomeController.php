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
            // Check if (recaptcha-response) content value
            // if (empty($_POST['recaptcha-response'])) {
            //     // header('Location: homepage');
            // } else {
            //     // URL
            //     $url = " https://www.google.com/recaptcha/api/siteverify?secret=6LdEbdkZAAAAAOdk5SbCE7-ZOO2LMKVtupdoHcql&response={$_POST['recaptcha-response']}";
            //     // Is curl exist ?
            //     if (function_exists('curl_version')) {
            //         $curl = curl_init($url);
            //         curl_setopt($curl, CURLOPT_HEADER, false);
            //         curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            //         curl_setopt($curl, CURLOPT_TIMEOUT, 1);
            //         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            //         $response = curl_exec($curl);
            //     } else {
            //         $response = file_get_contents($url);
            //     }

            //     // Check if response is true
            //     if (empty($response) || is_null($response) ) {
            //         // header('Location: homepage');
            //     }else {
            //         $data = json_decode($response);
            //         if ($data->success) {
            //         }
            //     }
            // }
            $email->sendEmail($contact);

            $this->addFlash('success', "Email sent successfully");
            return $this->redirect($request->getUri());
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
