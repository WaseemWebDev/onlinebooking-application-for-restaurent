<?php
include './config/connection.php';
session_start();


if (isset($_POST["submit"])) {
    $subject = $_POST["subject"];
    $description = $_POST["description"];
    $email = $_POST["email"];
    include 'functions/mail.php';
    $message = "Email has been sent Successfully";
    ?>
    <script src="assets/bootstrap4/js/jquery3.3.min.js"></script>
    <script>
        $(document).ready(function () {


            if (typeof (window.history.pushState) == 'function') {
                window.history.pushState("", "", "http://localhost/onlinebooking/contact-us.php");

            }

        });
    </script>


    <?php
}
?>

<html>
    <head>
        <title></title>
        <?php include './config/header.php'; ?>
        <style>


            <?php include './config/css.php' ?>


        </style>

    </head>
    <body>
        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
        <?php include './config/menu.php'; ?>

        <div class="container-fluid " >
            <div class="row " style="background:#1864AB; height: 300px; border-radius: 0% 0% 61% 49% / 10% 10% 10% 10% ;">   

                <div class="col-md-12" >
                    <br/> <br/> 
                    <center> <h1 style="color: white;">Contact Us</h1></center>
                    <center><p style="height: 15px; width: 140px; background:orange;border-radius: 7px;"></p></center>

                    <center><p style="color: white; font-family: sans-serif; font-size: 22px;" >We want to here from you Below is the requirements for contact us <br/>
                            we will react to your response soon</p></center>

                    <center><a href="index"><button class="btn btn-info">Go To Home</button></a></center>
                </div>


            </div>
        </div>
        <div class="container " >
            <br/><br/> <br/>
            <div class="row" >
                <div class="col-md-6">
                    <br/>
                    <img src="assets/images/contact-removebg-preview.png" class="img-fluid" style="width: 100%;"  />
                </div>

                <div class="col-md-4 bg-light offset-1 p-3 shadow">
                    <center>  <h2>Contact Form</h3></center>

                    <hr>

                    <?php if (isset($message)) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Email!</strong> has been sent successfuly
                        </div>

                        <?php
                    }
                    ?>

                    <label>Email</label>
                    <form method="post">

                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>

                            <input type="email" placeholder="Your Email"  id="email" name="email" class="form-control" autofocus="" required="required"/>

                        </div>
                        <label>Subject</label>
                        <div class="input-group " >
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-sticky-note"></i></span>
                            </div>

                            <input type="text" placeholder="Enter Subject" id="subject" name="subject" class="form-control"  required="required"/>

                        </div>
                        <label>Description</label>
                        <div class="input-group ">

                            <textarea rows="5" cols="45"class="form-control" name="description"></textarea>

                        </div>
                        <br/>
                        <button class="btn btn-primary btn-block " type="submit" name="submit">Submit</button>
                    </form>

                </div>


            </div>

            <br/><br/> <br/> <br/>
            <br/> 

        </div>


        <div class="container-fluid ">
            <div class="row p-5 justify-content-center" style="background:#1864AB; border-radius: 22% 25% 0% 0% / 10% 10% 10% 10%  ;" >
                <div class="col-md-7" >

                    <center> <h2 style="color:white;"> Find Us Here Google Map</h2></center>
                    <center><p style="height: 15px; width: 140px; background: orange;border-radius: 7px;"></p></center>
                    <br/>
                    <div class="shadow" id="map" style="height: 400px; ">


                    </div>
                </div>


            </div>

        </div>
        <?php include './config/jsfooter.php'; ?>
        <?php include './config/footer.php'; ?>


        <script>

            $(document).ready(function () {
                $('.loader-wrapper').height($(document).height());
                $(window).on("load", function () {
                    $(".loader-wrapper").fadeOut("slow");

                });

                var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
                $('li a').each(function () {
                    if (this.href === path) {
                        $(this).addClass('active');
                    }
                });
            });

            function initialize() {

                var suitLatLng = {lat: 33.963050, lng: 71.528191};

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 18.32,
                    center: suitLatLng
                });

                var marker = new google.maps.Marker({
                    position: suitLatLng,
                    map: map,
                    title: 'Sarhad university of sciences & information Technology'
                });



            }

            google.maps.event.addDomListener(window, 'load', initialize());
        </script>
    </body>
</html>