<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 12:38 PM
 */

namespace Amazon\Calculator;


use Amazon\Calculator\Contract\IShippingFee;

abstract class ShippingFeeDecorator implements IShippingFee
{
    protected $shippingFee;

    public function __construct(IShippingFee $shippingFee)
    {
        $this->shippingFee = $shippingFee;
    }
}