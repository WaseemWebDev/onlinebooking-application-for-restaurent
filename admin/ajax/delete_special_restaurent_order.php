<?php

include '../config/connection.php';
$id = $_GET["id"];
$deleteQuery = "delete from restaurent_special where id=$id";
$rowaffect = mysqli_query($link, $deleteQuery);
?>

