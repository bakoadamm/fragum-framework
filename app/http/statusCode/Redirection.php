<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 15:36
 */

namespace App\Http\StatusCode;


abstract class Redirection
{
    const MULTIPLE_CHOICES = 300;

    const MOVED_PERMANENTLY = 301;

    const FOUND = 302;

    const SEE_OTHER = 303;

    const NOT_MODIFIED = 304;

    const USE_PROXY = 305;

    const UNUSED = 306;

    const TEMPORARY_REDIRECT = 307;

    const PERMANENT_REDIRECT = 308;
}