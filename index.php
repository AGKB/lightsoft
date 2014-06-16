<?php
/**
 * User: Evgeniy
 * Date: 14.06.14
 * Time: 8:53
 */

//------------Autoload classes-----------------------------
 spl_autoload_register(function ($class) {
     $class = str_replace('_', '/', $class);
     include $class . '.class.php';
 });

// Create product items
$productA = new Product('A', 100);
$productB = new Product('B', 100);
$productC = new Product('C', 100);
$productD = new Product('D', 100);
$productE = new Product('E', 100);
$productF = new Product('F', 100);
$productG = new Product('G', 100);
$productH = new Product('H', 100);
$productI = new Product('I', 100);
$productJ = new Product('J', 100);
$productK = new Product('K', 100);
$productL = new Product('L', 100);
$productM = new Product('M', 100);

//Create order
$order = new Order();
$order->addProduct($productA);
$order->addProduct($productB);
$order->addProduct($productC);
$order->addProduct($productD);
$order->addProduct($productE);
$order->addProduct($productF);
$order->addProduct($productG);
$order->addProduct($productH);
$order->addProduct($productI);
$order->addProduct($productJ);
$order->addProduct($productD);
$order->addProduct($productE);
$order->addProduct($productK);
$order->addProduct($productL);
$order->addProduct($productM);

//Create discount
$discount1 = new Discount_ProductSet();
$discount1->setProductSet($productA, $productB);
$discount1->setDiscount(10);

$discount2 = new Discount_ProductSet();
$discount2->setProductSet($productD, $productE);
$discount2->setDiscount(5);

$discount3 = new Discount_ProductSet();
$discount3->setProductSet($productE, $productF, $productG);
$discount3->setDiscount(5);

$discount4 = new Discount_DependentProductSet();
$discount4->setMainProduct($productA);
$discount4->setDependentProduct($productK);
$discount4->setDependentProduct($productL);
$discount4->setDependentProduct($productM);
$discount4->setDiscount(5);

$discount5 = new Discount_CountProductSet();
$discount5->addExpectedProduct($productA);
$discount5->addExpectedProduct($productC);
$discount5->addDiscountRule(3, 5);
$discount5->addDiscountRule(4, 10);
$discount5->addDiscountRule(5, 20);

//Add discount
$discountManager = new Discount_Manager();
$discountManager->addDiscount($discount1);
$discountManager->addDiscount($discount2);
$discountManager->addDiscount($discount3);
$discountManager->addDiscount($discount4);
$discountManager->addDiscount($discount5);

//Do calculation
$calculator = new Calculator();
$calculator->setOrder($order);
$calculator->setDiscountManager($discountManager);
$amount = $calculator->doCalculation();


echo "Total amount: " . $amount;
