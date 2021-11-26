<?php

require_once 'database.php';
require_once 'users.php';

class orders
{

    private $id;
    private $user;
    private $orders;
    private $type;


    public function __construct($id, $user, $orders, $type)
    {
        $this->id = $id;
        $this->user = $user;
        $this->orders = $orders;
        $this->type = $type;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }


    public function getOrders()
    {
        return $this->orders;
    }
    public function getType()
    {
        return $this->type;
    }


    public function showOrders(){

        $uid = $this->getUser();
        $oid = $this->getOrders();
        $type = $this->getType();

        $database = new database();

        $username =  $database->findID("$uid");
        $user = $username->getName();

        switch ($type)
        {
            case 'product':

                $orderPro = $database->findProduct("$oid");

                $order = $orderPro->getName();

                break;

            case 'template':

                $orderTemp = $database->findTemplate("$oid");

                $order = 'Template '.$orderTemp->getID();

                break;

        }



        echo '<tr>';
        echo '<td>'.$this->getID().'</td>';
        echo '<td>'.$user.'</td>';
        echo '<td><b>'.$order.'</b></td>';
        echo '</tr>';

    }


}