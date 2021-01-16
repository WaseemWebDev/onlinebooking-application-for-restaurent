<?php

include '../config/connection.php';

try {
     $id = $_GET["id"];
   
    $data = "";
    $sql = "select * from comments  where restaurent_id='$id' order by id desc";

    $results = mysqli_query($link, $sql) or die(mysqli_errno($link));

    while ($row = mysqli_fetch_assoc($results)) {
        $data.="<li class = 'media mt-3'>";
        $data.="<a href = '#' class = 'pull-left'>";
        $data.="<img src='https://bootdey.com/img/Content/user_1.jpg' height='60' width='60' alt = 'comment-avatar' style='border-radius: 20px;' class = 'image-popup-fit-width' ></a>";
         
        $data.="<div class = 'media-body ml-2'>";
        $data.="<span class = 'text-muted pull-right'>";
        $data.="<strong class = 'text-success'>@".$row["user_name"]."</strong> ";
        $data.="<small class = 'text-muted'>".$row["date"]."</small></span>";
        $data.="<p >".$row["comment"]."</p></div></li><hr/>";
    }
} catch (Exception $ex) {
     $ex->getTraceAsString();
}
echo $data;
?>