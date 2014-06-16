<?php
/**
 * Class Discount_ProductSet
 */
class Discount_ProductSet extends Discount
{
    protected $productsSet = array();

    public function setProductSet(Product $pr1, Product $pr2, Product $pr3 = null)
    {
        $this->productsSet = func_get_args();
    }

    public function getProductSet()
    {
        return $this->productSet;
    }

    public function doCalculation()
    {
        $sum = 0;
        $productsOrder = &$this->order->products;

        $discountProducts = array();

        foreach($this->productsSet as $productSet) {
            foreach($productsOrder as &$productOrder) {
                if($productOrder['product'] == $productSet && $productOrder['isDiscounted'] == 0) {
                    $discountProducts[] = &$productOrder;
                    break;
                }
            }
        }

        if(count($discountProducts) == count($this->productsSet)) {
            foreach($discountProducts as &$discountProduct) {
                $discountProduct['isDiscounted'] = 1;
                $sum += $discountProduct['product']->getPrice();
            }
        }
        return $sum * $this->getDiscount();
    }
}