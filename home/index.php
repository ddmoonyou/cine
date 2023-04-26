<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Booking Ticket Website">
    <meta name="keywords" content="Movie,Cine,Cinema">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CINE</title>

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
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./theatre.php">Branch</a></li>
                            <!-- <li><a href="./movie.php">Movie</a></li> -->
                            <li><a href="./promotion.php">Promotion</a></li>
                            <li><a href="./snack.php">Snack&Drink</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <a href="#"><img src="img/icon/cart.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="img/hero/john_wick4.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <div class="container-bg">
                                    <h6>Now Showings</h6>
                                    <h2>John Wick: Chapter 4</h2>
                                </div>
                                <a href="#" class="primary-btn">BOOK NOW <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero__items set-bg" data-setbg="img/hero/avatar.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <div class="container-bg">
                                    <h6>Now Showings</h6>
                                    <h2>Avatar: The Way Of Water</h2>
                                </div>
                                <a href="#" class="primary-btn">BOOK NOW<span class="arrow_right"></span></a>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero__items set-bg" data-setbg="img/hero/gotg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <div class="container-bg">
                                    <h6>03 May 2023</h6>
                                    <h2>Guardian of The Galaxy Vol.3</h2>
                                </div>
                                <a href="#" class="primary-btn">BOOK NOW<span class="arrow_right"></span></a>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter__controls">

                        <?php
                        $sql = "SELECT * FROM movieinfo  WHERE releaseDate <= CURDATE()";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Invalid query: ' . mysqli_error($conn));
                        }
                        ?>

                    <h3>NOW SHOWINGS</h3>
                    </div>
                </div>
            </div>

            <div class="row product__filter">
                
                <?php   
                    // Loop through the result set and generate HTML code for each movie    url('<?php echo $movie_poster;
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $movie_name = $row['movie_name'];
                        $releasedate = $row['releaseDate'];
                        $movie_length = $row['movie_length'];
                        $movie_poster = $row['movie_poster'];
                        $formatted_date = date("d M Y", strtotime($releasedate));
                        $movie_id = $row['movie_id'];
                        $director = $row['director_info'];
                ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                            <div class="movie-container" data-movie-id="<?php echo $movie_id; ?>">
                                <a href="showings.php?movie_id=<?php echo $movie_id; ?>">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="./img/poster/<?php echo $movie_id; ?>.jpg">  
                                            <ul class="product__hover">
                                                <li>Length: <?php echo $movie_length; ?>min</li>
                                                <li>Director: <?php echo $director; ?></li>
                                            </ul> 
                                        </div>
                                        <div class="product__item__text">
                                            <h6><?php echo $movie_name; ?></h6>
                                            <h5><?php echo $formatted_date; ?></h5>
                                        </div> 
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                <?php } ?>
            </div>
        </div>      

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <?php
                        $sql = "SELECT * FROM movieinfo  WHERE releaseDate > CURDATE()";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Invalid query: ' . mysqli_error($conn));
                        }
                        ?>
                       <h3 class="active" data-filter="*">COMING SOON</h3>
                    </ul>
                </div>
            </div>

            <div class="row product__filter">
                
                <?php   
                    // Loop through the result set and generate HTML code for each movie    url('<?php echo $movie_poster;
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $movie_name = $row['movie_name'];
                        $releasedate = $row['releaseDate'];
                        $movie_length = $row['movie_length'];
                        $movie_poster = $row['movie_poster'];
                        $formatted_date = date("d M Y", strtotime($releasedate));
                        $movie_id = $row['movie_id'];
                        $director = $row['director_info'];
                ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                            <div class="movie-container" data-movie-id="<?php echo $movie_id; ?>">
                                <a href="showings.php?movie_id=<?php echo $movie_id; ?>">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="./img/poster/<?php echo $movie_id; ?>.jpg">  
                                            <ul class="product__hover">
                                                <li>Length: <?php echo $movie_length; ?>min</li>
                                                <li>Director: <?php echo $director; ?></li>
                                            </ul> 
                                        </div>
                                        <div class="product__item__text">
                                            <h6><?php echo $movie_name; ?></h6>
                                            <h5><?php echo $formatted_date; ?></h5>
                                        </div> 
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                <?php } ?>
            </div>
        </div>
        
    </section>
    <!-- Product Section End -->

    

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/about/icon-alt.png" alt=""></a>
                        </div>
                        <p>Best Cinema in SEA</p>
                    
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Menu</h6>
                        <ul>
                            <li><a href="theatre.php">Theatre</a></li>
                            <li><a href="#">Movie</a></li>
                            <li><a href="#">Promotion</a></li>
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
