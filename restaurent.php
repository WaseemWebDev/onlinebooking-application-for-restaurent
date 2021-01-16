<?php
include './config/connection.php';
include './functions/get_ratings.php';
session_start();

$query = "select * from restaurents order by id desc";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));

try {

    if (isset($_POST["submit"])) {
        $checkIn = mysqli_real_escape_string($link, $_POST["checkin"]);
        $checkOut = mysqli_real_escape_string($link, $_POST["checkout"]);
        $persons = mysqli_real_escape_string($link, $_POST["persons"]);


        $selectedText = mysqli_real_escape_string($link, $_POST["selected_text"]);
        $date = mysqli_real_escape_string($link, $_POST["date"]);
        $email = mysqli_real_escape_string($link, $_POST["email"]);
        $phoneNo = mysqli_real_escape_string($link, $_POST["phoneno"]);

        $sql = "select date,checkin from bussines_order where checkin='$checkIn' and date='$date'";

        $results = mysqli_query($link, $sql) or die(mysqli_errno($link));

        $data = mysqli_fetch_assoc($results);
        if ($data > 0) {
            header("location:restaurent");
            die();
        } else if (empty($phoneNo) || empty($email)) {
            
        } else {
            $username = $_SESSION["email_id"];
            $query2 = "INSERT INTO `bussines_order`( `checkin`, `checkout`, `persons`, `restaurent_type`, `date`, `email`, `phonenumber`, `user`)VALUES ('$checkIn','$checkOut','$persons','$selectedText','$date','$email','$phoneNo','$username')";

            $querySuccess = mysqli_query($link, $query2) or die(mysqli_errno($link));

            if ($querySuccess > 0) {

                $_SESSION["message"] = "data has been inserted successfully";

                header("location:restaurent");
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


        <style>
            #typejs{
                position: absolute;left: 27%; right: 27%;  bottom: 38% ; color: white;
            }

            @media only screen and (max-width:760px) {

                .backgroundtext{

                    position:absolute !important;
                    left:80px !important;
                    right:20px !important;
                    font-size:16px;

                    width:70% !important;
                    bottom: 49% !important;

                }
                #typejs{
                    position:absolute !important;
                    left:80px !important;
                    right:20px !important;
                    font-size:12px;

                    width:70% !important;
                }
                .bookingbox{

                    margin-top: 160px !important;
                    font-size: 10px;
                }
                .headerbtn{

                    position: absolute !important;
                    top: 110px !important;
                    left: 40% !important;
                    height: 29px;
                    font-size: 12px;
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                }
            }
            @media (max-width:1024px) and (min-width:1024px) {
                .name{

                    display: block !important;
                }

                .headerbtn{


                    top: 300px !important;
                    left: 42% !important;
                    height: 40px;
                    font-size: 19px;
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                }
                .bookingbox{

                    margin-top: 390px !important;
                    font-size: 10px;

                }

            }

            @media (max-width:800px) and (min-width:768px) {
                #typejs{
                    position: absolute;left: 24%!important; right: 24% !important;  bottom: 34% !important ; color: white;
                }
                .name{

                    display: block !important;
                }
                .dynamic-image{
                    height: 150px !important;

                }
                .bookingbox{

                    margin-top: 300px !important;
                    font-size: 10px;

                }
                .headerbtn{

                    position: absolute !important;
                    top: 230px !important;
                    left: 42% !important;
                    height: 40px;
                    font-size: 19px;
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                }
                .backgroundtext{

                    font-size: 27px;

                }

            }​





        </style>
    </head>
    <body>
        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
        <?php include './config/menu.php'; ?>

        <div class="container-fluid ">
            <div class="row justify-content-center" >
                <div class="col-md-12 p-0  " style=" position: absolute;" >
                    <img src="assets/images/restaurant-interior-776538 (3).jpg"   class="img-fluid" style="max-height: 700px;  filter: brightness(.9);  width:100%;" />
                    <h1  class="backgroundtext"   style="position: absolute;left: 27%; right: 27%;  bottom: 41% ; color: white;">A Place Where a stranger Becomes Addicted to Food</h1>
                    <h5   id="typejs"  > </h5>
                    <button class="btn btn-outline-light headerbtn" style=" display:block; padding-left: 40px; padding-right: 40px; position: absolute; bottom: 220px;left: 43%; right: 57%;">Reserve Table</button>

                </div>

            </div>

        </div>


        <div class="container " >
            <div class="row ">

                <div class="col-md-12 jumbotron p-4 bg-light  bookingbox " style="  margin-top: 600px; box-shadow: 0 1px 1px rgba(0,0,0,0.12), 
                     0 2px 2px rgba(0,0,0,0.12), 
                     0 4px 4px rgba(0,0,0,0.12), 
                     0 8px 8px rgba(0,0,0,0.12),
                     0 16px 16px rgba(0,0,0,0.12);" >
                    <h3 class="text-center">Book for Bussiness Meeting</h3>
                    <hr/>
                    <form method="post">
                        <div class="row text-center ">

                            <div class="col-md-2">
                                <label>Check In</label>
                                <input type="date" class="form-control" required="required" name="checkin" id="checkin"  />
                            </div>
                            <div class="col-md-2">
                                <label>Check out</label>
                                <input type="date" class="form-control" required="required" name="checkout" id="checkout"  />
                            </div>

                            <div class="col-md-2">
                                <label>Persons</label>
                                <input type="number" class="form-control" required="required" name="persons" id="child"  />
                            </div>
                            <div class="col-md-2">
                                <label >Type</label>
                                <select class="form-control" name="hall_types" onchange="document.getElementById('selected_text').value = this.options[this.selectedIndex].text">
                                    <option> Types</option>
                                    <option>hall with 1 table and 10 person capacity</option>
                                    <option>hall with 3 tables and 20 person capacity</option>
                                    <option>hall with 3 tables and 40 person capacity</option>
                                    <option>premium hall for birthdays</option>

                                </select>
                                <input type="hidden" value="" id="selected_text"name="selected_text" />
                            </div>
                            <div  class="col-md-2">
                                <label>Date</label>
                                <input type="text" class="form-control" value="<?php echo Date("Y/m/d") ?>" name="date" id="date"  readonly=""  />
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
                    <span id="checkin-message" style="color:red;"></span>
                    <p><?php
                        if (isset($_SESSION["message"])) {
                            ?>

                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $_SESSION["message"]; ?>
                        </div>

                        <?php
//                       
                    }
                    ?> </p>
                </div>
            </div>


            <center><h3>Popular menu's</h3></center>
            <center><p style="height: 8px; width: 60px; background: orange; border-radius: 10px; "></p></center>
            <hr/>
            <div class="row" >
                <div class="col-md-3">
                    <img src="assets/images/restaurant-table-and-chairs-1581384 (1).jpg" class="rounded img-fluid"style="height: 170px; width: 100%;"/>
                    <center><p class="text-muted">Tikka karhae</p></center>

                </div>
                <div class="col-md-3">
                    <img src="assets/images/bbq.JPG" class="rounded img-fluid"style="height: 170px; width: 100%;"/>
                    <center><p class="text-muted">Best Bbq</p></center>
                </div>
                <div class="col-md-3">
                    <img src="assets/images/pizza.JPG" class="rounded img-fluid"style="height: 170px; width: 100%;"/>
                    <center><p class="text-muted">Italian Pizza</p></center>
                </div>
                <div class="col-md-3">
                    <img src="assets/images/tea-restaurent.JPG" class="rounded img-fluid"style="height: 170px; width: 100%;"/>
                    <center><p class="text-muted">Special Tea</p></center>
                </div>
            </div>

        </div>
        <br/>
        <div class=" p-5 " style="background:#1864AB; border-radius:46% 100% 100% 100% / 17% 17% 0% 0%  ;">
            <div class="container " >

                <center> <h3 class="text-white">Most Ordered Items</h3></center>

                <center><p style="height: 8px; width: 60px; background: orange; border-radius: 10px; "></p></center>
                <center><p class=" text-white" >Below are the most ordered menu's</p></center>
                <br/><br/>
                <div class="row   justify-content-center ">
                    <div class="col-md-3 bg-white mr-4 mb-3 ml-4" style="border-radius: 7px;	box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  ">

                        <div class="row ">
                            <div class="col-md-4">
                                <img src="assets/images/animal.png" class="img-fluid mt-2 " style="height:80px; "  />
                            </div>

                            <div class="col-md-7 mt-4">
                                <h4>Grilled Fish </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-white mr-4 mb-3 ml-4" style=" border-radius: 7px;	box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  ">

                        <div class="row ">
                            <div class="col-md-4">
                                <img src="assets/images/burger.png" class="img-fluid mt-2 " style="height:80px; "  />
                            </div>

                            <div class="col-md-7 mt-4">
                                <h5>Zinger Special Burger </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 bg-white mr-4 mb-3 ml-4" style="	border-radius: 7px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  ">

                        <div class="row ">
                            <div class="col-md-4">
                                <img src="assets/images/vegetable.png" class="img-fluid mt-2 " style="height:80px; "  />
                            </div>

                            <div class="col-md-7 mt-4">
                                <h5>Fresh mix vegetable </h5>
                            </div>
                        </div>
                    </div>

                </div>
                <br/>



            </div>


        </div>
        <br/>
        <div class="container">
            <div class="row " style="box-shadow: 0 1px 1px rgba(0,0,0,0.12), 
                 0 2px 2px rgba(0,0,0,0.12), 
                 0 4px 4px rgba(0,0,0,0.12), 
                 0 8px 8px rgba(0,0,0,0.12),
                 0 16px 16px rgba(0,0,0,0.12);">
                <img src="assets/images/discount.jpg"  class="img-fluid "  style="height: 200px;filter: brightness(.6);  width: 100%;"/>
                <h3 class="mt-5 ml-5" style="position: absolute;  color: white;">10% Flat Discount</h3>
            </div>

        </div>
        <br/>
        <div class="container-fluid  bg-light ">
            <center><h2>Restaurents</h2></center>
            <center><p style="height: 8px; width: 60px; background: orange; border-radius: 10px; "></p></center>
            <br/>
            <div class="row justify-content-around">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    ?>
                    <div class="col-lg-5 col-xl-3 col-md-5   mb-5 bg-light jumbotron   mr-md-0 mr-lg-2 ml-2 mr-3  p-0">

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
                            echo getRatings($link, $id);
                            ?>


                            <li class="list-inline-item"><p style="color:red;" class="font-weight-bold">Rs,<?php echo $row["price"]; ?></p></li>
                        </ul>
                        <!-- Button -->
                        <center> <a href="get_restaurents?id=<?php echo $id ?>" class="btn btn-primary  btn-block mx-0" style="margin-top: -19px;">View Detail</a></center>
                    </div>

                <?php }
                ?>


            </div>
        </div>
        <?php
        if (empty($phoneNo)) {
            unset($_SESSION["message"]);
        }
        ?>

        <?php include './config/jsfooter.php'; ?>
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
                $(function () {
                    $("#typejs").typed({
                        strings: ["Come Taste And Becomes Addict To Food"],
                        // Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
                        stringsElement: null,
                        // typing speed
                        typeSpeed: 30,
                        // time before typing starts
                        startDelay: 1200,
                        // backspacing speed
                        backSpeed: 20,
                        // time before backspacing
                        backDelay: 500,
                        // loop
                        loop: true,
                        // false = infinite
                        loopCount: 5,
                        // show cursor
                        showCursor: false,
                        // character for cursor
                        cursorChar: "|",
                        // attribute to type (null == text)
                        attr: null,
                        // either html or text
                        contentType: 'html',
                        // call when done callback function
                        callback: function () {
                        },
                        // starting callback function before each string
                        preStringTyped: function () {
                        },
                        //callback for every typed string
                        onStringTyped: function () {
                        },
                        // callback for reset
                        resetCallback: function () {
                        }
                    });
                });
                $("#checkin").on("blur", function () {
                    var checkIn = $(this).val();
                    var date = $("#date").val();

                    $.ajax({
                        url: "ajax/meeting_form_check.php",
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