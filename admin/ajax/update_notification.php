<?php

include '../config/connection.php';

try {
    $query = "update restaurent_special set seenstatus='seen' where seenstatus='unseen'";

   mysqli_query($link, $query) or die(mysqli_errno($link));
} catch (Exception $ex) {
    $ex->getTraceAsString();
}