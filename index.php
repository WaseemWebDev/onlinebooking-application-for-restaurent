<?php
include './config/connection.php';
session_start();
?> 

<html>
    <head>
        <title>Online Booking Application For Restaurent</title>
        <link href="config/css.css" rel="stylesheet"/>
        <?php include './config/header.php'; ?>

    </head>

    <body>
        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
        <?php include './config/menu.php'; ?>

        <!--  This section is for carousal slider -->
        <div class="container-fluid " >

            <div class="row   "  >
                <div class="col-md-12   p-0 ">

                    <h1 class="heading d-flex justify-content-center" data-aos="slide-down" data-aos-duration="1500"   style="position:absolute;  min-width: 50%; top: 51%; left:30%; right: 24%; color:white; z-index:99999;">Online Booking Application For Restaurent</h1>

                    <div class="input-group groupbtn"style="position: absolute; z-index: 99999; top: 69%; max-width:60%; left: 25%; right: 25%;">
                        <input type="text" id="search"  class="form-control  search " placeholder="Search">
                        <div class="input-group-append ">
                            <button class="btn btn-primary searchbtn" type="button">Search &nbsp; </button>
                        </div> 
                    </div>

                    <ul class='list-group' id="search_ul" style="position:absolute; top: 520px;  z-index: 99999; left: 470px;">
                    </ul>

                    <input type="hidden" value="" id="list-id" />
                    <input type="hidden" value="" id="category" />
                    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img src="assets/images/chairs-furniture-indoors-interior-design-245535.jpg" alt="Chicago"class="img-fluid"   style="max-height:800px;    filter: brightness(.7); width: 100% "  >
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/coca-cola_ice_glass_splashes_5379_1920x1080.jpg"  alt="coca cola"class="img-fluid" style="max-height:800px;  filter: brightness(.4); width: 100%;" >
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/coffee_coffee_pot_coffee_shop_126219_1920x1080.jpg"  alt="tea"class="img-fluid" style="max-height:800px;  filter: brightness(.4); width: 100%;" >
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>

                </div>
            </div>

        </div>
        <br/>
        <div class="container " >
            <!--  This section is for icons and tooltip -->

            <div class="row justify-content-center bg-light" >
                <div class="col-md-12 jumbotron  " style="background: linear-gradient(90deg, rgba(4,5,32,1) 0%, rgba(44,53,105,1) 0%, rgba(35,35,87,1) 79%);  box-shadow: 0 1px 1px rgba(0,0,0,0.12), 
                     0 2px 2px rgba(0,0,0,0.12), 
                     0 4px 4px rgba(0,0,0,0.12), 
                     0 8px 8px rgba(0,0,0,0.12),
                     0 16px 16px rgba(0,0,0,0.12);">
                    <div style="width: 100%">

                        <a style="font-size:57px; color:white;  "  data-toggle="tooltip" data-placement="top" title="swimming pool"><i class="fas fa-swimming-pool" style="padding-bottom: 10px;"></i></a>



                        <a style="font-size:57px; color:white;  "  data-toggle="tooltip" data-placement="top" title="Restaurant"><i class="fas fa-hotel" style="padding-bottom: 10px;"></i></a>


                        <a style="font-size:57px; color:white;  "  data-toggle="tooltip" data-placement="top" title="car parking facility"><i class="fas fa-car" style="padding-bottom: 10px;"></i></a>


                        <a style="font-size:57px; color:white;  "  data-toggle="tooltip" data-placement="top" title="Hyganic food"><i class="fas fa-fish" style="padding-bottom: 10px;"></i></a>


                    </div>


                </div>
                <br/>

            </div>
            <br/>
            <!--  This section is for the main three  offers  -->
            <center> <h2 class="font-weight-bold">What We Offer</h2></center>
            <center><p style="height: 9px; width: 80px; background:orange;border-radius: 7px;"></p></center>
            <hr/>
            <br/>
            <div class="row  ">
                <div data-aos="fade-up" data-aos-duration="1500" class="col-md-3 shadow  mr-auto ml-auto mb-5 p-0 pb-3  cardss" style="min-height: 230px; text-align:left;   min-width: 350px; background: #FFFFFF; ">

                    <img src="assets/images/woman-in-restaurant-wearing-apron-1739748.jpg" alt="restaurent"  style="height: 170px; width:100%;"   class="img-fluid" />
                    <center> <h6><i>Restaurent Booking</i></h6></center>
                    <p class="text-muted ml-2"><i>We provide best quality restaurents with best prices </i></p>


                </div>
                <div data-aos="fade-down" data-aos-duration="1500" class="col-md-3 shadow col-sm-2 mr-auto ml-auto mb-5 pb-3 p-0 cardss " style="min-height: 230px; text-align: left; min-width: 350px;   background: #FFFFFF; ">

                    <img src="assets/images/empty-dining-tables-and-chairs-1579739.jpg" alt="table"  style="height: 170px; width:100%;"   class="img-fluid" />
                    <center> <h6><i >Table Booking</i></h6></center>
                    <p class="text-muted ml-2"><i>You can reserve  tables with a few  clicks according to your need</i></p>


                </div>

                <div data-aos="zoom-in" data-aos-duration="1500" class="col-md-3 shadow col-sm-2 mr-auto ml-auto mb-5  pb-3 p-0  cardss" style="min-height: 230px; min-width: 350px;text-align: left;  background: #FFFFFF;   ">

                    <img src="assets/images/hall.jpg" alt="hall"  style="height: 170px; text-align: left; width: 100%;"  class="img-fluid" />
                    <center> <h6><i>Halls For Meetings</i></h6></center>
                    <p class="text-muted ml-2"><i>We also provide  halls and rooms for different type of   meetings  </i></p>



                </div>

            </div>
        </div>

        <!--  This section is for featured images -->
        <div class="contents" style="


             background: radial-gradient(circle, rgba(24,100,171,0.835171568627451) 49%, rgba(70,83,252,1) 100%);  border-radius:31% 24% 0% 0% / 4% 3% 10% 10% ;">
            <div class="container ">
                <br/><br/><br/>
                <center><h2 class="font-weight-bold text-white">Featured Offer</h2></center>
                <center><p style="height: 9px; width: 80px; background:orange;border-radius: 7px;"></p></center>
                <hr/>

                <br/>
                <div class="row bg-white justify-content-center " >

                    <div class="col-md-7 p-0 "  style="max-height: 500px;  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                        <img src="assets/images/pizza.JPG" alt="pizza" class="img-fluid" style="width:100%;  max-height: 500px; "/>

                    </div>
                    <div class="col-md-5  featured " style="max-height: 500px; min-height: 420px;  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                        <br/>
                        <div class="row">
                            <div class="col-md-10">
                                <br/>
                                <center><h5>Review and rating</h5></center>
                            </div>

                            <div class="col-md-2">
                                <h6 s>Big Save</h6>
                                <h6 style="color: red;">250$</h6>
                            </div>

                        </div>

                        <center><h4>Description</h4></center>
                        <hr/>

                        <p class="text-muted featuredtext"  style="text-align: justify;">
                            Buy one large pizza and get one pizza free  plus  discount of 20% on all other menu's
                        </p>
                        <center><button class="btn btn-primary  pl-5 pr-5" >Read more</button></center>
                    </div>
                    <div >
                    </div>
                </div>
            </div>
            <br/><br/><br/>
        </div>

        <div class="container-fluid bg-light  " >
            <br/>
            <center> <h2 class="font-weight-bold">Other Facilities We Provide</h2></center>
            <center><p style="height: 9px; width: 80px; background:orange;border-radius: 7px;"></p></center>
            <hr/>
            <br/><br/><br/>
            <div class="row  justify-content-center   ">

                <div class="col-md-3" data-aos="zoom-in-up" data-aos-duration="1500">
                    <center><img src="assets/images/birthday.png" class="img-fluid"  /></center>
                    <center><h4>Birthday Celebration</h4></center>
                    <center><p class="text-muted">we provide facilites and Enviroment<br/> for birthday celebration<p></center>
                </div>
                <div class="col-md-3" data-aos="zoom-in-up" data-aos-duration="1500">
                    <center><img src="assets/images/meeting.png" class="img-fluid"  /></center>
                    <center><h4>Bussiness Meeting</h4></center>
                    <center><p class="text-muted">we  also provide  Enviroment<br/> for bussiness meeting and gathering<p></center>
                </div>
                <div class="col-md-3" data-aos="zoom-in-up" data-aos-duration="1500">
                    <center><img src="assets/images/wedding.png" class="img-fluid"  /></center>
                    <center><h4>Wedding Party</h4></center>
                    <center><p class="text-muted">we have large area for wedding<br/> ceremonies and parking<p></center>
                </div>


            </div>
            <br/><br/><br/>

        </div>
        <br/><br/>
        <div style="background: radial-gradient(circle, rgba(24,100,171,0.835171568627451) 49%, rgba(70,83,252,1) 100%);    border-radius:31% 24% 0% 0% / 4% 3% 10% 10% ;">
            <br/>
            <div class="container   " data-aos="fade-down" data-aos-duration="1500">

                <center><h2 class="font-weight-bold text-white">Our Gallery</h2></center>
                <center><p style="height: 9px; width: 80px; background:orange;border-radius: 7px;"></p></center>
                <hr/>

                <center><p class="text-white ">click to view in zoom effect</p> </center>
                <hr/>
                <div class="row  no-gutters">

                    <div class="col-md-4 shadow">
                        <a href="assets/images/dan-gold-E6HjQaB7UEA-unsplash.jpg" class="image-link">
                            <img src="assets/images/dan-gold-E6HjQaB7UEA-unsplash.jpg" class="rounded img-fluid"  style="width:450px ; height:180px;"/>
                        </a>
                    </div> 
                    <div class="col-md-4 shadow">
                        <a href="assets/images/empty-dining-tables-and-chairs-1579739.jpg" class="image-link">
                            <img src="assets/images/empty-dining-tables-and-chairs-1579739.jpg" class="rounded img-fluid"  style="width:450px ; height: 180px;;"/>
                        </a>
                    </div>
                    <div class="col-md-4 shadow">
                        <a href="assets/images/gray-padded-chair-2290753.jpg" class="image-link">
                            <img src="assets/images/gray-padded-chair-2290753.jpg" class="rounded img-fluid"  style="width:450px ; height:180px;"/>
                        </a>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="assets/images/neven-krcmarek-q0ZvNn8SXy0-unsplash.jpg" class="image-link">
                            <img src="assets/images/neven-krcmarek-q0ZvNn8SXy0-unsplash.jpg" class="rounded img-fluid"  style="width: 100%; height: 300px;"/>
                        </a>
                    </div>


                </div>
                <div class="row no-gutters">

                    <div class="col-md-4 shadow">
                        <a href="assets/images/resize-1594367704729948989pizza30073951920.jpg" class="image-link">
                            <img src="assets/images/resize-1594367704729948989pizza30073951920.jpg" class="rounded img-fluid"  style="width:100%; height:180px;"/>
                        </a>
                    </div>
                    <div class="col-md-4 shadow">
                        <a href="assets/images/baloon.jpg" class="image-link">
                            <img src="assets/images/resize-15943677771284530115abendbrot9394351920.jpg" class="rounded img-fluid"  style="width:100%; height:180px;"/>
                        </a>
                    </div>
                    <div class="col-md-4 shadow">
                        <a href="assets/images/baloon.jpg" class="image-link">
                            <img src="assets/images/resize-1594367739370449109soup14297931920.jpg" class="rounded img-fluid"  style="width:100%; height:180px;"/>
                        </a>
                    </div>



                </div>
            </div>
            <br/> <br/> <br/>
        </div>




        <div class="container-fluid " >
            <div class="row jumbotron contents text-center   " data-aos="fade-up" data-aos-duration="1500">

                <div class="col-md-3 " >
                    <center> <img src="assets/images/eat.png" class="img-fluid" style="height: 80px;"  /></center>
                    <br/>
                    <center> <h5>Enjoy Eating</h5></center>
                    <p class="text-muted">we provide neat and clean enviroment <br/> so customers can feel reliable</p>
                </div>
                <div class="col-md-3" >
                    <center> <img src="assets/images/vegetable.png" class="img-fluid" style="height: 80px;"  /></center>
                    <br/>
                    <center> <h5>Fresh Salad</h5></center>
                    <p class="text-muted">we provide fresh salad <br/> to our customers</p>
                </div>
                <div class="col-md-3 " >
                    <center> <img src="assets/images/tea.png" class="img-fluid" style="height: 80px;"  /></center>
                    <br/>
                    <center> <h5>Cold Drinks</h5></center>
                    <p class="text-muted"> variety of cold drinks  <br/> avaliable  according to cutomser desire</p>
                </div>

                <div class="col-md-3 " >
                    <center> <img src="assets/images/animal.png" class="img-fluid" style="height: 80px;"  /></center>
                    <br/>
                    <center> <h5>Fresh Sea Food</h5></center>
                    <p class="text-muted">Fresh sea food available <br/> in different types</p>
                </div>

            </div>

        </div>

        <div class="container-fluid bg-light  ">
            <br/><br/>
            <center><h2 class="font-weight-bold">Our Services</h2></center>
            <center><p style="height: 9px; width: 80px; background:orange;border-radius: 7px;"></p></center>
            <hr/>
            <br/>
            <div class="row justify-content-center contents" >


                <div class="col-md-3" data-aos="zoom-in-up" data-aos-duration="1500">
                    <center> <img src="assets/images/delivery.png" class="img-fluid" alt="home delivery" style="width: 340px;height: 197px;  border-radius:56% 44% 45% 55% / 30% 40% 60% 70% ;"/></center>
                    <br/>
                    <Center><h4>Home Delivery</h4></center>
                    <center><p style="color:#0031BC;"class="text-muted">We provide 24/7 free delivery when person orders above 2000Rs</p></center>

                </div>
                <div class="col-md-3" data-aos="zoom-in-down" data-aos-duration="1500" >
                    <center> <img src="assets/images/burger.jpg" class="img-fluid" alt="home delivery" style="width: 340px;height: 197px;  border-radius:56% 44% 45% 55% / 30% 40% 60% 70% ;"/></center>
                    <br/>
                    <Center><h4>Buy 1 Get 1 free</h4></center>
                    <center><p style="color:#0031BC;"class="text-muted">We provide 24/7 free delivery when person orders above 2000Rs</p></center>

                </div>
                <div class="col-md-3" data-aos="zoom-in-left" data-aos-duration="1500">
                    <center> <img src="assets/images/Mobile-asistant-service-support.jpg" class="img-fluid" alt="home delivery" style="width: 260px;height: 197px;  border-radius:56% 44% 45% 55% / 30% 40% 60% 70% ;"/></center>
                    <br/>
                    <Center><h4>24 Hour Service</h4></center>
                    <center><p style="color:#0031BC;"class="text-muted">We provide 24/7 free delivery when person orders above 2000Rs</p></center>

                </div>

            </div>

        </div>

        <br/><br/>
        <div class="container-fluid ">

            <div class="row text-white jumbotron   " data-aos="fade-up" data-aos-duration="1500" style="background:#1864AB; ">


                <div class="col-md-3 " >
                    <center> <h2>Total Customers</h2></center>

                    <center> <span style="font-size: 65px;" class="counter">100</span></center>
                </div>
                <div class="col-md-3 " >
                    <center> <h2>Orders Served</h2></center>

                    <center> <span style="font-size: 65px;" class="counter">20</span></center>
                </div>
                <div class="col-md-3 " >
                    <center> <h2>Pending Orders</h2></center>

                    <center> <span style="font-size: 65px;" class="counter">13</span></center>
                </div>
                <div class="col-md-3 " >
                    <center> <h2>Total Deliveres</h2></center>

                    <center> <span style="font-size: 65px;" class="counter">300</span></center>
                </div>

            </div>

        </div>


        <div class="container ">

            <!-- Section: Testimonials v.3 -->
            <section class="team-section text-center my-5" >

                <!-- Section heading -->
                <h2 class="h1-responsive font-weight-bold my-5">Testimonials</h2>
                <center><p style="height: 9px; width: 80px; background:orange;border-radius: 7px;"></p></center>
                <hr/>
                <!-- Section description -->
                <h4 class="dark-grey-text w-responsive mx-auto mb-5">Here is the the testimonials who are satisfy from our service.</h4>

                <!--Grid row-->
                <div class="row  text-center">

                    <!--Grid column-->
                    <div class="col-md-4 mb-md-0 mb-5" data-aos="fade-down" data-aos-duration="1500">

                        <div class="testimonial">
                            <!--Avatar-->
                            <div class="avatar mx-auto">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg" class="rounded-circle z-depth-1 img-fluid">
                            </div>
                            <!--Content-->
                            <h4 class="font-weight-bold dark-grey-text mt-4">Anna Deynah</h4>
                            <h6 class="font-weight-bold blue-text my-3">Web Designer</h6>
                            <p class="font-weight-normal dark-grey-text">
                                <i class="fas fa-quote-left pr-2"></i>coperative staff and hygene food</p>
                            <!--Review-->
                            <div class="orange-text">
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star-half-alt"> </i>
                            </div>
                        </div>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-md-0 mb-5" data-aos="fade-down" data-aos-duration="1500">

                        <div class="testimonial">
                            <!--Avatar-->
                            <div class="avatar mx-auto">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(8).jpg" class="rounded-circle z-depth-1 img-fluid">
                            </div>
                            <!--Content-->
                            <h4 class="font-weight-bold dark-grey-text mt-4">John Doe</h4>
                            <h6 class="font-weight-bold blue-text my-3">Web Developer</h6>
                            <p class="font-weight-normal dark-grey-text">
                                <i class="fas fa-quote-left pr-2"></i>very nice enviroment and friendly staff.</p>
                            <!--Review-->
                            <div class="orange-text">
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                            </div>
                        </div>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4" data-aos="fade-down" data-aos-duration="1500">

                        <div class="testimonial">
                            <!--Avatar-->
                            <div class="avatar mx-auto">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle z-depth-1 img-fluid">
                            </div>
                            <!--Content-->
                            <h4 class="font-weight-bold dark-grey-text mt-4">Maria Kate</h4>
                            <h6 class="font-weight-bold blue-text my-3">Photographer</h6>
                            <p class="font-weight-normal dark-grey-text">
                                <i class="fas fa-quote-left pr-2"></i> satisfied from  their service</p>
                            <!--Review-->
                            <div class="orange-text">
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="far fa-star"> </i>
                            </div>
                        </div>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!-- Section: Testimonials v.3 -->


        </div>

        <div class="container-fluid  bg-light" data-aos="zoom-in-up" data-aos-duration="1500">


            <br/>
            <center> <h2 class="font-weight-bold">Meet Our Team</h2></center>
            <center><p style="height: 9px; width: 80px; background:orange;border-radius: 7px;"></p></center>
            <hr/>

            <div class="row     justify-content-center ">

                <div class="col-md-3 mr-2 shadow  ml-2 mb-4 p-0 meetcard " style="height: 400px; max-width: 18.5%; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  background: white;">
                    <div class="card booking-card">


                        <div class="view overlay">
                            <img class="card-img-top" src="assets/images/pngtree-user-vector-avatar-png-image_1541962 (1).jpg" alt="Card image cap">

                        </div>

                        <div class="card-body">

                            <h4 class="card-title font-weight-bold">Waseem Sohail</h4>

                            <h5 class="mb-2">Skills</h5>

                            <h6 class="card-text">Html , Css , javascript , jquery , Ajax, Bootstrap , php, Laravel , Mysql , Vuejs , React JS</h6>
                            <hr class="my-4">    
                        </div>

                    </div>
                </div>
                <div class="col-md-3 mr-2 shadow  ml-2 mb-4 p-0 meetcard " style="height: 400px; max-width: 18.5%; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  background: white;">
                    <div class="card booking-card">


                        <div class="view overlay">
                            <img class="card-img-top" src="assets/images/pngtree-user-vector-avatar-png-image_1541962 (1).jpg" alt="Card image cap">

                        </div>

                        <div class="card-body">

                            <h4 class="card-title font-weight-bold">Abubakar khan</h4>

                            <h5 class="mb-2">Skills</h5>

                            <h6 class="card-text">Html , Css , javascript , jquery , Ajax, Bootstrap , php</h6>
                            <hr class="my-4">    
                        </div>

                    </div>
                </div>
                <div class="col-md-3 mr-2 shadow  ml-2 mb-4 p-0 meetcard " style="height: 400px; max-width: 18.5%; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  background: white;">
                    <div class="card booking-card">


                        <div class="view overlay">
                            <img class="card-img-top" src="assets/images/pngtree-user-vector-avatar-png-image_1541962 (1).jpg" alt="Card image cap">

                        </div>

                        <div class="card-body">

                            <h4 class="card-title font-weight-bold">Omair ahmad</h4>

                            <h5 class="mb-2">Skills</h5>

                            <h6 class="card-text">Html , Css , javascript , jquery , Ajax, Bootstrap , php</h6>
                            <hr class="my-4">    
                        </div>

                    </div>
                </div>
                <div class="col-md-3 mr-2 shadow  ml-2 mb-4 p-0 meetcard " style="height: 400px; max-width: 18.5%; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);  background: white;">
                    <div class="card booking-card">


                        <div class="view overlay">
                            <img class="card-img-top" src="assets/images/pngtree-user-vector-avatar-png-image_1541962 (1).jpg" alt="Card image cap">

                        </div>

                        <div class="card-body">

                            <h4 class="card-title font-weight-bold">Jawad khan</h4>

                            <h5 class="mb-2">Skills</h5>

                            <h6 class="card-text">Database,wordpress</h6>
                            <hr class="my-4">    
                        </div>

                    </div>
                </div>

            </div>

            <br/><br/><br/>

        </div>
        <?php include './config/footer.php'; ?>



        <?php include './config/jsfooter.php'; ?>
        <script>
            AOS.init();</script>

        <script>

            $(document).ready(function () {
                $('.loader-wrapper').height($(document).height());

                $(".heading,.groupbtn").css("z-index", "-1");

                $(window).on("load", function () {
                    $(".loader-wrapper").fadeOut("slow");
                    $(".heading,.groupbtn").css("z-index", "99999");
                });
                // this is for the counters animation
                $('.counter').countUp({
                    delay: 10,
                    time: 1000
                });
                //this code is for the active class on the menu
                var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
                $('li a').each(function () {
                    if (this.href === path) {
                        $(this).addClass('active');
                    }
                });
                // this piece of code describes the title when user hover on the icon in the container after the carousal slider
                $('[data-toggle="tooltip"]').tooltip();
                $('.image-link').magnificPopup({
                    type: 'image',
                    mainClass: 'mfp-with-zoom', // this class is for CSS animation below

                    zoom: {
                        enabled: true, // By default it's false, so don't forget to enable it

                        duration: 300, // duration of the effect, in milliseconds
                        easing: 'ease-in-out', // CSS transition easing function

                        // The "opener" function should return the element from which popup will be zoomed in
                        // and to which popup will be scaled down
                        // By defailt it looks for an image tag:
                        opener: function (openerElement) {
                            // openerElement is the element on which popup was initialized, in this case its <a> tag
                            // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                            return openerElement.is('img') ? openerElement : openerElement.find('img');
                        }
                    }

                });
                $("#search").keyup(function () {
                    var searchValue = $(this).val();
                    if (searchValue !== "") {
                        $("#search_ul").fadeIn();

                        $.ajax({
                            url: "ajax/search.php",
                            type: 'POST',
                            data: {"value": searchValue},
                            async: false,
                            cache: false,
                            success: function (data) {
                                $("#search_ul").html(data);
                                $(".search-list").click(function () {
                                    var text = $(this).contents().eq(1).text();
                                    $("#search").val(text);
                                    $("#list-id").val($(this).attr("id"));
                                    $("#category").val($(this).children("span").text());

                                    $("#search_ul").fadeOut();
                                });
                            }
                        });

                    }
                    else {
                        $("#search_ul").fadeOut();
                    }
                });
                $(".searchbtn").click(function () {
                    var id = $("#list-id").val();
                    var category = $("#category").val();
                    if (category == "restaurent") {
                        window.location = "get_restaurents.php?id=" + id + "";
                    } else {
                        window.location = "get_tables.php?id=" + id + "";
                    }
                });
            });



        </script>
    </body>
</html>

