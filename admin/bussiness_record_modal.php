<?php
include './config/connection.php';

$id = $_GET["id"];
//$checkIn = $_GET["checkin"];
//$checkOut = $_GET["checkout"];
$data = "";
$query = "select checkin,checkout from bussines_order where  id=$id ";
$result = mysqli_query($link, $query);

$row = mysqli_fetch_assoc($result);


$checkIn = $row["checkin"];
$checkOut = $row["checkout"];

$data.=" <label>checkin</label>";
$data.="<input type='date'  id='checkin'  value=" . $checkIn . " class='form-control checkin' /> ";
$data.=" <label>checkout</label>";
$data.="<input type='date'  id='checkout' value=" . $checkOut . " class='form-control' />";
$data.="<input type='hidden'  id='hidden' value=" . $id . " class='form-control' />";

echo $data;
?>
<html>
    <head>

    </head>
    <body>
        <?php include './config/jsfooter.php' ?>
        <script>
            $(document).ready(function () {
               

            });
        </script>

    </body>
</html>


