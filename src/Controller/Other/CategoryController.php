<?php

declare(strict_types=1);

namespace App\Controller\Other;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    #[Route(path: '/categories', name: 'page_categories')]
    public function categories(EntityManagerInterface $entityManager, CategoryRepository $categoryRepository)
    {
        $categories=$categoryRepository->findAll();
        return $this->render('other/discover.html.twig',['categories' => $categories]);
    }

    #[Route(path: '/category/{id}', name: 'category')]
    public function category(Category $category)
    {
        return $this->render('other/category.html.twig', ['categories' => $category]);
    }
}
