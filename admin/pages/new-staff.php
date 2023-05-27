<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | New Staff</title>
  <link rel = "icon" href = "../dist/img/AdminLTELogo.png" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Connect to database -->
  <?php
  include('../connect_db.php');
  ?> 

  <!-- Query Branch ID -->
  <?php
    $sql = "SELECT branch_id,branch_name FROM branchinfo;";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
  ?>

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

      <!-- Sidebar Menu -->
      <?php
      include('../sidebar.php');
      ?> 
      <!-- /.sidebar-menu -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Staff</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="addstaff.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Staff Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputMovieID">First Name</label>
                <input name="firstname" type="text" id="inputMovieID" class="form-control" placeholder="Neramit">
              </div>
              <div class="form-group">
                <label for="inputLastName">Last Name</label>
                <input name="lastname" type="text" id="inputLastName" class="form-control" placeholder="Matarat">
              </div>
              <div class="form-group">
                <label for="inputLastName">Telephone Number</label>
                <input name="telephone" type="text" id="inputLastName" class="form-control" placeholder="0812345678">
              </div>
              <div class="form-group">
                <label for="inputBranchID">Branch ID</label>
                <select name="branch_id" id="branchID" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php
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
                <select name="staff_role" id="inputRole" class="form-control custom-select">
                  <option selected disabled>Select one</option>
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
              <h3 class="card-title">Set Password</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">

              <div class="form-group">
                <?php
                    $sql = "SELECT staff_id FROM staffinfo";
                    $res = mysqli_query($con, $sql);
                    if (!$res) {
                      die('Invalid query: ' . mysqli_error($con));
                    }
                    foreach($res as $id)
                    {
                      $staff_id = $id['staff_id'];
                    }
                    $staff_id++;
                ?>
                <label for="inputName">ID</label>
                <div class="input-group mb-3">
                <input type="text" name="staff_id" id="inputID" class="form-control" readonly="readonly" value='<?php echo $staff_id;?>'> 
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              </div>

              

              <label for="inputMovieID">Password</label>
              <div class="input-group mb-3">
                <input name="pswd1" id="pswd1"type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Password" maxlength=30>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>

              <label label for="inputMovieID">Retype Password</label>
              <div class="input-group mb-3">
                <input name="pswd2" id="pswd2" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Retype password" maxlength=30>
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
          <input type="submit" value="Submit" class="btn btn-success float-right">
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
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});

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

</body>
</html>
