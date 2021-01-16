<?php

include '../config/connection.php';

session_start();

try {
    $userEmail = $_SESSION["email_id"];
    $id = $_POST["id"];

    $value = $_POST["rating_value"];
    $message = "";
    $ratingfirst = 1;

    $query = "select * from tables_rating where tables_id ='$id'";
    $result = mysqli_query($link, $query) or die(mysqli_errno($link));
    $row = mysqli_fetch_assoc($result);
    $tablesId = $row["id"];
    if ($row > 0) {
        $query2 = "select * from check_rating where `user`='$userEmail' and `table_id`='$id'";
        $rowAffected2 = mysqli_query($link, $query2) or die(mysqli_errno($link));
        $resultSet = mysqli_fetch_assoc($rowAffected2);

        if ($resultSet > 0) {
            $message = "you have already rated";
        } else {
            $queryCheck = "insert into check_rating(`table_id`,`user`) values('$id','$userEmail')";
            $results = mysqli_query($link, $queryCheck) or die(mysqli_errno($link));

            if ($results > 0) {
                $updateQuery = "update tables_rating set  totalvalue=totalvalue+$value, ratings=ratings+1 where id ='$tablesId';";
                $success = mysqli_query($link, $updateQuery) or die(mysqli_error($link));

                if ($success > 0) {
                    $message = "data updated successfully";
                }
            }
        }
    } else {
        $query2 = "insert into tables_rating(`totalvalue`,`ratings`,`tables_id`,`user`) values('$value','$ratingfirst','$id','$userEmail')";
        $rowAffected = mysqli_query($link, $query2) or die(mysqli_errno($link));

        if ($rowAffected > 0) {
            $query3 = "update tables set  status='review' where id ='$id'";
            mysqli_query($link, $query3) or die(mysqli_error($link));
            $message = "data has been inserted";
        }
    }
} catch (Exception $ex) {
    $ex->getTraceAsString();
}
echo $message;


