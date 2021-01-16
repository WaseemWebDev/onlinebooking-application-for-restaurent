<?php

include '../config/connection.php';

try {
    $checkIn = $_POST["checkin"];
    $date = $_POST["date"];
    $message = "";
    $sql = "select booking_date,checkin from tables_orders where checkin='$checkIn' and booking_date='$date'";

    $results = mysqli_query($link, $sql) or die(mysqli_errno($link));

    $data = mysqli_fetch_assoc($results);
    if ($data > 0) {
        $message = "Check in date has been already reserved";
    } else {
        $message = "";
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
echo $message;
?>