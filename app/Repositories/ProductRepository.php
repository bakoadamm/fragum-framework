<?php

namespace App\Repositories;

use App\Models\Product;
use App\DataObjects\ProductDto;

class ProductRepository extends Repository{

    public function getProductById($id) {
        $productById = Product::find($id);
        //return $productById;
        return new ProductDto($productById);
    }

}