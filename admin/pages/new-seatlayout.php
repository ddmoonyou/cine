<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | New Seat Layout</title>
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
  $column = 'A';
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
            <h1>New Seat Layout</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Seat Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
    <form action="addseatlayout.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Geneal</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
              <?php
                  $sql = "SELECT layout_type FROM layouttype";
                  $res = mysqli_query($con, $sql);
                  if (!$res) {
                    die('Invalid query: ' . mysqli_error($con));
                  }
                  foreach($res as $type)
                  {
                    $cur_type = $type['layout_type'];
                  }
                  $cur_type++;
                ?>
                <label for="inputName">Layout type</label>
                <input type="text" name="type_name" id="inputName" class="form-control" readonly="readonly" value='<?php echo $cur_type;?>'> 
              </div>
              <div class="form-group">
                <label for="inputName">Number of columns</label>
                <input name="columns" type="number" id="inputLenght" class="form-control" placeholder="6" min=1 max=30>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Add Row</h3>
            </div>
            <div class="card-body">
              <div class="container">

                <!-- add theater stuff-->
                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <table class="table table-bordered table-hover" id="tab_logic">
                      <thead>
                        <tr>
                          <th class="text-center">
                            Row
                          </th>
                          <th class="text-center">
                            Date & Time
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr id='addr0'>
                          
                          <td>
                            A
                          </td>

                          <td>
                            <select name='seat_type[]' id='inputSubtitle' class='form-control custom-select'>
                            <?php
                              $sql1 = 'SELECT seat_type FROM seatprice';
                              $result = mysqli_query($con, $sql1);
                              if (!$result) {
                                die('Invalid query: ' . mysqli_error($con));
                              }  
                              foreach ($result as $row){
                                echo "<option value='$row[seat_type]'>$row[seat_type]</option>"; 
                                }
                            ?>
                            </select>
                          </td>

                        </tr>
                        <tr id='addr1'></tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <button id="add_row" type="button" class="btn btn-primary btn-lg pull-left"><i class="fas fa-plus"></i> New Row</button>
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
<script>
$(document).ready(function() {
  var i = 1;
  var x = 'A';
  $("#add_row").click(function() {

    x = String.fromCharCode(x.charCodeAt(0) + 1);

    $('#addr' + i).html("<td>"+ (x) + "</td><td><select name='seat_type[]' id='inputSubtitle' class='form-control custom-select'> <?php 
    $sql1 = 'SELECT seat_type FROM seatprice';
    $result = mysqli_query($con, $sql1);
    foreach ($result as $row){
      echo "<option value='".$row['seat_type']."'>".$row['seat_type']."</option>"; 
      }
  ?>  </select></td>");

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
    i++;
  });
});
</script>
</body>
</html>
