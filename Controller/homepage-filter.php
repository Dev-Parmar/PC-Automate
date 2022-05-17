<?php

session_start();
unset($_SESSION['pr']);
unset($_SESSION['cat']);

require_once "../Model/database.php";
require_once "../Model/users.php";
require_once "../Model/products.php";
require_once "../Model/templates.php";

$category = $_GET['cat'];

echo $category;

switch ($category) {

    case 'headphone':

        $_SESSION['pr'] = 1000;

        $_SESSION['cat'] = 'headphone';


        header("Location: ../View/shop.php?filter=withCat");

        break;

    case 'keyboard':

        $_SESSION['pr'] = 1000;

        $_SESSION['cat'] = 'keyboard';

        header("Location: ../View/shop.php?filter=withCat");

        break;

    case 'mouse':

        $_SESSION['pr'] = 1000;

        $_SESSION['cat'] = 'mouse';

        header("Location: ../View/shop.php?filter=withCat");

        break;


    case 'speaker':


        $_SESSION['pr'] = 1000;

        $_SESSION['cat'] = 'speaker';

        header("Location: ../View/shop.php?filter=withCat");

        break;
}
