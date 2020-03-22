<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 15:26
 */

namespace App\Http;


abstract class RequestHeader
{
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers#Security

    public static function getHeader($header)
    {
        $headers = getallheaders();
        if(array_key_exists($headers, $header))
        {
            return $headers[$header];
        }

        return null;
    }
}