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

	public function getBody() {
		$body = null;
		
		if (strtolower($this->method) != 'get') {
			$body = json_decode(file_get_contents('php://input'));
			if ($body == null || $body == '') {
				if($_POST) {
					$body = (object)$_POST;
				} else {
					$body = null;
				}
			}
		}
		
		return $body;
	}

}
