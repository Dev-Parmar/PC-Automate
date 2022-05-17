<?php
session_start();

require_once '../Model/database.php';
require_once '../Model/products.php';

$category = $_GET['category'];


$database = new database();

$searchP = $database->searchProducts("$category");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Products</title>

    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/logo1.png" alt="logo" width="75" height="75" class="d-inline-block align-text-top">
                </a>
                <?php
                if (isset($_SESSION['id'])) {
                    echo '<button class="btn btn-danger col-2 m-2" type="button" onclick="logout()">Logout</button>';
                } else {
                    echo '<button class="btn btn-success col-2 m-2 ms-auto" type="button"  onclick="login()">Login</button>';
                    echo '<button class="btn btn-warning col-2 m-2" type="button" onclick="register()">Register</button>';
                }
                ?>
            </div>
        </nav>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="another">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">PC Automate</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Make your PC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="etemplates.php">Templates</a>
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

        <?php

        if (!(empty($searchP))) {
        ?>

            <h1 class="m-3">Available products</h1>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th colspan="3" scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    foreach ($searchP as $products) {
                        $products->printProducts();
                    }
                    ?>
                </tbody>
            </table>
    </div>


<?php
        } else {

            echo ' <h1 class="m-3">Sorry, No products in stock!</h1>';
        }
?>



<script>
    function logout() {
        location.href = '../Controller/logout.php';
    }

    function login() {
        location.href = 'login.php';
    }

    function register() {
        location.href = 'register.php';
    }

    function selectProduct(pid) {

        location.href = '../Controller/add-component.php?id=' + pid;
    }
</script>

</body>

</html>