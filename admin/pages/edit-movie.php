<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminCINE | Edit Movie</title>
  <link rel = "icon" href = "../dist/img/AdminLTELogo.png" type = "image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

  <!-- Connect to database -->
  <?php
  include('../connect_db.php');
  ?> 

  <!-- Select from Drop-down list and display data -->
  <?php
  $sql = "SELECT * FROM movieinfo";
  $res = mysqli_query($con, $sql);
  
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
            <h1>Edit Movie</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Movie</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
      $sql = "SELECT movie_id,movie_name FROM movieinfo;";
      $result = mysqli_query($con, $sql);
      if (!$result) {
          die('Invalid query: ' . mysqli_error($con));
      }
    ?>
    <section class="content">
    <form action="edit-movie-sql.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-warning">
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
                  <select name="movie_id" id="movie_id" onchange="fetchemp()" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    <?php
                      foreach($result as $branch)
                      {
                        $b_id = $branch['movie_id'];
                        $b_name = $branch['movie_name'];
                        echo "<option value=$b_id>$b_id: $b_name</option>";
                      }
                    ?>
                  </select>
              </div>
                <div class="form-group">
                  <label for="inputMoviename">Movie Name(Edit)</label>
                  <input name="movie_name" type="text" id="movie_name" class="form-control">
                </div>
                <div class="form-group">
                <label for="inputMovieDescription">Movie Description(Edit)</label>
                  <input name="movie_description" type="text" id="movie_description" class="form-control"  >
                </div>
                <div class="form-group">
                <label for="inputMovieTrailer">Movie Trailer URL(Edit)</label>
                  <input name="movie_trailer" type="text" id="movie_trailer" class="form-control"  >
                </div>
                <div class="form-group">
                <label for="inputDirectorInfo">Director info(Edit)</label>
                  <input name="director_info" type="text" id="director_info" class="form-control"  >
                </div>
                <div class="form-group">
                <label for="inputMovieLength">Movie Length(Edit)</label>
                  <input name="movie_length" type="number" id="movie_length" class="form-control"  >
                </div>
                <div class="form-group">
                  <label for="inputPosterImage">Poster image(Edit)</label>
                    <div class="input-group">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" name="movie_poster"id="inputPosterImage" accept="image/jpeg, image/png, image/jpg">
                          <label class="custom-file-label" for="inputPosterImage">Choose promote image</label>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputReleaseDate">Release Date(Edit)</label>
                  <input name="releaseDate" type="datetime-local" id="releaseDate" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputStartPromote">Start Promote Date(Edit)</label>
                  <input name="start_promote" type="datetime-local" id="start_promote" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputEndPromote">End Promote Date(Edit)</label>
                  <input name="end_promote" type="datetime-local" id="end_promote" class="form-control">
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
</script>

</body>
</html>
