<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | New Showing</title>
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
            <h1>New Showing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Showing</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
      $sql = "SELECT branch_id,branch_name FROM branchinfo;";
      $result = mysqli_query($con, $sql);
      if (!$result) {
          die('Invalid query: ' . mysqli_error($con));
      }
    ?>
    <section class="content">
    <form action="addshowing.php" method="POST" enctype="multipart/form-data">
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
                <label for="inputMovieID">Movie ID</label>
                <input name="movie_id" type="number" min = "100000001"id="inputMovieID" class="form-control" placeholder="100000012">
              </div>
              <div class="form-group">
              <label for="inputBranchID">Branch</label>
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
                <label for="inputTheaterNo">Theater No.</label>
                <input name="theater_no" type="number" min="1" max="20" id="inputTheaterNo" class="form-control" placeholder="1">
              </div>
              <div class="form-group">
                <label for="inputShowingDate">Datetime</label>
                <input name="time" type="datetime-local" id="inputShowingDate" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputAudio">Audio</label>
                <select name="audio" id="inputAudio" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="ENG">ENG</option>
                  <option value="TH">TH</option>
                  <option value="JPN">JPN</option>
                  <option value="KR">KR</option>
                  <option value="RU">RU</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputSubtitle">Subtitle</label>
                <select name="subtitle" id="inputSubtitle" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="ENG">ENG</option>
                  <option value="TH">TH</option>
                  <option value="JPN">JPN</option>
                  <option value="KR">KR</option>
                  <option value="RU">RU</option>
                </select>
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