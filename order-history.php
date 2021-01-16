<?php
session_start();
include('./config/connection.php');

$user = $_SESSION["email_id"];

$query = "select * from restaurent_special where name='$user'  order by id desc";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));
$class = "";
?>


<html>
    <head>
        <title>order history</title>
        <link href="config/css.css" rel="stylesheet"/>
        <?php include('./config/header.php') ?>
    </head>
    <body class="bg-light">
        <?php include('./config/menu.php') ?>


        <div class="container-fluid ">
            <br/><br/><br/><br/><br/>
            <center><h4>Track Order history</h4></center>
            <br/>
            <div class="row justify-content-center">

                <div class="col-md-8 bg-white shadow"> 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>order id</th>
                                <th>Email</th>
                                <th>Order amount</th>
                                <th>Date</th>
                                <th>Order name</th>
                                <th>location</th>
                                <th>Phone no</th>
                                <th>Order status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row > 0) {
                                    if($row['orderstatus'] === "pending"){
                                        $class="badge-danger";
                                    }
                                    else{
                                       $class="badge-success";  
                                    
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['persons'] ?></td>
                                        <td><?php echo $row['booking_date'] ?></td>
                                        <td><?php echo $row['restaurent_name'] ?></td>
                                        <td><?php echo $row['checkout'] ?></td>
                                        <td><?php echo $row['phone_number'] ?></td>
                                        
                                        <td> <span class="badge <?php echo $class;?>"><?php echo $row['orderstatus']?></span>  </td>

                                    </tr>
                                <?php }
                               
                                else{
                                    echo "no data";
                                }
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
           
        </div>
        <br> <br/><br/><br/><br/><br/> <br/><br/><br/><br/><br/> <br/><br/><br/>
         
        <?php include('./config/footer.php') ?>

        <?php include('./config/jsfooter.php') ?>

    </body>
</html>