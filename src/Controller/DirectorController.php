<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Director;
use App\Form\DirectorType;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class DirectorController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    #[Route('/director/add', name: 'app_director_add')]
    #[IsGranted('ROLE_USER')]
    public function addDirector(Request $request): Response
    {
        $director = new Director();
        $form = $this->createForm(DirectorType::class, $director);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($director);
            $this->em->flush();
            $this->addFlash('success', 'Le réalisateur a été ajouté');
        }

        return $this->render('director/add_director.html.twig', [
            'form' => $form,
        ]);
    }
}
