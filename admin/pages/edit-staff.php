<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | Edit Staff</title>
  <link rel = "icon" href = "../dist/img/AdminLTELogo.png" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  

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

<!-- Check Password is valid type -->
<style>
  /* Style all input fields */

  /* The message box is shown when the user clicks on the password field */
  #message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
  }

  #message p {
    padding: 10px 35px;
    font-size: 18px;
  }

  /* Add a green text color and a checkmark when the requirements are right */
  .valid {
    color: green;
  }

  .valid:before {
    position: relative;
    left: -35px;
    content: "✔";
  }

  /* Add a red text color and an "x" when the requirements are wrong */
  .invalid {
    color: red;
  }

  .invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
  }
  </style>
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
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
          <img src="../dist/img/avatar_anonymous.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../pages/edit-staff.php" class="d-block"><?php echo $objResult["staff_first_name"]. " ".$objResult["staff_last_name"] ;?></a>
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
                <a href="../pages/analysis.php" class="nav-link">
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
                <a href="../pages/new-movie.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Movie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/new-promotion.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Promotion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/new-snackdrink.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Snack&Drink</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/new-showing.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Showing</p>
                </a>
              </li>

              <?php if(strcmp($role,"Manager")==0) { ?>
              <li class="nav-item">
                <a href="../pages/new-branch.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/new-staff.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/new-seatlayout.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>New Seat Layout</p>
                </a>
              </li>
              
              <?php }?>

              <li class="nav-item">
                <a href="../pages/edit-movie.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Edit Movie</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="../pages/edit-staff.php" class="nav-link active">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Staff</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="edit-staff-sql.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Information</h3>
            </div>
            <div class="card-body">
            <div class="form-group">
                <label for="inputID">Staff ID</label>
                <?php
                  echo "<input name='staffid' type='text' id='inputID' class='form-control' disabled=true Value=$objResult[staff_id]>";
                ?>
              </div>
              <div class="form-group">
                <label for="inputFirstName">First Name</label>
                <?php
                  echo "<input name='firstname' type='text' id='inputFirstName' class='form-control' Value=$objResult[staff_first_name]>";
                ?>
              </div>
              <div class="form-group">
                <label for="inputLastName">Last Name</label>
                <?php
                  echo "<input name='lastname' type='text' id='inputLastName' class='form-control' Value=$objResult[staff_last_name]>";
                ?>
              </div>
              <div class="form-group">
                <label for="inputTel">Telephone Number</label>
                <?php
                  echo "<input name='telephone' type='text' id='inputTel' class='form-control' Value=$objResult[staff_tel]>";
                ?>
              </div>
              <div class="form-group">
                <label for="inputBranchID">Branch ID</label>
                <select name="branch_id" id="branchID" class="form-control custom-select" disabled=true>
                  <?php
                    $sql = "SELECT branch_name FROM branchinfo
                    WHERE branch_id = '$objResult[branch_id]';";
            
                    $res = mysqli_query($con, $sql);
                    if (!$res) {
                      die('Error: ' . mysqli_error($con));
                    }
                    foreach($res as $a)
                    {
                      $branchname = $a["branch_name"];
                    }
                    echo "<option selected disabled>$objResult[branch_id]: $branchname</option>";

                    /* Query Branch ID */

                    $sql = "SELECT branch_id,branch_name FROM branchinfo;";
                    $result = mysqli_query($con, $sql);
                    if (!$result) {
                        die('Invalid query: ' . mysqli_error($con));
                    }

                    foreach($result as $branch)
                    {
                      $b_id = $branch['branch_id'];
                      $b_name = $branch['branch_name'];
                      echo "<option value=$b_id>$b_id: $b_name</option>";
                    }
                  ?>
                </select>

              </div>
              <div class="form-group">
                <label for="inputRole">Role</label>
                <select name="staff_role" id="inputRole" class="form-control custom-select" disabled=true>
                  <?php
                    echo "<option selected disabled>$objResult[staff_role]</option>";
                  ?>
                  <option value="Staff">Staff</option>
                  <option value="Manager">Manager</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-teal">
            <div class="card-header">
              <h3 class="card-title">Reset Password</h3>
            </div>
            <div class="card-body">
            <label for="inputMovieID">New Password</label>
              <div class="input-group mb-3">
                <input name="pswd1" id="pswd1"type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="New Password" maxlength=30>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <label for="inputMovieID">Retype New Password</label>
              <div class="input-group mb-3">
                <input name="pswd2" id="pswd2" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Retype New Password" maxlength=30>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div id="message">
                <h4>Password must contain the following:</h4>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <input name="submit" type="submit" value="Submit" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="#">CINE (BEST CINEMA IN SEA)</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Page specific script -->
<script>
    var myInput1 = document.getElementById("pswd1");
    var myInput2 = document.getElementById("pswd2");

    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    // myInput1.onfocus = function() {
      document.getElementById("message").style.display = "block";
    // }

    // When the user clicks outside of the password field, hide the message box
    // myInput1.onblur = function() {
    //   document.getElementById("message").style.display = "none";
    // }

    // When the user starts to type something inside the password field
    myInput1.onkeyup = function() {
      if(myInput2.value == myInput1.value) {
        pswd1.classList.remove("is-invalid");
        pswd1.classList.add("is-valid");
        pswd2.classList.remove("is-invalid");
        pswd2.classList.add("is-valid");
      } else {
        pswd1.classList.remove("is-valid");
        pswd1.classList.add("is-invalid");
        pswd2.classList.remove("is-valid");
        pswd2.classList.add("is-invalid");

      }
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput1.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput1.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput1.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if(myInput1.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }


    myInput2.onkeyup = function(){
      if(myInput2.value == myInput1.value) {
        pswd1.classList.remove("is-invalid");
        pswd1.classList.add("is-valid");
        pswd2.classList.remove("is-invalid");
        pswd2.classList.add("is-valid");
      } else {
        pswd1.classList.remove("is-valid");
        pswd1.classList.add("is-invalid");
        pswd2.classList.remove("is-valid");
        pswd2.classList.add("is-invalid");
      }
    }
</script>

<?php
  include('../script.php');
?>

</body>
</html>
