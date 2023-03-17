<?php

namespace Core;

use Exception;
use Performance\Performance;
use Core\Logger;

class Application
{

    private $container;

    private $twig;

    private $logger;

    public function __construct($container) {
        $this->container = $container;
        $this->logger = new Logger();
    }

    public function run() {

        try {

            $this->container->get('dotEnv');
            $this->showErrors();

            $this->twig = $this->container->get('twig');
            $this->container->get('dispatcher');

        } catch(Exception $e) {

            $logger = new Logger();
            $logger->log($e->getMessage(), 'error');

            $tpl = $this->twig->load("@templates/errors/500.twig");
            header("HTTP/1.1 500 Internal Server Error");
            $message = getenv('APP_DEBUG') == 'true' ? $e->getMessage() : '';
            echo $tpl->render(['message' => $message]);
            exit;
        }

    }

    private function showErrors() {
        if(getenv('APP_DEBUG') == 'true') {
            ini_set("DISPLAY_ERRORS", 1);
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
        }
    }
}
