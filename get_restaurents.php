<?php
include './config/connection.php';
include './functions/get_ratings.php';
include './functions/recent_uploads.php';
session_start();



try {
    if (isset($_GET["id"]) && $_GET["id"] !== "") {
        $id = $_GET["id"];

        $query = "select * from restaurents where id='$id'";
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
        header("location:restaurent");
    }


    if (isset($_POST["submit"])) {
        $checkOut = mysqli_real_escape_string($link, $_POST["checkout"]);
        $personNo = mysqli_real_escape_string($link, $_POST["persons"]);
        $phoneNo = mysqli_real_escape_string($link, $_POST["phoneno"]);
        $bookingDate = mysqli_real_escape_string($link, $_POST["date"]);
        $phoneNoTrim = trim($phoneNo);
        if ( empty($checkOut) ||  empty($personNo) || empty($phoneNoTrim) || empty($bookingDate)) {
            
        } else {
            $user = $_SESSION["email_id"];

            $query2 = "INSERT INTO `restaurent_special`( `name`, `persons`, `booking_date`, `restaurent_name`, `phone_number`, `restaurent_id`, `image`,`checkout`)"
                    . " VALUES ('$user','$personNo','$bookingDate','$name','$phoneNo','$id','$image',' $checkOut')";
            $rowAffected = mysqli_query($link, $query2) or die(mysqli_errno($link));
            if ($rowAffected > 0) {

                $_SESSION["message"] = "you order has been placed successfully";
                ?>
                <script>
                    if (typeof (window.history.pushState) == 'function') {
                        window.history.pushState("", "", "http://localhost/onlinebooking/get_restaurents?id=<?php echo $id ?>");

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
        <title>view Restaurent And Reserve</title>
         <link href="config/css.css" rel="stylesheet"/>
        <?php include './config/header.php'; ?>
        
        <style>
            @media only screen and (max-width:760px) {
                .checkout_form {
                    font-size: 10px !important;
                    height: 480px !important;
                }
                .main-image{
                    height: 400px !important;
                }
            }
            @media (max-width:1024px) and (min-width:1024px) {

                .checkout_form {
                    font-size: 14px !important;
                    height: 550px!important;

                }
                .main-image{
                    height: 550px!important;
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

                    height:490px !important;
                }
                .main-image{
                    height: 490px !important;
                }
                #submit{
                    font-size: 10px;
                    margin-top: -7px;
                }
                input{
                    font-size: 12px!important;
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

                <div class="col-md-8 col-lg-8 col-sm-12 ">


                    <img src="admin/<?php echo $image; ?>" class="img-fluid rounded main-image shadow" style="width: 100%; height: 700px ;  " />
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
                        echo getRatings($link, $id);

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
                        <?php if (isset($_SESSION["email_id"])) { ?>


                            <button  type="button" class="btn btn-success ratebtn p-1"  data-toggle="modal" data-target="#exampleModal" style=" font-size: 13px;">
                                Rate  <i class="fas fa-star amber-text" style="color:white; font-size: 12px;"></i>
                            </button>

                            <?php
                        } else {
                            ?>
                            <button type = "button" class = "btn btn-success ratebtn p-1" id="cant-rate" style = " font-size: 13px;">
                                Rate <i class = "fas fa-star amber-text" style = "color:white; font-size: 12px;"></i>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                    <center><h3>Overview</h3></center>
                    <center><p> <?php echo $description ?></p></center>
                </div>
                <div class="col-lg-3 col-md-4 bg-white jumbotron-fluid checkout_form shadow p-4" style=" height:700px ;" >

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

                        <label class="mt-2">Location</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="checkout" id="checkout" class="form-control" placeholder="Enter your location" required="required"  >     

                        </div>
                        

                        <label class="mt-2">Amount</label>
                        <div class="input-group   " style="margin-top: -6px;">

                            <div class="input-group-prepend "> 
                                <span class="input-group-text"> <i class="fas fa-male"></i></span>
                            </div>
                            <input type="number" name="persons" id="adults" class="form-control" placeholder="No of packs" required="required"  >     

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
        <br/><br/><br/>

        <div class="container-fluid">
            <h2  style=" color: Green  " class="ml-5 mr-2">Leave Comment Here</h2>
            <br/>
            <div class="row ">
                <div class="col-md-8 col-xl-5  col-sm-6   " >
                    <textarea  cols="20" rows="8"class="form-control " id="comment-area" ></textarea>
                </div>

                <div class="col-md-1">


                    <?php if (isset($_SESSION["email_id"])) { ?>
                        <!-- Button -->

                        <input type="button" class="btn btn-info" id="comment" value="Post"   />
                        <?php
                    } else {
                        ?>
                        <input type="button" class="btn btn-info" id="cant-comment" value="Post"   />

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
        <br/>
        <br/>
    <Center><h1>Recent uploads</h1></center>
    <hr/>
    <div class="container-fluid">


        <br/><br/>
        <div class="row ">
            <?php echo recentUploads($link); ?>
            <br/>


            <?php include 'config/footer.php'; ?>
        </div>
    </div>


    <?php include './config/jsfooter.php'; ?>
    <script>
        $(document).ready(function () {
            getComments();
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
//                var id = url.substring(url.lastIndexOf('/') + 24);
                var id = $("#hidden-id").val();

                $.ajax({
                    url: "ajax/insert_rating.php",
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
                    url: "ajax/special_order_check.php",
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
            $("#comment").click(function () {
                var id = $("#hidden-id").val();
                var comment = $("#comment-area").val();
                if (comment == "") {
                    alert(" sorry you can not post blank comment");
                }
                else {
                    $.ajax({
                        url: "ajax/insert_comment.php",
                        type: 'GET',
                        data: {"id": id,
                            "comment": comment},
                        async: false,
                        cache: false,
                        success: function (data) {
                            getComments();
                            $("#comment-area").val("");
                        }

                    });
                }
            });
            function getComments() {
                var id = $("#hidden-id").val();

                $.ajax({
                    url: "ajax/get_comments.php",
                    type: 'GET',
                    data: {"id": id},
                    async: false,
                    cache: false,
                    success: function (data) {
                        if (data == "") {
                            $("#comment-status").fadeIn().html("No Comments On This Post");
                        }
                        else {
                            $(".media-list").fadeIn().html(data);
                            $("#comment-status").fadeOut();
                        }
                    }
                });
            }

            $("#cant-submit").click(function () {
                swal("please login to place orders");
            });
            $("#cant-rate").click(function () {
                swal("please login to rate this item");
            });
            $("#cant-comment").click(function () {
                swal("please login to comment");
            });

        });
    </script>
</body>

</html>