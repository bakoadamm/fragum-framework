<?php

$router->post('/hello/{id}', 'TestController@test');

/*
$router->get('/hello/{name}', function($params) {
    echo "hello ". $params['name'];
});
*/

$router->get('/p/{slug:string}/{id:int}', 'TestController@testMethod');

$router->get('/', 'StartPageController@render');

$router->get('/test/{slug}/{id}', 'TestController@testTwo');

$router->get('/dokumentacio', 'DocumentationController@show');

$router->get('/blog/{id}', 'StartPageController@blog');

$router->post('/bar', function() { 
    echo "POST bar\n"; 
});

$router->get('/cms', 'ContentController@cms');

$router->post('/api/save', 'ContentController@save');

$router->post('/parsed-body-test', 'TestController@parsedBody');


