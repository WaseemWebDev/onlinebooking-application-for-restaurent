<?php
include"./config/connection.php";

if (isset($_POST["submit"])) {
    try {
        $token = $_GET["token"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm_password"];
        $encryptePassword = md5($password);
        $message = "";

        if ($password == $confirmPassword && !empty($password) && !empty($encryptePassword)) {
            $query = "update registration set password = '$encryptePassword' where token='$token' ";
            $rowAffected = mysqli_query($link, $query) or die(mysqli_errno($link));

            if ($rowAffected > 0) {
                $message = "password has been reset sucessfully";
            }
        } else {
            $message = "password does not match";
        }
    } catch (Exception $ex) {
        $ex->getTraceAsString();
    }
}
?>

<html>
    <head>
        <title>set new password</title>
        <?php include "./config/header.php" ?>

    </head>
    <body>
        <br/><br/>
    <center><h2 style="color:green;">Set new password here</h2></center>
    <br/><br/><br/><br/><br/>
    <div class="container">
        <div class="row justify-content-center" >

            <div class="col-md-7">
                <form method="post">

                    <label>Enter new password</label>
                    <input type="password" placeholder="enter new password" id="password" class="form-control"  name="password" autofocus="" required="" />
                    <br/>
                    <label>confirm password</label>
                    <input type="password" placeholder="confirm password" id="confirm_password" class="form-control" name="confirm_password"  required="" />
                    <br/>
                    <input type="submit" id="submit" name="submit" class="btn btn-success btn-block" /> 

                </form>
                <?php
                if (isset($message)) {
                    ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?php echo $message ?></strong>
                    </div>

                    <?php
                }
                ?>

                <a href="login.php">click To Login</a>
            </div>
        </div>

    </div>
    <?php include './config/jsfooter.php'; ?>

</body>
</html>