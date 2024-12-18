<?php

namespace App\Controller;

use App\Repositories\SizeRepository;

class SizeController extends Controller {
    private SizeRepository $sizeRepository;

    public function __construct() {
        parent::__construct();

        $this->sizeRepository = new SizeRepository();
    }

    public function showAll ():void {
        $sizes = $this->sizeRepository->findAll();

        echo $this->twig->render('home.twig', [
            'sizes' => $sizes
        ]);
    }
}