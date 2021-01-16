<?php
include '../config/connection.php';

$id = $_GET["id"];
//$checkIn = $_GET["checkin"];
//$checkOut = $_GET["checkout"];
$data = "";
$query = "select checkIn,checkout from tables_orders where  id=$id ";
$result = mysqli_query($link, $query);

$row = mysqli_fetch_assoc($result);


$checkIn = $row["checkIn"];
$checkOut = $row["checkout"];

$data.=" <label>checkin</label>";
$data.="<input type='date'  id='checkin'  value=" . $checkIn . " class='form-control checkin' /> ";
$data.=" <label>checkout</label>";
$data.="<input type='date'  id='checkout' value=" . $checkOut . " class='form-control' />";
$data.="<input type='hidden'  id='hiddens' value=" . $id . " class='form-control' />";

echo $data;
?>
<html>
    <head>

    </head>
    <body>
       
    </body>
</html>


