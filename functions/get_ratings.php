
<?php

function getRatings($link, $id) {
    
    $data = "";
    $query2 = "select ratings,FORMAT ((totalvalue/ratings),1) as average_rating from rating where restaurents_id='$id'";
    $resultset = mysqli_query($link, $query2) or die(mysqli_errno($link));


    while ($row2 = mysqli_fetch_assoc($resultset)) {

        if ($row2 > 0) {


            $average = $row2["average_rating"];
            $ratings = $row2["ratings"];


            for ($i = 1; $i < $average; $i++) {
                $data.="<i class='fas fa-star amber-text ' style='color: orange;'></i>";
            }
            if (strpos($average, '.') ) {
                $data.="<i class='fas fa-star-half-alt amber-text ' style='color: orange;'></i>";
            }

            $data.= " <li class='list-inline-item'><p class='text-muted'  > $average </p></li>";
            $data.="<li class='list-inline-item'><p class='text-muted'> $ratings  Reviews </p></li>";
        } 
    }
    return $data;
}
function getTablesRatings($link, $id) {
    
    $data = "";
    $query2 = "select ratings,FORMAT ((totalvalue/ratings),1) as average_rating from tables_rating where tables_id='$id'";
    $resultset = mysqli_query($link, $query2) or die(mysqli_errno($link));


    while ($row2 = mysqli_fetch_assoc($resultset)) {

        if ($row2 > 0) {


            $average = $row2["average_rating"];
            $ratings = $row2["ratings"];


            for ($i = 1; $i < $average; $i++) {
                $data.="<i class='fas fa-star amber-text ' style='color: orange;'></i>";
            }
            if (strpos($average, '.') ) {
                $data.="<i class='fas fa-star-half-alt amber-text ' style='color: orange;'></i>";
            }

            $data.= " <li class='list-inline-item'><p class='text-muted'  > $average </p></li>";
            $data.="<li class='list-inline-item'><p class='text-muted'> $ratings  Reviews </p></li>";
        } 
    }
    return $data;
}
?>