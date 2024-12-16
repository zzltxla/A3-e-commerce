<?php
require_once("./vendor/autoload.php");

use App\Controller\ProductController;

$request = $_SERVER['REQUEST_URI'];

$loader = new \Twig\Loader\FilesystemLoader(realpath('../src/views'));
$twig = new \Twig\Environment($loader);


switch ($request) {
    case '':
    case '/':
        $controller = new ProductController();
        $controller->index();  
        break;  

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
