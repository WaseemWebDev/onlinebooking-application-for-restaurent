<?php include './config/connection.php'; ?>

<?php
if (isset($_POST["submit"])) {

    $firstName = mysqli_real_escape_string($link, $_POST["firstname"]);
    $lastName = mysqli_real_escape_string($link, $_POST["lastname"]);
    $email = mysqli_real_escape_string($link, $_POST["email"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($link, $_POST["confirmpassword"]);
    $token = md5(rand(0, 60000000000000));
    $message = "";
    try {
        if ($password !== $confirmPassword) {
            
        } else {

            $encrypted = md5($password);
            $query = "insert into `registration`(`firstname`,`lastname`,`email`,`password`,`role`,`token`) values('$firstName','$lastName','$email','$encrypted','user','$token')";
            $rowAffected = mysqli_query($link, $query) or die(mysqli_error($link));
            if ($rowAffected > 0) {
                $message = "you have successfuly signup please check your email to activate your account ";
                ?>
                <script>
                    alert("you have succesfully registered");
                </script>

                <?php
                include "./activation_email.php";
               
                header("location:login.php?success=$message");
            }
        }
    } catch (Exception $ex) {
        echo $ex->getTraceAsString();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <?php
        include './config/header.php';
        ?>
        <style>
            @media only screen and (max-width: 500px) {
                .login {
                    height:560px !important;
                    font-size: 10px;
                    max-width: 480px;
                }
            }

        </style>
    </head>
    <body>  
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="jumbotron " style="height: 130px; padding: 40px; background:#1864AB; border-radius:0% 0% 56% 61% / 10% 10% 34% 34% ;">
                        <h1 style="text-align: center;  margin-top: -19px; color: white;">Registration Form</h1>
                    </div>  

                </div>
            </div>

            <p id="successfull"></p>
            <div class="row ">

                <div class="login col-md-12 d-flex justify-content-center  " >
                    <div   style="  padding: 30px; margin-right: 5px;  max-width: 500px; margin-left: 5px; box-shadow: 0 1px 1px rgba(0,0,0,0.12), 
                           0 2px 2px rgba(0,0,0,0.12), 
                           0 4px 4px rgba(0,0,0,0.12), 
                           0 8px 8px rgba(0,0,0,0.12),
                           0 16px 16px rgba(0,0,0,0.12);">
                        <center> <h1   style="color:#0073B1;">Sign Up</h1></center>
                        <br/>
                        <form method="post" onsubmit="return signUpValidation();">
                            <label style="color:#0073B1;">First name</label>
                            <input type="text" autofocus="" required="required"
                                   class="form-control col-12" placeholder="First name" name="firstname" id="firstname" />

                            <label style="color:#0073B1;">Last name</label>
                            <input type="text"  required="required" class="form-control "
                                   placeholder="Last name" name="lastname" id="lastname"/>


                            <label style="color:#0073B1;">Email or phone no</label>
                            <input type="email"   id="email" name="email" class="form-control"
                                   placeholder="Email or phone no"/>
                            <p style="color: red;"  id="emailmessage"></p>


                            <label  style="color:#0073B1;">Password (6 or more characters)</label>
                            <input type="password"  required="required" 
                                   class="form-control "id="password" name="password"  placeholder="Password (6 or more characters)"/>

                            <label style="color:#0073B1;">Confirm Password (6 or more characters)</label>
                            <input type="password"  required="required" 
                                   class="form-control "id="confirmpassword" name="confirmpassword"  placeholder="Password (6 or more characters)"/>
                            <br/>
                            <p style="color:#0073B1;">By clicking Agree & Join, you agree to the Hotel User Agreement, Privacy Policy, and Cookie Policy.</p>
                            <input type="submit" id="submit" name="submit" class="btn btn-primary btn-block text-white" style="border-radius: 7px;" value="Agree & Join"/>

                            <center><p style="color:#0073B1;">Already have an account? <a href="login.php">Sign in</a></p></center>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <?php
    include './config/footer.php';
    ?>

    <script>
        $(document).ready(function () {

            $("#email").on("blur keyup", function () {
                var email = $("#email").val();
                $.ajax({
                    url: "ajax/emailcheck.php",
                    method: "post",
                    data: {"email": email},
                    async: false,
                    cache: false,
                    success: function (data) {
                        if (!(data === "")) {
                            $("#emailmessage").html(data);
                            $("#emailmessage").focus();
                            document.getElementById("submit").disabled = true;
                        }
                        else {
                            $("#emailmessage").html("");
                            document.getElementById("submit").disabled = false;
                        }
                    }
                });
            });
        });




        function signUpValidation() {

            var firstName = document.getElementById("firstname").value.trim();
            var lastName = document.getElementById("lastname").value.trim();
            var email = document.getElementById("email").value.trim();
            var password = document.getElementById("password").value.trim();
            var confirmPassword = document.getElementById("confirmpassword").value.trim();
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;


            if (firstName.length == "" || lastName.length == "") {
                alert("Fields  can not be empty");
                return false;
            }

            else if (!email.match(emailRegex)) {
                alert("please provide correct email syntax");
                return false;

            }
            if (password.length < 6 && confirmPassword.length < 6) {
                alert("password length can not be less than 6");
                return false;
            }
            if (password !== confirmPassword) {
                alert("password are not matching");

                return false;
            }
            else {
                return true;
            }


        }


    </script>
</body>
</html>
