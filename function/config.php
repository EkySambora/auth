<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "kursus";

$link = mysqli_connect($host, $user, $pass, $db);

if(!$link) die(mysqli_error());

 ?>
