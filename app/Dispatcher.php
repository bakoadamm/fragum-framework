<?php

namespace App;

class Dispatcher {

    private $router, $twig, $loader;

    function __construct(Router $router, $loader, $twig) {
        
        $this->loader = $loader;
        $this->twig = $twig;
        $this->router = $router;
    }

    function handle(Request $request) {
        $handler = $this->router->match($request);

        $params = isset($handler[1]) ? $handler[1] : null;

        if ( ! $handler) {
            $this->loader->addPath(getenv('APP_TEMPLATE_DIR'), 'templates');
            $tpl = $this->twig->load("@templates/errors/404.twig");
            header("HTTP/1.1 404 Not Found");
            echo $tpl->render([]);
            return;
        }

        if(is_callable($handler[0])) {
            $handler[0]($params);
        } else {
            $handlerArray = explode('@', $handler[0]);
            $class = $handlerArray[0];
            $method = $handlerArray[1];
            $controller = "App\\Controllers\\" . $class;
            $ctrl = new $controller($this->loader, $this->twig);
            $ctrl->$method($params);
           
        }
        
    }

}