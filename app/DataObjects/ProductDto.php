<?php


namespace App\DataObjects;

use App\Models\Product;

class ProductDto {

    /**
     * @var mixed
     */
    private $name;

    /**
     * ProductDto constructor.
     * @param Product $product
     */
    public function __construct(Product $product) {
        $this->name = $product->name;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}