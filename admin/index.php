<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | Welcome</title>
  <link rel = "icon" href = "./dist/img/AdminLTELogo.png" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Connect to database -->
  <?php
	session_start();
	require_once("connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
    header('Location: login.php');
		// echo "<a href=\"login.php\" class=\"nav-link\"><button type=\"submit\">  Please Login!</button></a>";
		exit();
	}
	
	//*** Update Last Stay in Login System
	$sql = "UPDATE staffinfo SET session = NOW(), loginstatus = 1 WHERE staff_id = '".$_SESSION["staff_id"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM staffinfo WHERE staff_id = '".$_SESSION['staff_id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  $role = $objResult['staff_role'];

  //***  Get Branch from User Login
  $branchSQL = "SELECT * FROM branchinfo WHERE branch_id = '".$objResult['branch_id']."' ";
  $branchQuery = mysqli_query($con,$branchSQL);
  $branchResult = mysqli_fetch_array($branchQuery,MYSQLI_ASSOC);

  ?>
<!-- ./connect-to-database -->

<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Customize AdminLTE -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminCINE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Welcome user to AdminCINE -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar_anonymous.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="pages/edit-staff.php" class="d-block"><?php echo $objResult["staff_first_name"]. " ".$objResult["staff_last_name"] ;?></a>
        </div>
      </div>
      <!-- ./welcome-user -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tree"></i>
              <p>Home</p>
            </a>
          </li>

          <?php if(strcmp($role,"Manager")==0) { ?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/analysis.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Analysis Report</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="pages/new-movie.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Movie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/new-promotion.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Promotion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/new-snackdrink.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Snack&Drink</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/new-showing.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Showing</p>
                </a>
              </li>

              <?php if(strcmp($role,"Manager")==0) { ?>
              <li class="nav-item">
                <a href="pages/new-branch.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/new-staff.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/new-seatlayout.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Seat Layout</p>
                </a>
              </li>
              
              <?php }?>

              <li class="nav-item">
                <a href="pages/edit-movie.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Edit Movie</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="pages/edit-staff.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Edit Profile</p>
            </a>
          </li>

          <!-- Logout from website -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="logout">
              <a href="logout.php" class="nav-link">
                <p><button class="btn btn-danger btn-block">Logout</button></p>
              </a>
            </div>
          </div>
          <!-- /.logout-from-website -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Main content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Welcome</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/img/avatar_anonymous.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><a href="#" class="d-block"><?php echo $objResult["staff_first_name"]. " ".$objResult["staff_last_name"] ;?></a></h3>

                <p class="text-muted text-center"><?php echo $objResult["staff_role"] ;?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Staff ID</strong>

                <p class="text-muted">
                  <?php echo $objResult["staff_id"] ;?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Staff Telephone</strong>

                <p class="text-muted"><?php echo $objResult["staff_tel"] ;?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Branch Telephone</strong>

                <p class="text-muted"><?php echo $branchResult["branch_telephone"];?></p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Branch Location</strong>

                <p class="text-muted"><?php echo "(".$objResult["branch_id"]. ": " .$branchResult["branch_name"]. ")<br>" .$branchResult["branch_address"];?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="https://placehold.it/900x500/39CCCC/ffffff&text=I+Love+CPE241" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+CPE241" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+CPE241" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="#">CINE (BEST CINEMA IN SEA)</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
