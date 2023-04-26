<!DOCTYPE html>
<html lang="en-US">

<head>
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
    $servername = "127.0.0.1"; // server name localhost
    $username = "root"; // username to access database id20613770_cinebyhansa
    $password = ""; // password to access database %1tcYSTb0gf}1+YM
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
                            <!-- <li><a href="./movie.php">Movie</a></li> -->
                            <li><a href="./promotion.php">Promotion</a></li>
                            <li class="active"><a href="./snack.php">Snack&Drink</a></li>
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
    <section class="breadcrumb-blog set-bg" data-setbg="img/delicious-popcorn-bg.png">
        <div class="container">
            <div class="row">
                <div class ="col-lg-12">
                    <h2>Snack & Drink List</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Popcorn Section Begin -->
    <section class="shop spad" id="popcorn">
       <div class="container">
           <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
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
                <div class="col-lg-9">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="filter__controls">
                                <?php
                                $sql = "SELECT * FROM foodinfo WHERE category='popcorn'";
                                $result = mysqli_query($conn, $sql);

                                if (!$result) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }
                                ?>
                            <h3 class="active" data-filter="*">Popcorn List</h3>
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
                              
                        ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                                        
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="./img/snack/<?php echo $food_type; ?>.png">  
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><?php echo $food_type; ?></h6>
                                                    <h5><?php echo $description; ?></h5>
                                                </div> 
                                            </div>
                                  
                                </div>
                        <?php } ?>
                    </div>
                </div>
                            
                </div>
            </div>
        </div>
    </section>
    <!-- Popcorn Section End -->

    <!-- Drinks Section Begin -->
    <section class="shop spad" id="drinks">
       <div class="container">
           <div class="row">
                <div class="col-lg-3">
                    
                </div>
                <div class="col-lg-9">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="filter__controls">
                                <?php
                                $sql = "SELECT * FROM foodinfo WHERE category='drinks'";
                                $result = mysqli_query($conn, $sql);

                                if (!$result) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }
                                ?>
                            <h3 class="active" data-filter="*">Drink List</h3>
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
                              
                        ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                                        
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="./img/snack/<?php echo $food_type; ?>.png">  
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><?php echo $food_type; ?></h6>
                                                    <h5><?php echo $description; ?></h5>
                                                </div> 
                                            </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
                            
                </div>
            </div>
        </div>
    </section>
    <!-- Drinks Section End -->

    <!-- Snack Section Begin -->
    <section class="shop spad" id="snack">
       <div class="container">
           <div class="row">
                <div class="col-lg-3">
                    
                </div>
                <div class="col-lg-9">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="filter__controls">
                                <?php
                                $sql = "SELECT * FROM foodinfo WHERE category='snack'";
                                $result = mysqli_query($conn, $sql);

                                if (!$result) {
                                    die('Invalid query: ' . mysqli_error($conn));
                                }
                                ?>
                            <h3 class="active" data-filter="*">Snack List</h3>
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
                              
                        ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                                        
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="./img/snack/<?php echo $food_type; ?>.png">  
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><?php echo $food_type; ?></h6>
                                                    <h5><?php echo $description; ?></h5>
                                                </div> 
                                            </div>
                                  
                                </div>
                        <?php } ?>
                    </div>
                </div>
                            
                </div>
            </div>
        </div>
    </section>
    <!-- Snack Section End -->

    <!-- Include footer -->
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