<?php

class ShippingFeeForItemPriceTest implements \Amazon\Calculator\Contract\IShippingFeeCalculator
{
    public function calculate(\Amazon\Product $product)
    {
        return 11.5;
    }
}