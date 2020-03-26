<?php

namespace Core;


class ServiceContainer
{
    private $definitions;

    public function __construct(array $definitions = []) {
        $this->definitions = $definitions;
    }

    public function put($key, $value) {
        $this->definitions[$key] = $value;
    }

    public function get($key) {
        if(array_key_exists($key, $this->definitions)) {
            return $this->definitions[$key]($this);
        } else {
            die('Critical error: the '. $key . ' service was not found');
        }
    }
}