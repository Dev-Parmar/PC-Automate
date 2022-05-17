<?php

session_start();

if (isset($_SESSION['id'])) {
    header("Location: index.php");
}

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

    <title>Register</title>

    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/logo1.png" alt="logo" width="75" height="75" class="d-inline-block align-text-top">
                </a>
                <button class="btn btn-warning col-2 m-2" type="button" onclick="location.href = 'login.php'">Login</button>
            </div>
        </nav>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="another">
        <div class="container-fluid">
            <a class="navbar-brand m-auto" href="../index.php">PC Automate</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container">

        <h1 class="login-text my-5 mx-2">Create Account</h1>

        <form action="../Controller/reg-valid.php" method="POST" id="registerForm">
            <div class="form-group row m-2">
                <label for="name" class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="cnumber" class="col-sm-4 col-form-label">Card Number</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="cnumber" id="cnumber" required>
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="emonth" class="col-sm-4 col-form-label">Expiry Month</label>
                <div class="col-sm-8">
                    <select class="form-select" id="emonth" name="emonth" required>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="eyear" class="col-sm-4 col-form-label">Expiry Year</label>
                <div class="col-sm-8">
                    <select class="form-select" id="eyear" name="eyear" required>
                        <option value="2021" selected>2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                    </select>
                </div>
            </div>
            <div class="form-group row m-2">
                <label for="cvv" class="col-sm-4 col-form-label">CVV</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="cvv" id="cvv" required>
                </div>
            </div>
            <div class="form-group row m-2">
                <button type="submit" name="submit" class="btn btn-primary m-2">Register</button>
            </div><br />
        </form>
        <p class="login-register-text m-2">Already have an account? <a href="login.php"><u>Login Here</u></a></p>
    </div>

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
    </script>


</body>

</html>