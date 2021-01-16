<?php

include '../config/connection.php';
session_start();


$user = $_SESSION["email_id"];
try {

    $id = $_POST["id"];


    $value = $_POST["rating_value"];
    $message = "";
    $ratingfirst = 1;

    $query = "select * from rating where restaurents_id ='$id'";
    $result = mysqli_query($link, $query) or die(mysqli_errno($link));
    $row = mysqli_fetch_assoc($result);
    $restId = $row["id"];

    if ($row > 0) {
        $queryCheck = "select * from `check_restaurent_rating` where `user`='$user' and `restaurent_id`='$id'";
        $rowAffected2 = mysqli_query($link, $queryCheck) or die(mysqli_errno($link));
        $resultSet = mysqli_fetch_assoc($rowAffected2);
        if ($resultSet > 0) {
            $message = "you have already rated";
        } else {
            $insertToAnotherTable = "insert into check_restaurent_rating(`restaurent_id`,`user`) values('$id','$user')";
            $results = mysqli_query($link, $insertToAnotherTable) or die(mysqli_errno($link));
            if ($results > 0) {
                $query = "update rating set  totalvalue=totalvalue+$value,ratings=ratings+1 where id ='$restId';";
                $success = mysqli_query($link, $query) or die(mysqli_error($link));

                if ($success > 0) {
                    $message = "data updated successfully";
                }
            }
        }
    } else {

        $query2 = "insert into rating(`totalvalue`,`ratings`,`restaurents_id`,`user`) values('$value','$ratingfirst','$id','$user')";
        $rowAffected = mysqli_query($link, $query2) or die(mysqli_errno($link));

        if ($rowAffected > 0) {
            $update = "update restaurents set  status='review' where id ='$id'";
            mysqli_query($link, $update) or die(mysqli_error($link));
            $message = "data has been inserted";
        }
    }
} catch (Exception $ex) {
    $ex->getTraceAsString();
}
echo $message;


