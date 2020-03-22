<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 15:35
 */

namespace App\Http\StatusCode;


abstract class Informational
{
    const CONTINUE_ = 100;

    const SWITCHING_PROTOCOLS = 101;

    const PROCESSING = 102;
}