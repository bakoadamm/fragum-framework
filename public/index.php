<?php
declare(strict_types=1);
define('PROJECT_ROOT', __DIR__);

require_once '../vendor/autoload.php';

$app = new Core\Application(new \Core\ServiceContainer(include '../config/app.php'));
$app->run();
