<?php

require_once '../Model/database.php';
require_once '../Model/products.php';
require_once '../Model/templates.php';

if (isset($_POST['submit'])) {
    $tid = $_GET['tid'];
    $comment = $_POST['comment'];


    $database = new database();


    $empty = array();

    $show = $database->getComment($tid);

    array_push($empty, "$show", "$comment");

    $newComment = implode(";", $empty);

   $addComment = $database->addComment($newComment, $tid);

   header("Location: ../templates.php");

}