<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PubliController extends AbstractController
{
    /**
     * @Route("/publi", name="publi")
     */
    public function index()
    {
        return $this->render('publi/index.html.twig', [
            'controller_name' => 'PubliController',
        ]);
    }
}
