<?php
include './config/connection.php';
session_start();


if (isset($_SESSION["email_id"])) {
    header("location:index.php");
}
try {
    if (isset($_POST["login"])) {

        $email = mysqli_real_escape_string($link, $_POST["email"]);
        $password = mysqli_real_escape_string($link, $_POST["password"]);
        $encryptePassword = md5($password);

        $query = "select *  from registration where email='$email' and password='$encryptePassword'and status='1'  ";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $row = mysqli_fetch_assoc($result);

        $role = $row["role"];
        if ($row == 0) {
            $message = "invalid email or password";
            header("location:login?message=$message");
        } else {
            if ($role == "admin") {
                 $_SESSION["email_id"] = $email;
                header("location:admin/home");
                
            }
            if ($role == "user") {
                $_SESSION["email_id"] = $email;
                header("location:index");
                
            }
        }
        if (!empty($_POST["checkbox"])) {
            setcookie("email", $email, time() + (10 * 365 * 24 * 60 * 60));
            setcookie("password", $password, time() + (10 * 365 * 24 * 60 * 60));
        } else {
            if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
                setcookie("email", "");
                setcookie("password", "");
            }
        }
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Online booking application for restaurant</title>

        <?php include './config/header.php'; ?>
        <style>
            body{
                margin: 0px;
                box-sizing:border-box;
            }
            body{
                margin:0;
                padding:0;
                font-family:"arial",heletica,sans-serif;
                font-size:12px;
                background: white url('assets/images/tumblr_static_bg3.png') repeat 0 0;
                -webkit-animation: 80s linear 0s normal none infinite animate;
                -moz-animation: 80s linear 0s normal none infinite animate;
                -ms-animation: 80s linear 0s normal none infinite animate;
                -o-animation: 80s linear 0s normal none infinite animate;
                animation: 80s linear 0s normal none infinite animate;

            }

            @-webkit-keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
            }

            @-moz-keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
            }

            @-ms-keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
            }

            @-o-keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
            }

            @keyframes animate {
                from {background-position:0 0;}
                to {background-position: 500px 0;}
            }

        </style>
    </head>
    <body> 
        <?php
        if (isset($_GET["message"])) {
            ?>
            <script src="assets/swal.js"></script>
            <script>
                swal("<?php echo $_GET["message"] ?>");
                if (typeof (window.history.pushState) == 'function') {
                    window.history.pushState("", "", "http://localhost/onlinebooking/login");

                }
            </script>
            <?php
        }
        ?>

        <div class="container-fluid ">

            <br>
            <div class="row justify-content-center">

                <div class="col-md-6 ">
                    <img class="float-left"  src="assets/images/open-restaurant-logo_0.png" width="100" height="100" class="float-md-right img-fluid" style="border-radius:56% 44% 45% 55% / 30% 40% 60% 70% ;" />

                    <center> <h1 class="mt-3" style="color:white;">Online Booking Application For <b id="bold"">Restaurant</b></h1></center>
                  
                </div>
                <br/>
            </div>

            <br/><br><br>


            <div class="row no-gutters justify-content-center ">

                <div class="col-md-3 col-sm-6">
                    <img src="assets/images/3dhotel.jpg" alt="hotel image" style="height: 500px; width: 590px; box-shadow: 3px 0px 0px 3px; border-radius:10% 0% 0% 10% / 10% 10% 10% 10%  ; "   class="img-fluid"/>
                </div>

                <div class="col-md-3 col-sm-6 ">

                    <div  class="ml-1 " style="height: 500px; background:white; min-width: 150px; border-radius:0% 6% 4% 0% / 10% 10% 10% 10%  ; box-shadow: 3px 0px 3px 0px; padding:8px;">
                        <br/>
                        <center><h1 style="color:#0073B1;">Login</h1></center>
                        <?php
                        if (isset($_GET["success"])) {
                            ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $_GET["success"] ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($_GET["activate_message"])) {
                            ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $_GET["activate_message"] ?>
                            </div>
                            <script> if (typeof (window.history.pushState) == 'function') {
                                    window.history.pushState("", "", "http://localhost/onlinebooking/login");

                                }</script>
                            <?php
                        }
                        ?>
                        <form method="post" >
                            <center><label style="position: relative; top: 20px;color:#0073B1; font-size:17px; ">Email</label></center>

                            <div class="input-group " style="margin-top:20px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input type="email" value="<?php
                                if (isset($_COOKIE['email'])) {
                                    echo $_COOKIE['email'];
                                }
                                ?>"   
                                       name="email" id="email" class="form-control" placeholder="Email" required="required" autofocus="" >     
                            </div>


                            <br/>
                            <center><label style="color:#0073B1; font-size: 17px; ">Password</label></center>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" value="<?php
                                if (isset($_COOKIE['password'])) {
                                    echo $_COOKIE['password'];
                                }
                                ?>" required="required" class="form-control "name="password" id="password" placeholder="Password">


                            </div>

                            <br/>

                            <input type="checkbox"id="checkbox" <?php if (isset($_COOKIE['email'])) { ?> checked="" <?php } ?>  name="checkbox" /> <span style="color:#0073B1;">Remember me </span>
                            <br/><br/>

                            <input type="submit" name="login" id="login" class="btn btn-primary btn-block" style="border-radius: 11px;"/>

                            <center><p style="color:#0073B1;">Forgot your password?<a href="forgot.php"><b>click here</b></a></p></center>

                            <center><p style="color:#0073B1;">Dont have an account?<a href="signup.php"><b>click here</b></a></p></center>
                        </form>
                        <center> <p ><b id="message"style="color:#0073B1; font-size: 14px; "></b></p></center>
                    </div>
                </div>
            </div>
        </div>

    </body>


</html>
