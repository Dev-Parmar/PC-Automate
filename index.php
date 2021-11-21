<?php

session_start();

unset($_SESSION['pr']);
unset($_SESSION['cat']);
unset($_SESSION['temPr']);

require_once 'Model/database.php';
require_once 'Model/products.php';
require_once 'Model/templates.php';
require_once 'Model/users.php';

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

</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
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
        <a class="navbar-brand" href="#">PC Automate</a>
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
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account.php">My Account</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="container-inline">
    <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/active1.jpg" class="d-block w-100" alt="custom pc">
                <div id="textCarousel">
                    <h1><u>Make your PC</u></h1>
                    <p>Building your own PC is a rewarding experience.<br><br> With our new approach, we'll help you to be sure that the compatibility of your selected PC parts is just right.</p>
                    <br>
                    <button type="button" class="btn btn-danger" onclick="location.href='create.php'">Create PC</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/gpu1.jpg" class="d-block w-100" alt="gpu">
                <div id="textCarousel2">
                    <h1><u>Take a look at custom PCs</u></h1>
                    <p>Our partners have already build custom PCs for you to choose from and have a better idea about the latest technology and compatibility.</p>
                    <button type="button" class="btn btn-danger" onclick="location.href='templates.php'">Explore</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/processor1.jpg" class="d-block w-100" alt="processor">
                <div id="textCarousel3">
                    <h1><u>MarketPlace</u></h1>
                    <p>We also sell peripherals to make complete the PC set. Visit our shop for checking the new stuff.</p>
                    <button type="button" class="btn btn-danger" onclick="location.href='shop.php'">Shop</button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-inline" style="background-color: #00377a">
        <h1 id="cusPC">Latest Shared Customized PCs</h1>
        <div class="row m-auto p-5" style="max-width: 100%;">
            <?php

            $database = new database();

            $get3Templates = $database->get3Templates();

            foreach ($get3Templates as $temp){
                $temp->print3Templates();
            }
            ?>
        </div>
    </div>
    <div class="container-inline m-auto" style="background-color: #fcf6c5;">
        <h1 id="per">Peripherals</h1>
        <div class="row p-5" style="max-width: 100%;">
            <button type="button" onclick="headphone()" class="btn btn-outline-secondary col-md-5 m-5 p-3 my-5">Headphones</button>
            <button type="button" onclick="keyboard()" class="btn btn-outline-secondary col-md-5 m-5 p-3 my-5">Keyboards</button>
            <button type="button" onclick="mouse()" class="btn btn-outline-secondary col-md-5 m-5 p-3 my-5">Mouse</button>
            <button type="button" onclick="speaker()" class="btn btn-outline-secondary col-md-5 m-5 p-3 my-5">Speakers</button>
        </div>
    </div>
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
    function headphone(){
        location.href = 'Controller/homepage-filter.php?cat=headphone';
    }
    function keyboard(){
        location.href = 'Controller/homepage-filter.php?cat=keyboard';
    }
    function mouse(){
        location.href = 'Controller/homepage-filter.php?cat=mouse';
    }
    function speaker(){
        location.href = 'Controller/homepage-filter.php?cat=speaker';
    }
    function cart(){
        location.href = 'cart.php';
    }
</script>
</body>
</html>