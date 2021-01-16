<?php

include '../config/connection.php';
$sno = 1;
$query = "select * from bussines_order order by id  desc";

$result = mysqli_query($link, $query) or die(mysqli_errno($link));
$data = "";
while ($row = mysqli_fetch_assoc($result)) {
    $thisId = $row["id"];
    $data.="<tr><td>" . $sno++ . "</td>";
    $data.="<td>" . $row["user"] . "</td>";
    $data.="<td>" . $row["email"] . "</td>";
    $data.="<td>" . $row["restaurent_type"] . "</td>";
    $data.="<td>" . $row["phonenumber"] . "</td>";
    $data.="<td>" . $row["persons"] . "</td>";
    $data.="<td>" . $row["checkin"] . "</td>";
    $data.="<td>" . $row["checkout"] . "</td>";
    $data.="<td>" . $row["date"] . "</td>";
     $data.="<td><input type='hidden' id='hidden-id' value='$thisId'/>  </td>";
    $data.="<td ><input type='button' class='btn btn-danger btn-sm' id='delete' name='delete'  value='Delete'/></td>";
     $data.="<td> <button type='button' class='btn btn-success btn-sm ' id='upbtn'  data-toggle='modal' data-target='#myModal'>update</button></td></tr>";
   
}

echo $data;
?>