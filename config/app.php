<?php

use Core\ServiceContainer;

return [

    'dotEnv' => function() {
        $dotenv = \Dotenv\Dotenv::createImmutable(PROJECT_ROOT . '/../');
        $dotenv->load();
    },

    'twigLoader' => function() {
        $loader = new \Twig\Loader\FilesystemLoader(getenv('APP_TEMPLATE_DIR'));
        $loader->addPath(getenv('APP_TEMPLATE_DIR'),'templates');
        return $loader;
    },

    'twig' => function(ServiceContainer $container) {
        $twig = new \Twig\Environment($container->get('twigLoader'), [
            'debug' => true,
            'autoescape' => false
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        return $twig;
    },

    'dispatcher' => function(ServiceContainer $container) {

        $dispatcher = new \Core\Dispatcher($container->get('router'), $container->get('twigLoader'), $container->get('twig'));
        $dispatcher->handle($container->get('request'));
        return $dispatcher;
    },

    'router' => function() {
        $router = new \Core\Router();
        require_once PROJECT_ROOT . '/../routes/routes.php';
        return $router;
    },

    'request' => function() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        return new \Core\Request($requestMethod, $_SERVER['REQUEST_URI']);
    },

    'phpMail' => function() {
        $mail = \PHPMailer\PHPMailer\PHPMailer(true);
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