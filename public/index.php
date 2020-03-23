<?php

define('PROJECT_ROOT', __DIR__);

require_once '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Dispatcher;
use App\Request;


$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if(getenv('APP_DEBUG') == 'true') {
	ini_set("DISPLAY_ERRORS", 1);
	error_reporting(E_ALL);
} else {
	ini_set('display_errors', 'Off');
}

require_once '../routes/routes.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];

$loader = new \Twig\Loader\FilesystemLoader(getenv('APP_TEMPLATE_DIR'));
$twig = new \Twig\Environment($loader, [
	'debug' => true,
	'autoescape' => false
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$dispatcher = new Dispatcher($router, $loader, $twig);
$dispatcher->handle(new Request($requestMethod, $_SERVER['REQUEST_URI']));