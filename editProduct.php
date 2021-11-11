<?php

session_start();

require_once 'Model/database.php';
require_once 'Model/products.php';

if (isset($_SESSION['alert'])) {
    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
}

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

<div class="container">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="editProduct" method="POST" onsubmit="return validate()">
        <div class="form-group row m-5">
            <label for="pid" class="col-sm-4 m-auto">Enter the id of product you want to edit</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="pid" id="pid">
            </div>
            <div class="col-sm-3">
                <button type="submit" name="submit" class="btn btn-primary">Edit!</button>
            </div><br />
        </div>
    </form>

    <?php

    if (isset($_POST['submit'])){
        $pid = $_POST['pid'] ;

        $_SESSION['pid'] = $pid;

        $database = new database();

        $foundProduct = $database->findProduct("$pid");

        if (!(empty($foundProduct))) {
            $name = $foundProduct->getName();
            $image = $foundProduct->getImage();
            $description = $foundProduct->getDescription();
            $price = $foundProduct->getPrice();

            echo '<div class="card mb-3 m-auto" style="max-width: 1000px;">';
            echo '<div class="row g-0">';
            echo '<div class="col-md-4 m-auto p-2">';
            echo '<img src="images/products/'.$image.'" class="img-fluid rounded-start" alt="product image">';
            echo '</div>';
            echo '<div class="col-md-8">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title px-auto">Product Found!</h5>';
            ?>
            <form class="card-text" id="updateProduct" action="Controller/edit-product.php" method="POST">
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" value="<?= $name?>">
                    </div>
                </div><br />
                <div class="form-group row">
                    <label for="description" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="description" name="description" rows="3"> <?= $description?></textarea>
                    </div>
                </div><br />
                <div class="form-group row">
                <label for="category" class="col-sm-4 col-form-label">Category</label>
                <div class="col-sm-8">
                    <select class="form-control" aria-label="category" name="category" id="category">
                        <option value="headphone" selected>Headphones</option>
                        <option value="keyboard">Keyboards</option>
                        <option value="mouse">Mouse</option>
                        <option value="speaker">Speakers</option>
                    </select>
                </div>
                </div><br />
                <div class="form-group row">
                    <label for="price" class="col-sm-4 col-form-label">Price</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="price" id="price" value="<?= $price?>">
                    </div>
                </div><br />
                <div class="form-group row">
                    <button type="submit" name="submit" class="btn btn-primary">Update!</button>
                </div><br />
            </form>
<?php
}else{
    echo '<h1>No product found</h1>';
}
}
?>

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


    function validate(){
        let a = document.forms['editProduct']['pid'].value;

        if (a == "" || a == null) {
            alert("Please enter an id to search the product!");
            return false;
        }

    }


</body>
    </html>