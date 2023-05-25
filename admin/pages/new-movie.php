<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | New Movie</title>
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

  <!-- Query branch ID -->
  <?php
    $sql = "SELECT branch_id,branch_name FROM branchinfo;";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
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
    <form action="addmovie.php" method="POST" enctype="multipart/form-data">
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
                <label for="inputPosterImage">Poster image</label>
                  <div class="input-group">
                    <div class="custom-file">
                        <input type="file"  name="inputPosterImage" id="inputPosterImage" accept="image/jpeg, image/png, image/jpg">
                        <label class="custom-file-label" for="inputPosterImage">Choose poster image</label>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="inputPromoteImage">Promote image</label>
                  <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="inputPromoteImage"id="inputPromoteImage" accept="image/jpeg, image/png, image/jpg">
                        <label class="custom-file-label" for="inputPromoteImage">Choose promote image</label>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="inputName">Movie Name</label>
                <input name="name" type="text" id="inputMovieName" class="form-control" placeholder="Avengers: Endgame">
              </div>
              <div class="form-group">
                <label for="inputName">Movie lenght</label>
                <input name="lenght" type="number" id="inputLenght" class="form-control" placeholder="182(min)" min=10>
              </div>
              <div class="form-group">
                <label for="inputDescription">Movie Description</label>
                <input name="description" type="text" id="inputDescription" class="form-control" placeholder="Avengers: ENDGAME  เรื่องราวการปิดจักรวาลมาร์เวลเฟส 3 เหตุการณ์ภายหลังจากที่ธานอสดีดนิ้วล้างครึ่งจักรวาล เหล่าฮีโร่ที่เหลือรอดจะหาทางกอบกู้จักรวาลนี้คืนมาได้อย่างไร โดยในภาคนี้จะมีตัวเด็ดอย่างกัปตันมาร์เวลมาร่วมเสริมทัพด้วย">  </div>
              <div class="form-group">
                <label for="inputMovieTrailer">Movie Trailer URL</label>
                <input name="movie_trailer" type="text" id="inputMovieDescription" class="form-control"  >
              </div>
              <div class="form-group">
                <label for="inputDirector">Director Info</label>
                <input name="director" type="text" id="inputDirector" class="form-control" placeholder="Anthony Russo, Joe Russo">
              </div>
              <div class="form-group">
                <label for="inputRelease">Release date</label>
                <input name="release" type="datetime-local" id="inputPromoteDate" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStartPromate">Start Promote date</label>
                <input name="start_promote" type="datetime-local" id="inputStartPromote" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEndPromote">End Promote date</label>
                <input name="end_promote" type="datetime-local" id="inputEndPromote" class="form-control">
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
                <label for="inputSpentBudget">Theater No.</label>
                <input name="theater" type="number" id="inputTheaterNo" class="form-control">
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

</body>
</html>
