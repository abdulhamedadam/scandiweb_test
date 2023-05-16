<?php
namespace processform;

require './autoLoad/autoloadProducts.php';

 use BackEnd\BakendFunctions\FileLogger;
 use BackEnd\BakendFunctions\Products\WeightProduct;
 use BackEnd\BakendFunctions\Products\SizeProduct;
 use BackEnd\BakendFunctions\Products\DimensionProduct;

$error = false;
$sku_unique_message = "";
$sku_validate_message = "";
$logger = new FileLogger();


$error = false;
$sku_unique_message = "";
$sku_validate_message = "";

if (isset($_POST['submit']))
{

// Retrieve the form data

$sku=($_POST['sku']);
$name=($_POST['name']) ;
$price=($_POST['price']);
$type=($_POST['productType']);

$productClasses = [
    'DVD' => SizeProduct::class,
    'Book' => WeightProduct::class,
    'Furniture' => DimensionProduct::class,
    // Add more mappings for other product types
];


if (array_key_exists($type, $productClasses)) {
    $productClass = $productClasses[$type];
    $product = new $productClass();

    if ($product instanceof SizeProduct) {
        $size=$product->setSize( $_POST['size']);
        $product->createSizeProduct($sku, $name, $price, $type, $size);

    } elseif ($product instanceof WeightProduct) {
        $product = new WeightProduct();
        $weight=$product->setWeight( $_POST['weight']);
        $product->createWeightProduct($sku, $name, $price, $type, $weight);
    } else {
        $product = new DimensionProduct();
        $height=$product->setHeight( $_POST['height']);
        $width=$product->setWidth( $_POST['width']);
        $length=$product->setLength( $_POST['length']);
        $product->createDimensionProduct($sku, $name, $price, $type, $height,$width,$length);
    }
} 

$attr = $product->getAttributes();

if (!$product->validateSKU($sku))
{
    echo 'Invalid sku input ';
}
elseif (!$product->isUniqueSKU($sku)) 
{
    echo 'SKU has been used before';
    $error_message = "SKU has been used before";
    "<script>document.getElementById('sku-field').querySelector('#sku-error').innerHTML = '$error_message';</script>";
   
   
}
elseif (!$product->validateName($name))
{
    $logger->error("Invalid name input");
} 

elseif (!$product->validatePrice($price)) 
{
    $logger->error("Invalid price input");
}
 elseif (!$product->validateType($type)) 
{
    $logger->error("Invalid type input");
}
else{


$result = $product->save($sku, $name, $price,$type,$attr);


 if($result)   
    {
        header('location:productlist.php');
        exit();
    }
	else
	{
        $logger->error(mysqli_error($con));
    }
}
    
}




?>