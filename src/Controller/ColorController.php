<?php

namespace App\Controller;

use App\Repositories\ColorRepository;

class ColorController extends Controller {
    private ColorRepository $colorRepository;

    public function __construct() {
        parent::__construct();
        $this->colorRepository = new ColorRepository();
    }

    public function index(): void {
        $colors = $this->colorRepository->findAll();

        echo $this->twig->render('home.twig', [
            'colors' => $colors
        ]);
    }
}

