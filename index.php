<?php

require_once("./vendor/autoload.php");

use App\Controller\ProductController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
        $controller = new ProductController();
        $controller->index();
        break;
    case '/':
        $controller = new ProductController();
        $controller->index();
        break;

    case '/product/detail':
        if (isset($_GET['id'])){
            $controller = new ProductController();
            $controller->showProductDetail($id);
            break;
        }

    case '/crew':
        echo $twig->render('crew.twig');
        break;

    case '/destination':
        echo $twig->render('destination.twig');
        break;

    case '/technology':
        echo $twig->render('technology.twig');
        break;

    default:
        http_response_code(404);
        echo $twig->render('404.twig');
}
