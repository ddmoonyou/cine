<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
	require_once("../connect_db.php");

	if(!isset($_SESSION['staff_id']))
	{
    header('Location: http://localhost/cine/admin/login.php');
		// echo "<a href=\"login.php\" class=\"nav-link\"><button type=\"submit\">  Please Login!</button></a>";
		exit();
	}
	
	//*** Update Last Stay in Login System
	$sql = "UPDATE staffinfo SET session = NOW() WHERE staff_id = '".$_SESSION["staff_id"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get User Login
	$strSQL = "SELECT * FROM staffinfo WHERE staff_id = '".$_SESSION['staff_id']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  $role = $objResult['staff_role']
  ?>
<!-- ./connect-to-database -->

</head>
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
        <a href="../index.php" class="nav-link">Home</a>
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
    <a href="../index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminCINE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Welcome user to AdminCINE -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="./edit-staff.php" class="d-block"><?php echo $objResult["staff_first_name"]. " ".$objResult["staff_last_name"] ;?></a>
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
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <?php if(strcmp($role,"Manager")==0) { ?>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./analysis.php" class="nav-link">
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
                <a href="./new-movie.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Movie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./new-promotion.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Promotion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./new-snackdrink.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Snack&Drink</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./new-showing.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Showing</p>
                </a>
              </li>

              <?php if(strcmp($role,"Manager")==0) { ?>
              <li class="nav-item">
                <a href="./new-branch.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./new-staff.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./new-seatlayout.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Seat Layout</p>
                </a>
              </li>
              <?php }?>

              <li class="nav-item">
                <a href="./edit-movie.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Edit Movie</p>
                </a>
              </li>
              

            </ul>
          </li>
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="./edit-staff.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Edit Profile</p>
            </a>
          </li>

          <!-- Logout from website -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="logout">
              <a href="../logout.php" class="nav-link">
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
