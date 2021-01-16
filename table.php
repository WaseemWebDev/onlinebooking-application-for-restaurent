<?php
include './config/connection.php';
include './functions/get_ratings.php';
session_start();


$query = "select * from tables order by id desc";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));

try {

    if (isset($_POST["submit"])) {
        $checkIn = mysqli_real_escape_string($link, $_POST["checkin"]);
        $checkOut = mysqli_real_escape_string($link, $_POST["checkout"]);
        $noOfTables = mysqli_real_escape_string($link, $_POST["tables_no"]);
        $date = mysqli_real_escape_string($link, $_POST["date"]);
        $email = mysqli_real_escape_string($link, $_POST["email"]);
        $phoneNo = mysqli_real_escape_string($link, $_POST["phoneno"]);
        $noOfPersons = mysqli_real_escape_string($link, $_POST["persons"]);

        $sql = "select date,checkin from bussines_order where checkin='$checkIn' and date='$date'";

        $results = mysqli_query($link, $sql) or die(mysqli_errno($link));

        $data = mysqli_fetch_assoc($results);
        if ($data > 0) {
            header("location:table");
            die();
        } else if (empty($phoneNo) || empty($email)) {
            
        } else {
            $username = $_SESSION["email_id"];
            $query2 = "INSERT INTO `tables_orders`( `no_of_tables`, `user_name`, `email`, `phone_no`, `booking_date`,`order_type`,`checkin`,`checkout`,table_name,image,no_of_persons)VALUES ('$noOfTables','$username','$email','$phoneNo','$date','quick','$checkIn','$checkOut','Not avaiable because it is quick order','Not avaiable because it is quick order','$noOfPersons')";

            $querySuccess = mysqli_query($link, $query2) or die(mysqli_errno($link));

            if ($querySuccess > 0) {

                $_SESSION["formsubmit"] = "Order Placed Successfully";

                header("location:table");
            }
        }
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
?>


<html>
    <head>
        <title> Restaurent Reservation</title>
         <link href="config/css.css" rel="stylesheet"/>
        <?php include './config/header.php'; ?>

    </head>
    <body>
        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
        <?php include './config/menu.php'; ?>

        <div class="container-fluid">
            <div class="row justify-content-center" >
                <div class="col-md-12 p-0  " style=" position: absolute;" >
                    <img src="assets/images/table.jpg"   class="img-fluid" style="max-height: 700px;  filter: brightness(.6);   width:100%;" />
                    <h1 class="backgroundtext"   style="position: absolute;left: 27%; right: 27%;  bottom: 54% ; color: white;">Reserve Table here according to your desire</h1>
                    <button class="btn btn-primary headerbtn" style=" display:block; padding-left: 40px; padding-right: 40px; position: absolute; bottom: 330px;left: 43%; right: 57%;">Reserve Table</button>

                </div>

            </div>

        </div>

        
        <div class="container " >
            
            <div class="row ">

                <div class="col-md-12  jumbotron shadow   p-4  bookingbox " style="     margin-top: 390px;" >
                    <h3 class="text-center">Reserve Quick Order </h3>
                    <hr/>
                    <form method="post">
                        <div class="row text-center justify-content-center ">

                            <div class="col-md-2">
                                <label>Check In</label>
                                <input type="date" class="form-control" required="required" name="checkin" id="checkin"  />
                            </div>
                            <div class="col-md-2">
                                <label>Check out</label>
                                <input type="date" class="form-control" required="required" name="checkout" id="checkout"  />
                            </div>

                            <div class="col-md-2">
                                <label>No of Tables</label>
                                <input type="number" class="form-control" required="required" name="tables_no" id="tables_no"  />
                            </div>
                            <div class="col-md-2">
                                <label>No of Persons</label>
                                <input type="number" class="form-control" required="required" name="persons" id="persons"  />
                            </div>

                            <div  class="col-md-2">
                                <label>Date</label>
                                <input type="text" class="form-control" name="date" id="date"  value="<?php echo Date("Y/m/d") ?>"  readonly=""  />
                            </div>

                        </div>

                        <div class="row mt-2 text-center">
                            <div class="col-md-6">
                                <label>Your Email</label>
                                <input type="email" class="form-control" required="required" name="email" id="email"  />
                            </div>

                            <div  class="col-md-6">
                                <label>Phone no</label>
                                <input type="text" class="form-control" name="phoneno" id="phoneno"    />
                            </div>

                        </div>
                        <br/>
                        <?php if (isset($_SESSION["email_id"])) { ?>
                            <!-- Button -->

                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Book Now</button>
                            <?php
                        } else {
                            ?>
                            <button type="button" id="cant-book" name="submit" class="btn btn-primary btn-block">Book Now</button>

                            <?php
                        }
                        ?>


                    </form>
                    <p><?php
                        if (isset($_SESSION["formsubmit"])) {
                            ?>

                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $_SESSION["formsubmit"]; ?>
                        </div>

                        <?php
                    }
                    ?> </p>
                    <span id="checkin-message" style="color:red;"></span>
                    <?php
                    if (empty($phoneNo)) {
                        unset($_SESSION["formsubmit"]);
                    }
                    ?>

                </div>
            </div>


            <center><h3>Table Design</h3></center>
            <center><p style="height: 8px; width: 60px; background: orange; border-radius: 10px; "></p></center>
            <hr/>
            <div class="row " >
                <div class="col-md-3">
                    <img src="assets/images/table.jpg" class="rounded img-fluid"style="height: 170px; width: 100%;"/>
                    <center><p class="text-muted">Black Wooden Table with  8 peoples capacity</p></center>

                </div>
                <div class="col-md-3">
                    <img src="assets/images/onetable.jpg" class="rounded img-fluid"style="height: 170px; width: 100%;"/>
                    <center><p class="text-muted">Single Double Capacity Table for Meeting</p></center>
                </div>
                <div class="col-md-3">
                    <img src="assets/images/crystal.jpg" class="rounded img-fluid"style="height: 170px; width: 100%;"/>
                    <center><p class="text-muted">Crystal best Design Table Premium</p></center>
                </div>
                <div class="col-md-3">
                    <img src="assets/images/fancy.jpg" class="rounded img-fluid"style="height: 170px; width: 100%;"/>
                    <center><p class="text-muted">Fancy Best Designs For Party</p></center>
                </div>
            </div>

 
        </div>
        <br/>
        <div class=" p-5 " style="background:#57606f; border-radius:46% 100% 100% 100% / 17% 17% 0% 0%  ;">
            <div class="container " >

                <center> <h3 class="text-white">Most Ordered Table</h3></center>

                <center><p style="height: 8px; width: 60px; background: orange; border-radius: 10px; "></p></center>
                <center><p class=" text-white" >Below are the most ordered menu's</p></center>
                <br/><br/>
                <div class="row   justify-content-center ">
                    <div class="col-md-3 bg-white mr-4 mb-3 ml-4" style="border-radius: 7px;	box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  ">

                        <div class="row ">
                            <div class="col-md-4">
                                <img src="assets/images/download.jpg" class="img-fluid mt-2 " style="height:80px; "  />
                            </div>

                            <div class="col-md-7 mt-4">
                                <h4>Circular Table with 4 persons capacity </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-white mr-4 mb-3 ml-4" style=" border-radius: 7px;	box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  ">

                        <div class="row ">
                            <div class="col-md-4">
                                <img src="assets/images/crystalTable.jpg" class="img-fluid mt-2 " style="height:80px; "  />
                            </div>

                            <div class="col-md-7 mt-4">
                                <h5>Crystal Table  </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-white mr-4 mb-3 ml-4" style="	border-radius: 7px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  ">

                        <div class="row ">
                            <div class="col-md-4">
                                <img src="assets/images/ca2460a.jpg" class="img-fluid mt-2 " style="height:80px; "  />
                            </div>

                            <div class="col-md-7 mt-4">
                                <h5>Wooden Table </h5>
                            </div>
                        </div>
                    </div>

                </div>
                <br/>



            </div>


        </div>
        <br/>


        <div class="container-fluid  ">
            <center><h2>Check Tables</h2></center>
            <center><p style="height: 8px; width: 60px; background: orange; border-radius: 10px; "></p></center>
            <br/>
            <div class="row justify-content-left">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    ?>
                    <div class="col-lg-3 col-xl-2 col-md-5   mb-5 bg-white jumbotron ml-lg-5 ml-md-5 mr-md-0 mr-lg-2 ml-3 mr-3 p-0">

                        <img src="admin/<?php echo $row["image"]; ?>" class="img-fluid rounded dynamic-image" style="width: 100%;  height: 220px; " />
                        <br/>
                        <i class="fas fa-map-marker-alt" style="color:blue;"></i> <span><?php echo $row["location"]; ?></span>
                        <ul class="list-unstyled list-inline rating   mt-3">
                            <p class="font-weight-bold m-0 name " style="margin-top: -15px !important; "> <?php echo $row["name"] ?></p>
                            <?php
                            if ($row["status"] == "no review") {
                                ?>
                                <img src="assets/images/star.png" height=17;"  />
                                <img src="assets/images/star.png" height=17;"  />
                                <img src="assets/images/star.png" height=17;"  />
                                <img src="assets/images/star.png" height=17;"  />
                                <img src="assets/images/star.png" height=17;"  />

                                <?php
                                echo $row["status"];
                            }
                            echo getTablesRatings($link, $id);
                            ?>
                            <li class="list-inline-item"><p style="color:red;" class="font-weight-bold">Rs,<?php echo $row["price"]; ?></p></li>
                        </ul>
                        <!-- Button -->
                        <center> <a href="get_tables?id=<?php echo $id ?>" class="btn btn-primary  btn-block mx-0" style="margin-top: -19px;">Book Now</a></center>
                    </div>
                <?php }
                ?>
            </div>


            <br/>
            <?php include './config/jsfooter.php' ?>
            <?php include './config/footer.php'; ?>

            <script>


                $(document).ready(function () {
                    $('.loader-wrapper').height($(document).height());
                    $(window).on("load", function () {
                        $(".loader-wrapper").fadeOut("slow");

                    });
                    //this code is for the active class on the menu
                    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
                    $('li a').each(function () {
                        if (this.href === path) {
                            $(this).addClass('active');
                        }
                    });
                    $("#checkin").on("blur", function () {
                        var checkIn = $(this).val();
                        var date = $("#date").val();

                        $.ajax({
                            url: "ajax/checkin_date_for_table_validate.php",
                            type: 'POST',
                            data: {"checkin": checkIn,
                                "date": date},
                            async: false,
                            cache: false,
                            success: function (data) {

                                if (!data == "") {

                                    $("#checkin-message").html(data);
                                    document.getElementById("submit").disabled = true;


                                }
                                else {

                                    document.getElementById("submit").disabled = false;
                                    $("#checkin-message").html("");
                                }

                            }
                        });
                    });
                    $("#cant-book").click(function () {
                        swal("you have to login first to execute order");
                    });
                });


            </script>
    </body>
</html>