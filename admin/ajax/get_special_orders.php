<?php

include '../config/connection.php';
$sno = 1;
$query = "select * from restaurent_special order by id  desc";

$result = mysqli_query($link, $query) or die(mysqli_errno($link));
$data = "";
while ($row = mysqli_fetch_assoc($result)) {
    $thisId = $row["id"];
    $image = $row["image"];
    $data.="<tr><td>" . $sno++ . "</td>";
    $data.="<td>" . $row["restaurent_name"] . "</td>";
    $data.="<td><img src='" . $image . "' height='60' width='80' /></td>";
    $data.="<td>" . $row["name"] . "</td>";
    $data.="<td>" . $row["phone_number"] . "</td>";
    $data.="<td>" . $row["persons"] . "</td>";
    $data.="<td></td>";
    $data.="<td>" . $row["checkout"] . "</td>";
    $data.="<td>" . $row["booking_date"] . "</td>";
    $data.="<td><input type='hidden' id='hidden-id' value='$thisId'/>  </td>";
    $data.="<td ><input class='btn btn-danger btn-sm' name='delete' id='delete' type='button' value='Delete'/></td>";
    $data.="<td> <button type='button' class='btn btn-primary btn-sm ' id='upbtn'  >delivered</button></td></tr>";
}

echo $data;
?>