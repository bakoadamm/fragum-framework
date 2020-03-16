<?php

namespace App;

class Request {

    private $method;
    private $path;

    public function __construct($method, $path) {
        $this->method = $method;
        $this->path = explode('/', $path)[3];
    }

    public function getMethod() {
        return $this->method;
    }

    public function getPath() {
        return $this->path;
    }

    

}
