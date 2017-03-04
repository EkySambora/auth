<?php
include_once "config.php";

if(isset($_GET["delete"])){
  $id = $_GET["delete"];
  mysqli_query($link, "DELETE FROM paket WHERE id = '$id' ");
  header("location:../index.php");
}

 ?>
