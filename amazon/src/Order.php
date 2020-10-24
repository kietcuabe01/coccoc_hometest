<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 12:09 PM
 */

namespace Amazon;


class Order
{
    private $arrayProduct = [];

    public function addProduct(Product $product)
    {
        $this->arrayProduct[] = $product;
    }

    public function getArrayProduct(): array
    {
        return $this->arrayProduct;
    }
}