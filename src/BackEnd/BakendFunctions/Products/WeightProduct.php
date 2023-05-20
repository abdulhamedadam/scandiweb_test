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

    function createWeightProduct($weight) {
        $product = new WeightProduct();
        $product->setWeight($weight);
        return $product;
    }
 
}