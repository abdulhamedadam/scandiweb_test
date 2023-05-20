<?php
namespace BackEnd\BakendFunctions\Products;
use  BackEnd\BakendFunctions\Product;

class DimensionProduct extends Product
{
    protected $height;
    protected $width;
    protected $length;
    
    public function setdimension($height,$width,$length) {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function getAttributes() {
        return 'Dimension: ' . $this->height . 'x' . $this->width . 'x' . $this->length;
    }

    function createDimensionProduct( $height, $width, $length) {
        $product = new DimensionProduct();
        $product->setdimension($height,$width,$length);

        return $product;
    }
}