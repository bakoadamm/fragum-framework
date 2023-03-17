<?php
declare(strict_types=1);
require_once '../vendor/autoload.php';

use Core\ServiceContainer;
use Performance\Performance;

define('PROJECT_ROOT', __DIR__);

/*
ini_set("DISPLAY_ERRORS", '1');
error_reporting(E_ALL);
*/

//https://github.com/bvanhoekelen/performance
Performance::point('boot');

(new Core\Application(new ServiceContainer(include '../config/app.php')))->run();

if(getenv('APP_PERFORMANCE') == 'true') {
    Performance::results();
}

