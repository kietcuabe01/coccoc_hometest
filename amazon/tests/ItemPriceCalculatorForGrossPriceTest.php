<?php

class ItemPriceCalculatorForGrossPriceTest implements \Amazon\Calculator\Contract\IItemPriceCalculator
{
    public function calculate(\Amazon\Product $product)
    {
        return $product->getDepth(); // cook item price
    }
}