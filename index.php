<?php

require_once("./vendor/autoload.php");

use App\Controller\ProductController;

$request = $_SERVER['REQUEST_URI'];

$path = parse_url($request, PHP_URL_PATH);
$path = rtrim($path, '/');

define('BASE_URL', '/localhost');

$path = str_replace(BASE_URL, '', $path);

switch ($path) {
    case '/' :
    case '':
        $controller = new ProductController();
        $controller->index();
        break;

    case '/product':
        if (isset($_GET['id']) && ctype_digit($_GET['id'])){
            $id = intval($_GET['id']);
            $controller = new ProductController();
            $controller->showProductDetail($id);
            break;
        } else {
            echo "Product not found";
        }
        break;

    // case '/crew':
    //     echo $twig->render('crew.twig');
    //     break;

    // case '/destination':
    //     echo $twig->render('destination.twig');
    //     break;

    // case '/technology':
    //     echo $twig->render('technology.twig');
    //     break;

    default:
        http_response_code(404);
        echo $twig->render('404.twig');
}
