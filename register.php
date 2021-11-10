<?php

if (isset($_SESSION['uid'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Register</title>

    <link rel="stylesheet" href="css/main.css">

</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/logo1.png" alt="logo" width="75" height="75" class="d-inline-block align-text-top">
            </a>
            <button class="btn btn-warning col-2 m-2" type="button" onclick="location.href = 'login.php'">Login</button>
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
<div class="container">

    <h1 class="login-text my-5 mx-2">Create Account</h1>

    <form action="../Controller/reg-valid.php" method="POST">
        <div class="form-group row m-2">
            <label for="name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" name="email" id="email">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="password" id="password">
            </div>
        </div>
        <div class="form-group row m-2">
            <button type="submit" name="submit" class="btn btn-primary m-2">Register</button>
        </div><br />
    </form>
    <p class="login-register-text m-2">Already have an account? <a href="login.php"><u>Login Here</u></a></p>
</div>


</body>
</html>
