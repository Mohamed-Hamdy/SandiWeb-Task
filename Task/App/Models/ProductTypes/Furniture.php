<?php

namespace App\Models\ProductTypes;

use App\Models\Product;

class Furniture extends Product
{

    private const TYPE = "Furniture";

    private $height;
    private $width;
    private $length;
    private $value;
    public function __construct()
    {
        $this->height = 0;
        $this->width = 0;
        $this->length = 0;
        $this->value = "";
        $this->type = "Furniture";

    }
    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }
    public function getValue()
    {
        return $this->value;
    }


    public function setValue($value)
    {
        $this->value = $value;
    }

    protected function calculateValue()
    {
        $value = "Dimensions : " . $this->getWidth() . "x" . $this->getHeight() . "x" . $this->getLength() . " CM";
        return $value;
    }

    public function setValues($data){
        $this->setSku($data['sku']);
        $this->setName($data['name']);
        $this->setPrice($data['price']);
        $this->setType($data['type']);
        $this->setHeight($data['height']);
        $this->setWidth($data['width']);
        $this->setLength($data['length']);
        $this->setValue($this->calculateValue());
    }
    
    public function toArray()
    {
        return array("sku" => $this->getSku(), "name" => $this->getName(),"type" => $this->getType() , "price" => $this->getPrice(),  "value" => $this->getValue());
    }
}
