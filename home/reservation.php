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
    $servername = "127.0.0.1";  
    $username = "root";   
    $password = "";    
    $dbname = "cine"; 

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
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->


    

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
                            <li><a href="./theatre.php">Branch</a></li>
                            <li class="active"><a href="./movie.php">Movie</a></li>
                            <li><a href="./promotion.php">Promotion</a></li>
                            <li><a href="./#">Snack&Drink</a></li>
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

    <!-- Background Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="img/cinema-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Reservation</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Background Section End -->


    <section class="product spad">
    <div class=""> </div>
    <?php


    $showingID = $_GET['showing_id'];

    $sql = "SELECT branch_id,theater_no FROM showings
            WHERE showing_id=$showingID;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Invalid query: ' . mysqli_error($conn));
    }
    $data = mysqli_fetch_assoc($result);
    $b_id = $data["branch_id"];
    $theater = $data["theater_no"];


    $sql = "SELECT DISTINCT seat_row,seat_type FROM
    (
    SELECT * FROM seatlayout
        WHERE layout_type IN 
        (
            SELECT layout_type from theaterinfo
            WHERE branch_id = $b_id
            AND theater_no = $theater
         )
    ) AS a;";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('Invalid query: ' . mysqli_error($conn));
    }
    ?>



<div class="container">
    <div class="row">
        <div class="col-lg-9 md-8">
            <div class="text-left">
            <table class="table">
            <form action="booking.php" method="POST"> 
            <?php // generate all avialable seats
                while ($row = mysqli_fetch_assoc($result)) {


                    $seat_row = $row['seat_row'];
                    $seat_type = $row['seat_type'];
                    ?>
                    <tr>
                        <td>
                            <p>Row:
                                <?php echo $seat_row ?>
                            </p>
                        </td>
                        <?php

                        $sql2 = "SELECT seat_column FROM seatlayout
                        WHERE seat_id IN
                        (
                            SELECT seat_id FROM reserveseats
                            WHERE reserve_id IN
                            (
                                SELECT reserve_id FROM reserveinfo
                                WHERE showing_id = $showingID
                            )
                            
                        )
                        AND seat_row = '$seat_row';";
                        $available = mysqli_query($conn, $sql2);
                        if (!$available) {
                            die('Invalid query: ' . mysqli_error($conn));
                        }
                        $i = 0;
                        $available_seat = array();
                        foreach ($available as $a) {
                            $i++;
                            $available_seat[$i] = $a['seat_column'];
                        }


                        $sql = "SELECT seat_column FROM
                        (
                            SELECT * FROM seatlayout
                            WHERE 
                            layout_type IN 
                            (
                                SELECT layout_type from theaterinfo
                                WHERE branch_id = $b_id
                                AND theater_no = $theater
                             )
                             AND seat_row = '" . $seat_row . "'
                        ) AS a
                        ;";

                        $column_res = mysqli_query($conn, $sql);
                        if (!$column_res) {
                            die('Invalid query: ' . mysqli_error($conn));
                        }
                        while ($column = mysqli_fetch_assoc($column_res)) {
                            $seat_column = $column['seat_column'];
                            echo "<td><img src='./img/icon/";

                            $status = 0;
                            if (strcmp($seat_type, 'Premium Bed') == 0) {
                                if (in_array($seat_column, $available_seat)) {
                                    $status = 1;
                                    echo "u-bed.png";

                                } else {
                                    echo "sofa-bed.png";
                                }

                            } else if (strcmp($seat_type, 'Honeymoon Seat') == 0) {
                                if (in_array($seat_column, $available_seat)) {
                                    $status = 1;
                                    echo "u-chair.png";
                                } else {
                                    echo "chair.png";
                                }
                            } else if (strcmp($seat_type, 'Premium Seat') == 0) {
                                if (in_array($seat_column, $available_seat)) {
                                    $status = 1;
                                    echo "u-chair.png";
                                } else {
                                    echo "chair2.png";
                                }
                            }
                            

                            $sql_id = "SELECT seat_id FROM seatlayout
                            WHERE seat_row = '$seat_row' AND seat_column = $seat_column
                            AND layout_type IN 
                            (
                                SELECT layout_type from theaterinfo
                                WHERE branch_id = $b_id
                                AND theater_no = $theater
                            );";
                            $r = mysqli_query($conn, $sql_id);
                            if (!$r) {
                                die('Invalid query: ' . mysqli_error($conn));
                            }
                            $s = mysqli_fetch_assoc($r);
                            $seat_id = $s["seat_id"];
                                
                            if ($status == 0) {
                                echo "' width=40px hight=40px> <input type=\"checkbox\" name=\"select_seat[]\" value=$seat_id />" . $seat_row . $seat_column . "</td>";
                            } else {
                                echo "' width=40px hight=40px>" . $seat_row . $seat_column . "</td>";
                            }
                        }
                        unset($available_seat)
                            ?>

                    </tr>


                <?php } ?>

            </table>
            </div>
        </div>

        <div class="col-3"> <img src="./img/icon/seat_price.png">  <button type="submit" class="primary-btn" id="submit"> Book </button> </form> </div>
        
    </div>
    <div class="row"> <img src="./img/icon/screen.png" height="80px"></div>

</div>

    








    <!-- Footer Section -->
    <?php include('footer.php'); ?>

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
