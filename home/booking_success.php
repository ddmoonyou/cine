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


    <?php 
      // $showingID = $_POST['showing_id'];
      // $sql = "INSERT INTO showings (showing_id) VALUES $showingID";
      // if ($conn->query($sql) === false) {
      //     die('Error: ' . $conn->error);
      // }
      
      // // Insert into the reserveinfo table
      // $paymentMethod = $_POST['payment_method'];
      // $sql = "INSERT INTO reserveinfo (showing_id, payment_method) VALUES ('$showingID', '$paymentMethod')";
      // if ($conn->query($sql) === false) {
      //     die('Error: ' . $conn->error);
      // }
      


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
                                <div class='filter__controls'>
                                    <h3>Payment Failed</h3>
                                    <h4>Seat unavailabe</h3>
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
                }

                echo "<div class='container' style='margin-top: 30px;'>
                            <div class='col-lg-12'>
                                <div class='filter__controls'>
                                    <h3>Payment Success</h3>
                                </div>
                            </div>
                        </div>";

            }
            
            /*
            foreach ($_POST['select_seat'] as $selectedSeat) {
                // Access the seat information
                $seatID = $selectedSeat;

                //echo "ID: ".$seatID."  ";
                $sql = "INSERT INTO `reserveinfo`(`reserve_id`,`showing_id`,`promotion_code`,`payment_method`) VALUES (NULL,'$showingID','$promotionCode','$payment')";
                  
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die('Invalid query: ' . mysqli_error($conn));
                }
                else{
                  echo "add reserveinfo success";
                }
                
                

             }*/
        } 
/*
        foreach (array_combine($_POST['food_id'], $_POST['quantity']) as $id => $quantity) {
            $sql = "INSERT INTO `reservefood`(`reserve_id`,`food_id`,`quantity`) VALUES (NULL,'$id','$quantity')";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die('Invalid query: ' . mysqli_error($conn));
            }
            else{
                  echo "Add reservefood success";
            }

           }*/
        }

        ?>
      

    <?php 

    
      
      
      // Close the database connection
      $conn->close();
    ?>

</html>