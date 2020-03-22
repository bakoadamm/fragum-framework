<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 20:24
 */

namespace App\http\header;


abstract class ConnectionManagement
{
    const CONNECTION = 'Connection';

    const KEEP_ALIVE = 'Keep-Alive';
}