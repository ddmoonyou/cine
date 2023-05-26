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
  
    <!-- FOOD CHART -->
    <div class="col-md-5">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Food Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
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

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
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
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 0, 86, 27, 28, 48, 0, 0, 86, 27
                                ,28, 48, 40, 19, 0, 0]
        },
        {
          label               : 'M',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [12, 40, 21, 34, 67, 23, 54, 12, 32, 21, 37, 55
                                ,76, 65, 43, 45, 73, 46]
        },
        {
          label               : 'L',
          backgroundColor     : 'rgba(20, 230, 125, 1)',
          borderColor         : 'rgba(20, 230, 125, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(20, 230, 125, 1)',
          pointStrokeColor    : '#c1a1f1',
          pointHighlightFill  : '#fee',
          pointHighlightStroke: 'rgba(20, 230, 125, 1)',
          data                : [12, 40, 43, 34, 67, 35, 54, 23, 98, 23, 37, 55
                                ,34, 21, 43, 59, 73, 32]
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
