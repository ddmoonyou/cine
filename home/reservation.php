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
                            <li class="active"><a href="./index.php">Movie</a></li>
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

    
    <section class="breadcrumb-option">
    <form action="order_confirmation.php" method="POST"> 
            <?php
                $showingID = $_GET['showing_id'];
                  
                $sql = "SELECT * FROM showings
                JOIN branchinfo ON branchinfo.branch_id = showings.branch_id
                JOIN theaterinfo ON theaterinfo.branch_id = showings.branch_id AND 
                                    theaterinfo.theater_no = showings.theater_no
                JOIN movieinfo ON movieinfo.movie_id = showings.movie_id
                WHERE showing_id=$showingID;";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die('Invalid query: ' . mysqli_error($conn));
                }
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
                  //Movie information
                  $movie_name = $row['movie_name'];
                  $description = $row['movie_description'];
                  $movie_length = $row['movie_length'];
                  $director = $row['director_info'];
                  $_start_date = $row['releaseDate'];
                  $_start_date = date('d M Y', strtotime($_start_date));
                  $trailer = $row['movie_trailer'];
                  $movie_id = $row['movie_id'];
                //Showings Information
                $b_id = $row["branch_id"];
                $theater = $row["theater_no"];
                $branch_name = $row["branch_name"];
                $date = $row["date_time"];
                $f_date = date("F d, Y", strtotime($date));
                $system_type = $row["system_type"];
                $time = date("H:i", strtotime($date));
            ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                    <div class="container">
                            <h4>Reservation</h4>
                            <div class="breadcrumb__links">
                                <a href="./index.php">Home</a>
                                <a>Showings</a>
                                <span> Reservation</span>
                                
                                
                            </div>
                        </div>
                        <div style="padding-top:20px">
                        <div class="row">
                              <div class="image-container">
                                    <img src ="./img/poster/<?php echo $movie_id ?>.jpg" alt="Movie Poster" width="200" height="225"
                                    class="movie-poster" style="padding-left:20px">
                            </div>
                            <div class="col-lg-8 md-6 xd-6 d-flex align-items-center">
                                <ul><h4 class="h2-movie"> <?php echo $movie_name ?></h4><ul>
                                        <ul>
                                            <h6>Showings Information</h6>
                                            <ul><img src="./img/icon/video-camera.png" width=25px height=25px>Theater No: <?php echo $theater ?> System: <?php echo $system_type ?></ul>
                                            <ul><img src="./img/icon/location.png" width=20px height=20px>Branch: <?php echo $branch_name ?></ul>
                                            <ul><img src="./img/icon/clock.png" width=25px height=25px>Time: <?php echo $time.' '.$f_date?></ul><br>
                                        <ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>

    
    
    <div class="row justify-content-md-center">
        
        
      

        <?php
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

    <input type="hidden" name='showing_id' value= <?php echo $showingID; ?> >
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
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
                            ) AS a;";

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

        <div class="row justify-content-center">
            <table style="border-spacing:20px">
                <tr>
                    <td><img src="./img/icon/sofa-bed.png" width="30px"> Premium Bed 2500THB    </td>
                    <td><img src="./img/icon/chair.png" width="20px"> Honeymoon Seat 400THB   </td>
                    <td><img src="./img/icon/chair2.png" width="20px"> Premium Seat 180THB   </td>
                </tr>
            </table>
        </div>
    </div>
        




    
<!-- Snack Section -->
<section class="shop snack" >
    <div class="container" style="margin-top: 100px;"> 
            <div class="col-lg-12">
                  <div class="filter__controls">
                    <h4><b>Snack & Drink List</b></h4>
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                                <a href="#drinks">Drinks</a>
                                                <a href="#snack">Snacks</a>
                                                <a href="#popcorn">Popcorn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  </div>
            </div>
      </div>

      
       <div class="container" id="popcorn">
                <div class="col-lg-12">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="filter__controls">
                                <?php
                                $sql = "SELECT DISTINCT * FROM foodinfo 
                                WHERE category='popcorn'";
                                $result = mysqli_query($conn, $sql);

                                if (!$result) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }
                                ?>
                                <h4 class="active" data-filter="*">Popcorn List</h4>
                            </ul>
                        </div>
                    </div>

                    <div class="row product__filter">
                        
                        <?php   
                            // Loop through the result set and generate HTML code for each movie    url('<?php echo $movie_poster;
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                $food_type = $row['food_type'];
                                $category = $row['category'];
                                $description = $row['description'];
                                //$food_id = $row['food_id'];
                                //$price = $row['price'];

                                $select_size ="SELECT food_id,size,price FROM foodsize WHERE food_type = '$food_type';";
                                $price = mysqli_query($conn, $select_size);
                                if (!$price) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }


                              
                        ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 mix new-arrivals">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="./img/snack/<?php echo $food_type; ?>.png">   </div>
                                            <div class="product__item__text">
                                                <h5><?php echo $food_type; ?></h5>
                                                <p><?php echo $description; ?></p>
                                                        
                                                        <!-- <option selected disabled>Select Size</option> -->
                                                        <?php
                                                        $quantity = 0;
                                                        foreach($price as $p) {
                                                            $food_id = $p["food_id"];
                                                            $size = $p["size"];
                                                            $price = $p["price"];
                                                            echo "<div class='row'><div class='col-5'> ";
                                                            echo "<span>$size: $price THB</span>";
                                                            echo "<input type='number' id='quantity' name='food_quantity[]' value='$quantity' min='0' max='10'>";
                                                            echo "<input type='hidden' name='food_id[]' value='$food_id'>";
                                                            echo "</div></div>";
                                                        }
                                                        ?>
                                            </div> 
                                        </div>
                                    </div> 
                        <?php } ?>
                                </div>
                    </div>
                </div>
            
                    
        </div>
    </section>


    <section class="shop snack" id="drinks">
       <div class="container">
           <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="filter__controls">
                                <?php
                                $sql = "SELECT DISTINCT * FROM foodinfo 
                                WHERE category='drinks'";
                                $result = mysqli_query($conn, $sql);

                                if (!$result) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }
                                ?>
                                <h4 class="active" data-filter="*">Drinks List</h4>
                            </ul>
                        </div>
                    </div>

                    <div class="row product__filter">
                        
                        <?php   
                            // Loop through the result set and generate HTML code for each movie    url('<?php echo $movie_poster;
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                $food_type = $row['food_type'];
                                $category = $row['category'];
                                $description = $row['description'];
                                //$food_id = $row['food_id'];
                                //$price = $row['price'];

                                $select_size ="SELECT food_id,size,price FROM foodsize WHERE food_type = '$food_type';";
                                $price = mysqli_query($conn, $select_size);
                                if (!$price) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }


                              
                        ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 mix new-arrivals">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="./img/snack/<?php echo $food_type; ?>.png">   </div>
                                            <div class="product__item__text">
                                                <h5><?php echo $food_type; ?></h5>
                                                <p><?php echo $description; ?></p>
                                                                            
                                                    
                                                        <!-- <option selected disabled>Select Size</option> -->
                                                        <?php
                                                        $quantity = 0;
                                                        foreach($price as $p) {
                                                            $food_id = $p["food_id"];
                                                            $size = $p["size"];
                                                            $price = $p["price"];
                                                            echo "<div class='col-3'> <div class='row'>";
                                                            echo "<span>$size: $price</span>";
                                                            echo "<input type='number' id='quantity' name='food_quantity[]' value='$quantity' min='0' max='10'>";
                                                            echo "<input type='hidden' name='food_id[]' value='$food_id'>";
                                                            echo "</div></div>";
                                                        }
                                                        ?>
                                            </div> 
                                        </div>
                                    </div> 
                        <?php } ?>
                                </div>
                    </div>
                </div>
                            
                </div>
            </div>
        </div>
    </section>


    <section class="shop snack" id="snack">
       <div class="container">
           <div class="row">
               
                <div class="col-lg-12">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="filter__controls">
                                <?php
                                $sql = "SELECT DISTINCT * FROM foodinfo 
                                WHERE category='snack'";
                                $result = mysqli_query($conn, $sql);

                                if (!$result) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }
                                ?>
                                <h4 class="active" data-filter="*">Popcorn List</h4>
                            </ul>
                        </div>
                    </div>

                    <div class="row product__filter">
                        
                        <?php   
                            // Loop through the result set and generate HTML code for each movie    url('<?php echo $movie_poster;
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                $food_type = $row['food_type'];
                                $category = $row['category'];
                                $description = $row['description'];

                                $select_size ="SELECT food_id,size,price FROM foodsize WHERE food_type = '$food_type';";
                                $price = mysqli_query($conn, $select_size);
                                if (!$price) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }


                              
                        ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 mix new-arrivals">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="./img/snack/<?php echo $food_type; ?>.png">   </div>
                                            <div class="product__item__text">
                                                <h5><?php echo $food_type; ?></h5>
                                                <p><?php echo $description; ?></p>
                                                                            
                                                    
                                                        <!-- <option selected disabled>Select Size</option> -->
                                                        <?php
                                                        $quantity = 0;
                                                        foreach($price as $p) {
                                                            $food_id = $p["food_id"];
                                                            $size = $p["size"];
                                                            $price = $p["price"];
                                                            echo "<div class='col-3'> <div class='row'>";
                                                            echo "<span>$size: $price</span>";
                                                            echo "<input type='number' id='quantity' name='food_quantity[]' value='$quantity' min='0' max='10'>";
                                                            echo "<input type='hidden' name='food_id[]' value='$food_id'>";
                                                            echo "</div></div>";
                                                        }
                                                        ?>
                                            </div> 
                                        </div>
                                    </div> 
                        <?php } ?>
                                </div>
                    </div>
                </div>
                            
                </div>
            </div>
        </div>
    </section>

   <div class="container" style="padding-bottom:30px"> 
        <div class="row justify-content-end"><div class="col-1">  
    <button type="submit" class="primary-btn" id="submit"> Book </button>
    </div></div></div>
</form>


    








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