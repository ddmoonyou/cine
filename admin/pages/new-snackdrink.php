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
    <form action="addstaff.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputSnackName">Snack Name</label>
                <input type="snack_name" id="inputSnackName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSnackDescription">Snack Description</label>
                <input type="snack_description" id="inputSnackDescription" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputCategory">Category</label>
                <select name="snack_category" id="inputCategory" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="Staff">Snack</option>
                  <option value="Manager">Drinks</option>
                  <option value="Manager">Popcorn</option>
                </select>
              </div>
              <label for="inputSnackImage">Snack image</label>
                  <div class="input-group">
                    <div class="custom-file">
                        <input name="snack_img" type="file" class="custom-file-input" id="inputSnackImage" accept="image/jpeg, image/png, image/jpg">
                        <label class="custom-file-label" for="inputSnackImage">Choose snack image</label>
                    </div>
                  </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Premiere ticket</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="container">
                <!-- add snack size&price-->
                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <table class="table table-bordered table-hover" id="tab_logic">
                      <thead>
                        <tr>
                          <th class="text-center">
                            #
                          </th>
                          <th class="text-center">
                            Price
                          </th>
                          <th class="text-center">
                            Size
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr id='addr0'>
                          
                          <td>
                            1
                          </td>

                          <td>
                            
                            <?php
                              /* layout type drown down query from db */
                              $result = mysqli_query($con,'SELECT DISTINCT layout_type FROM theaterinfo');    
                              echo '<select class="form-control custom-select" name=layout0>Layout Type</option>';
                              foreach ($result as $row){
                                echo "<option value=$row[layout_type]>$row[layout_type]</option>"; 
                                }
                               echo '</select>';
                            ?>
                          </td>

                          <td>

                            <?php
                              /* system type drown down query from db */
                              $result = mysqli_query($con,'SELECT DISTINCT system_type FROM theaterinfo');    
                              echo '<select class="form-control custom-select" name=system0>System Type</option>';
                              foreach ($result as $row){
                                echo "<option value=$row[system_type]>$row[system_type]</option>"; 
                                }
                               echo '</select>';
                            ?>

                          </td>

                        </tr>
                        <tr id='addr1'></tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <button id="add_row" type="button" class="btn btn-primary btn-lg pull-left"><i class="fas fa-plus"></i> Add Snack</button>
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
<script>
$(function () {
  bsCustomFileInput.init();
});

$(document).ready(function() {
  var i = 1;
  $("#add_row").click(function() {

  /* add button functionality */
  $('#addr' + i).html("<td>" + (i + 1) + "</td> <td> <select class=\"form-control custom-selec\" name=layout" + i + ">Layout Type</option> <?php
    /* repeat code from earlier as string in html()*/
    $result = mysqli_query($con,'SELECT DISTINCT layout_type FROM theaterinfo');    
    foreach ($result as $row){
      echo "<option value=$row[layout_type]>$row[layout_type]</option>"; 
    }
    echo '</select>';
    ?>
    </td>  <td> <select class=\"form-control custom-selec\"  name=system" + i + ">System Type</option> <?php
    $result = mysqli_query($con,'SELECT DISTINCT system_type FROM theaterinfo');    
    foreach ($result as $row){
      echo "<option value=$row[system_type]>$row[system_type]</option>"; 
    }
    echo '</select>';
    ?>
    </td>");

    $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
    i++;
  });
});

</script>

</body>
</html>
