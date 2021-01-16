<?php

include '../config/connection.php';
$id = $_GET["id"];
$deleteQuery = "delete from tables_orders where id=$id";
$rowaffect = mysqli_query($link, $deleteQuery);
?>

