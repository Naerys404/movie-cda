<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em,
                                private CategoryRepository $categoryRepository)
    {
        $this->em = $em;
        $this->categoryRepository = $categoryRepository;
    }

    #[Route('/categories', name: 'app_categories')]
    public function index(): Response
    {
        $categories = $this->categoryRepository->findAll();

        return $this->render('category/show_all_category.html.twig', [
            'title' => 'Liste des catégories',
            'categories'=> $categories
        ]);
    }
    #[Route('/category/add', name: 'app_category_add')]
    public function add_category(Request $request): Response
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
