<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 2:16 PM
 */

namespace Amazon\Calculator;


use Amazon\Calculator\Contract\IShippingFeeCalculator;
use Amazon\Calculator\ShippingFee\FeeByDimension;
use Amazon\Calculator\ShippingFee\FeeByWeight;
use Amazon\Product;

class ShippingFeeCalculator implements IShippingFeeCalculator
{
    public function calculate(Product $product)
    {
        $shippingFee = new ShippingFee();
        $shippingFee = new FeeByDimension($shippingFee);
        $shippingFee = new FeeByWeight($shippingFee);

        return $shippingFee->calculate($product);
    }
}