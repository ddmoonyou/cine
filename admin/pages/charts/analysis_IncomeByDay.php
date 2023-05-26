<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body class="hold-transition sidebar-mini">


  <!-- Content Wrapper. Contains page content -->

  <!-- Main content -->
  
    <!-- DONUT CHART -->
    <div class="col-md-3">
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Income By Day</h3>

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
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->

<?php

    $income_by_day = array();

    $sql = "SELECT DAYOFWEEK(showings.date_time) AS day, SUM(b.net) as total FROM showings,
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
            GROUP BY day;";

    $res = mysqli_query($con, $sql);
    if (!$res) {
        die('Error: ' . mysqli_error($con));
    }
    foreach($res as $a)
    {
        $byday = $a["total"];
        array_push($income_by_day,$byday);
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
    //- DONUT CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Sun',
          'Mon',
          'Tue',
          'Wed',
          'Thu',
          'Fri',
          'Sat',
      ],
      datasets: [
        {
          data: <?php echo "[" . implode(", ",$income_by_day) . "]"; ?>,
          backgroundColor : ['#ff5952', '#ffd656', '#FFC0CB', '#4fc775', '#FFA500', '#3e77e9', '#644ca2'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

  })
</script>
</body>
</html>
