<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | New Promotion</title>
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
            <h1>New Promotion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Promotion</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="addpromotion.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Information</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputPromotion">Promotion Code</label>
                <input name="promotion_code" type="text" id="inputPromotion" class="form-control" placeholder="CHRISTMAS">
              </div>
              <div class="form-group">
                <label for="inputDiscount">Discount(%)</label>
                <input name="discount_percent" type="number" id="inputDiscount" class="form-control" placeholder="50" min=0 max=100>
              </div>
              <div class="form-group">
                <label for="inputDescriptionPM">Promotion Description</label>
                <input name="description_promotion" type="text" id="inputDescriptionPM" class="form-control" placeholder="Christmas Party, discount 50% for two days">
              </div>
              <h4>Terms of Use</h4>
              <div class="form-group">
                <label for="seat_type">Seat type</label>
                <select name="seat_type" id="seat_type" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="none">All</option>
                  <?php
                    $sql = "SELECT DISTINCT seat_type FROM seatprice";
                    $res = mysqli_query($con,$sql);
                    foreach($res as $seat)
                    {
                      $s= $seat['seat_type'];
                      echo "<option value=$s>$s</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="system_type">System type</label>
                <select name="system_type" id="system_type" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="none">All</option>
                  <?php
                    $sql = "SELECT DISTINCT system_type FROM systemtype";
                    $res = mysqli_query($con,$sql);
                    foreach($res as $sys)
                    {
                      $s= $sys['system_type'];
                      echo "<option value=$s>$s</option>";
                    }
                  ?>
                </select>
              </div>
              <h4>Promotion period</h4>
              <div class="form-group">
                <label for="inputShowingDate">Start Date</label>
                <input name="s_date" type="datetime-local" id="inputShowingDate" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputShowingDate">End Date</label>
                <input name="e_date" type="datetime-local" id="inputShowingDate" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <input type="submit" value="Submit" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
</script>

</body>
</html>