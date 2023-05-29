
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
    $total = 0;
    ?> 

</head>

<form action="payment.php" method="POST"> 
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
    <form action="order_confirmation.php" method="POST"> 
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
                                <h4>Order Confirmation</h4>
                                <div class="breadcrumb__links">
                                    <a href="./index.php">Home</a>
                                    <a>Showings</a>
                                    <a>Reservation</a>
                                    <span>Order Confirmation</span>
                                    
                                    
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
                                                <ul><img src="./img/icon/video-camera.png" width=25px height=25px> Theater No: <?php echo $theater ?> System: <?php echo $system_type ?></ul>
                                                <ul><img src="./img/icon/location-black.png" height=20px> Branch: <?php echo $branch_name ?></ul>
                                                <ul><img src="./img/icon/clock.png" width=20px height=20px> Time: <?php echo $time.' '.$f_date?></ul><br>
                                                <ul><img src="./img/icon/audio.png" width=25px> Audio: <?php $language_dub ?> Subtitle: <?php $language_sub ?></ul>
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

    ?> 
    <input type="hidden" name='showing_id' value= <?php echo $_POST['showing_id']; ?> >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-5 align-item-center">
                    <div class="container" style="margin:1%">
                        <h4><element class="bold">Product</element></h4>
                    </div>
                </div>
                <div class="col-4 align-item-center">
                    <div class="container" style="margin:1%">
                        <h4><element class="bold">Quantity</element></h4>
                    </div>
                </div>
                <div class="col-2 align-item-left">
                    <div class="container" style="margin:1%">
                        <h4><element class="bold">Subtotal </element></h4>
                    </div>
                </div>
            </div>
        </div>
    <?php
              // Loop through the selected seats
              foreach ($_POST['select_seat'] as $selectedSeat) {
                // Access the seat information
                $seatID = $selectedSeat;

                //echo "ID: ".$seatID."  ";
                $sql = "SELECT * FROM seatlayout
                        JOIN seatprice ON seatprice.seat_type = seatlayout.seat_type
                        WHERE seat_id = $seatID";

                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die('Invalid query: ' . mysqli_error($conn));
                }

                $data = mysqli_fetch_assoc($result);
                $row = $data["seat_row"];
                $column = $data["seat_column"];
                $seat_price = $data["price"];
                $seat_type = $data["seat_type"];
                
                ?>
                  <div class="row justify-content-center">
                        <div class="col-4 align-item-center">
                              <div class="container" style="margin:1%">
                                    <h5>Seat: <?php echo $row.$column.'  '.$seat_type?></h5>
                                    
                              </div>
                        </div>
                        <div class="col-2 align-item-center">
                              <div class="container" style="margin:1%">
                                    <h5>1</h5>
                              </div>
                        </div>
                        
                        <div class="col-2">
                              <div class="container" style="margin:1%">
                                    <h5> <?php echo $seat_price?> THB</h5>
                                    <?php $total = $total + $seat_price ;?>
                              </div>
                        </div>
                  </div>
                  <input type="hidden" name='select_seat[]' value= <?php echo $selectedSeat; ?> >
            <?php  }
            

            foreach (array_combine($_POST['food_id'],$_POST['food_quantity']) as $id => $quantity)
            { 
                $sql = "SELECT * FROM foodsize
                        WHERE food_id = $id";

                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die('Invalid query: ' . mysqli_error($conn));
                }
                $data = mysqli_fetch_assoc($result);
                $food_type = $data["food_type"];
                $food_price = $data["price"];
                $food_size = $data["size"];
                
                
                if($quantity > 0) {?>
                <div class="row justify-content-center">
                        <div class="col-4 align-item-center">
                              <div class="container" style="margin:1%">
                                    <h5>Food: <?php { echo $food_type; }?> Size <?php { echo $food_size; }?></h5>
                              </div>
                        </div>
                        <div class="col-2 align-item-center">
                              <div class="container" style="margin:1%">
                                    <h5><?php { echo $quantity; }?></h5>
                              </div>
                        </div>
                        <div class="col-2">
                              <div class="container" style="margin:1%">
                                    <h5> <?php echo $food_price*$quantity ?>THB</h5>
                                    <?php $total = $total + $food_price*$quantity ;?>
                              </div>
                        </div>
                        <input type="hidden" name='food_id[]' value= <?php echo $id; ?> > 
                        <input type="hidden" name='quantity[]' value= <?php echo $quantity; ?> > 
                </div>
                  
                
           <?php }}

      ?>

    <div class="container">
        <div class="col-lg-6">
            <div class="row justify-content-start">
                <h5 style="margin-right:10px"> Promotion Code: </h5>
                   <h5> <input type="text" class="form-control" name="promotion_code" id="promotion_code" placeholder="Enter Promotion Code"> </h5>
                   
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-10">
        </div>             
            <div class="row justify-content-end">
                <div class="col-3" style="margin:10px"> <h4>Total <?php echo $total;?> THB </h4></div>
                <div class="col-lg-1">
                   <button type="submit" class="primary-btn" id="confirm"> Confirm </button> 
                </div>
            </div>
    </div>
    <?php }
    else
    {
        ?>
        <br><br><br><br>
        <h3><button class="primary-btn"><a href="reservation.php?showing_id= <?php echo $_POST['showing_id']; ?>"> No seat select! <br> Click here to go back! </h3></button></a>  
        <?php 
    }
} ?>
    </section>
        
    
</form>
</body>
</html>