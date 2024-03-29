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
        require_once("connect_db.php");
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
                            <li class="active"><a href="./promotion.php">Promotion</a></li>
                            <li><a href="./snack.php">Snack&Drink</a></li>
                        </ul>
                    </nav>
                </div>
                
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Background Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="img/promotion-bg.png">
        <div class="container">
            <div class="row">
                <div class ="col-lg-12">
                    <h2>Promotion</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Background Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">

                        <?php
                        // Assume you have already established a connection to your database
                        $sql = "SELECT * FROM promotion WHERE start_date <= NOW() AND end_date >= NOW();";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Invalid query: ' . mysqli_error($conn));
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>

            <div class="row product__filter">
                
                <?php   
                    // Loop through the result set and generate HTML code for each movie    url('<?php echo $movie_poster;
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $code = $row['promotion_code'];
                        $discount_percent = $row['discount_percent'];
                        $start_date = $row['start_date'];
                        $end_date = $row['end_date'];
                        $formatted_start_date = date("d M Y", strtotime($start_date)); 
                        $formatted_end_date = date("d M Y", strtotime($end_date)); 
                        $description = $row['description'];
                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix">
                            <div class="blog__item">
                                    <div class="blog__item__pic set-bg" data-setbg="./img/blog/<?php echo $code;?>.jpg"> </div>
                                    <div class="blog__item__text">
                                          <span><?php echo $formatted_start_date,"-",$formatted_end_date;?></span>
                                          <h6-cen>CODE: <?php echo $code; ?></h6-cen>
                                          <p><?php echo $description; ?></p>
                                    </div>
                              </div>
                        </div>
                <?php } ?>
            </div>
        </div>      
    
    </section>
    <!-- Product Section End -->

    <!-- Include footer -->
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
