<?php

namespace App\Controllers;

use Dotenv\Dotenv;

class Controller {

    protected $loader;

    protected $twig;

    public function __construct($loader, $twig) {
        $this->loader = $loader;
        $this->twig   = $twig;
        $loader->addPath(getenv('APP_TEMPLATE_DIR'),'templates');
    }
}