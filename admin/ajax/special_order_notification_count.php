<?php

include '../config/connection.php';


$query = " select count(seenstatus) as count  from restaurent_special where seenstatus='unseen' ";

$result = mysqli_query($link, $query) or die(mysqli_errno($link));

$row = mysqli_fetch_assoc($result);

$data = "";
if ($row > 0) {

    $data.="<span class='badge badge-success'>" . $row["count"] . "</span>";
}
echo $data;

