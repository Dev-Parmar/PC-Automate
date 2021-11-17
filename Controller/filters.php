<?php


if (isset($_POST['submit'])){

    $price = $_POST['price'];

    $category = $_POST['category'];

    $database = new database();

    $filterProducts = $database->filterProducts("$price", "$category");

    var_dump($filterProducts);


}