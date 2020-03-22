<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Product extends EloquentModel {
    use Model;
    protected $table = 'products';
}