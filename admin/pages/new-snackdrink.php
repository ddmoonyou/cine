<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | New Snack Drink</title>
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
            <h1>New Snack Drink</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Snack Drink</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="addsnackdrink.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Snack Information</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputSnackImage">Snack image</label>
                  <div class="input-group">
                    <div class="custom-file">
                        <input name="snack_img" type="file" class="custom-file-input" id="inputSnackImage" accept="image/jpeg, image/png, image/jpg">
                        <label class="custom-file-label" for="inputSnackImage">Choose snack image</label>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="inputSnackName">Snack Name</label>
                <input type ="text" name="snack_name" id="inputSnackName" class="form-control" placeholder="Cheese-Popcorn">
              </div>
              <div class="form-group">
                <label for="inputSnackDescription">Snack Description</label>
                <input type="text" name="snack_description" id="inputSnackDescription" class="form-control"placeholder="Popcorn with cheese flavor">
              </div>
              <div class="form-group">
                <label for="inputCategory">Category</label>
                  <select name="snack_category" id="inputCategory" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    <option value="Snack">Snack</option>
                    <option value="Drinks">Drinks</option>
                    <option value="Popcorn">Popcorn</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="col-md-6">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Set Price</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="size S"><input name="s_check" type="checkbox" id="sizeS" value=1>  Size S (THB)</label>
                <input name="s" type="number" id="sizeS" class="form-control" placeholder="139" min=10>
              </div>
              <div class="form-group">
                <label for="inputSubtitle"><input name="m_check" type="checkbox" id="sizeM" value=1>  Size M (THB)</label>
                <input name="m" type="number" id="sizeM" class="form-control" placeholder="159" min=10>
              </div>
              <div class="form-group">
                <label for="inputSubtitle"><input name="l_check" type="checkbox" id="sizeL" value=1>  Size L (THB)</label>
                <input name="l" type="number" id="sizeL" class="form-control" placeholder="189" min=10>
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<?php
  include('../script.php');
?>

</body>
</html>
