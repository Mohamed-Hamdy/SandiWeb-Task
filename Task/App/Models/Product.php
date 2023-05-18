<?php

namespace App\Models;


abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;



    abstract protected function calculateValue();
    abstract public function toArray();
    abstract public function setValues($data);
    
    public function __construct()
    {
        $this->sku = "";
        $this->name = "";
        $this->price = 0;
        $this->type = "";
    }

    public function getId()
    {
        return $this->id;
    }
    public function getSku()
    {
        return $this->sku;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setSku($sku)
    {
        $this->sku = $sku;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
}
