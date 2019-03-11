<?php

$products = array();

$product = array();
$product["product"] = "Microfiber Beach Towel";
$product["price"] = 40;
$product["qty"] = 2;

array_push($products, $product);

$product = array();
$product["product"] = "Sunscreen SPF80";
$product["price"] = 30;
$product["qty"] = 5;

array_push($products, $product);

$product = array();
$product["product"] = "Flip-flop Sandals";
$product["price"] = 25;
$product["qty"] = 3;

array_push($products, $product);

$product = array();
$product["product"] = "Plastic Flying Disc";
$product["price"] = 15;
$product["qty"] = 4;

array_push($products, $product);

$product = array();
$product["product"] = "Beach Umbrella";
$product["price"] = 75;
$product["qty"] = 1;

array_push($products, $product);

echo json_encode($products[rand(0, 4)])

?>