<?php

namespace App\Controllers;

class AboutController extends Controller {
    
    public function render() {

        $data = [];
        $tpl = $this->twig->load("@templates/about.twig");
        echo $tpl->render($data);
        
    }
}