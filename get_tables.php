<?php
include './config/connection.php';
include './functions/get_ratings.php';
include './functions/recent_uploads.php';
session_start();
try {
    if (isset($_GET["id"]) && $_GET["id"] !== "") {
        $id = $_GET["id"];

        $query = "select * from tables where id='$id'";
        $result = mysqli_query($link, $query) or die(mysqli_errno($link));
        $row = mysqli_fetch_assoc($result);

        if ($row > 0) {
            $image = $row["image"];
            $price = $row["price"];
            $location = $row["location"];
            $name = $row["name"];
            $description = $row["description"];
        }
    } else {
        header("location:table");
    }

    if (isset($_POST["submit"])) {
        $checkIn = mysqli_real_escape_string($link, $_POST["checkin"]);
        $checkOut = mysqli_real_escape_string($link, $_POST["checkout"]);
        $tableNo = mysqli_real_escape_string($link, $_POST["tablesno"]);
        $persons = mysqli_real_escape_string($link, $_POST["persons"]);
        $phoneNo = mysqli_real_escape_string($link, $_POST["phoneno"]);
        $email = mysqli_real_escape_string($link, $_POST["email"]);
        $bookingDate = mysqli_real_escape_string($link, $_POST["date"]);
        $phoneNoTrim = trim($phoneNo);
        if (empty($checkIn) || empty($checkOut) || empty($tableNo) || empty($persons) || empty($phoneNoTrim) || empty($bookingDate)) {
            
        } else {
            $username = $_SESSION["email_id"];
            $query2 = "INSERT INTO `tables_orders`(`no_of_tables`, `user_name`, `email`, `phone_no`, `booking_date`,`order_type`,`checkin`,`checkout`,`table_name`,`image`,`no_of_persons`)"
                    . " VALUES ('$tableNo','$username','$email','$phoneNo','$bookingDate','special','$checkIn','$checkOut','$name','$image','$persons')";
            $rowAffected = mysqli_query($link, $query2) or die(mysqli_errno($link));
            if ($rowAffected > 0) {

                $_SESSION["message"] = "your order has been placed successfully";
                ?>
                <script>
                    if (typeof (window.history.pushState) == 'function') {
                        window.history.pushState("", "", "http://localhost/onlinebooking/get_tables?id=<?php echo $id ?>");

                    }

                </script>

                <?php
            }
        }
    }
} catch (Exception $ex) {
    $ex->getTraceAsString();
}
?>
<html>
    <head>
        <title>view Tables And Reserve</title>
        <link href="config/css.css" rel="stylesheet"/>
        <?php include './config/header.php'; ?>
        <style>
            @media only screen and (max-width:760px) {
                .checkout_form {
                    font-size: 10px !important;
                    height: 480px !important;
                }
                .main-image{
                    height: 370px !important;
                }

                input {
                    font-size: 5px!important;
                }
                input-group-prepend  {
                    font-size: 5px!important;
                }
            }
            @media (max-width:1024px) and (min-width:1024px) {

                .checkout_form {
                    font-size: 14px !important;
                    height: 600px!important;

                }
                .main-image{
                    height: 600px!important;
                }
                #submit{
                    font-size: 10px;
                    margin-top: -7px;
                }
                input{
                    font-size: 12px!important;
                }

            }
            @media (max-width:768px) and (min-width:768px) {

                .checkout_form {
                    font-size: 10px !important;
                    padding: 10px !important;

                    height:520px !important;
                }
                .main-image{
                    height: 520px !important;
                }
                #submit{
                    font-size: 10px;
                    margin-top: -7px;
                }
                input{
                    font-size: 10px!important;
                }

            }
            .starcolor{
                color: orange!important;
            }
            

        </style>
    </head>

    <body>
        <?php include './config/menu.php'; ?>
        <div class="container-fluid bg-light">
            <br/><br/><br/>
            <div class="row justify-content-center no-gutters">

                <div class="col-md-8 col-lg-9 col-xl-8 col-sm-12 ">


                    <img src="admin/<?php echo $image; ?>" class="img-fluid rounded main-image shadow" style="width: 100%;height: 750px ;  " />
                    <i class="fas fa-map-marker-alt" style="color:blue;"></i> <span><?php echo $row["location"]; ?></span>
                    <ul class="list-unstyled list-inline rating   mt-3">
                        <h5 class="font-weight-bold m-0  " style="margin-top: -15px !important;"> <?php echo $row["name"] ?></h5>


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
//                        if (isset($_SESSION["exists"])) {
//                            for ($i = 1; $i < $average; $i++) {
//                                echo "<i class='fas fa-star amber-text ' style='color: orange;'></i>";
//                            }
//                            if (strpos($average, '.')) {
//                                echo "<i class='fas fa-star-half-alt amber-text ' style='color: orange;'></i>";
//                            }
//                            echo " <li class='list-inline-item'><p class='text-muted'> $average </p></li>";
//                            echo "<li class='list-inline-item'><p class='text-muted'> $ratings  Reviews </p></li>";
//                        } else {
//                    
//                        }
                        ?>
                        <li class="list-inline-item"><p style="color:red;" class="font-weight-bold">Rs,<?php echo $row["price"]; ?></p></li>
                        <?php
                        if (isset($_SESSION["email_id"])) {
                            ?>
                            <button  type="button" class="btn btn-success ratebtn p-1"  data-toggle="modal" data-target="#exampleModal" style=" font-size: 13px;">
                                Rate  <i class="fas fa-star amber-text" style="color:white; font-size: 12px;"></i>
                            </button>

                            <?php
                        } else {
                            ?>
                            <button  type="button" class="btn btn-success p-1" id="cant-rate" style=" font-size: 13px;">
                                Rate  <i class="fas fa-star amber-text" style="color:white; font-size: 12px;"></i>
                            </button>

                            <?php
                        }
                        ?>
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Rate It</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" value="1" class="hide"/><i class="fas fa-star amber-text stars"  style="color:red; font-size: 14px; "></i>
                                        <input type="hidden" value="2" class="hide"/> <i class="fas fa-star amber-text stars" style="color:red; font-size: 14px;"></i>
                                        <input type="hidden" value="3" class="hide"/> <i class="fas fa-star amber-text stars" style="color:red; font-size: 14px;"></i>
                                        <input type="hidden" value="4" class="hide"/> <i class="fas fa-star amber-text stars" style="color:red; font-size: 14px;"></i>
                                        <input type="hidden" value="5" class="hide"/><i class="fas fa-star amber-text  stars" style="color:red; font-size: 14px;"></i>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                    <h3>Overview</h3>
                    <p> <?php echo $description ?></p>
                </div>
                <div class=" col-md-4 col-lg-3 col-xl-3 bg-white jumbotron-fluid checkout_form  shadow  p-3" style=" height:750px ;" >

                    <div class="bg-primary  text-white" style="height:70px; width:100%; overflow: hidden; "><center><h3 class="mt-3">Book Here</h3></center></div>
                    <p><?php
                        if (isset($_SESSION["message"])) {
                            ?>

                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $_SESSION["message"]; ?>
                        </div>

                        <?php
                        if (empty($phoneNoTrim)) {
                            unset($_SESSION["message"]);
                        }
                    }
                    ?> </p>
                    <form method="post">

                        <label class="mt-2">check In</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"> <i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="checkin" id="checkin" class="form-control" placeholder="checkin" required="required" autofocus="" >     

                        </div>
                        <label class="mt-2">check Out</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="checkout" id="checkout" class="form-control" placeholder="check out" required="required"  >     

                        </div>
                        <label class="mt-2">no of tables</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"> <i class="fas fa-child"></i></span>
                            </div>
                            <input type="number" name="tablesno" id="tableno" class="form-control" placeholder="no of tables" required="required"  >     

                        </div>

                        <label class="mt-2">no of persons</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"> <i class="fas fa-male"></i></span>
                            </div>
                            <input type="number" name="persons" id="person" class="form-control" placeholder="no of persons" required="required"  >     

                        </div>
                        <label class="mt-2">email</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"> <i class="fas fa-male"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required"  >     

                        </div>

                        <label class="mt-2">phone no</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"> <i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="phoneno" id="phoneno" class="form-control" placeholder="phone number" required="required"  >     

                        </div>
                        <label class="mt-2">Today Date</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"> <i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" readonly="" name="date" id="date" class="form-control" value="<?php echo date("Y/m/d"); ?>"  required="required"  >     

                        </div>
                        <br/>
                        <?php if (isset($_SESSION["email_id"])) { ?>
                            <!-- Button -->

                            <input type="submit" class="btn btn-danger btn-block" id="submit" value="Place Order"  name="submit" />
                            <?php
                        } else {
                            ?>
                            <button type="button" id="cant-submit" name="submit" class="btn btn-danger btn-block">Place Order</button>

                            <?php
                        }
                        ?>

                    </form>
                    <span id="checkin-message" style="color:red;"></span>
                </div>

            </div>



        </div>
        <input type="hidden"  value="<?php echo $id ?>" id="hidden-id"/>
        <br/><br/>
        <div class="container-fluid">
            <h2  style=" color: Green  " class="ml-5 mr-2">Leave Comment Here</h2>
            <br/>
            <div class="row ">
                <div class="col-md-5  col-sm-6   " >
                    <textarea  cols="20" rows="8"class="form-control " id="comment-area" ></textarea>
                </div>

                <div class="col-md-1">


                    <?php if (isset($_SESSION["email_id"])) { ?>
                        <!-- Button -->

                        <input type="button" class="btn btn-info" id="comment" value="Comment"   />
                        <?php
                    } else {
                        ?>
                        <input type="button" class="btn btn-info" id="cant-comment" value="Comment"   />

                        <?php
                    }
                    ?>
                </div>
            </div>
            <br/><br/>
            <div class="row  ">

                <div class="col-md-8   bg-white shadow-sm col-sm-8">
                    <h4 class="text-center">View Comments</h4>
                    <br/>
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <hr>
                            <ul class="media-list" >

                            </ul>
                        </div>

                    </div>
                    <p class="text-center" id="comment-status"></p>

                </div>
            </div>

        </div>
        <br/><br/>
    <Center><h1 class="recent-uploads">Recent uploads</h1></center>
    <div class="container-fluid">
        <br/><br/> <br/><br/>
        <div class="row ">
            <?php echo recentTablesUploads($link); ?>
            <br/>
            <?php include 'config/footer.php'; ?>
        </div>
    </div>


    <?php include './config/jsfooter.php'; ?>
    <script>
        $(document).ready(function () {
            getTableComments();

            $(".stars").on("mouseover ", function () {
                $(this).addClass("starcolor").prevAll().addClass("starcolor");
                //            $(this).attr("checked", true).prevAll().attr("checked", true);
            });

            $(".stars").on("mouseleave ", function () {
                $(".stars").removeClass("starcolor");

            });
            $(".stars").click(function () {

                var value = $(this).prev("input").val();
//                var url = window.location.href;
//                var id = url.substring(url.lastIndexOf('/') + 19);
                var id = $("#hidden-id").val();


                $.ajax({
                    url: "ajax/insert_rating_tables.php",
                    type: 'POST',
                    data: {"id": id,
                        "rating_value": value
                    },
                    async: false,
                    cache: false,
                    success: function (data) {
                        alert(data);

                    }
                });
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
            function getTableComments() {
                var id = $("#hidden-id").val();
                $.ajax({
                    url: "ajax/get_table_comments.php",
                    type: 'GET',
                    data: {"id": id},
                    async: false,
                    cache: false,
                    success: function (data) {
                        if (data === "") {
                            $("#comment-status").fadeIn().html("No Comments On This Post");
                        }
                        else {
                            $(".media-list").fadeIn().html(data);
                            $("#comment-status").fadeOut();

                        }
                    }
                });
            }
            $("#comment").click(function () {

                var id = $("#hidden-id").val();
                var comment = $("#comment-area").val();
                if (comment === "") {
                    alert(" sorry you can not post blank comment");
                }
                else {
                    $.ajax({
                        url: "ajax/insert_table_comment.php",
                        type: 'GET',
                        data: {"id": id,
                            "comment": comment},
                        beforeSend: function () {
                            $("#comment").html("posting");
                        },
                        async: false,
                        cache: false,
                        success: function (data) {

                            getTableComments();
                            $("#comment").html("comment");
                            $("#comment-area").val("");
                        }

                    });
                }
            });
            $("#cant-rate").click(function () {
                swal("please login to rate this table");
            });
            $("#cant-submit").click(function () {
                swal("please login to place orders");
            });
            $("#cant-comment").click(function () {
                swal("please login to comment");
            });
            //                
        });
    </script>
</body>

</html>