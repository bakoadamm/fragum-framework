<?php

namespace App\Controllers;


class TestController {
    public function test($id) {

        echo 'hello ' . $id;
    }

    public function testTwo($params)
    {
        echo $params['slug'] . ' - ' . $params['id'];

    }
}