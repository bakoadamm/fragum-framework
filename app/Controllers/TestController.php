<?php

namespace App\Controllers;

use App\Request;

class TestController {
    public function test($params, Request $request) {
        
        $data = $request->getBody()->age;
        var_dump($data);
        echo 'hello ' . $params['id'] ;
    }

    public function testTwo($params)
    {
        echo $params['slug'] . ' - ' . $params['id'];

    }

    public function testMethod($params, Request $request) {
        dump($request);
        dd($params);
    }
}