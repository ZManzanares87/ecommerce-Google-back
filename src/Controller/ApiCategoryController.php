<?php

namespace App\Controller;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiCategoryController extends AbstractController
{
    #[Route('/api/categories', name: 'app_api_categories_index',methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'name' => $category->getName(),
                'id' => $category->getId(),
                
            ];
        }

        return $this->json($data);
    }
}