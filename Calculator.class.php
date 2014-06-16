<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 16.06.14
 * Time: 12:20
 */

class Calculator
{
    protected $order;
    protected $discountManager;

    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    public function setDiscountManager(Discount_Manager $discountManager)
    {
        $this->discountManager = $discountManager;
    }

    public function doCalculation()
    {
        $sum = 0;
        $this->discountManager->setOrder($this->order);
        $sum = $this->discountManager->doCalculation();
        $sum += $this->doCalculateWithoutDiscount();
        return $sum;
    }

    protected function doCalculateWithoutDiscount()
    {
        $sum = 0;
        foreach($this->order->getProducts() as $product) {
            if($product['isDiscounted'] == 0) {
                $sum += $product['product']->getPrice();
            }
        }
        return $sum;
    }
}
