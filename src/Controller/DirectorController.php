<?php

namespace App\Controller;

use App\Entity\Director;
use App\Form\DirectorType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class DirectorController extends AbstractController
{
    #[Route('/director', name: 'app_director')]
    public function index(): Response
    {
        return $this->render('director/index.html.twig', [
            'controller_name' => 'DirectorController',
        ]);
    }
    #[Route('/director/add', name: 'app_director_add')]
    public function add_director(Request $request, EntityManagerInterface $em): Response
    {
        $dir = new Director();
        $form = $this->createForm(DirectorType::class, $dir);

        $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($dir);
            $em->flush();

            $this->redirectToRoute('app_director_add');
         }
        return $this->render('director/addDirector.html.twig', [
            'title' => 'Ajouter un réalisateur',
            'form'=>$form
        ]);
    }
}
