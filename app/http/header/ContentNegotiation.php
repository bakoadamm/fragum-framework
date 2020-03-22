<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:25
 */

namespace App\http\header;


abstract class ContentNegotiation
{
    const ACCEPT = 'Accept';

    const ACCEPT_CHARSET = 'Accept-Charset';

    const ACCEPT_ENCODING = 'Accept-Encoding';

    const ACCEPT_LANGUAGE = 'Accept-Language';
}