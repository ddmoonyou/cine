<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body class="hold-transition sidebar-mini">


  <!-- Content Wrapper. Contains page content -->

  <!-- Main content -->
  
    <!-- PIE CHART -->
    <div class="col-md-3">
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Number of seat of each System Type</h3>
        </div>
        <div class="card-body">
          <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.card -->
  


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->


<!-- Page specific script -->

<?php

  $system_type = array();
  $number = array();

  $sql = "SELECT result.system_type,count(*) as count FROM
          (
              SELECT s.showing_id, t.system_type FROM showings s
              LEFT JOIN theaterinfo t ON t.branch_id = s.branch_id AND t.theater_no = s.theater_no
              LEFT JOIN
              (
                  SELECT res.showing_id, seat.reserve_id FROM reserveseats seat,reserveinfo res
                  WHERE res.reserve_id = seat.reserve_id
              ) AS a ON a.showing_id  = s.showing_id
          ) AS result
          GROUP BY result.system_type;";

  $res = mysqli_query($con, $sql);
  if (!$res) {
      die('Error: ' . mysqli_error($con));
  }
  foreach($res as $a)
  {
      $s = $a["system_type"];
      $data = $a["count"];
      array_push($system_type,$s);
      array_push($number,$data);
  }

?>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- PIE CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var pieData        = {
      labels: [
          '<?php echo implode("',' ",$system_type); ?>'
      ],
      datasets: [
        {
          data: <?php echo "[" . implode(", ",$number) . ",0]"; ?>,
          backgroundColor : ['#00e6e6', '#DC143C', '#ff90b3', '#6e44ff'],
        }
      ]
    }
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

  })
</script>
</body>
</html>
