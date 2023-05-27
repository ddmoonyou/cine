<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body class="hold-transition sidebar-mini">


  <!-- Content Wrapper. Contains page content -->

  <!-- Main content -->
  
    <!-- FOOD CHART -->
    <div class="col-md-4">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Food Chart</h3>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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

<!-- Page specific script -->

<?php

  $total_food_s = array();
  $total_food_m = array();
  $total_food_l = array();

  $count = 0;

  $sql = "SELECT fsize.food_type,fsize.size ,SUM(res.quantity) as total FROM reservefood res, foodsize fsize
          WHERE res.food_id = fsize.food_id
          GROUP BY res.food_id;";
  $res = mysqli_query($con, $sql);
  if (!$res) {
      die('Error: ' . mysqli_error($con));
  }
  foreach($res as $a)
  {
      $total_food = $a["total"];
      $cursize = $a["size"];
      if ($cursize == "S"){
        array_push($total_food_s,$total_food);
      }else if ($cursize == "M"){
        array_push($total_food_m,$total_food);
      }else if ($cursize == "L"){
        array_push($total_food_l,$total_food);
      }
      
  }
?>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- FOOD CHART -
    //--------------

    var FoodData = {
      labels  : ['Pepsi', 'Pepsi-Max', 'Coca-Cola', 'Coca-Cola-Zero','Sprite', 'Lemon-Soda', 'Mineral-Water', 'Fanta-Strawberry-Soda', 'Fanta-Orange', 'Fanta-Grape', 
      'Salty-Popcorn', 'Caramel-Popcorn', 'Cheese-Popcorn', 'BBQ-Popcorn', 'Lay-Nori-seaweed', 'Lay-BBQ', 'Cornae', 'Pringles'],
      datasets: [
        {
          label               : 'S',
          backgroundColor     : 'rgba(190,119,74,0.9)',
          borderColor         : 'rgba(190,119,74,0.8)',
          pointRadius          : false,
          pointColor          : '#be774a',
          pointStrokeColor    : 'rgba(190,119,74,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(190,119,74,1)',
          data                : <?php echo "[" . implode(", ",$total_food_s) . "]"; ?>
        },
        {
          label               : 'M',
          backgroundColor     : 'rgba(119, 219, 219, 1)',
          borderColor         : 'rgba(119, 219, 219, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(119, 219, 219, 1)',
          pointStrokeColor    : '#77dbdb',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(119,219,219,1)',
          data                : <?php echo "[" . implode(", ",$total_food_m) . "]"; ?>
        },
        {
          label               : 'L',
          backgroundColor     : 'rgba(245, 233, 158, 1)',
          borderColor         : 'rgba(245, 233, 158, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(245, 233, 158, 1)',
          pointStrokeColor    : '#f5e99e',
          pointHighlightFill  : '#fee',
          pointHighlightStroke: 'rgba(245, 233, 158, 1)',
          data                : <?php echo "[" . implode(", ",$total_food_l) . "]"; ?>
        },
    
      ]
    }
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, FoodData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : true,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })

  })
</script>
</body>
</html>
