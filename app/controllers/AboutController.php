<?php

namespace App\Controllers;

use App\Repositories\ProductRepository as Repository;

class AboutController extends Controller {

    private $repository;

    public function __construct($loader, $twig) {
        parent::__construct($loader, $twig);
        $this->repository = new Repository();
    }

    public function render() {

        $product = $this->repository->getProductById(1);
        $data = [
            'product' => $product
        ];
        $tpl = $this->twig->load("@templates/about.twig");
        echo $tpl->render($data);
        
    }
}