<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "onlinebooking";
$link = mysqli_connect($host, $user, $password, $database);
//mysqli_autocommit($link, FALSE);

if (!$link){
    echo "database connection failed";
}
