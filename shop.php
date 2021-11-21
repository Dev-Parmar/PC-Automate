<?php

session_start();
require_once 'Model/database.php';
require_once 'Model/templates.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Welcome</title>

    <link rel="stylesheet" href="css/main.css">

    <style>

        html{
            background-color: #fcf6c5;
        }

        .left{
            float:left;
            position: fixed;
            width: 20%;
            height: 50vh;
            background-color: #00377a;
            color: #fcf6c5;
        }

        .right{
            float:right;
            width:70%;
            min-height: 100vh;
            overflow: hidden;

        }


    </style>

</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo1.png" alt="logo" width="75" height="75" class="d-inline-block align-text-top">
            </a>
            <?php
            if (isset($_SESSION['id'])){
                echo '<button class="btn btn-danger col-2 m-2" type="button" onclick="logout()">Logout</button>';
            }else{
                echo '<button class="btn btn-success col-2 m-2 ms-auto" type="button"  onclick="login()">Login</button>';
                echo '<button class="btn btn-warning col-2 m-2" type="button" onclick="register()">Register</button>';
            }
            ?>
        </div>
    </nav>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="another">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PC Automate</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Make your PC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="templates.php">Templates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account.php">My Account</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="container-inline">
    <div class="left">
        <h2 class="m-3">Filters</h2>
        <form method='POST' action='Controller/filters.php' id='filters' name='filters'>
            <div class="col-sm-8 m-auto">
                <label for="price" class="form-label">-> Price <?php if (isset($_SESSION['pr'])){echo'('.$_SESSION['pr'].')';}?></label>
                <div class="row">
                    <div class="col-sm-2">$0</div>
                    <div class="col-sm-2" style="margin-left: 50%;">$1000</div>
                </div>
                <?php

                if (isset($_SESSION['pr'])){

                    echo '<input type="range" class="form-range" id="price" value="'.$_SESSION['pr'].'" name="price" min="0" max="1000">';

                }else {
                    echo '<input type="range" class="form-range" id="price" name="price" min="0" max="1000">';
                }

                ?>

            </div>
            <div class="col-sm-8 m-auto">
                <label for="category" class="form-label">-> Category <?php if (isset($_SESSION['cat'])){echo'('.$_SESSION['cat'].')';}?></label>
                <select class="form-control" aria-label="category" name="category" id="category">
                    <option value="select" selected>Select...</option>
                    <option value="headphone">Headphones</option>
                    <option value="keyboard">Keyboards</option>
                    <option value="mouse">Mouse</option>
                    <option value="speaker">Speakers</option>
                    <option value="processor">Processor</option>
                    <option value="motherboard">Motherboard</option>
                    <option value="cooler">CPU Cooler</option>
                    <option value="case">Case</option>
                    <option value="gpu">GPU</option>
                    <option value="ram">RAM</option>
                    <option value="storage">Storage</option>
                    <option value="power">Power Supply</option>
                    <option value="monitor">Monitor</option>
                    <option value="os">Operating System</option>
                </select>
            </div>
            <br />
            <div class="col-sm-8 m-auto">
                <button type='submit' class='btn btn-primary' name="submit">Search</button>
                <a href="Controller/reset.php?filter=shop" class="button" style="background-color: white; text-decoration: none;padding:7px; margin-left: 20%;">RESET</a>

            </div>
        </form>


    </div>
    <div class="right">
        <h1 class="m-3">PC Parts</h1>
        <?php


        if (isset($_GET['filter'])){

            $filter = $_GET['filter'];

            switch ($filter){
                case 'withCat':

                    $database = new database();

                    $pr = $_SESSION['pr'];

                    $cat = $_SESSION['cat'];

                    $filterProducts = $database->filterProducts("$pr", "$cat");

                    if ($filterProducts) {
                        foreach ($filterProducts as $pro) {
                            $pro->products();
                        }
                    }else{
                        echo '<h2 class="m-3">No Products Found!</h2>';
                    }
                    break;

                case 'noCat':
                    $pr = $_SESSION['pr'];

                    $database2 = new database();

                    $filterShop = $database2->filterPrice("$pr");

                    if ($filterShop) {
                        foreach ($filterShop as $shop) {
                            $shop->products();
                        }
                    }else{
                        echo '<h2 class="m-3">No Products Found!</h2>';
                    }

                    break;

                case 'onPr' :

                    $pr = $_SESSION['pr'];

                    $database2 = new database();

                    $filterShop = $database2->filterPrice("$pr");

                    if ($filterShop){
                    foreach ($filterShop as $shop)
                    {
                        $shop->products();
                    }
                    }else{
                        echo '<h2 class="m-3">No Products Found!</h2>';
                    }

                    break;

                default :

                    $database1 = new database();
                    $filterShop = $database1->getShop();

                    if ($filterShop) {
                        foreach ($filterShop as $shop) {
                            $shop->products();
                        }
                    }else{
                        echo '<h2 class="m-3">No Products Found!</h2>';
                    }

            }

        }else{
            $database2 = new database();

            $filterSh = $database2->getShop();

            if ($filterSh) {
                foreach ($filterSh as $shop) {
                    $shop->products();
                }
            }else{
                echo '<h1>No Products Found!</h1>';
            }

        }

        ?>
    </div>
</div>



<script>
    function logout(){
        location.href = 'Controller/logout.php';
    }

    function  login(){
        location.href = 'login.php';
    }

    function register(){
        location.href = 'register.php';
    }

    function reset(){
        location.href = 'Controller/reset.php';
    }
</script>
</body>
</html>

