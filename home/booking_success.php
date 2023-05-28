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
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Rubik+Glitch&family=Vollkorn&display=swap"
        rel="stylesheet">
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
    $total = 0;
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
                            <li><a href="./promotion.php">Promotion</a></li>
                            <li><a href="./snack.php">Snack&Drink</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
    <section class="breadcrumb-option">
    
            <?php
                $showingID = $_POST['showing_id'];
                  
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
                                <h4>Booking Success</h4>
                                <div class="breadcrumb__links">
                                    <a href="./index.php">Home</a>
                                    <a>Showings</a>
                                    <a>Reservation</a>
                                    <a>Order Confirmation</a>
                                    <a>Payment Information</a>
                                    <span>Booking Success</span>
                                    
                                    
                                </div>
                            </div>
                            <div style="padding-top:20px"> </div>
                            <div class="row">
                                <div class="image-container">
                                        <img src ="./img/poster/<?php echo $movie_id ?>.jpg" alt="Movie Poster" width="190" height="225"
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

    <section class="shop spad">
    <?php 
      
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['select_seat'])) {

            $showingID = $_POST['showing_id'];
            $payment = $_POST['payment_method'];
          //  $promotionCode = $_POST["promotion_code"];

            $sql = "SELECT seat.seat_id FROM reserveinfo info,reserveseats seat
                    WHERE info.reserve_id = seat.reserve_id
                    AND info.showing_id = $showingID;";

            $result = mysqli_query($conn, $sql);
            $status = 0;
            if (!$result) {
                die('Invalid query: ' . mysqli_error($conn));
            }
            
           
            foreach ($result as $reserve_seat)
            {
                if($status==0 && in_array($reserve_seat['seat_id'],$_POST['select_seat']))
                {
                    $status=1;
                    echo "<div class='container' style='margin-top: 30px;'>
                            <div class='col-lg-12'>
                                <div class='filter__controls'><li>
                                    <ul><h3>Payment Failed</h3></ul>
                                    <ul><h6>We regret to inform you that the selected seat is currently unavailable.</h6></ul>
                                    <ul><h6>Please choose another seat for your convenience.</h6></ul>
                                    <ul><h6>We apologize for any inconvenience caused.</ul></h6>
                                    <br>
                                    <form action='./index.php'>
                                        <button class='primary-btn' type='submit'>Book a new seat</button>
                                    </form>
                                </div>
                            </div>
                        </div>";

                        
                }
                
                        
            }

            if($status==0 )
            {
                if(!empty($_POST['promotion_code']))
                {
                    $code = $_POST['promotion_code'];
                    $sql = "INSERT INTO reserveinfo(showing_id,promotion_code,payment_method)
                            VALUES ($showingID,'$code','$payment');";
                          
                }
                else
                {
                    $sql = "INSERT INTO reserveinfo(showing_id,payment_method)
                            VALUES ($showingID,'$payment');";
                }


                if (!mysqli_query($conn, $sql)) {
                    die('Error: ' . mysqli_error($conn));
                }

                $last_insert = mysqli_insert_id($conn);
                

                foreach($_POST['select_seat'] as $selectedSeat)
                {
                    $sql = "INSERT INTO reserveseats(reserve_id,seat_id)
                            VALUE ($last_insert,$selectedSeat);";
                    if(!mysqli_query($conn, $sql)) {
                        die('Error: ' . mysqli_error($conn));
                    }        
                }

                if(!empty($_POST['food_id']))
                {
                    foreach (array_combine($_POST['food_id'], $_POST['quantity']) as $id => $quantity)
                    {
                        $sql = "INSERT INTO reservefood(reserve_id,food_id,quantity)
                                VALUE ($last_insert,$id,$quantity);";

                        if(!mysqli_query($conn, $sql)) {
                            die('Error: ' . mysqli_error($conn));
                        }  
                    }
                }  ?>

                        <div class='container' style='margin-top: 30px;'>
                            <div class='col-lg-12'>
                                <div class='filter__controls'>
                                    <h3>Payment successful. Your ID is <?php echo $last_insert?></h3>
                                    <h4>Please show this screen to the staff.</h4>
                                    <h6>Thank you for choosing to book with us.</h6>
                                    <h6>We sincerely hope that you enjoy the movie and have a pleasant experience with our services.</h6>
                                </div>
                            </div>
                        </div>

 </section>
   <?php 
            }
            
        } 
        }

       
      

    
      // Close the database connection
      $conn->close();
      include('footer.php');
    ?>

</html>