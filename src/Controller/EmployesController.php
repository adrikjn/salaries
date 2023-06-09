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
    public function index(Request $request, EmployesRepository $repo): Response
    {
        $sort = $request->query->get('sort', 'asc'); 

        $employes = $repo->findBy([], ['salaire' => ($sort === 'desc' ? 'DESC' : 'ASC')]);

        return $this->render('employes/index.html.twig', [
            'employes' => $employes
        ]);
    }

    #[Route('/modifier/employes/{id}', name: 'update')]
    #[Route('/ajout/employes', name: 'form')]
    public function form(Request $globals, EntityManagerInterface $manager, Employes $employes = null): Response
    {

        if ($employes == null) {
            $employes = new Employes;
        }

        $formEmploye = $this->createForm(EmployeType::class, $employes);

        $formEmploye->handleRequest($globals);

        if ($formEmploye->isSubmitted() && $formEmploye->isValid()) {
            $manager->persist($employes);
            $manager->flush();
            return $this->redirectToRoute("employes", [
                "id" => $employes->getId()
            ]);
        }

        return $this->renderForm('employes/form.html.twig', [
            'formEmploye' => $formEmploye,
            'editEmploye' => $employes->getId() !== null
        ]);
    }

    #[Route('/delete/employes/{id}', name: 'delete')]
    public function delete(Employes $employes, EntityManagerInterface $manager): Response
    {
        $manager->remove($employes);
        $manager->flush();
        return $this->redirectToRoute('employes');
    }

    #[Route('/see/employes/{id}', name: "see")]
    public function see(Employes $employe)
    {
        return $this->render('employes/see.html.twig', [
            'employe' => $employe
        ]);
    }

    #[Route('/salaires/employes', name: "salaires")]
    public function salaire(EmployesRepository $repo): Response
    {

        $salaires = $repo->findBy([], ['salaire' => 'DESC']);
        return $this->render('employes/salary.html.twig', [
            'salaires' => $salaires
        ]);
    }
}
