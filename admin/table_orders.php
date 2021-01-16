<?php
session_start();

if (!isset($_SESSION["email_id"])){
    header('location:http://localhost/onlinebooking/login');
}
?>
<!DOCTYPE html>

<html>
    <head>

        <title>Admin panel</title>
        <?php include './config/header.php'; ?>

        <style>
<?php include './config/dashboard_css.php'; ?>


        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row"> 

                <?php include './dashboard.php'; ?>
                <div  class="col-md-10">
                    <center><h1>Table Reservation Orders</h1></center>  
                    <br/><br/>
                    <div class="jumbotron p-3 bg-white shadow " >
                        <table class="table table-hover table-striped table-responsive  table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>User name</th>
                                    <th>Table Name</th>
                                    <th>Table image</th>
                                    <th>Email</th>
                                    <th>No of Tables</th>
                                    <th>No Of Persons</th>
                                    <th>Phone No</th>
                                    <th>check In</th>
                                    <th>Check Out</th>
                                    <th>Booking Date</th>     
                                    <th></th>
                                    <th>action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../config/connection.php';
                                $sno = 1;
                                $query = "select * from tables_orders order by id  desc";
                                $result = mysqli_query($link, $query) or die(mysqli_errno($link));
                                $data = "";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["id"];
                                    $image = $row["image"];
                                    ?>
                                    <tr>
                                        <td><?php echo $sno++ ?></td>
                                        <td><?php echo $row["user_name"]; ?></td>
                                        <td><?php echo $row["table_name"]; ?></td>
                                        <td><?php
                                            if ($image == "Not avaiable because it is quick order") {
                                                echo "Not avaiable because it is quick order";
                                            } else {
                                                echo "<img src='" . $image . "' height='60' width='80' />";
                                            }
                                            ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php echo $row["no_of_tables"] ?></td>
                                        <td><?php echo $row["no_of_persons"] ?></td>
                                        <td><?php echo $row["phone_no"] ?></td>
                                        <td><?php echo $row["checkIn"] ?></td>
                                        <td><?php echo $row["checkout"] ?></td>
                                        <td><?php echo $row["booking_date"] ?></td>
                                        <td><input type='hidden' id='hidden' name="hidden" value=" <?php echo $id ?> "/></td>
                                        <td><?php echo" <input type='button' id='delete'  name='delete' value='delete' class='btn btn-danger btn-sm' />" ?></td>
                                        <td><?php echo" <button type='button' id='upbtn' data-dismiss='modal'  class='btn btn-success btn-sm' data-toggle='modal' data-target='#myModal' >update</button>" ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" id="update" class="btn btn-success" value="update" data-dismiss="modal" />
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>   
                    </div>


                </div>

                <?php include './config/jsfooter.php'; ?>
                <script>
                    $(document).ready(function () {
                        $('#table').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                {
                                    extend: 'pdfHtml5',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL'
                                },
                                 {
                                    extend: 'csvHtml5',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL'
                                }
                                ,
                                {
                                    extend: 'copyHtml5',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL'
                                }
                            ]
                        });
                        var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

                        $('li a').each(function () {
                            if (this.href === path) {
                                $(this).addClass('active');
                            }
                        });


                        $("#table tbody").on('click', '#upbtn', function () {
                            var closest = $(this).closest("tr");
                            var id = closest.find("input[type=hidden]").val();
                            $.ajax({
                                url: "ajax/tables_record_modal.php",
                                type: 'GET',
                                data: {"id": id
                                },
                                async: false,
                                cache: false,
                                success: function (data) {

                                    $(".modal-body").html(data);
                                }
                            });
                        });

                        $("input[id=update]").click(function () {
                            var id = $("#hiddens").val();
                            var checkIn = $("#checkin").val();
                            var checkOut = $("#checkout").val();

                            $.ajax({
                                url: "ajax/update_tables_orders.php",
                                type: 'GET',
                                data: {"id": id,
                                    "checkin": checkIn,
                                    "checkout": checkOut
                                },
                                async: false,
                                cache: false,
                                success: function (data) {
                                    alert(data);
                                    location.href = "http://localhost/onlinebooking/admin/table_orders.php";
                                }
                            });
                        });

                        $("#table tbody").on('click', '#delete', function () {
                            var closest = $(this).closest("tr");
                            var id = closest.find("input[id=hidden]").val();
                            $.ajax({
                                url: "ajax/delete_tables_order.php",
                                type: 'GET',
                                data: {"id": id,
                                },
                                async: false,
                                cache: false,
                                success: function (data) {
                                    location.href = "http://localhost/onlinebooking/admin/table_orders.php";
                                }
                            });
                        });
                    });

                </script>
                </body>
                </html>