<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services-offered", name="services")
     */
    public function index()
    {
        return $this->render('service/index.html.twig', [
            
        ]);
    }
}
