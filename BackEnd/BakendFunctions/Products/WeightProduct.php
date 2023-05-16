<?php
namespace BackEnd\BakendFunctions\Products;
use  BackEnd\BakendFunctions\Product;

class WeightProduct extends Product
{
     
    protected $weight;
    
    public function setWeight($weight) {
        $this->weight = $weight;
    }
    
    public function getAttributes() {
        return 'Weight: ' . $this->weight . 'kg';
    }

    function createWeightProduct($sku, $name, $price, $type, $weight) {
        $product = new WeightProduct();
        $product->setSku($sku);
        $product->setName($name);
        $product->setPrice($price);
        $product->setType($type);
        $product->setWeight($weight);
        return $product;
    }
 
}