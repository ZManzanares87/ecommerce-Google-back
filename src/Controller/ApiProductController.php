<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiProductController extends AbstractController
{
    #[Route('/api/products', name: 'app_api_products_index',methods: ['GET'])]
    public function index(ProductRepository $productsRepository): Response
    {
        // API URL: http://127.0.0.1:8000/api/products

        $products = $productsRepository->createQueryBuilder('p')
        ->select('p', 'c', 'pr')
        ->leftJoin('p.category', 'c')
        ->leftJoin('p.presentation', 'pr')
        ->getQuery()
        ->getResult();

        $data = [];

        foreach ($products as $pd) {
            $categoryData = [];
            $presentationData = [];

            // Obtenemos los datos de la entidad Category
            foreach ($pd->getCategory() as $category) {
                $categoryData[] = [
                    'id' => $category->getId(),
                    'typeCategory' => $category->getTypeCategory(),
                ];
            }

            // Obtenemos los datos de la entidad Presentation
            foreach ($pd->getPresentation() as $presentation) {
                $presentationData[] = [
                    'id' => $presentation->getId(),
                    'typePresentation' => $presentation->getTypePresentation(),
                ];
            }

            $data[] = [
                'id' => $pd->getId(),
                'name' => $pd->getName(),
                'description' => $pd->getDescription(),
                'price' => $pd->getPrice(),
                'quantity' => $pd->getQuantity(),
                'state' => $pd->isState(),
                'photo' => $pd->getPhoto(),
                'category' => $categoryData,
                'presentation' => $presentationData,
            ];
        }


        // dump($data);die;
        // return $this->json($data);
        return $this->json($data, $status = 200, $headers = ['Access-Control-Allow-Origin'=>'*']);
    }
}
