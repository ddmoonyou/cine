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
    <header class="header" id="myHeader">
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
                            <li><a href="./theatre.php">Branch</a></li>
                            <li ><a href="./promotion.php">Promotion</a></li>
                            <li><a href="./snack.php">Snack&Drink</a></li>
                        </ul>
                    </nav>
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

    


    <h4>Thailand Branch</h4>
            <select id="selectBranch"> 
            <?php
            $sql = "SELECT * FROM branchinfo WHERE branch_address LIKE '%Thailand%' ORDER BY branch_name";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            $branch_name = $row['branch_name'];
            $branch_id = $row['branch_id'];
            echo '<button type="button" class="second-btn" value='.$branch_id.'>' . $branch_name . ' </button>';
            ?>
            </select> 
            <?php } ?>
    <section class="blog spad">
            

            <!-- Query a showings of each movie -->
            <?php 
            $sql = "SELECT DISTINCT * FROM showings s,theaterinfo t,branchinfo b
            where s.theater_no = t.theater_no
            and s.branch_id = t.branch_id
            and b.branch_id = s.branch_id
            and s.movie_id = $movie_id
            and date(s.date_time) = CURRENT_DATE()
            ORDER BY s.date_time ASC;
            ";
            $result = mysqli_query($conn, $sql);
            $displayed_date = null;
            // generate each showing
                while ($row = mysqli_fetch_assoc($result)) {
                    $showingID = $row['showing_id'];
                    $branch_name = $row['branch_name'];
                    $date_time = $row['date_time'];
                    $time = date('H:i', strtotime($date_time));
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
                            <div class="blog__item__text">
                                <div class="card-showing"> 
                                    <div class="card-top-showing">
                                        <h6 style="align:left" style="color:white"><img src="./img/icon/location.png" width=20px height=24px> <?php  echo $branch_name; ?></h6>
                                    </div>
                                        <p>Theatre No: <?php echo $theatre_no; ?> </p>
                                        <p><img src="./img/icon/video-camera.png" width=20px height=20px> System Type: <?php echo $system_type ?> </p>
                                        <p><img src="./img/icon/audio.png" width=25px><?php echo $language_dub.'/'.$language_sub ?></p>
                                        <img src="./img/icon/clock.png" width=25px height=25px>
                                        <a href="reservation.php?showing_id=<?php echo $showingID; ?>"> 
                                        
                                        <button class="btn-light showing-time-btn" data-showingid="<?php echo $showingID?>"> 
                                            <?php echo $time; ?>
                                        </button> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php } ?>
    </section>
    <!-- Product Section End -->

    <?php include('footer.php'); ?>

   

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


