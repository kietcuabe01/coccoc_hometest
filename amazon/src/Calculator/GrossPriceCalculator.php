<?php
namespace Amazon\Calculator;


use Amazon\Calculator\Contract\IItemPriceCalculator;
use Amazon\Order;

class GrossPriceCalculator
{
    private $itemPriceCalculator;

    public function __construct(IItemPriceCalculator $itemPriceCalculator)
    {
        $this->itemPriceCalculator = $itemPriceCalculator;
    }

    public function calculate(Order $order)
    {
        $result = 0;
        foreach ($order->getArrayProduct() as $product) {
            $result += $this->itemPriceCalculator->calculate($product);
        }
        return $result;
    }
}