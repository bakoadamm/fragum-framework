<?php
/**
 * Created by PhpStorm.
 * User: Ádám
 * Date: 2020.03.23.
 * Time: 2:29
 */

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher as IlluminateDispatcher;
use Illuminate\Container\Container;

class Database {
    private $capsule;

    public function __construct() {
        $this->capsule = new Capsule;
        $this->capsule->setEventDispatcher(new IlluminateDispatcher(new Container));
        $this->capsule->bootEloquent();
        $this->capsule->addConnection([
            'driver'    => getenv('DB_CONNECTION'),
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('DB_DATABASE'),
            'username'  => getenv('DB_USERNAME'),
            'password'  => getenv('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
    }

}