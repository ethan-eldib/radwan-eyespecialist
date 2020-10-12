<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FeesController extends AbstractController
{
    /**
     * @Route("/consultation-fees", name="fees")
     */
    public function index()
    {
        return $this->render('fees/index.html.twig', [
        ]);
    }
}
