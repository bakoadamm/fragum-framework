<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:47
 */

namespace App\Http\Header;


abstract class RequestContext
{
    const FROM = 'From';

    const HOST = 'Host';

    const REFERRER = 'Referrer';

    const REFERRER_POLICY = 'Referrer-Policy';

    const USER_AGENT = 'User-Agent';
}