<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 12:39 PM
 */

namespace Amazon\Calculator\Contract;


use Amazon\Product;

interface IShippingFee
{
    public function calculate(Product $product);
}