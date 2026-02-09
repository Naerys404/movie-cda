<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/category', name: 'app_category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
    #[Route('/category/add', name: 'app_category_add')]
    public function add_category(Request $request,): Response
    {
        $cat= new Category();
        $form = $this->createForm(CategoryType::class,$cat);

        $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->getData();
            $this->em->persist($cat);
            $this->em->flush();

            $this->redirectToRoute('app_category_add');
         }

        return $this->render('category/addCategory.html.twig', [
            'title' => 'Ajouter une catégorie',
            'form'=> $form
        ]);
    }
}
