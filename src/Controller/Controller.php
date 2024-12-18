<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller {
    public Environment $twig;
    public function __construct () {
        $loader = new FilesystemLoader(realpath("./src/views"));
        
        $this->twig = new Environment ($loader, [
            "debug"=>true
        ]);
    }
}
