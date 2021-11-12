<?php

session_start();
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
                    <a class="nav-link active" aria-current="page" href="#">Make your PC</a>
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
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2 class="m-3">Select the components of your PC</h2>
            </div>
            <div class="col-sm-4 m-auto">
                <?php
                if (isset($_SESSION['c1']) && isset($_SESSION['c2']) && isset($_SESSION['c3']) && isset($_SESSION['c4']) && isset($_SESSION['c5']) && isset($_SESSION['c6']) && isset($_SESSION['c7']) && isset($_SESSION['c8']) && isset($_SESSION['c9']) ){
                    echo '<button type="button" class="btn btn-success col-sm-6">Share this template!</button>';
                }
                ?>
            </div>
        </div>
        <br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Component</th>
                <th scope="col">Product</th>
                <th colspan="3" scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Processor</th>
                <?php
                if (isset($_SESSION['c1'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="propr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('processor')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Motherboard</th>
                <?php
                if (isset($_SESSION['c2'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="motpr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('motherboard')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">CPU Cooler</th>
                <?php
                if (isset($_SESSION['c3'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="coolpr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('cooler')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Case</th>
                <?php
                if (isset($_SESSION['c4'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="capr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('case')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">GPU</th>
                <?php
                if (isset($_SESSION['c5'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="gpr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('gpu')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">RAM</th>
                <?php
                if (isset($_SESSION['c6'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="rpr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('ram')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Storage</th>
                <?php
                if (isset($_SESSION['c7'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="stopr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('storage')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Power Supply</th>
                <?php
                if (isset($_SESSION['c8'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="pospr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('power')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Monitor</th>
                <?php
                if (isset($_SESSION['c9'])){
                    ?>
                    <td>pr1</td>
                    <td colspan="3">d1</td>
                    <td id="monpr">r1</td>
                    <td><button type="button" class="btn-close" aria-label="Close"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('monitor')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tfoot>
            <tr>
                <th scope="col" colspan="5">Total</th>
                <th scope="col" onload="addition()" id="sum"></th>

                <?php
                if (isset($_SESSION['c1']) && isset($_SESSION['c2']) && isset($_SESSION['c3']) && isset($_SESSION['c4']) && isset($_SESSION['c5']) && isset($_SESSION['c6']) && isset($_SESSION['c7']) && isset($_SESSION['c8']) && isset($_SESSION['c9']) ){
                    echo '<th scope="col"><button type="button" class="btn btn-success">BUY!</button></th>';
                }
                ?>

            </tr>
            </tfoot>
            </tbody>
        </table>
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

    function search(x){

        location.href = 'search-product.php?category=' + x;


    }

    function addition(){
        let propr = document.getElementById("propr").value;
        let motpr = document.getElementById("motpr").value;
        let coolpr = document.getElementById("coolpr").value;
        let capr = document.getElementById("capr").value;
        let gpr = document.getElementById("gpr").value;
        let rpr = document.getElementById("rpr").value;
        let stopr = document.getElementById("stopr").value;
        let pospr = document.getElementById("pospr").value;
        let monpr = document.getElementById("monpr").value;


        document.getElementById("sum").innerHTML = propr + motpr + coolpr + capr + gpr + rpr + stopr + pospr + monpr;


    }





</script>
</body>
</html>


