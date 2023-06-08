<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployesController extends AbstractController
{
    #[Route('/employes', name: 'app_employes')]
    public function index(): Response
    {
        return $this->render('employes/index.html.twig', [
            'controller_name' => 'EmployesController',
        ]);
    }
}
