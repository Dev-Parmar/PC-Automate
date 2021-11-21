<?php

require_once "database.php";
require_once "users.php";
require_once "products.php";
require_once "templates.php";

class templates
{
    private $id;
    private $processor;
    private $motherboard;
    private $cooler;
    private $cpucase;
    private $gpu;
    private $ram;
    private $storage;
    private $power;
    private $monitor;
    private $os;
    private $price;
    private $comment;

    public function __construct($id, $processor, $motherboard, $cooler, $cpucase, $gpu, $ram, $storage, $power, $monitor,$os,$price, $comment)
    {
        $this->id = $id;
        $this->processor = $processor;
        $this->motherboard = $motherboard;
        $this->cooler = $cooler;
        $this->cpucase = $cpucase;
        $this->gpu = $gpu;
        $this->ram = $ram;
        $this->storage = $storage;
        $this->power = $power;
        $this->monitor = $monitor;
        $this->os = $os;
        $this->price = $price;
        $this->comment = $comment;
    }


    public function getID()
    {
        return $this->id;
    }
    public function getProcessor()
    {
        return $this->processor;
    }
    public function getMotherboard()
    {
        return $this->motherboard;
    }
    public function getCooler()
    {
        return $this->cooler;
    }
    public function getCPUCase()
    {
        return $this->cpucase;
    }
    public function getGPU()
    {
        return $this->gpu;
    }
    public function getRAM()
    {
        return $this->ram;
    }
    public function getStorage()
    {
        return $this->storage;
    }
    public function getPower()
    {
        return $this->power;
    }
    public function getMonitor()
    {
        return $this->monitor;
    }
    public function getOS()
    {
        return$this->os;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getComment()
    {
        return $this->comment;
    }



    public function printTemplate($sid)
    {

        $database = new database();

        $processor = $database->getName($this->getProcessor());
        $motherboard = $database->getName($this->getMotherboard());
        $cooler = $database->getName($this->getCooler());
        $case = $database->getName($this->getCPUCase());
        $gpu = $database->getName($this->getGPU());
        $ram = $database->getName($this->getRAM());
        $storage = $database->getName($this->getStorage());
        $power = $database->getName($this->getPower());
        $monitor = $database->getName($this->getMonitor());
        $os = $database->getName($this->getOS());


        echo '<div class="card-deck my-3" >';
        echo '<div class="card">';
        echo '<div class="row">';
        echo '<div class="card-body col-sm-5">';
        echo '<h1 class="card-title mx-3" style="text-align: center;">PC Build: '.$this->getID().'</h1>';
        echo '<ul class="card-list">';
        echo '<li class="card-list"><b>Processor: </b>'.$processor .'</li>';
        echo '<li class="card-list"><b>Motherboard: </b>'.$motherboard.'</li>';
        echo '<li class="card-list"><b>CPU Cooler: </b>'.$cooler.'</li>';
        echo '<li class="card-list"><b>CPU Case: </b>'.$case.'</li>';
        echo '<li class="card-list"><b>GPU: </b>'.$gpu.'</li>';
        echo '<li class="card-list"><b>RAM: </b>'.$ram.'</li>';
        echo '<li class="card-list"><b>Storage: </b>'.$storage.'</li>';
        echo '<li class="card-list"><b>Power Supply: </b>'.$power.'</li>';
        echo '<li class="card-list"><b>Monitor: </b>'.$monitor.'</li>';
        echo '<li class="card-list"><b>Operating System: </b>'.$os.'</li></ul>';
        echo '<h2 class="card-text mx-3">Price: $'. trim($this->getPrice()) .'</h2>';
        echo '<td><button type="button" class="btn btn-success col-sm-4 mx-3" style="text-align: center;">BUY</button></td>';
        if ($sid == 1){
            echo '<form class="d-flex p-3" method="post" action="Controller/add-comment.php?tid='.$this->getID().'">';
            echo '<input class="form-control" name="comment" type="text" placeholder="'.trim($this->getComment()).'" aria-label="Comment">';
            echo '<button class="btn btn-outline-success" type="submit" name="submit" >Comment</button>';
            echo '</form>';

        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<br />';


    }

}

