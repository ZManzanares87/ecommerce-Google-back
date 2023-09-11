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
       
        $products = $productsRepository->findAll();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'image' => $product->getImage(),
                'qr' => $product->getQr(),
            ];
        }

        return $this->json($data);
    }
}