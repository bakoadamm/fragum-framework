<?php

namespace App;

use App\Http\StatusCode;

class Response
{
    private $headers = [];
    private $statusCode;
    private $body;

    public function __construct($statusCode = StatusCode\Success::OK, $headers = []) {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    public function setBody($body, $jsonEncode = false) {
        $this->body = $jsonEncode ? json_encode($body) : $body;
    }

    public function setHeaders($headers = []) {
        $this->headers = $headers;
    }

    public function setStatusCode($statusCode = StatusCode\Success::OK) {
        $this->statusCode = $statusCode;
    }

    public function send() {
        http_response_code($this->statusCode);
        foreach($this->headers as $header => $value) {
            header($header . ': ' . $value);
        }

        echo $this->body;
        exit;
    }

    public function sendWithView($loader, $twig) {
        $statusText = new StatusCode\StatusText();
        header("HTTP/1.1 " . $this->statusCode . " ". $statusText->getStatusTextByCode($this->statusCode));
        $data = [
            'code' => $this->statusCode,
            'message' => $statusText->getStatusTextByCode($this->statusCode)
        ];

        $loader->addPath(getenv('APP_TEMPLATE_DIR'), 'templates');
        $tpl = $twig->load("@templates/errors/response.twig");
        echo $tpl->render($data);

        exit;
    }
}