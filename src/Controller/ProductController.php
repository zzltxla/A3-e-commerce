<?php

namespace App\Controller;

use App\Model\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct()
    {
        parent::__construct();
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {
        $products = $this->findAllProduct();
        echo $this->twig->render('home.twig', [
            'products' => $products
        ]);
    }
    private function findAllProduct ():array|Product {
        return $this->productRepository->findAll();
    }

    public function showProductDetail(int $id) {
        $product = $this->findProductById($id);
        if ($product) {
            echo $this->twig->render('productDetail.twig', [
                'product' => $product
            ]);
        } else {
            echo "Not found";
        }
    }
    private function findProductById (int $id):Product {

        $product = $this->productRepository->findById($id);

        return $product ?? null;
    }
}

