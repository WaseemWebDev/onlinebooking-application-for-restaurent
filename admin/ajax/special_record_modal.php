<?php

include '../config/connection.php';

$id = $_GET["id"];

//$checkIn = $_GET["checkin"];
//$checkOut = $_GET["checkout"];
$data = "";
$query = "update  restaurent_special set orderstatus='delivered' where id='$id' ";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));


if ($result > 0) {
    $data = "Order approved succesfully";
}

echo $data;
?>
