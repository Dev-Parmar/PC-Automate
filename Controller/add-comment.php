<?php

session_start();
require_once '../Model/database.php';
require_once '../Model/products.php';
require_once '../Model/templates.php';

if (isset($_POST['submit'])) {
    $tid = $_GET['tid'];
    $comment = $_POST['comment'];
    $uid = $_SESSION['id'];

    $database = new database();

    $who = array();
    $empty = array();

    $whocom = $database->getWhocom($tid);
    $show = $database->getComment($tid);

    array_push($who, "$whocom", "$uid");
    array_push($empty, "$show", "$comment");

    $newWhocom = implode(";", $who);
    $newComment = implode(";", $empty);


    $addWho = $database->addWhocom($newWhocom, $tid);
    $addComment = $database->addComment($newComment, $tid);

    header("Location: ../View/etemplates.php");
}
