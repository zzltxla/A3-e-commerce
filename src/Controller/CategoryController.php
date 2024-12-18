<?php

namespace App\Controller;


use App\Repositories\CategoryRepository;

class CategoryController extends Controller {
    private CategoryRepository $categoryRepository;

    public function __construct() {
        parent::__construct();

        $this->categoryRepository = new CategoryRepository();
    }

    public function showAll ():void {
        $categories = $this->categoryRepository->findAll();

        echo $this->twig->render('home.twig', [
            'category' => $categories
        ]);
    }
}