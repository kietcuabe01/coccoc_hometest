<?php
require_once 'core/bootstrap.php';

$testShippingFee = new ShippingFeeTest();
$arrayMethod = [
    'testNoShippingFee', 'testOnlyFeeDimension', 'testOnlyFeeByWeight', 'testBothFeeDimensionAndShippingFee'
];

foreach ($arrayMethod as $method) {
    $r = $testShippingFee->$method();
    if ($r) {
        echo $method.' pass', PHP_EOL;
    } else {
        echo $method.' fail', PHP_EOL;
    }
}


$testShippingFee = new ItemPriceTest();
$arrayMethod = [
    'testNoAmazonPrice', 'testNoShippingPrice', 'testBothAmazonAndShipping',
];

foreach ($arrayMethod as $method) {
    $r = $testShippingFee->$method();
    if ($r) {
        echo $method.' pass', PHP_EOL;
    } else {
        echo $method.' fail', PHP_EOL;
    }
}

$testShippingFee = new GrossPriceTest();
$arrayMethod = [
    'testIsSumItemPrice', 'testNoProduct',
];

foreach ($arrayMethod as $method) {
    $r = $testShippingFee->$method();
    if ($r) {
        echo $method.' pass', PHP_EOL;
    } else {
        echo $method.' fail', PHP_EOL;
    }
}