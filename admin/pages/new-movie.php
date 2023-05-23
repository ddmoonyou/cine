<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Add</title>

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
            <h1>New Movie</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Movie</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
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
              <div div class="form-group">
                <label for="inputPosterImage">Poster image</label>
                  <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="inputPosterImage"id="inputPosterImage">
                        <label class="custom-file-label" for="inputPosterImage">Choose image</label>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="inputName">Movie Name</label>
                <input type="text" id="inputMovieName" class="form-control" placeholder="Avengers: Endgame">
              </div>
              <div class="form-group">
                <label for="inputName">Movie lenght</label>
                <input type="number" id="inputLenght" class="form-control" placeholder="182(min)">
              </div>
              <div class="form-group">
                <label for="inputDescription">Movie Description</label>
                <textarea id="inputDescription" class="form-control" rows="4" placeholder="Avengers: ENDGAME  เรื่องราวการปิดจักรวาลมาร์เวลเฟส 3 เหตุการณ์ภายหลังจากที่ธานอสดีดนิ้วล้างครึ่งจักรวาล เหล่าฮีโร่ที่เหลือรอดจะหาทางกอบกู้จักรวาลนี้คืนมาได้อย่างไร โดยในภาคนี้จะมีตัวเด็ดอย่างกัปตันมาร์เวลมาร่วมเสริมทัพด้วย"></textarea>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Director Info</label>
                <input type="text" id="inputClientCompany" class="form-control" placeholder="Anthony Russo, Joe Russo">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Promote</label>
                <input type="datetime-local" name="input"id="inputClientCompany" class="form-control" placeholder="Anthony Russo, Joe Russo">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
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
              <div class="form-group">
                <label for="inputEstimatedBudget">Branch ID</label>
                <input type="number" id="inputEstimatedBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Theater No.</label>
                <input type="number" id="inputSpentBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Datetime</label>
                <input type="datetime-local" id="inputEstimatedDuration" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Audio</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>ENG</option>
                  <option>TH</option>
                  <option>JPN</option>
                  <option>KR</option>
                  <option>RU</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Subtitle</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>ENG</option>
                  <option>TH</option>
                  <option>JPN</option>
                  <option>KR</option>
                  <option>RU</option>
                </select>
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
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

</body>
</html>
