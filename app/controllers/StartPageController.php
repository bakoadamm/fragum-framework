<?php

namespace App\Controllers;

class StartPageController extends Controller {

    public function render() {

        $data = [];
        $tpl = $this->twig->load("@templates/start.twig");
        echo $tpl->render($data);
        
    }

    public function blog(){
        $tpl = $this->twig->load("@templates/start.twig");
        echo $tpl->render();
    }
}