<?php
namespace Amazon\Calculator;


use Amazon\Calculator\Contract\IItemPriceCalculator;
use Amazon\Calculator\Contract\IShippingFeeCalculator;
use Amazon\Product;

class ItemPriceCalculator implements IItemPriceCalculator
{
    private $shippingFeeCalculator;

    public function __construct(IShippingFeeCalculator $shippingFeeCalculator)
    {
        $this->shippingFeeCalculator = $shippingFeeCalculator;
    }

    public function calculate(Product $product)
    {
        return $product->getAmazonPrice() + $this->shippingFeeCalculator->calculate($product);
    }
}