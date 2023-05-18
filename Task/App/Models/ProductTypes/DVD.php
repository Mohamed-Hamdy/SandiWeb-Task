<?php

namespace App\Models\ProductTypes;
use App\Models\Product;

class DVD extends Product
{

    private const TYPE = "DVD";

    private $size;

    private $value;
    public function __construct()
    {
        $this->size = 0;
        $this->value = "";
        $this->type = "DVD";

    }
    public function getSize()
    {
        return $this->size;
    }


    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getValue()
    {
        return $this->value;
    }


    public function setValue($value)
    {
        $this->value = $value;
    }

    protected function calculateValue(){
        $value = "Size : " . strval($this->getSize()) . " MB";
        return $value;
    }

    public function setValues($data){
        $this->setSku($data['sku']);
        $this->setName($data['name']);
        $this->setPrice($data['price']);
        $this->setType($data['type']);
        $this->setSize($data['size']);
        $this->setValue($this->calculateValue());
    }

    public function toArray()
    {
        return array("sku" => $this->getSku(), "name" => $this->getName(),"type" => $this->getType() , "price" => $this->getPrice(),  "value" => $this->getValue());
    }
}
