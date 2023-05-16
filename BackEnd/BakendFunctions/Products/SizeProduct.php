<?php
namespace BackEnd\BakendFunctions\Products;
use  BackEnd\BakendFunctions\Product;

class SizeProduct extends Product
{
    protected $size;
    
    public function setSize($size) {
        $this->size = $size;
    }
    
    public function getAttributes() {
        return 'Size: ' . $this->size . 'MB';
    }

    function createSizeProduct($sku, $name, $price, $type, $size) {
        $product = new SizeProduct();
        $product->setSku($sku);
        $product->setName($name);
        $product->setPrice($price);
        $product->setType($type);
        $product->setSize($size);
        return $product;
    }   


}