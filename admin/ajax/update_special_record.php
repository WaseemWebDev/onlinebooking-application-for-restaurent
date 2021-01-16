<?php

include '../config/connection.php';

$id = $_GET["id"];
$checkIn = $_GET["checkin"];
$checkOut = $_GET["checkout"];
$data = "";
$query = "update restaurent_special set checkin='$checkIn',checkout='$checkOut' where id='$id'";
$roweffected= mysqli_query($link, $query);

if($roweffected > 0){
    $data="record update successfully";
}

echo $data
?>
