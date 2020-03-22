<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:10
 */

namespace App\http\header;


abstract class Authentication
{
    const WWW_AUTHENTICATE = 'WWW-Authenticate';

    const AUTHORIZATION = 'Authorization';

    const PROXY_AUTHENTICATE = 'Proxy-Authenticate';

    const PROXY_AUTHORIZATION = 'Proxy-Authorization';
}