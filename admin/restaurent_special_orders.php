<?php
session_start();

if (!isset($_SESSION["email_id"])) {
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
                <div class="col-md-10">
                    <center><h1>Restaurent Special Orders</h1></center>  
                    <br/><br/>
                    <div class="jumbotron p-3 bg-white shadow " >
                        <table class="table table-hover table-striped table-responsive table-bordered" id="table">

                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>user name</th>
                                    <th>Phone number</th>
                                    <th>Amount</th>
                                    <th></th>
                                    <th>Location</th>
                                    <th>Booking Date</th>
                                    <th></th>
                                    <th></th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                include './ajax/get_special_orders.php';
                                ?>
                            </tbody>
                        </table>
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
                specialRecord();

                var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

                $('li a').each(function () {
                    if (this.href === path) {

                        $(this).addClass('active');
                    }
                });

                function specialRecord() {
                    $.ajax({
                        url: "ajax/get_special_orders.php",
                        type: 'GET',
                        async: false,
                        cache: false,
                        success: function (data) {
                            $("tbody").html(data);

                        }
                    });
                }

                $("#table tbody").on('click', '#upbtn', function () {
                    var closest = $(this).closest("tr");
                    var id = closest.find("input[type=hidden]").val();

                    $.ajax({
                        url: "ajax/special_record_modal.php",
                        type: 'GET',
                        data: {"id": id
                        },
                        async: false,
                        cache: false,
                        success: function (data) {
                            alert(data)

                        }
                    });

                });
//               
                $("#table tbody").on('click', '#delete', function () {

                    var closest = $(this).closest("tr");
                    var id = closest.find("input[type=hidden]").val();

                    $.ajax({
                        url: "ajax/delete_special_restaurent_order.php",
                        type: 'GET',
                        data: {"id": id
                        },
                        async: false,
                        cache: false,
                        success: function (data) {

                            specialRecord();
                        }
                    });

                });
                $("input[id=update]").click(function () {

                    var id = $("#hidden").val();
                    var checkIn = $("#checkin").val();
                    var checkOut = $("#checkout").val();

                    $.ajax({
                        url: "ajax/update_special_record.php",
                        type: 'GET',
                        data: {"id": id,
                            "checkin": checkIn,
                            "checkout": checkOut
                        },
                        async: false,
                        cache: false,
                        success: function (data) {
                            alert(data);
                            specialRecord();
                        }
                    });

                });
            });

        </script>
    </body>
</html>