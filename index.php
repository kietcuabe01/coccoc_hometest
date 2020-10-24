<?php

require_once 'core/bootstrap.php';

$order = new \Amazon\Order();
$product1 = new \Amazon\Product();
$product1->setDepth(3);
$product1->setHeight(0.1);
$product1->setWidth(0.2);
$product1->setWeight(2);
$product1->setAmazonPrice(10);

// item_price = 10 + (max(2*11, 3*0.1*0.2*11))

$product2 = new \Amazon\Product();
$product2->setDepth(2);
$product2->setHeight(1);
$product2->setWidth(0.7);
$product2->setWeight(1.2);
$product2->setAmazonPrice(13);

// item_price = 13 + (max(1.2*11, 2*1*0.7*11))

$order->addProduct($product1);
$order->addProduct($product2);


ContainerIoc::register('shipping_fee_calculator', function () {
    return new \Amazon\Calculator\ShippingFeeCalculator();
});
ContainerIoc::register('item_price_calculator', function () {
    return new \Amazon\Calculator\ItemPriceCalculator(
        ContainerIoc::resolve('shipping_fee_calculator')
    );
});

ContainerIoc::register('gross_price_calculator', function () {
    return new \Amazon\Calculator\GrossPriceCalculator(
        ContainerIoc::resolve('item_price_calculator')
    );
});

/** @var \Amazon\Calculator\GrossPriceCalculator $grossPriceCalculator */
$grossPriceCalculator = ContainerIoc::resolve('gross_price_calculator');
$value = $grossPriceCalculator->calculate($order);

echo 'gross price: ', $value, PHP_EOL;
