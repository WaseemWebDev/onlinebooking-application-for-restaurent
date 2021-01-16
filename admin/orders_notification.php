<?php

include './config/connection.php';

function getNotification($link) {
    try {
        $data = "";
        $query = "select name,booking_date from restaurent_special order by id desc  limit 5";

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {

            $data.='<div class="dropdown-divider"></div>';
            $data.="<a class='dropdown-item' href='restaurent_special_orders.php'><h5 style='display:inline;'>" . substr($row["name"], 0,8) . "</h5>&nbsp;&nbsp;<p style='display:inline;color:green;'>has placed new order</p> </a>";
            $data.="<center><p style='color:black;'>" . $row["booking_date"] . "</p></center>";
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    return $data;
}

?>