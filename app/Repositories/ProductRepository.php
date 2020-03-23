<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends Repository{

    public function getProductById($id) {

        return Product::find($id);
    }

}