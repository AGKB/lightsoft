<?php
/**
 * User: Evgeniy
 * Date: 16.06.14
 * Time: 12:10
 */

class Order
{
    public $products = array();

    public function addProduct(Product $product)
    {
        $this->products[] = array(
            'product' => $product,
            'isDiscounted' => 0,   //@TODO replace to bool
        );
    }

    public function getProducts() {
        return $this->products;
    }

    public function getCount() {
        return count($this->products);
    }
}
