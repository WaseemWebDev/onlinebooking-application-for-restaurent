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

                <div class="col-md-10">
                    <center><h1>Business Quick Orders</h1></center>  
                    <br/><br/>


                    <div class="jumbotron p-3 bg-white shadow " >
                        <table class="table table-hover table-striped table-responsive " id="table">

                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Restaurent Type</th>
                                    <th>Phone number</th>
                                    <th>Persons</th>
                                 
                                    <th>Check in</th>
                                    <th>Check Out</th>
                                    <th>Booking Date</th>
                                    <th></th>
                                    <th>action</th>
                                    <th></th>




                                </tr>
                            </thead>

                            <tbody >
                                <?php include './ajax/get_bussiness_record.php'; ?>

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
                        bussinessRecord();

                        var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

                        $('li a').each(function () {
                            if (this.href === path) {
                                $(this).addClass('active');
                            }
                        });

                        function bussinessRecord() {
                            $.ajax({
                                url: "ajax/get_bussiness_record.php",
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
                                url: "bussiness_record_modal.php",
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
                        $("#table tbody").on('click', '#delete', function () {
                            var closest = $(this).closest("tr");
                            var id = closest.find("input[type=hidden]").val();

                            $.ajax({
                                url: "ajax/delete_bussiness_orders.php",
                                type: 'GET',
                                data: {"id": id
                                },
                                async: false,
                                cache: false,
                                success: function (data) {

                                    bussinessRecord();

                                }
                            });

                        });



                        $("input[id=update]").click(function () {

                            var id = $("#hidden").val();
                            var checkIn = $("#checkin").val();
                            var checkOut = $("#checkout").val();

                            $.ajax({
                                url: "ajax/update_bussiness_record.php",
                                type: 'GET',
                                data: {"id": id,
                                    "checkin": checkIn,
                                    "checkout": checkOut
                                },
                                async: false,
                                cache: false,
                                success: function (data) {
                                    alert(data);
                                    bussinessRecord();
                                }
                            });

                        });

                    });

                </script>
                </body>
                </html>