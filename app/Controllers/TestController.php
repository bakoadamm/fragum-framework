<?php

namespace App\Controllers;

use App\Request;

class TestController {
    public function test($params, Request $request) {
        //dd($params);
        $data = $request->getBody()->name;
        var_dump($data);
        echo 'hello ' . $params['id'] ;
    }

    public function testTwo($params)
    {
        echo $params['slug'] . ' - ' . $params['id'];

    }
}