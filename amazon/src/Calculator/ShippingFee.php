<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 1:57 PM
 */

namespace Amazon\Calculator;


use Amazon\Calculator\Contract\IShippingFee;
use Amazon\Product;

class ShippingFee implements IShippingFee
{
    public function calculate(Product $product)
    {
        return 0;
    }
}