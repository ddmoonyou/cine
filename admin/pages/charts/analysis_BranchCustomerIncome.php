<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body class="hold-transition sidebar-mini">


  <!-- Content Wrapper. Contains page content -->

  <!-- Main content -->
  
   <!-- BAR CHART -->
   <div class="row">
            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Branch Income</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="incomeChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Branch Reservations</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="customerChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->


<!-- Page specific script -->

<?php

  $total_income_array = array();

  $branch_array = array();

  $sql = "SELECT showings.branch_id, SUM(b.net) as total FROM showings,
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
        GROUP BY showings.branch_id;";
  $res = mysqli_query($con, $sql);
  if (!$res) {
      die('Error: ' . mysqli_error($con));
  }
  foreach($res as $a)
  {
      $total_income = $a["total"];
      $branch = $a["branch_id"];
      array_push($total_income_array,$total_income);
      array_push($branch_array,$branch);
  }

  $total_reserve_array = array();

  $sql = "SELECT branch_id,COUNT(reserve_id) as cnt FROM 
          (
              SELECT sh.branch_id, res.reserve_id FROM reserveinfo res, showings sh
              WHERE res.showing_id = sh.showing_id
          )AS a
          GROUP BY(branch_id);";
  $res = mysqli_query($con, $sql);
  if (!$res) {
      die('Error: ' . mysqli_error($con));
  }
  foreach($res as $a)
  {
      $total_reserve = $a["cnt"];
      array_push($total_reserve_array,$total_reserve);
  }
?>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

        //-------------
    //- BAR CHART -
    //-------------
    var BarData1 = {
      labels  : <?php echo "[" . implode(", ",$branch_array) . "]"; ?>,
      datasets: [
        {
          label               : 'Income',
          backgroundColor     : 'rgba(255,165,0,0.9)',
          borderColor         : 'rgba(255,165,0,0.8)',
          pointRadius          : false,
          pointColor          : '#e59400',
          pointStrokeColor    : 'rgba(255,165,0,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo "[" . implode(", ",$total_income_array) . ",0]"; ?>
        },
    
      ]
    }

    var BarData2 = {
      labels  : <?php echo "[" . implode(", ",$branch_array) . "]"; ?>,
      datasets: [
        {
          label               : 'Reservations',
          backgroundColor     : 'rgba(60,141,188,1)',
          borderColor         : 'rgba(60,141,188,1)',
          pointRadius         : false,
          pointColor          : 'rgba(60,141,188,1)',
          pointStrokeColor    : '#3b8bba',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo "[" . implode(", ",$total_reserve_array) . ",0]"; ?>
        },
    
      ]
    }

    var barChartCanvas = $('#incomeChart').get(0).getContext('2d')
    var temp1 = BarData1
    incomeData= temp1
    

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: incomeData,
      options: barChartOptions
    })

    var barChartCanvas = $('#customerChart').get(0).getContext('2d')
    var temp2 = BarData2
    customerData= temp2
    

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: customerData,
      options: barChartOptions
    })
  })
</script>
</body>
</html>
