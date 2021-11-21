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


    public function printProducts(){
        echo '<tr>';
        echo '<td>'.$this->getName().'</td>';
        echo '<td colspan="3">'.$this->getDescription().'</td>';
        echo '<td id="propr"><b>'.$this->getPrice().'</b></td>';
        echo '<td><button type="button" class="btn btn-secondary" onclick="selectProduct('.$this->getID().')">ADD</button></td>';
        echo '</tr>';

    }


    public function addProducts(){
        echo '<td>'.$this->getName().'</td>';
        echo '<td colspan="3">'.$this->getDescription().'</td>';
        echo '<td id="propr"><b>'.$this->getPrice().'</b></td>';
        echo '<td><button type="button" class="btn-close" aria-label="Close"></button></td>';

    }

    public function products()
    {
        echo '<div class="card-deck my-3" style="text-align: center;">';
        echo '<div class="card">';
        echo '<div class="row">';
        echo '<div class="card-body col-sm-5">';
        echo '<h1 class="card-title mx-3">'.$this->getName().'</h1>';
        echo '<img src="images/products/'.$this->getImage().'" class="card-img-top m-3" style="width:450px;height:300px" alt="...">';
        echo '<p class="card-text mx-3">'.$this->getDescription().'</p>';
        echo '<h2 class="card-text mx-3"><b>Price: </b>$'.$this->getPrice().'</h2>';
        echo '<td><button type="button" onclick="cart()" class="btn btn-success col-sm-4 mx-3">BUY</button></td>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<br />';

    }


}