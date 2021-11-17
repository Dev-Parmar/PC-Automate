<?php


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
    private $price;
    private $comment;

    public function __construct($id, $processor, $motherboard, $cooler, $cpucase, $gpu, $ram, $storage, $power, $monitor,$price, $comment)
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
    public function getPrice()
    {
        return $this->price;
    }

    public function getComment()
    {
        return $this->comment;
    }



    public function printTemplate()
    {

        echo '<div class="card-deck my-3">';
        echo '<div class="card">';
        echo '<div class="row">';
        echo '<div class="card-body col-sm-5">';
        echo '<p class="card-title mx-3">ID: ' . trim($this->getID()) . '</p>';
        echo '<p class="card-text mx-3">Price: '. trim($this->getPrice()) .'</p>';
        echo '<td><button type="button" class="btn btn-success col-sm-4 mx-3">BUY</button></td>';

        echo '<span id="comment"></span>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<br />';

    }

}

