<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">


  <!-- Content Wrapper. Contains page content -->

  <!-- Main content -->

    <!-- AREA CHART -->
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Income By Month</h3>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
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

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>

<?php
  $total_array = array();

  $sql = "SELECT MONTH(showings.date_time) AS month, SUM(b.net) as total FROM showings,
  (
      SELECT a.reserve_id, a.total*(100 - IFNULL(a.discount_percent,0))/100 as net, a.showing_id FROM
      (
          SELECT res_info.reserve_id, f.net_food, s.seat_net, IFNULL(f.net_food,0) +s.seat_net as total,pm.discount_percent,res_info.showing_id FROM reserveinfo res_info
          LEFT JOIN
          (
              SELECT food.reserve_id, SUM(food.food_net) as net_food FROM
              (
                  SELECT fsize.food_id, res_f.reserve_id, res_f.quantity, fsize.price,fsize.price*res_f.quantity as food_net FROM reservefood res_f,foodsize fsize
                  WHERE fsize.food_id = res_f.food_id  
              ) as food
              GROUP BY reserve_id
          ) as f ON f.reserve_id = res_info.reserve_id
          LEFT JOIN
          (
              SELECT res_s.reserve_id,SUM(p.price) AS seat_net FROM reserveseats res_s,
              (   
                  SELECT lay.seat_id, pr.price FROM seatlayout lay, seatprice pr
                  WHERE lay.seat_type = pr.seat_type
              ) AS p
              WHERE res_s.seat_id = p.seat_id  
              GROUP BY res_s.reserve_id
          ) as s ON s.reserve_id = res_info.reserve_id
          LEFT JOIN 
          (
              SELECT reserve_id,promotion.discount_percent FROM reserveinfo
              LEFT JOIN promotion on reserveinfo.promotion_code = promotion.promotion_code
          ) as pm ON pm.reserve_id = res_info.reserve_id
      ) as a
  ) as b
  WHERE showings.showing_id=b.showing_id
  GROUP BY month;"
  ;
  $res = mysqli_query($con, $sql);
  if (!$res) {
      die('Error: ' . mysqli_error($con));
  }
  foreach($res as $a)
  {
      $total = $a["total"];
      array_push($total_array,$total);
  }
?>

<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */


    //--------------
    //- AREA CHART -
    //--------------
    'use strict'

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['March', 'April', 'May', 'June', 'July', 'August'],
      datasets: [
        {
          label               : '2023',
          backgroundColor: 'tansparent',
          pointBorderColor: '#77aaff',
          pointBackgroundColor: '#77aaff',
          backgroundColor     : '#99ccff',
          borderColor         : '#77aaff',
          pointColor          : '#fffff',
          fill: true,
          data                :  <?php echo "[" . implode(", ",$total_array) . "]"; ?>
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
        hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          // display : true
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: true,
            lineWidth: '10px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: '#fffff'
          },ticks: $.extend({
            beginAtZero: true,
            suggestedMax: 200
          }, ticksStyle)
        }]
      }
    }

    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })


  })
</script>
</body>
</html>
