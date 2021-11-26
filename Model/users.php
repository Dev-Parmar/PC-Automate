<?php

class users
{

    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $cnumber;
    private $emonth;
    private $eyear;
    private $cvv;


    public function __construct($id, $name, $email, $password, $role, $cnumber, $emonth, $eyear, $cvv)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->cnumber = $cnumber;
        $this->emonth = $emonth;
        $this->eyear = $eyear;
        $this->cvv = $cvv;

    }

    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function getRole()
    {
        return $this->role;
    }

    public function getCNumber()
    {
        return $this->cnumber;
    }
    public function getEMonth()
    {
        return $this->emonth;
    }
    public function getEYear()
    {
        return $this->eyear;
    }
    public function getCVV()
    {
        return $this->cvv;
    }


}