<?php
/**
 * Created by PhpStorm.
 * User: Ádám
 * Date: 2020.03.23.
 * Time: 22:34
 */

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