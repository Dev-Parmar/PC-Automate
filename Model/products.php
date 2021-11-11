<?php

class products
{

    private $id;
    private $name;
    private $image;
    private $description;
    private $category;
    private $price;

    public function __construct($id, $name, $image, $description, $category,$price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->category = $category;
        $this->price = $price;
    }


    public function getID()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getPrice()
    {
        return $this->price;
    }




}