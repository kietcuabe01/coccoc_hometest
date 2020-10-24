<?php

class ShippingFeeTest
{
    protected $product;

    public function __construct()
    {
        $product = new \Amazon\Product();
        $product->setDepth(3);
        $product->setHeight(0.1);
        $product->setWidth(0.2);
        $product->setWeight(2);

        $this->product = $product;
    }

    public function testNoShippingFee()
    {
        $shippingFee = new \Amazon\Calculator\ShippingFee();
        $shippingFee = new \Amazon\Calculator\ShippingFee\FeeByDimension($shippingFee);
        $shippingFee->setCoefficient(0);
        $shippingFee = new \Amazon\Calculator\ShippingFee\FeeByWeight($shippingFee);
        $shippingFee->setCoefficient(0);

        $fee = $shippingFee->calculate($this->product);
        return $fee === 0;
    }

    public function testOnlyFeeDimension()
    {
        $shippingFee = new \Amazon\Calculator\ShippingFee();
        $shippingFee = new \Amazon\Calculator\ShippingFee\FeeByDimension($shippingFee);

        $fee = $shippingFee->calculate($this->product);

        return $fee === 0.2 * 0.1 * 3 * 11;
    }

    public function testOnlyFeeByWeight()
    {
        $shippingFee = new \Amazon\Calculator\ShippingFee();
        $shippingFee = new \Amazon\Calculator\ShippingFee\FeeByWeight($shippingFee);

        $fee = $shippingFee->calculate($this->product);

        return $fee === 2 * 11;
    }

    public function testBothFeeDimensionAndShippingFee()
    {
        $shippingFee = new \Amazon\Calculator\ShippingFee();
        $shippingFee = new \Amazon\Calculator\ShippingFee\FeeByDimension($shippingFee);
        $shippingFee = new \Amazon\Calculator\ShippingFee\FeeByWeight($shippingFee);

        $fee = $shippingFee->calculate($this->product);
        return $fee === max(0.2 * 0.1 * 3 * 11, 2 * 11);
    }
}