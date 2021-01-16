<?php
include './config/connection.php';
include './orders_notification.php';
include './ajax/get_tables_orders_notification.php';
session_start();

if (!isset($_SESSION["email_id"])){
    header('location:http://localhost/onlinebooking/login');
}

$query2 = "SELECT ( SELECT COUNT(*) FROM registration  where status=1) AS users, ( SELECT COUNT(*) FROM tables_orders ) AS tables, ( SELECT COUNT(*) FROM restaurents ) AS restaurent FROM dual";

$result2 = mysqli_query($link, $query2) or die(mysqli_errno($link));

$row2 = mysqli_fetch_assoc($result2);

if (isset($_GET["block"])) {
    $hiddenId = $_GET["hidden"];
    $blockQuery = "update registration set status='0' where id =$hiddenId";
    $effect = mysqli_query($link, $blockQuery) or die(mysqli_errno($link));
    if ($effect > 0) {
        header("location:http://localhost/onlinebooking/admin/home.php");
    }
}
?>

<!DOCTYPE html>


<html>
    <head>

        <title>Admin panel</title>
        <?php include'../config/header.php' ?>
        <style>
<?php include './config/dashboard_css.php'; ?>

            
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row "> 

                <?php include './dashboard.php'; ?>

                <div class="col-md-10">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <a class="navbar-brand" href="home.php">Admin Panel</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <ul class="nav navbar-nav ml-auto mr-5">
                            <li class="nav-item dropdown  dropleft">
                                <span class="badge badge-pill badge-primary">Tables Orders</span>
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell" id="table-bell"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <a class='dropdown-item' ><h4> Tables Orders</h4></a>
                                    <?php echo getTablesNotification($link); ?>


                                </div>
                            </li>

                            <li class="nav-item dropdown  dropleft">
                                <span class="badge badge-pill badge-success">Restaurent special</span>
                                <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell" id="notify-bell"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">

                                    <a class='dropdown-item' ><h4> Restaurent Orders</h4></a>

                                    <?php echo getNotification($link) ?>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <br/>
                    <center><h1>Online Booking Application For Restaurent Admin Panel</h1></center>
                    <br/>

                    <h3 class="ml-5">Registered Users</h3>
                    <br/> 
                    <div class="row ">
                        <div class="col-md-8  bg-light shadow">
                            <table class="table  table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>sno</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = " select *   from registration  where status =1";

                                    $result = mysqli_query($link, $query) or die(mysqli_errno($link));
                                    $sno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row["id"];
                                        $firstName = $row["firstname"];
                                        $lastName = $row["lastname"];
                                        $email = $row["email"];
                                        $fullName = $firstName . $lastName;
                                        echo "<tr><td>" . $sno++ . "</td>";
                                        echo "<td>" . $fullName . "</td>";
                                        echo "<td>" . $email . "</td>";
                                        echo "<td><form method='get'> <input type='hidden' id='hidden' value='" . $id . "' name='hidden'  /></td>";
                                        echo "<td> <input type='submit' id='block' value='block' name='block' class='btn btn-danger btn-sm' /></form></td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-3 ml-3" >
                            <center><h3>Visual Stats</h3></center>
                            <br/>
                            <canvas id="myChart" width="35" height="30" > </canvas>
                        </div>

                    </div>
                    <br/><br/>
                    <div class="row  justify-content-center" >
                        <div class="col-md-3 ">

                            <div class="card bg-light mb-3">
                                <div class="card-header">Total Users</div>
                                <div class="card-body">
                                    <h5 class="card-title">Total Current Users</h5>
                                    <h2 class="card-text"><?php echo $row2["users"] ?></h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="card bg-light mb-3">
                                <div class="card-header">Total Restaurents</div>
                                <div class="card-body">
                                    <h5 class="card-title">Total Current Restaurents</h5>
                                    <h2 class="card-text"><?php echo $row2['restaurent'] ?></h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="card bg-light mb-3">
                                <div class="card-header">Total Tables</div>
                                <div class="card-body">
                                    <h5 class="card-title">Total Current Tables</h5>
                                    <h2 class="card-text"><?php echo $row2["tables"] ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <?php include '../config/jsfooter.php'; ?>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script>
            $(document).ready(function () {
                graph();
                $('#table').DataTable({
                    "scrollY": 400,
                    
                    dom: 'Bfrtip',
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10 rows', '25 rows', '50 rows', 'Show all']
                    ],
                    buttons: [
                        'pageLength',
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

                notificationCounts();
                tableNotificationCounts();
                var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

                $('li a').each(function () {
                    if (this.href === path) {

                        $(this).addClass('active');
                    }
                });



                $("#notify-bell").click(function () {
                    $.ajax({url: "ajax/update_notification.php",
                        type: 'GET',
                        async: false,
                        cache: false,
                        success: function (data) {
                            notificationCounts();
                        }
                    });
                });
                $("#table-bell").click(function () {
                    $.ajax({url: "ajax/update_table_notification.php",
                        type: 'GET',
                        async: false,
                        cache: false,
                        success: function (data) {
                            tableNotificationCounts();
                        }
                    });
                });
                function notificationCounts() {
                    $.ajax({url: "ajax/special_order_notification_count.php",
                        type: 'GET',
                        async: false,
                        cache: false,
                        success: function (data) {
                            $("#notify-bell").html(data);
                        }
                    });
                }
                function tableNotificationCounts() {
                    $.ajax({url: "ajax/get_tables_notification_counts.php",
                        type: 'GET',
                        async: false,
                        cache: false,
                        success: function (data) {
                            $("#table-bell").html(data);
                        }
                    });
                }
                function graph() {
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ["Restaurents", "Tables", "Users"],
                            datasets: [{
                                    backgroundColor: [
                                        "#2ecc71",
                                        "#3498db",
                                        "#e74c3c"
                                    ],
                                    data: [<?php echo $row2['restaurent'] ?>, <?php echo $row2["tables"] ?>, <?php echo $row2["users"] ?>]
                                }]
                        }
                    });

                }


            });


        </script>

    </body>
</html>