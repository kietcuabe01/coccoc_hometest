<?php

class ItemPriceTest
{

    public function __construct()
    {

    }

    public function testNoAmazonPrice()
    {
        $product = new \Amazon\Product();
        $product->setAmazonPrice(0);
        $shippingCalculator = new ShippingFeeForItemPriceTest();
        $itemPriceCalculator = new \Amazon\Calculator\ItemPriceCalculator($shippingCalculator);

        return $itemPriceCalculator->calculate($product) === $shippingCalculator->calculate($product);
    }

    public function testNoShippingPrice()
    {
        $product = new \Amazon\Product();
        $product->setAmazonPrice(12);
        $shippingCalculator = new ShippingFeeForItemPriceTestNoShippingPrice();
        $itemPriceCalculator = new \Amazon\Calculator\ItemPriceCalculator($shippingCalculator);

        return $itemPriceCalculator->calculate($product) === $product->getAmazonPrice();
    }

    public function testBothAmazonAndShipping()
    {
        $product = new \Amazon\Product();
        $product->setAmazonPrice(12);
        $shippingCalculator = new ShippingFeeForItemPriceTest();
        $itemPriceCalculator = new \Amazon\Calculator\ItemPriceCalculator($shippingCalculator);

        return $itemPriceCalculator->calculate($product) === 23.5;
    }
}