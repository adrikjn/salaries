<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployeType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployesController extends AbstractController
{
    #[Route('/', name: 'employes')]
    public function index(EmployesRepository $repo): Response
    {   
        $employes = $repo->findAll();
        return $this->render('employes/index.html.twig', [
            "employes" => $employes
        ]);
    }

    #[Route('/ajout/employes', name: 'form')]
    public function form(Request $globals, EntityManagerInterface $manager){
        
        $employes = new Employes;

        $formEmploye = $this->createForm(EmployeType::class, $employes);

        $formEmploye->handleRequest($globals);

        if($formEmploye->isSubmitted() && $formEmploye->isValid()) {
            $manager->persist($employes);
            $manager->flush();
            return $this->redirectToRoute("employes");
        }

        return $this->renderForm('employes/form.html.twig', [
            'formEmploye' => $formEmploye,
        ]);
    }
}
 