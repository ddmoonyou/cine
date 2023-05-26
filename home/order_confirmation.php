
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
                            <li class="active"><a href="./movie.php">Movie</a></li>
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

   
      <div class="container" style="margin-top: 30px;">
            <div class="col-lg-12">
                  <div class="filter__controls">
                  <h3>Order Confirmation</h3>
                  </div>
            </div>
      </div>
    
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
        <input type="hidden" name='showing_id' value= <?php echo $_POST['showing_id']; ?> >  
      <?php
     
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['select_seat'])) {
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
                              <div class="container" style="margin:1.5%">
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
            } else {
              echo "No seats selected";
            }

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
                              <div class="container" style="margin:1.5%">
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

          }
      ?>

    <div class="container">
        <div class="col-lg-10">
            <div class="row justify-content-start">
                <div class="col-10" style="margin:10px"> <h4>Promotion Code:</h4>
                    <!-- <input type="hidden" name="promotion_code" id="promotion_code" value="CODE"> -->
                    <input type="text" name="promotion_code" id="promotion_code" placeholder="Please Enter Promotion Code">
                </div>
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
        
    
</form>
</body>