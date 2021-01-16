<?php

include '../config/connection.php';
try {
    $email = $_POST["email"];
    $message = "";
    $query = "select count(*) as count from registration where email='$email'";
    $result = mysqli_query($link, $query) or die(mysqli_errno($link));
    $row = mysqli_fetch_assoc($result);
    $found = $row["count"];
    if ($found > 0) {
        $message = "record already exist";
    } else {
        
    }
} catch (Exception $ex) {
    $ex->getTraceAsString();
}
echo $message;
