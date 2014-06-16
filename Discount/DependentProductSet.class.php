<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 16.06.14
 * Time: 12:16
 */

class Discount_DependentProductSet extends Discount
{
    protected $main_product = null;
    protected $dependent_products = array();

    public function setMainProduct(Product $product)
    {
        $this->main_product = $product;
    }

    public function setDependentProduct(Product $product)
    {
        $this->dependent_products[] = $product;
    }

    public function doCalculation()
    {
        $sum = 0;
        //если не установлен главный продукт или не установлены зависымые
        if(!is_object($this->main_product) || count($this->dependent_products) == 0) {
            return $sum;
        }
        $products = &$this->order->products;

        //поиск зависимых продуктов
        foreach($products as &$product) {
            if(in_array($product['product'], $this->dependent_products) && $product['isDiscounted'] == 0) {
                $sum += $product['product']->getPrice();
                $product['isDiscounted'] = 1;
            }
        }
        return $sum * $this->getDiscount();
    }
}