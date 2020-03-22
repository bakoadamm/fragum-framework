<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:50
 */

namespace App\Http\Header;


abstract class RangeRequests
{
    const ACCEPT_RANGES = 'Accept-Ranges';

    const RANGE = 'Range';

    const IF_RANGE = 'If-Range';

    const CONTENT_RANGE = 'Content-Range';
}