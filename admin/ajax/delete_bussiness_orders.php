<?php

include '../config/connection.php';
$id = $_GET["id"];
$deleteQuery = "delete from bussines_order where id=$id";
$rowaffect = mysqli_query($link, $deleteQuery);
?>

