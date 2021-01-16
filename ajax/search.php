<?php
include '../config/connection.php';
try {
    $textValue = $_POST["value"];
    $data = "";
    $query = "(SELECT id,name,category FROM restaurents as r WHERE name like'%" . $textValue . "%' order by id asc  limit 3) union (select id,name,category from tables as t where name like'%" . $textValue . "%' order by id asc  limit 3);
";
    $result = mysqli_query($link, $query) or die(mysqli_errno($link));
    while ($row = mysqli_fetch_assoc($result)) {
        
        if ($row > 0) {
            $name = $row["name"];
            $id = $row["id"];
            $category = $row["category"];   
            if($category == "table"){
                $class = "badge badge-pill badge-primary";
            }
            else{
                $class = "badge badge-pill badge-success";
            }
        
            $data.="<li class='list-group-item  search-list' id='$id'><span class='$class'>".$category."</span> $name</li>";
             
        }
    }
} catch (Exception $ex) {
    $ex->getTraceAsString();
}
echo $data;
?>

<html>

    <head>
        <title></title>
        <style>
            .search-list:hover{
                background: skyblue;
                color:white;
            }
        </style>
    <body>

    </body>
</head>
</html>
