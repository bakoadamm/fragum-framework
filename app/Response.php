<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:59
 */

namespace App;


use App\http\statusCode;

class Response
{
    private $headers = [];
    private $statusCode;
    private $body;

    public function __construct($statusCode = statusCode\Success::OK, $headers = [])
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    public function setBody($body, $jsonEncode = false)
    {
        $this->body = $jsonEncode ? json_encode($body) : $body;
    }

    public function setHeaders($headers = [])
    {
        $this->headers = $headers;
    }

    public function setStatusCode($statusCode = statusCode\Success::OK)
    {
        $this->statusCode = $statusCode;
    }

    public function send()
    {
        http_response_code($this->statusCode);
        foreach($this->headers as $header => $value)
        {
            header($header . ': ' . $value);
        }

        echo $this->body;
        exit;
    }
}