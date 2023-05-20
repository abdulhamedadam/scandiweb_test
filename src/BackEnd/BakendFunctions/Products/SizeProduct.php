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

    function createSizeProduct($size) {
        $product = new SizeProduct();
        $product->setSize($size);
        return $product;
    }   


}