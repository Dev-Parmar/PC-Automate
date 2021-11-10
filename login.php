<?php

session_start();

if (isset($_SESSION['id'])) {
    header("Location: index.php");
}

if (isset($_SESSION['alert'])){
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

    <title>Login</title>

    <link rel="stylesheet" href="css/main.css">

</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo1.png" alt="logo" width="75" height="75" class="d-inline-block align-text-top">
            </a>
            <button class="btn btn-warning col-2 m-2" type="button" onclick="location.href = 'register.php'">Register</button>
        </div>
    </nav>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="another">
    <div class="container-fluid">
        <a class="navbar-brand m-auto" href="#">PC Automate</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="container ">
        <h1 class="login-text my-5">LOGIN</h1>
        <form id='loginForm' action="Controller/log-valid.php" method="POST" onsubmit="validate()">
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" id="email" >
                </div>
            </div><br />
            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div><br />
            <div class="form-group row">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div><br />
            <p class="login-register-text">Don't have an account? <a href="register.php"><u>Register Here</u></a></p>
        </form>
    </div>

<script>
    function validate(){
        let x = document.forms['loginForm']['email'].value;
        let y = document.forms['loginForm']['password'].value;

        if ((x == null || x == "") || (y == null || y == "")){
            alert("Please enter email or password");
            return false;
        }
    }


        function logout(){
        location.href = 'Controller/logout.php';
    }

        function  login(){
        location.href = 'login.php';
    }

        function register(){
        location.href = 'register.php';
    }
</script>

</body>
</html>
