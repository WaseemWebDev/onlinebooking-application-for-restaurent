<?php

include '../config/connection.php';
session_start();

$id = $_GET["id"];
$comment = $_GET["comment"];
$user = $_SESSION["email_id"];
$date =  date("Y/m/d");


$query = "insert into comments(`comment`,`user_name`,`restaurent_id`,`date`) values('$comment','$user','$id', CAST('". $date ."' AS DATE))";

$rowAffected = mysqli_query($link, $query) or die(mysqli_errno($link));

if ($rowAffected > 0) {
    $message = "Comment inserted";
}
echo $message
?>
