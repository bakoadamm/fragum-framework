<?php

namespace Core;

use Performance\Performance;

class Application
{
    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function run() {

        Performance::point();


        $this->container->get('dotEnv');

        $this->showErrors();

        $this->container->get('twig');
        $this->container->get('dispatcher');

        if(getenv('APP_PERFORMANCE') == 'true') {
            Performance::results();
        }
    }

    public function showErrors() {
        if(getenv('APP_DEBUG') == 'true') {
            ini_set("DISPLAY_ERRORS", 1);
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
        }
    }
}