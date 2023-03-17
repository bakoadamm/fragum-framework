<?php

namespace App\Controllers;

use App\Repositories\ProductRepository as Repository;
use Core\Exceptions\TemplateNotFoundException;

class DocumentationController extends Controller {

    private $repository;


    public function __construct($loader, $twig) {
        parent::__construct($loader, $twig);
        $this->repository = new Repository();
    }

    public function show() {
        $tpl = $this->twig->load('@templates/documentation.twig');
        echo $tpl->render([]);
    }

    public function render() {

        $product = $this->repository->getProductById(1);

        $data = [
            'product' => $product
        ];

        $templateName = "@templates/documentation.twig";

        try {
            $tpl = $this->twig->load($templateName);
            echo $tpl->render($data);
        } catch(TemplateNotFoundException $e) {
            throw new TemplateNotFoundException($templateName);
        }

        
    }
}
