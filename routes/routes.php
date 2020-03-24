<?php

use App\Router;
$router = new Router();

$router->get('/hello/{name}', function($params) {
    echo "hello ". $params['name'];
});
$router->get('/test/{slug}/{id}', 'TestController@testTwo');

$router->get('/', 'StartPageController@render');

$router->get('/rolunk', 'AboutController@render');

$router->get('/blog/{id}', 'StartPageController@blog');

$router->post('/bar', function() { 
    echo "POST bar\n"; 
});
