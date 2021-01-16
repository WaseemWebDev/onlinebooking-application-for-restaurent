<?php
include"./config/connection.php";


try {
    $token = $_GET["token"];

    $message = "";


    $query = "update registration set status = 1 where token='$token' ";
    $rowAffected = mysqli_query($link, $query) or die(mysqli_errno($link));

    if ($rowAffected > 0) {
        $message = "your account has been activated successfully now login";
        header("location:login.php?activate_message=$message");
    }
} catch (Exception $ex) {
    $ex->getTraceAsString();
}
?>

