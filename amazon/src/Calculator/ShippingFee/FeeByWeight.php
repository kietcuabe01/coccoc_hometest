<?php
namespace Amazon\Calculator\ShippingFee;

use Amazon\Calculator\ShippingFeeDecorator;
use Amazon\Product;

class FeeByWeight extends ShippingFeeDecorator
{
    private $coefficient = null;

    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;
    }

    public function getCoefficient()
    {
        if ($this->coefficient === null) {
            $this->coefficient = config_get('shipping_fee.coefficient.weight', 0);
        }
        return $this->coefficient;
    }

    public function calculate(Product $product)
    {
        $fee = $product->getWeight() * $this->getCoefficient();
        return max($this->shippingFee->calculate($product), $fee);
    }
}