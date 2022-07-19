<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <svg class="svg-inline--fa fa-chart-area fa-w-16 me-1" aria-hidden="true" focusable="false"
                        data-prefix="fas" data-icon="chart-area" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M500 384c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v308h436zM372.7 159.5L288 216l-85.3-113.7c-5.1-6.8-15.5-6.3-19.9 1L96 248v104h384l-89.9-187.8c-3.2-6.5-11.4-8.7-17.4-4.7z">
                        </path>
                    </svg><!-- <i class="fas fa-chart-area me-1"></i> Font Awesome fontawesome.com -->
                    Orders
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div><canvas id="orderChart" width="1633" height="652"
                        style="display: block; height: 435px; width: 1089px;" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="card-footer small text-muted"><i class="fa fa-clock" style="margin-right:5px;"></i>Updated <?php echo time_ago(date('F jS, Y, H:i:s')); ?> </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                   
                <i class="fa fa-dollar-sign"></i> Earnings
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div><canvas id="moneyChart" width="1633" height="652"
                        style="display: block; height: 435px; width: 1089px;" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="card-footer small text-muted"><i class="fa fa-clock" style="margin-right:5px;"></i>Updated <?php echo time_ago(date('F jS, Y, H:i:s')); ?> </div>
            </div>
        </div>
    </div>
    <?php
$day1 = date("d M");
$day2 = date("d M", strtotime("yesterday"));
$day3 = date("d M", strtotime("-2 days"));
$day4 = date("d M", strtotime("-3 days"));
$day5 = date("d M", strtotime("-4 days"));
$day6 = date("d M", strtotime("-5 days"));
$day7 = date("d M", strtotime("-6 days"));

$days = '"'.$day7.'", "'.$day6.'", "'.$day5.'", "'.$day4.'", "'.$day3.'", "'.$day2.'", "'.$day1.'"';

$sql = "SELECT * FROM orders WHERE (`order_date_only` = CURRENT_DATE AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE AND `order_status` = 'processing')";
$result = $conn->query($sql);
$orders1 = $result->num_rows;

$sql = "SELECT * FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 1 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 1 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
$orders2 = $result->num_rows;

$sql = "SELECT * FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 2 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 2 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
$orders3 = $result->num_rows;

$sql = "SELECT * FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 3 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 3 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
$orders4 = $result->num_rows;

$sql = "SELECT * FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 4 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 4 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
$orders5 = $result->num_rows;

$sql = "SELECT * FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 5 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 5 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
$orders6 = $result->num_rows;

$sql = "SELECT * FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 6 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 6 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
$orders7 = $result->num_rows;

$orders = '"'.$orders7.'", "'.$orders6.'", "'.$orders5.'", "'.$orders4.'", "'.$orders3.'", "'.$orders2.'", "'.$orders1.'"';

$max = max($orders7, $orders6, $orders5, $orders4, $orders3, $orders2, $orders1);
$max = $max * 2;

$total1 = $total2 = $total3 = $total4 = $total5 = $total6 = $total7 = 0;
$sql = "SELECT `order_price` FROM `orders` WHERE (`order_date_only` = CURRENT_DATE AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE AND `order_status` = 'processing')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {$total1 = $total1 + $row["order_price"];}

$sql = "SELECT `order_price` FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 1 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 1 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {$total2 = $total2 + $row["order_price"];}

$sql = "SELECT `order_price` FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 2 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 2 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {$total3 = $total3 + $row["order_price"];}

$sql = "SELECT `order_price` FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 3 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 3 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {$total4 = $total4 + $row["order_price"];}

$sql = "SELECT `order_price` FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 4 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 4 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {$total5 = $total5 + $row["order_price"];}

$sql = "SELECT `order_price` FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 5 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 5 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {$total6 = $total6 + $row["order_price"];}

$sql = "SELECT `order_price` FROM orders WHERE (`order_date_only` = CURRENT_DATE - INTERVAL 6 DAY AND `order_status` = 'shipped') OR (`order_date_only` = CURRENT_DATE - INTERVAL 6 DAY AND `order_status` = 'processing')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {$total7 = $total7 + $row["order_price"];}

$totals = '"'.round($total7).'", "'.round($total6).'", "'.round($total5).'", "'.round($total4).'", "'.round($total3).'", "'.round($total2).'", "'.round($total1).'"';

$maxtotal = max($total7, $total6, $total5, $total4, $total3, $total2, $total1);
$maxtotal = $maxtotal * 2;
?>
    <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("orderChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php echo $days; ?>],
    datasets: [{
      label: "Orders",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php echo $orders; ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'day'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo $max; ?>,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

var ctx2 = document.getElementById("moneyChart");
var myLineChart = new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: [<?php echo $days; ?>],
    datasets: [{
      label: "Orders",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php echo $totals; ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'day'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo $maxtotal; ?>,
          maxTicksLimit: 15
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
    </script>