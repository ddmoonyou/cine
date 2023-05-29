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
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="icon" href="img/about/icon.png">

    <script src="main.js"></script>

    <!-- Connect to database -->
    <?php
    $servername = "127.0.0.1";  // server name localhost
    $username = "root";    // username to access database id20613770_cinebyhansa
    $password = "";    // password to access database %1tcYSTb0gf}1+YM
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
                            <li><a href="./theatre.php">Branch</a></li>
                            <li ><a href="./promotion.php">Promotion</a></li>
                            <li><a href="./snack.php">Snack&Drink</a></li>
                        </ul>
                    </nav>
                </div>
                
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
    

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">

            <?php
                  $movie_id = $_GET['movie_id'];
                  $sql = "SELECT * FROM movieinfo WHERE movie_id = '$movie_id'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
                  $movie_name = $row['movie_name'];
                  $description = $row['movie_description'];
                  $movie_length = $row['movie_length'];
                  $director = $row['director_info'];
                  $_start_date = $row['releaseDate'];
                  $_start_date = date('d M Y', strtotime($_start_date));
                  $trailer = $row['movie_trailer'];
            ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="row">
                              <div class="image-container" style="margin-right:60px">
                                    <img src ="./img/poster/<?php echo $movie_id?>.jpg"  width="240" height="320" class="movie-poster" style="margin-left: 10px;margin-bottom: 20px";>
                              </div>
                                                      
                              <div class="col">
                                <iframe width="560" height="315" src="<?php echo $trailer; ?>" 
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                              </div>
                        </div>
                        <div class="row"> 
                              <div class="col-lg-12 md-9 xd-9 d-flex">
                                    <ul><h2 class="h2-movie"><?php echo $movie_name ?></h2><ul>
                                    <ul><p> <?php echo $description ?><p><ul>
                                    <ul><p>Release Date: <?php echo $_start_date ?><p><ul>
                                    <ul><p>Director: <?php echo $director ?><p><ul>
                                    <ul><p>Length: <?php echo $movie_length ?>min<p><ul>

                              </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Select Branch -->
        <div class="card-body">
            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="col-md-5 xs-3 ">
                        <div class="showings-container" >
                            <div class="blog__item">
                                <div class="card-showing">
                                    <div class="form-row justify-content-center">
                                        <div class="form-group col-md-7">
                                            <h6><b><label for="BranchID">Select Branch</label></b></h6>
                                                <select name="BranchID" id="BranchID"  class="form-control custom-select">
                                                    <option selected disabled>Select one</option>
                                                    <?php
                                                    $sql = "SELECT * FROM branchinfo ORDER BY branch_id;";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (!$result) {
                                                        die('Invalid query: ' . mysqli_error($con));
                                                    }
                                                    foreach($result as $branch)
                                                    {
                                                        $b_id = $branch['branch_id'];
                                                        $b_name = $branch['branch_name'];
                                                        echo "<option value=$b_id> $b_name </option>";
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <h6><label for="select_date"><b>Select Date</b></label></h6>
                                            <input name="select_date"  type="date" id="select_date" class="form-control custom-select">
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">  
                                        <button type="submit" onclick="selectBranchDate()" class="btn showing-time-btn" id="submit" ><b> Search </b></button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Show Theater by branch -->
        <div id="showbranch">
        </div>
        <section class="blog spad">
                

                
        </section>
    <!-- Product Section End -->

    <?php include('footer.php'); ?>

   

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


    <!-- Specific script -->
    <!-- <script>
        $(#BranchID).change(function(){
            b_id=$(this).val();
            $.post('selectbranch.php',{id:b_id},function(data){
                $("#MovieID").html(data);
            });
        });
    </script> -->
</body>
</html>


