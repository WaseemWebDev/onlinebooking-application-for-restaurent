
<?php
//if(isset($_SESSION["email"])){
//    header("location:home.php");
//}
include './config/connection.php';

if (isset($_POST["login"])) {
    $message = "";
    $email = $_POST["email"];

    $query = "select * from registration where email='$email'";

    $result = mysqli_query($link, $query) or die(mysqli_errno($link));

    $row = mysqli_fetch_assoc($result);
    $token = $row["token"];

    if ($row > 0) {
        include './forgot_password_mail.php';
        $message = "email has been sent succesfully";
    }
    else{
        $message = "wrong email";
    }  
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>forgot password</title>

        <?php include './config/header.php'; ?>
        <style>
            body{
                margin: 0px;
                box-sizing:border-box;
            }

        </style>
    </head>
    <body class="bg-light"> 


        <div class="container-fluid ">

            <br>


            <center> <h1 class="" style="color:green;">Provide acurate information to recover <b id="bold"">password</b></h1></center>

            <br/><br><br>


            <div class="row no-gutters justify-content-center ">


                <div class="col-md-3 col-sm-6 ">
                    <div  class="">


                        <form method="post" >
                            <label >Email</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                                </div>
                                <input type="email" value=""name="email" id="email" class="form-control" placeholder="Enter correct email" required="required" autofocus="" >            

                            </div>
                            <br/>
                            <input type="submit" name="login" id="login" class="btn btn-success btn-block" style="border-radius: 11px;"/>
                        </form>
                        <a href="login.php"><p>Back to login</p></a>

                        <?php
                        if (isset($message)) {
                            ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><?php echo $message?></strong </div>

                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </body>


</html>
