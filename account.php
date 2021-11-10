<?php

session_start();

require_once 'Model/database.php';
require_once 'Model/users.php';



if (isset($_SESSION['id'])){
    if ($_SESSION['role'] == "admin"){
        $_SESSION['admin'] = "visible";
    }else{
        $_SESSION['admin'] = "hidden";
    }

    if ($_SESSION['role'] == "builder"){
        $_SESSION['builder'] = "visible";
    } else{
        $_SESSION['builder'] = "hidden";
    }

    if ($_SESSION['role'] == "user"){
        $_SESSION['user'] = "visible";
    }  else{
        $_SESSION['user'] = "hidden";
    }

}

$database = new Database();

$uid = $_SESSION['uid'];
$foundUser = $database->profileUid("$uid");

$foundUser->getName()



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
            <button class="btn btn-success col-2 m-2 ms-auto" type="button" style="visibility: <?php echo $_SESSION['login']?>;">Login</button>
            <button class="btn btn-warning col-2 m-2" type="button" style="visibility: <?php echo $_SESSION['login'] ?>;">Register</button>
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
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">My Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-inline">
    <div class="container" style="visibility: <?php echo $_SESSION['admin']?>;">
    <h1 class="m-5">Welcome</h1>
        <p class="mx-5 mb-5">
            So, what you wanna do today?!
        </p>
    <button type="button" class="btn btn-info col-sm-5 mx-5 my-2">Add a Product</button>
    <button type="button" class="btn btn-info col-sm-5 mx-5 my-2">Edit a product</button>
    <button type="button" class="btn btn-info col-sm-5 mx-5 my-2">Create a template</button>
    </div>
    <div class="container" style="visibility: <?php echo $_SESSION['builder']?>;">
        <h1 class="m-5">Welcome</h1>
        <p class="mx-5 mb-5">
            So, what you wanna do today?!
        </p>
        <button type="button" class="btn btn-info col-sm-5 mx-5 my-2">Create a template</button>
    </div>
</div>
</body>
</html>


