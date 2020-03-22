<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:39
 */

namespace App\Http\Header;


abstract class MessageBodyInformation
{
    const CONTENT_LENGTH = 'Content-Length';

    const CONTENT_TYPE = 'Content-Type';

    const CONTENT_ENCODING = 'Content-Encoding';

    const CONTENT_LANGUAGE = 'Content-Language';

    const CONTENT_LOCATION = 'Content-Location';
}