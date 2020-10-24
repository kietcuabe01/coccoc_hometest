<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 8:26 PM
 */

namespace Amazon\Calculator\Contract;


use Amazon\Product;

interface IItemPriceCalculator
{
    public function calculate(Product $product);
}