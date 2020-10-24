<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 2:05 PM
 */

namespace Amazon\Calculator\ShippingFee;


use Amazon\Calculator\ShippingFeeDecorator;
use Amazon\Product;

class FeeByDimension extends ShippingFeeDecorator
{
    private $coefficient = null;

    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;
    }

    public function getCoefficient()
    {
        if ($this->coefficient === null) {
            $this->coefficient = config_get('shipping_fee.coefficient.dimension', 0);
        }
        return $this->coefficient;
    }

    public function calculate(Product $product)
    {
        $dimension = $product->getWidth() * $product->getHeight() * $product->getDepth();
        $fee = $dimension * $this->getCoefficient();
        return max($this->shippingFee->calculate($product), $fee);
    }
}