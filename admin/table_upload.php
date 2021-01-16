<?php
include './config/connection.php';
session_start();

if (!isset($_SESSION["email_id"])){
    header('location:http://localhost/onlinebooking/login');
}

try {
    if (isset($_POST["submit"])) {
        $name = mysqli_real_escape_string($link, $_POST["name"]);
        $location = mysqli_real_escape_string($link, $_POST["location"]);
        $price = mysqli_real_escape_string($link, $_POST["price"]);
        $description = mysqli_real_escape_string($link, $_POST["description"]);

        $file = $_FILES["upload"];
        $fileName = $file["name"];
        $filePath = $file["tmp_name"];
        $fileError = $file["error"];
        if ($fileError == 0) {
            $destFile = 'upload_images/' . $fileName;

            if (move_uploaded_file($filePath, $destFile)) {
                $sql = "insert into tables(`name`,`location`,`image`,`price`,`description`,`status`) values('$name','$location','$destFile','$price','$description','no review')";
                $query = mysqli_query($link, $sql) or die(mysqli_errno($link));

                if ($query) {
                    ?>
                    <script>
                        alert("data has been inserted successfully");
                        location.href = "table_upload.php";
                    </script>
                    <?php
                }
            }
        }
        // Delete the file if it still exists:
        if (file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
            unlink($_FILES['upload']['tmp_name']);
        }
    }
} catch (Exception $ex) {
    echo $ex->getTraceAsString();
}
?>



<html>
    <head>
        <title></title>
        <?php include './config/header.php'; ?>
        <style>
<?php include './config/dashboard_css.php'; ?>
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php include './dashboard.php'; ?>
                <div class="col-md-6 ml-5" >
                    <br/><br/><br/>
                    <center><h2>Upload Table Details Here</h2></center>
                    <br/>
                    <form enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label >name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label >location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="form-group">
                            <label >price:</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div> 
                        <div class="form-group">
                            <label >Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="4" cols="40"></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="pwd">image</label>
                            <input type="file" class="form-control" id="upload" name="upload">
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
            <?php include './config/jsfooter.php'; ?>

            <script>
                $(document).ready(function () {
                    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

                    $('li a').each(function () {
                        if (this.href === path) {

                            $(this).addClass('active');
                        }
                    });
                });

            </script>
        </div>

    </body>
</html>

