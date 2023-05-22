<?php

namespace processform;

require __DIR__ . '/../vendor/autoload.php';

use BackEnd\BakendFunctions\FileLogger;
use BackEnd\BakendFunctions\Products\WeightProduct;
use BackEnd\BakendFunctions\Products\SizeProduct;
use BackEnd\BakendFunctions\Products\DimensionProduct;


$error = false;
$sku_unique_message = "";
$sku_validate_message = "";
$logger = new FileLogger();

if (isset($_POST['submit'])) {

    // Retrieve the form data

    $sku = ($_POST['sku']);
    $name = ($_POST['name']);
    $price = ($_POST['price']);
    $type = ($_POST['productType']);
    
    $productClasses = [
        'DVD' => SizeProduct::class,
        'Book' => WeightProduct::class,
        'Furniture' => DimensionProduct::class,
    ];

    $productSetterMethods = [
        'DVD' => [
            'method' => 'setSize',
            'parameters' => ['size']
        ],
        'Book' => [
            'method' => 'setWeight',
            'parameters' => ['weight']
        ],
        'Furniture' => [
            'method' => 'setdimension',
            'parameters' => ['height', 'width', 'length']
        ],
    ];

    $productMethods = [
        'DVD' => 'createSizeProduct',
        'Book' => 'createWeightProduct',
        'Furniture' => 'createDimensionProduct',
    ];

    $productClass = $productClasses[$type];
    $productSetterMethodData = $productSetterMethods[$type];
    $productMethod = $productMethods[$type];
    $createdProduct = new $productClass();
    $parameters = [];
    foreach ($productSetterMethodData['parameters'] as $parameter) {

        $setterMethod = $productSetterMethodData['method'];
        $parameters[] = $_POST[$parameter];
    }
    $parametersString = implode(', ', $parameters);
    $product = $createdProduct->$productMethod(...$parameters);
    $attr = $product->getAttributes();

    if (!$product->validateSKU($sku)) {
        $sku_validate_message = "Invalid Sku input";
        $error = true;
        $logger->error($sku_validate_message);
    } elseif (!$product->isUniqueSKU($sku)) {
        $sku_unique_message = "SKU has been used before";
        $error = true;
        $logger->error($sku_unique_message);
    } elseif (!$product->validateName($name)) {
        $logger->error("Invalid name input");
    } elseif (!$product->validatePrice($price)) {
        $logger->error("Invalid price input");
    } elseif (!$product->validateType($type)) {
        $logger->error("Invalid type input");
    } else {

        $result = $product->save($sku, $name, $price, $type, $attr);
        if ($result) {
            header('location:productlist.php');
            exit();
        } else {
            $logger->error(mysqli_error($con));
        }
    }
}
