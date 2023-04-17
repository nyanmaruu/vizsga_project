<?php

class Product {
    private $id;
    private $brand;
    private $name;
    private $description;
    private $price;
    private $quantity;
    private $image;
    

    public function __construct($id, $brand, $name, $description, $price, $quantity, $image)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    

}