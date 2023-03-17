<?php

use Core\Dispatcher;
use Core\Logger;
use Core\Request;
use Core\Router;
use Core\ServiceContainer;
use Dotenv\Dotenv;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use PHPMailer\PHPMailer\PHPMailer;

return [

    'dotEnv' => function() {
        $dotenv = Dotenv::createImmutable(PROJECT_ROOT . '/../');
        $dotenv->load();
    },

    //'setTimeZone' => dd(getenv('APP_TIMEZONE')),//date_default_timezone_set(getenv('APP_TIMEZONE')),

    'twigLoader' => function() {
        $loader = new FilesystemLoader(getenv('APP_TEMPLATE_DIR'));
        $loader->addPath(getenv('APP_TEMPLATE_DIR'),'templates');
        return $loader;
    },

    'twig' => function(ServiceContainer $container) {
        $twig = new Environment($container->get('twigLoader'), [
            'debug' => true,
            'autoescape' => false
        ]);
        $twig->addExtension(new DebugExtension());
        return $twig;
    },

    'dispatcher' => function(ServiceContainer $container) {
        $dispatcher = new Dispatcher($container->get('router'), $container->get('twigLoader'), $container->get('twig'));
        $dispatcher->handle($container->get('request'));
        return $dispatcher;
    },

    'router' => function() {
        $router = new Router();
        require_once PROJECT_ROOT . '/../routes/routes.php';
        return $router;
    },

    'request' => function() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        return new Request($requestMethod, $_SERVER['REQUEST_URI']);
    },

    'logger' => function() {
        return new Logger();
    },

    'phpMail' => function() {
        //TODO: setup from env
        $mail = PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp1.example.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'user@example.com';                     // SMTP username
        $mail->Password   = 'secret';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;
    }

];
