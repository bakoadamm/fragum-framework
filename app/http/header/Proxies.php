<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:42
 */

namespace App\http\header;


abstract class Proxies
{
    const FORWARDED = 'Forwarded';

    const X_FORWARDED_FOR = 'X-Forwarded-For';

    const X_FORWARDED_HOST = 'X-Forwarded-Host';

    const X_FORWARDED_PROTO = 'X-Forwarded-Proto';

    const VIA = 'Via';
}