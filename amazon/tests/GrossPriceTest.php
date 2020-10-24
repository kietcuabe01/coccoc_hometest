<?php

class GrossPriceTest
{


    public function __construct()
    {

    }

    public function testNoProduct()
    {
        $order = new \Amazon\Order();
        $itemPriceCalculator = new \Amazon\Calculator\ItemPriceCalculator(
            new \Amazon\Calculator\ShippingFeeCalculator()
        );

        $grossPrice = new \Amazon\Calculator\GrossPriceCalculator($itemPriceCalculator);
        $value = $grossPrice->calculate($order);

        return $value === 0;
    }

    public function testIsSumItemPrice()
    {
        $order = new \Amazon\Order();
        $product1 = new \Amazon\Product();
        $product1->setDepth(3);
        $product1->setHeight(0.1);
        $product1->setWidth(0.2);
        $product1->setWeight(2);
        $product1->setAmazonPrice(10);

        $product2 = new \Amazon\Product();
        $product2->setDepth(2);
        $product2->setHeight(1);
        $product2->setWidth(0.7);
        $product2->setWeight(1.2);
        $product2->setAmazonPrice(13);

        $order->addProduct($product1);
        $order->addProduct($product2);

        $itemPriceCalculator = new ItemPriceCalculatorForGrossPriceTest();

        $grossPrice = new \Amazon\Calculator\GrossPriceCalculator($itemPriceCalculator);
        $value = $grossPrice->calculate($order);

        return $value === 5;
    }
}