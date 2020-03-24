<?php

namespace App;

use App\Http\RequestMethod;

class Router {

    /**
     * @var
     */
    private $method;

    public function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    private $routes = [
        'get'       => [],
        'post'      => [],
        'put'       => [],
        'delete'    => []
    ];

    public function get($pattern, $handler) {
        if(RequestMethod::isEqueal($this->method, RequestMethod::GET)) {
            $this->routes['get'][$pattern] = $handler;
            return $this;
        }  
    }

    public function post($pattern, $handler) {
        if(RequestMethod::isEqueal($this->method, RequestMethod::POST)) {
            $this->routes['post'][$pattern] = $handler;
            return $this;
        }
    }

    public function put($pattern, $handler) {
        if(RequestMethod::isEqueal($this->method, RequestMethod::PUT)) {
            $this->routes['put'][$pattern] = $handler;
            return $this;
        }
    }

    public function delete($pattern, $handler) {
        if(RequestMethod::isEqueal($this->method, RequestMethod::DELETE)) {
            $this->routes['delete'][$pattern] = $handler;
            return $this;
        }
    }

    public function match(Request $request) {

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