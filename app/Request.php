<?php

namespace App;

class Request {

    private $method;
    private $path;
	private $body;

    public function __construct($method, $path) {
        $this->method = $method;
        $this->path = explode('/', $path)[3];
		$this->setBody();
    }

    public function getMethod() {
        return $this->method;
    }

    public function getPath() {
        return $this->path;
    }

	public function setBody() {
		$this->body = null;
		if (strtolower($this->method) === 'get') {
			return false;
		}
		$this->body = json_decode(file_get_contents('php://input'));

		if($this->body != null || $this->body != '') {
			return false;
		}

		$this->body = isset($_POST) ? (object)$_POST : null;
	}

	public function getBody() {
		return $this->body;
	}


}
