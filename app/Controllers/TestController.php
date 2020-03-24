<?php

namespace App\Controllers;

use App\Request;

class TestController extends Controller {
    public function test($params, Request $request) {
        
        $data = $request->getBody()->age;
        dump($data);
        echo 'hello ' . $params['id'] ;
    }

    public function testTwo($params)
    {
        echo $params['slug'] . ' - ' . $params['id'];

    }

    public function testMethod($params, Request $request) {

        $tpl = $this->twig->load("@templates/start.twig");
        echo $tpl->render($request->paramBag);
    }
}