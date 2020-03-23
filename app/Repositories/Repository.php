<?php
/**
 * Created by PhpStorm.
 * User: Ádám
 * Date: 2020.03.23.
 * Time: 3:20
 */

namespace App\Repositories;

use App\Database;

abstract class Repository {
    public function __construct() {
        new Database();
    }
}