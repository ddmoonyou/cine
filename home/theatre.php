<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Booking Ticket Website">
    <meta name="keywords" content="Movie,Cine,Cinema">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theatre | CINE</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Rubik+Glitch&family=Vollkorn&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="icon" href="img/about/icon.png">

    <script src="main.js"></script>

    <!-- Connect to database -->
    <?php
    $servername = "127.0.0.1";  // server name localhost
    $username = "root";    // username to access database id20613770_cinebyhansa
    $password = "";    // password to access database %1tcYSTb0gf}1+YM
    $dbname = "cine"; // name of the database

    // Create a connection to MySQL database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //echo "Connected successfully";

?> 

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a class href="./index.php">CINE</a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li class="active"><a href="./theatre.php">Branch</a></li>
                            <!-- <li><a href="./movie.php">Movie</a></li> -->
                            <li><a href="./promotion.php">Promotion</a></li>
                            <li><a href="./snack.php">Snack&Drink</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <a href="#"><img src="img/icon/cart.png" alt=""> </a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Background Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="img/theatre-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Cinema</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Background Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-items-center">
                    <ul class="filter__controls">
                        <h2><br><img src="./img/icon/location.png" width=30px height=30px>Thailand</h2>
                        <?php
                        $sql = "SELECT * FROM branchinfo WHERE branch_address LIKE '%Thailand%';";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Invalid query: ' . mysqli_error($conn));
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="row product__filter">
                
                <?php   
                    // Loop through the result set and generate HTML code for each movie    url('<?php echo $movie_poster;
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $branch_id = $row['branch_id'];
                        $branch_name = $row['branch_name'];
                        $address = $row['branch_address'];
                        $telephone = $row['branch_telephone'];
                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix">
                            <div class="blog__item">
                                    <div class="blog__item__pic set-bg" data-setbg="./img/theatre/<?php echo $branch_id?>.jpg"> </div>
                                    <div class="blog__item__text">
                                          <h6-cen><?php echo $branch_name; ?></h6-cen>
                                          <p><?php echo $address; ?></p>
                                          <span>Tel: <?php echo $telephone; ?></span>
                                    </div>
                              </div>
                        </div>
                <?php } ?>
            </div>
        </div>      
    
    </section>
    <!-- Product Section End -->

        <!-- Product Section Begin -->
        <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <div class="text-container"><h2><img src="./img/icon/location.png" width=30px height=30px> Aboard</h2></div>
                        <?php
                        // Assume you have already established a connection to your database
                        $sql = "SELECT * FROM branchinfo WHERE branch_address NOT LIKE '%Thailand%';";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Invalid query: ' . mysqli_error($conn));
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="row product__filter">
                
                <?php   
                    // Loop through the result set and generate HTML code for each movie    url('<?php echo $movie_poster;
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $branch_id = $row['branch_id'];
                        $branch_name = $row['branch_name'];
                        $address = $row['branch_address'];
                        $telephone = $row['branch_telephone'];
                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix">
                            <div class="blog__item">
                                    <div class="blog__item__pic set-bg" data-setbg="./img/theatre/<?php echo $branch_id;?>.jpg"> </div>
                                    <div class="blog__item__text">
                                          <h6-cen><?php echo $branch_name; ?></h6-cen>
                                          <p><?php echo $address; ?></p>
                                          <span>Tel: <?php echo $telephone; ?></span>
                                    </div>
                              </div>
                        </div>
                <?php } ?>
            </div>
        </div>      
    
    </section>
    <!-- Product Section End -->
   
    

    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="index.php"><img src="img/about/icon-alt.png" alt=""></a>
                        </div>
                        <p>Best Cinema in SEA</p>
                    
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Menu</h6>
                        <ul>
                            <li><a href="theatre.php">Branch</a></li>
                            <li><a href="movie.php">Movie</a></li>
                            <li><a href="promotion.php">Promotion</a></li>
                            <li><a href="#">Snack&Drink</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewsLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new movies & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <!-- <button type="submit"><span class="icon_mail_alt"></span></button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>



<!-- <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/4d.jpg"></div>
                        <div class="blog__item__text">
                            <h5>4D</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/imax.jpg"></div>
                        <div class="blog__item__text">
                            <h5>IMAX Theatre</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/laser.jpg"></div>
                        <div class="blog__item__text">
                            <h5>Laser Theatre</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div> -->