<?php

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

    public function __construct($id, $processor, $motherboard, $cooler, $cpucase, $gpu, $ram, $storage, $power, $monitor,$price)
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


}