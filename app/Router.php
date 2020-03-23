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

        $path = $request->getPath();
        $path = substr($path, 16); // for localhost

        foreach ($this->routes[$method] as $pattern => $handler) {
            $pattern = $this->replace($pattern);
            if (preg_match("%^" . $pattern . "$%", $path, $matches)) {
                return [$handler, $matches];
            }
        }
        return false;
    }

    public function replace($route) {
        $routeWithRegex = preg_replace_callback('%\{{1}(.*?)\}{1}%',function($match) {
            $return = '(?<' . $match[1] . '>[\w]+)';
            return $return;
        }, $route);

        return $routeWithRegex;

    }
}