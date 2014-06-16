<?php
/**
 * User: Evgeniy
 * Date: 16.06.14
 * Time: 12:12
 */

abstract class Discount
{
    protected $discount = 1;
    protected $order;

    abstract function doCalculation();

    public function  setDiscount($discount)
    {
        $this->discount = 1 - $discount/100;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setOrder(Order $order)
    {
        $this->order = $order;
    }
}
