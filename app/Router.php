<?php

namespace App;

class Router {

    private $routes = [
        'get' => [],
        'post' => []
    ];

    function get($pattern, $handler) {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->routes['get'][$pattern] = $handler;
            return $this;
        }  
    }

    function post($pattern, callable $handler) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->routes['post'][$pattern] = $handler;
            return $this;
        }
    }

    function match(Request $request) {
        $method = strtolower($request->getMethod());
        if ( ! isset($this->routes[$method])) {
            return false;
        }

        $path = '/' . $request->getPath();
    
        foreach ($this->routes[$method] as $pattern => $handler) {
            if ($pattern === $path) {
                return $handler;
            }
        }

        return false;
    }

}