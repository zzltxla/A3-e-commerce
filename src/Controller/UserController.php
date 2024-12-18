<?php

namespace App\Controller;

use App\Repositories\UserRepository;

class UserController extends Controller 
{

    private UserRepository $userRepository;

    public function __construct () {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function showAllUser(): void {
        $users = $this->userRepository->findAll();

        echo $this->twig->render('home.twig', [
            'users' => $users
        ]);
    }

}