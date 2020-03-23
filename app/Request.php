<?php

namespace App;

use \App\Http\RequestMethod;

class Request {

    private $method;

    private $path;

	private $body;

    public function __construct($method, $path) {
        $this->method = $method;
        $this->path = explode('?', $path)[0];

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
		if (RequestMethod::isEqueal($this->method, RequestMethod::GET)) {
			return false;
		}

		$this->body = json_decode(file_get_contents('php://input'));

		if($this->body != null || $this->body != '') {
			return false;
		}

		$this->body = isset($_POST) ? (object)$_POST : null;
		return true;
	}

	public function getBody() {
		return $this->body;
	}
}
