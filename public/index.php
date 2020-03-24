<?php

define('PROJECT_ROOT', __DIR__);

require_once '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Dispatcher;
use App\Request;
use Performance\Performance;

Performance::point();
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if(getenv('APP_DEBUG') == 'true') {
	ini_set("DISPLAY_ERRORS", 1);
	error_reporting(E_ALL);
} else {
	ini_set('display_errors', 'Off');
}

require_once '../routes/routes.php';

$loader = new \Twig\Loader\FilesystemLoader(getenv('APP_TEMPLATE_DIR'));
$twig = new \Twig\Environment($loader, [
	'debug' => true,
	'autoescape' => false
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$requestMethod = $_SERVER['REQUEST_METHOD'];
$dispatcher = new Dispatcher($router, $loader, $twig);
$dispatcher->handle(new Request($requestMethod, $_SERVER['REQUEST_URI']));

if(getenv('APP_PERFORMANCE') == 'true') {
	Performance::results();
}
