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
    <form action="booking_success.php" method="POST"> 
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
                                <h4>Payment Information</h4>
                                <div class="breadcrumb__links">
                                    <a href="./index.php">Home</a>
                                    <a>Showings</a>
                                    <a>Reservation</a>
                                    <a>Order Confirmation</a>
                                    <span>Payment Information</span>
                                    
                                    
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
    <form action="booking_success.php" method="POST">
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


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['select_seat'])) {
            // Loop through the selected seats
            $total = 0;

            foreach ($_POST['select_seat'] as $selectedSeat) {
                // Access the seat information
                echo "<input type='hidden' name='select_seat[]' value=$selectedSeat>";
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
                            <h5>Seat:
                                <?php echo $row . $column . '  ' . $seat_type ?>
                            </h5>

                        </div>
                    </div>
                    <div class="col-2 align-item-center">
                        <div class="container" style="margin:1%">
                            <h5>1</h5>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="container" style="margin:1%">
                            <h5>
                                <?php echo $seat_price ?> THB
                            </h5>
                            <?php $total = $total + $seat_price; ?>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            echo "No seats selected";
        }

        if(!empty($_POST['food_id']))
        {
        foreach (array_combine($_POST['food_id'], $_POST['quantity']) as $id => $quantity) {

            echo "<input type='hidden' name='food_id[]' value=$id>";
            echo "<input type='hidden' name='quantity[]' value=$quantity>";

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


            if ($quantity > 0) { ?>
                <div class="row justify-content-center">
                    <div class="col-4 align-item-center">
                        <div class="container" style="margin:1%">
                            <h5>Food:
                                <?php {
                                    echo $food_type;
                                } ?> Size
                                <?php {
                                    echo $food_size;
                                } ?>
                            </h5>
                        </div>
                    </div>
                    <div class="col-2 align-item-center">
                        <div class="container" style="margin:1%">
                            <h5>
                                <?php {
                                    echo $quantity;
                                } ?>
                            </h5>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="container" style="margin:1%">
                            <h5>
                                <?php echo $food_price * $quantity ?>THB
                            </h5>
                            <?php $total = $total + $food_price * $quantity; ?>
                        </div>
                    </div>

                </div>


            <?php }
           
        } 
    } }
       
    ?>
        
    <div class="container">
        <div class="row justify-content-start">
            <?php
             if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $inputCode = $_POST['promotion_code'];
                // Perform database query to check if the input value exists
                // Assuming you have a database connection established
        
                // Example query using MySQLi
                $query = "SELECT * FROM promotion ";
                $result = mysqli_query($conn, $query);
                $discountAmount = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $promoCode = $row['promotion_code'];
                    $start_date = $row['start_date'];
                    $end_date = $row['end_date'];
                    $current_date = date("Y-m-d");

                    if ($current_date >= $start_date && $current_date <= $end_date) {
                        if (strcmp($promoCode, $inputCode) == 0) {
                            $discountAmount = $row['discount_percent']; ?>
                    
                    <h5>Discount Code: <?php echo $inputCode ?> Enjoy the discount  </h5>
                    <input type='hidden' name='promotion_code' value= '<?php echo $promoCode; ?>' >

            <?php        
                    } }    
                }
            }

            if ($discountAmount > 0) {
                $total = $total * (1-($discountAmount/100));
                $discountRate = $total*($discountAmount/100);
                ?>
                <h5> <?php  echo " $discountRate THB"; ?> </h5>
                       
            <?php } 
            else {
                // The input value does not exist in the database
                
                $promoCode = 0;?>
                    <div class="col-6 align-item-center">
                        <div class="container" style="margin:1.5%">
                            <h5> <?php echo "<h5>No Discount</h5>"; ?> </h5>
                        </div>
                    </div> 
                    
           <?php }
            ?>
      
        </div>
   

    
        <input type="hidden" name='showing_id' value=<?php echo $_POST['showing_id']; ?>>
        <div class="row justify-content-end">
            <div class="col-3" style="margin:10px">
                <h4>Total
                    <?php echo $total; ?> THB
                </h4>
            </div>
        </div>

    </div>


        <div class="container">
            <div class="row justify-content-start">
                <div class="col-5" style="padding-bottom:20px">
                    <h4><b> Select Payment Method </b></h4>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <button type="submit" name="payment_method" value="Online-payment" class="pay-btn"
                            id="Online-Payment"> Online-Payment </button>
                        <button type="submit" name="payment_method" value="Credit-cards" class="pay-btn"
                            id="Credit-Cards"><img src="./img/icon/visa.png" width="40px"> <img
                                src="./img/icon/mastercard.png" width="30px"> Credit-Cards </button>
                        <button type="submit" name="payment_method" value="Debit-cards" class="pay-btn"
                            id="Debit-cards"><img src="./img/icon/visa.png" width="40px"> <img
                                src="./img/icon/mastercard.png" width="30px"> Debit-cards </button>
                        <button type="submit" name="payment_method" value="Paypal" class="pay-btn" id="Paypal"><img
                                src="./img/icon/paypal.png" width="40px"> Paypal </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

=

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