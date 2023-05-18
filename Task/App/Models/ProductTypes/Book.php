<?php

namespace App\Models\ProductTypes;

use App\Models\Product;

class Book extends Product
{

    private $table = "book";
    private $db;
    private $weight;
    private $value;

    public function __construct()
    {
        $this->weight = 0;
        $this->value = "";
        $this->type = "Book";
    }
    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
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
        $value = "Weight : " . strval($this->getWeight()) . " KG";
        return $value;
    }
    public function setValues($data){
        $this->setSku($data['sku']);
        $this->setName($data['name']);
        $this->setPrice($data['price']);
        $this->setType($data['type']);
        $this->setWeight($data['weight']);
        $this->setValue($this->calculateValue());
    }
    public function toArray()
    {
        return array("sku" => $this->getSku(), "name" => $this->getName(),"type" => $this->getType() , "price" => $this->getPrice(),  "value" => $this->getValue());
    }
}
