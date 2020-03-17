<?php

use App\Router;
$router = new Router();

$router->get('/hello', function() { 
    echo "GET hello\n"; 
});

$router->get('/', 'StartPageController@render');

$router->get('/rolunk', 'AboutController@render');

$router->get('/blog/@id', 'StartPageController@blog');

$router->post('/bar', function() { 
    echo "POST bar\n"; 
});
