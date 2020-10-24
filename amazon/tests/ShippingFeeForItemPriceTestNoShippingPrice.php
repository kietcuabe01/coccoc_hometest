<?php

class ShippingFeeForItemPriceTestNoShippingPrice implements \Amazon\Calculator\Contract\IShippingFeeCalculator
{
    public function calculate(\Amazon\Product $product)
    {
        return 0;
    }
}