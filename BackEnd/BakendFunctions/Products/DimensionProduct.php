<?php
namespace BackEnd\BakendFunctions\Products;
use  BackEnd\BakendFunctions\Product;

class DimensionProduct extends Product
{
    protected $height;
    protected $width;
    protected $length;
    
    public function setHeight($height) {
        $this->height = $height;
    }
    
    public function setWidth($width) {
        $this->width = $width;
    }
    
    public function setLength($length) {
        $this->length = $length;
    }
    
    public function getAttributes() {
        return 'Dimension: ' . $this->height . 'x' . $this->width . 'x' . $this->length;
    }

    function createDimensionProduct($sku, $name, $price, $type, $height, $width, $length) {
        $product = new DimensionProduct();
        $product->setSku($sku);
        $product->setName($name);
        $product->setPrice($price);
        $product->setType($type);
        $product->setHeight($height);
        $product->setWidth($width);
        $product->setLength($length);
        return $product;
    }
}