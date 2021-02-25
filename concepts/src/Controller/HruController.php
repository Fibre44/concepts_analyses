<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HruController extends AbstractController
{
    /**
     * @Route("/hru", name="hru")
     */
    public function index(): Response
    {
        return $this->render('hru/index.html.twig', [
            'controller_name' => 'HruController',
        ]);
    }
}
