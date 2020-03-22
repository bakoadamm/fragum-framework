<?php

namespace App\Controllers;

use App\Models\Product;

class AboutController extends Controller {
    
    public function render() {

        $product = Product::find(1);
        $data = [
            'product' => $product
        ];
        $tpl = $this->twig->load("@templates/about.twig");
        echo $tpl->render($data);
        
    }
}