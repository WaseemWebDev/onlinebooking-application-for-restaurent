<?php

include '../config/connection.php';

try {
    $query = "update tables_orders set seenstatus='seen' where seenstatus='unseen'";

   mysqli_query($link, $query) or die(mysqli_errno($link));
} catch (Exception $ex) {
    $ex->getTraceAsString();
}