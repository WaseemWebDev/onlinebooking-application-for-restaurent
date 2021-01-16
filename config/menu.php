
<div style="background: #FAFAFB; min-height: 66px; max-height: 66px;">
    <div class="container contents" >

        <div class="row  ">
            <div class="col-md-12 p-0  ">
                <nav class="navbar navbar-expand-sm   navbar-light "  style="background: #FAFAFB; color: black !important; ">
                    <a class="navbar-brand"  href="index" style="color:black !important;"><img src="assets/images/open-restaurant-logo_0.png" class="img-fluid" alt="logo" height="35" width="35" style=" border-radius:56% 44% 45% 55% / 30% 40% 60% 70% ;" />Online Booking</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ml-5 " >
                            <li class="nav-item ">
                                <a style="color: black;" class="nav-link" href="index">Home</a>
                            </li>
                            <li class="nav-item dropdown" style="color:white !important;">
                                <a class="nav-link dropdown-toggle" href="#" style="color: black;" id="navbardrop" data-toggle="dropdown">
                                    Reserve
                                </a>
                                <div class="dropdown-menu "  >
                                    <a class="dropdown-item" href="restaurent" style="color: black !important;">Restaurant</a>
                                    <a class="dropdown-item" href="table" style="color: black !important;">Table</a>

                                </div>
                            </li>

                            <li class="nav-item">
                                <a style="color: black;" class="nav-link" href="contact-us">Contact Us</a>
                            </li>    
                            <?php
                           if (isset($_SESSION["email_id"])) {
                                ?>
                             <li class="nav-item">
                                <a style="color: black;" class="nav-link" href="order-history">Order history</a>
                            </li>  
                            <?php
                            }
                            
                            ?>
                        </ul>

                        <?php
                        if (isset($_SESSION["email_id"])) {
                            ?>
                            <ul class="navbar-nav ml-auto">
                                 
                                <a href="#" class="btn btn-info mr-3 loginbtn" style="border-radius: 4px; font-size: 13px;"  role="button"><?php echo substr($_SESSION["email_id"], 0, 6) ?></a>



                            </ul>
                            <li class="nav-item dropdown " style="color:white !important; font-size: 13px; margin-top: -20px;">
                                <button class="nav-link dropdown-toggle btn btn-danger p-2 logout " href="#" style="color: white; font-size: 12px;" id="navbardrop" data-toggle="dropdown">
                                    logout
                                </button>
                                <div class="dropdown-menu "  >
                                    <a class="dropdown-item" href="logout.php" style="color: black !important;" >logout</a>

                                </div>
                            </li>

                            <?php
                        } else {
                            ?>
                            <ul class="navbar-nav ml-auto">
                                <a href="./login.php" class="btn btn-info mr-3 loginbtn" style="border-radius: 4px; font-size: 13px;"  role="button">login</a>
                                <a href="./signup.php" class="btn btn-primary signupbtn" style="border-radius: 4px;  font-size: 13px;" role="button">Sign up</a>


                            </ul>
                            <?php
                        }
                        ?>
                    </div>  
                </nav>
            </div>
        </div>

    </div>
