<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Booking Ticket Website">
    <meta name="keywords" content="Movie,Cine,Cinema">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theatre | CINE</title>

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

    <div class="offcanvas-menu-wrapper">
        <div id="mobile-menu-wrap"></div>
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
                            <li class="active"><a href="./theatre.php">Branch</a></li>
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

    <!-- Background Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="img/theatre-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Cinema</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Background Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-items-center">
                    <ul class="filter__controls">
                        <h2><br><img src="./img/icon/location.png" width=30px height=30px>Thailand</h2>
                        <?php
                        $sql = "SELECT * FROM branchinfo WHERE branch_address LIKE '%Thailand%';";
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
                        $branch_id = $row['branch_id'];
                        $branch_name = $row['branch_name'];
                        $address = $row['branch_address'];
                        $telephone = $row['branch_telephone'];
                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix">
                            <div class="blog__item">
                                    <div class="blog__item__pic set-bg" data-setbg="./img/theatre/<?php echo $branch_id?>.jpg"> </div>
                                    <div class="blog__item__text">
                                          <h6-cen><?php echo $branch_name; ?></h6-cen>
                                          <p><?php echo $address; ?></p>
                                          <span>Tel: <?php echo $telephone; ?></span>
                                    </div>
                              </div>
                        </div>
                <?php } ?>
            </div>
        </div>      
    
    </section>
    <!-- Product Section End -->

        <!-- Product Section Begin -->
        <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <div class="text-container"><h2><img src="./img/icon/location.png" width=30px height=30px> Aboard</h2></div>
                        <?php
                        // Assume you have already established a connection to your database
                        $sql = "SELECT * FROM branchinfo WHERE branch_address NOT LIKE '%Thailand%';";
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
                        $branch_id = $row['branch_id'];
                        $branch_name = $row['branch_name'];
                        $address = $row['branch_address'];
                        $telephone = $row['branch_telephone'];
                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix">
                            <div class="blog__item">
                                    <div class="blog__item__pic set-bg" data-setbg="./img/theatre/<?php echo $branch_id;?>.jpg"> </div>
                                    <div class="blog__item__text">
                                          <h6-cen><?php echo $branch_name; ?></h6-cen>
                                          <p><?php echo $address; ?></p>
                                          <span>Tel: <?php echo $telephone; ?></span>
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