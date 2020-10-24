<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 2:16 PM
 */

namespace Amazon\Calculator\Contract;


use Amazon\Product;

interface IShippingFeeCalculator
{
    public function calculate(Product $product);
}