<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:14
 */

namespace App\Http\Header;


abstract class Caching
{
    const AGE = 'Age';

    const CACHE_CONTROL = 'Cache-Control';

    const CLEAR_SITE_DATA = 'Clear-Site-Data';

    const EXPIRES = 'Expires';

    const PRAGMA = 'Pragma';

    const WARNING = 'Warning';
}