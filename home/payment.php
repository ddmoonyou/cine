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


    <div class="container" style="margin-top: 30px;">
        <div class="col-lg-12">
            <div class="filter__controls">
                <h3>Payment Information</h3>
            </div>
        </div>
    </div>

    <form action="booking_success.php" method="POST">
    <?php


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['select_seat'])) {
            // Loop through the selected seats
            $total = 0;

            $showingID = $_POST['showing_id'];

            $sql = "SELECT * FROM showings
                    JOIN branchinfo ON branchinfo.branch_id = showings.branch_id
                    JOIN theaterinfo ON theaterinfo.branch_id = showings.branch_id AND 
                                        theaterinfo.theater_no = showings.theater_no
                    WHERE showing_id=$showingID;";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die('Invalid query: ' . mysqli_error($conn));
            }
            $data = mysqli_fetch_assoc($result);
            $b_id = $data["branch_id"];
            $theater = $data["theater_no"];
            $branch_name = $data["branch_name"];
            $date = $data["date_time"];
            $f_date = date("F d, Y", strtotime($date));
            $system_type = $data["system_type"]; ?>

            <div class="row justify-content-center">
                <div class="col-7">
                    <h4>Showings Information</h4>
                    <ul>Theater No:
                        <?php echo $theater . ' System:' . $system_type ?>
                    </ul>
                    <ul>Branch:
                        <?php echo $branch_name ?>
                    </ul>
                    <ul>Date:
                        <?php echo $f_date ?>
                    </ul><br>
                </div>
            </div>


            <?php
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
                        <div class="container" style="margin:1.5%">
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
                        <div class="container" style="margin:1.5%">
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
    }
       
        ?>
        
        <div class="container">
            <?php
             if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $inputCode = $_POST['promotion_code'];
                // Perform database query to check if the input value exists
                // Assuming you have a database connection established
        
                // Example query using MySQLi
                $query = "SELECT * FROM promotion";
                $result = mysqli_query($conn, $query);
                $discountAmount = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $promoCode = $row['promotion_code'];
                    if (strcmp($promoCode, $inputCode) == 0) {
                        $discountAmount = $row['discount_percent'];
                        echo "<br><br><h5>Congratulations! You get a $discountAmount% discount!</h5>";
                        echo "<input type='hidden' name='promotion_code' value=$promoCode>";
                    }    
                }
            }

            if ($discountAmount > 0) {
                $total = $total * (1-($discountAmount/100));
                $discountRate = $total*($discountAmount/100);
                echo "<h5>Discount $discountAmount% by $discountRate THB</h5>";

            } else {
                // The input value does not exist in the database
                echo "<h5>Sorry, we don't have $inputCode promotion code !</h5>";
                $promoCode = 0;
            }
            ?>
        </div>

    <?php }

    ?>

    
        <input type="hidden" name='showing_id' value=<?php echo $_POST['showing_id']; ?>>
        
        
        

        <div class="container">
            <div class="col-lg-10">
            </div>
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
                <div class="col-5">
                    <h4> Select Payment Method </h4>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <button type="submit" name="payment_method" value="Online-payment" class="primary-btn"
                            id="Online-Payment"> Online-Payment </button>
                        <button type="submit" name="payment_method" value="Credit-cards" class="primary-btn"
                            id="Credit-Cards"><img src="./img/icon/visa.png" width="40px"> <img
                                src="./img/icon/mastercard.png" width="30px"> Credit-Cards </button>
                        <button type="submit" name="payment_method" value="Debit-cards" class="primary-btn"
                            id="Debit-cards"><img src="./img/icon/visa.png" width="40px"> <img
                                src="./img/icon/mastercard.png" width="30px"> Debit-cards </button>
                        <button type="submit" name="payment_method" value="Paypal" class="primary-btn" id="Paypal"><img
                                src="./img/icon/paypal.png" width="40px"> Paypal </button>
                    </div>
                </div>
            </div>
        </div>
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