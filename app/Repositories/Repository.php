<?php

namespace App\Repositories;

use App\Database;

abstract class Repository {
    public function __construct() {
        new Database();
    }
}