<?php

require_once '../Model/database.php';
require_once '../Model/templates.php';

$database = new database();

$processor = $_SESSION['c1'];
$motherboard = $_SESSION['c2'];
$cooler = $_SESSION['c3'];
$cpucase = $_SESSION['c4'];
$gpu = $_SESSION['c5'];
$ram = $_SESSION['c6'];
$storage = $_SESSION['c7'];
$power = $_SESSION['c8'];
$monitor = $_SESSION['c9'];


$newTemplate = new templates();