<?php

include './config/connection.php';

function getTablesNotification($link) {
    try {
        $data = "";
        $query = "select user_name,booking_date from tables_orders order by id desc  limit 5";

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {

            $data.='<div class="dropdown-divider"></div>';
            $data.="<a class='dropdown-item' href='table_orders.php'><h5 style='display:inline;'>" . substr($row["user_name"], 0, 8) . "</h5>&nbsp;&nbsp;<p style='display:inline;color:green;'>has placed new order</p> </a>";
            $data.="<center><p style='color:black;'>" . $row["booking_date"] . "</p></center>";
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    return $data;
}

?>