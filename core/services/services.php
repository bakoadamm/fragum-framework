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

        $dispatcher = new \App\Dispatcher($container->get('router'), $container->get('twigLoader'), $container->get('twig'));
        $dispatcher->handle($container->get('request'));
        return $dispatcher;
    },

    'router' => function() {
        $router = new \App\Router();
        require_once PROJECT_ROOT . '/../routes/routes.php';
        return $router;
    },

    'request' => function() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        return new \App\Request($requestMethod, $_SERVER['REQUEST_URI']);
    }


];