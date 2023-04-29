<!DOCTYPE html>
<html lang="en-US">

<head>

    <?php ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); ?>
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
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

    <div class="offcanvas-menu-wrapper">
        <div id="mobile-menu-wrap"></div>
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
                            <li><a href="./theatre.php">Theatre</a></li>
                            <li class="active"><a href="./movie.php">Movie</a></li>
                            <li ><a href="./promotion.php">Promotion</a></li>
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
    

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">

            <?php
                  $movie_id = $_GET['movie_id'];
                  $sql = "SELECT * FROM movieinfo WHERE movie_id = '$movie_id'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
                  $movie_name = $row['movie_name'];
                  $description = $row['movie_description'];
                  $movie_length = $row['movie_length'];
                  $director = $row['director_info'];
                  $_start_date = $row['releaseDate'];
                  $_start_date = date('d M Y', strtotime($_start_date));
                  $trailer = $row['movie_trailer'];
            ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="row">
                              <div class="image-container">
                                    <img src ="./img/poster/<?php echo $movie_id?>.jpg" alt="Movie Poster" width="240" height="320" class="movie-poster">
                                    <!-- <iframe width="560" height="315" src="<?php echo $trailer; ?>" 
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe> -->
                              </div>
                              <div class="col-lg-8 md-6 xd-6 d-flex align-items-center">
                                    <ul><h2 class="h2-movie"><?php echo $movie_name ?></h2><ul>
                                    <ul><p> <?php echo $description ?><p><ul>
                                    <ul><p>Release Date: <?php echo $_start_date ?><p><ul>
                                    <ul><p>Director: <?php echo $director ?><p><ul>
                                    <ul><p>Length: <?php echo $movie_length ?>min<p><ul>

                              </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Query a showings of each movie -->
    <?php
    $sql = "SELECT s.*, b.branch_name, t.*
    FROM (
        SELECT DATE(date_time) AS date_only
        FROM showings
        WHERE movie_id = $movie_id
        AND date_time BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 DAY)
        GROUP BY DATE(date_time)
        ) d
        INNER JOIN showings s ON DATE(s.date_time) = d.date_only
        INNER JOIN branchinfo b ON s.branch_id = b.branch_id 
        INNER JOIN theaterinfo t ON s.theater_no = t.theater_no
        WHERE s.movie_id = $movie_id
        AND s.date_time BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 DAY)
        ORDER BY s.date_time ASC";
    $result = mysqli_query($conn, $sql);
    $displayed_date = null;
    ?>


    <!-- Product Section Begin -->
    <section class="blog spad">
            <?php       // generate each showing
                while ($row = mysqli_fetch_assoc($result)) {
                    $showingID = $row['showing_id'];
                    $branch_name = $row['branch_name'];
                    $date_time = $row['date_time'];
                    $time = date('h:i', strtotime($date_time));
                    $date = date('d M Y', strtotime($date_time));
                    $theatre_no = $row['theater_no'];
                    $language_sub = $row['language_sub'];
                    $language_dub = $row['language_dub'];
                    $system_type = $row['system_type'];
                    
                    if ($date !== $displayed_date) {
                        // display the date and mark it as displayed
                        $displayed_date = $date;
                        echo '<div class="blog__alt"><div class="blog__item__alt"><h3>' . $date . '</h3></div></div>';
                    }
            ?>
            
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-12 md-8 xs-3">
                        <div class="showings-container" data-movie-id="<?php echo $showingID; ?>">
                            <a href="reservation.php?showing_id=<?php echo $showingID; ?>">
                                <div class="blog__item">                  
                                    <div class="blog__item__text">
                                        <h5><img src="./img/icon/clock.png" width=20px height=20px> <?php echo $time; ?></h5>
                                        <h6><img src="./img/icon/location.png" width=20px height=20px> <?php echo $branch_name; ?></h6>
                                        <p>Theatre No: <?php echo $theatre_no; ?> </p>
                                        <p><img src="./img/icon/video-camera.png" width=20px height=20px> System Type: <?php echo $system_type ?> </p>   
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <?php } ?>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="./index.php"><img src="img/about/icon-alt.png" alt=""></a>
                        </div>
                        <p>Best Cinema in SEA.</p>
                    
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




<!-- SELECT s.*, b.branch_name, t.* FROM showings s 
            INNER JOIN branchinfo b ON s.branch_id = b.branch_id 
            INNER JOIN theaterinfo t ON s.theater_no = t.theater_no            
            WHERE s.date_time >= CURDATE() AND s.date_time < DATE_ADD(CURDATE(), INTERVAL 1 DAY) 
            AND s.movie_id = $movie_id -->