<?php
namespace BackEnd\BakendFunctions\ProductMappings;
use BackEnd\BakendFunctions\Products\WeightProduct;
use BackEnd\BakendFunctions\Products\SizeProduct;
use BackEnd\BakendFunctions\Products\DimensionProduct;





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

