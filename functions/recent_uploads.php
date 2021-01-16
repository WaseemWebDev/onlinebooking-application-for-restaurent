<?php

include './config/connection.php';

;

function recentUploads($link) {
    $query = "select * from restaurents order by id desc  ";
    $result = mysqli_query($link, $query) or die(mysqli_errno($link));
    $data = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $image = $row["image"];
        $data.="<div class='col-lg-3 col-xl-2 col-md-4   mb-5  '>";

        $data.="<a href='get_restaurents.php?id=".$id."'><img src='admin/" . $row["image"] . "' class='img-fluid rounded dynamic-image' style='width: 100%;  height: 220px; ' /></a><br/>";

        $data.="<i class='fas fa-map-marker-alt' style='color:blue;'></i> <span>" . $row["location"] . " </span>";
        $data.='<ul class="list-unstyled list-inline rating   mt-3">';
        $data.="<p class='font-weight-bold m-0 name ' style='margin-top: -15px !important;  '> " . $row["name"] . "</p>";
        $data.="<p class='font-weight-bold m-0 name '  style='color:red;'> Rs " . $row["price"] . "</p>";


        $data.="</div>";
    }


    echo $data;
}
function recentTablesUploads($link) {
    $query = "select * from tables order by id desc  ";
    $result = mysqli_query($link, $query) or die(mysqli_errno($link));
    $data = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $image = $row["image"];
        $data.="<div class='col-lg-3 col-xl-2 col-md-4   mb-5  '>";

        $data.="<a href='get_tables.php?id=".$id."'><img src='admin/" . $row["image"] . "' class='img-fluid rounded dynamic-image' style='width: 100%;  height: 220px; ' /></a><br/>";

        $data.="<i class='fas fa-map-marker-alt' style='color:blue;'></i> <span>" . $row["location"] . " </span>";
        $data.='<ul class="list-unstyled list-inline rating   mt-3">';
        $data.="<p class='font-weight-bold m-0 name ' style='margin-top: -15px !important;  '> " . $row["name"] . "</p>";
        $data.="<p class='font-weight-bold m-0 name '  style='color:red;'> Rs " . $row["price"] . "</p>";


        $data.="</div>";
    }


    echo $data;
}

?>