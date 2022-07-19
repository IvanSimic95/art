<?php
if(isset($_GET['orders'])){
$orders = $_GET['orders'];
}else{
$orders = "7";
}

if(isset($_GET['earnings'])){
$earnings = $_GET['earnings'];
}else{
$earnings = "7";
}

switch ($orders) {
  case "7":
  $ordersmsg = "in Last 7 Days";
    break;
  case "14":
  $ordersmsg = "in Last 14 Days";
    break;
  case "30":
  $ordersmsg = "in Last 30 Days";
    break;
}

switch ($earnings) {
  case "7":
    $earningsmsg = "in Last 7 Days";
    break;
  case "14":
    $earningsmsg = "in Last 14 Days";
    break;
  case "30":
    $earningsmsg = "in Last 30 Days";
    break;
}
function displayDates($date1, $date2, $format = 'd-m-Y' ) {
    $dates = array();
    $current = strtotime($date1);
    $date2 = strtotime($date2);
    $stepVal = '+1 day';
    while( $current <= $date2 ) {
       $dates[] = date($format, $current);
       $current = strtotime($stepVal, $current);
    }
    return $dates;
 }

$sql = "SELECT DATE(order_date), SUM(order_price) FROM orders WHERE order_status='processing' OR order_status='shipped' GROUP BY DATE(order_date) ORDER BY DATE(order_date) desc LIMIT ".$earnings.";";
$r = array();
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $r[] = $row;
}
$ccountr = count($r);
if($ccountr > '0'){

$minusdays = $earnings - 1;
$minusdays = "-".$minusdays." days";

//Generate array of days used in axis of a chart
$date1 = date("d-m-Y", strtotime($minusdays));
$date2 = date("d-m-Y");
$date = displayDates($date1, $date2, 'd M');


//Loop to generate list of days used in axis of a chart
$i = 0;
$len = count($date);
$totaldates = "";

foreach ($date as $row) {
    if ($i == $len - 1) {
        $totaldates .= '"'.$row.'"';
    }else{
        $totaldates .= '"'.$row.'", ';
    }
   $i++;
}



//Final loop
//Generate array of days used in axis of a chart
$date1 = date("Y-m-d", strtotime($minusdays));
$date2 = date("Y-m-d");
$totaldatestwo = "";
$date = displayDates($date1, $date2, 'Y-m-d');


//Loop to generate list of days used in axis of a chart
$iii = 0;
$leniii = count($date);

$r = array_reverse($r);

$loop = "";
foreach ($r as $row) {
    if (in_array($row['DATE(order_date)'], $date)) {
        if ($iii == $leniii - 1) {
            $loop .= '"'.round($row['SUM(order_price)'], 2).'"';
        }else{
            $loop .= '"'.round($row['SUM(order_price)'], 2).'", ';
        }
    }else{
        if ($iii == $leniii - 1) {
            $loop .= '"0"';
        }else{
            $loop .= '"0", ';
        }
    } 

    $iii++;
}

$rcount = count($r);
$ri = 0;
$rmax = array();

while($ri < $rcount) {
$rmax[] = $r[$ri]['SUM(order_price)'];
$ri++;
}

$totalsum = round(array_sum($rmax), 2);

$totalsum4 = $totalsum / $earnings;

$maxtotal = max($rmax);
$maxtotal = $maxtotal * 2;
$maxtotal = round($maxtotal, -2);
//PHP FOR ORDER COUNT BELOW THIS!

$sqlo = "SELECT DATE(order_date), COUNT(*) FROM orders WHERE order_status='processing' OR order_status='shipped' GROUP BY DATE(order_date) ORDER BY DATE(order_date) desc LIMIT ".$orders.";";
$r2 = array();
$result = $conn->query($sqlo);
while ($row = $result->fetch_assoc()) {
  $r2[] = $row;
}


$minusdays2 = $orders - 1;
$minusdays2 = "-".$minusdays2." days";

//Generate array of days used in axis of a chart
$date1 = date("d-m-Y", strtotime($minusdays2));
$date2 = date("d-m-Y");
$date = displayDates($date1, $date2, 'd M');


//Loop to generate list of days used in axis of a chart
$i = 0;
$len = count($date);
$totaldates2 = "";

foreach ($date as $row) {
    if ($i == $len - 1) {
        $totaldates2 .= '"'.$row.'"';
    }else{
        $totaldates2 .= '"'.$row.'", ';
    }
   $i++;
}

//Final loop
//Generate array of days used in axis of a chart
$date1 = date("Y-m-d", strtotime($minusdays2));
$date2 = date("Y-m-d");
$date = displayDates($date1, $date2, 'Y-m-d');

//Loop to generate list of days used in axis of a chart
$iiii = 0;
$leniiii = count($date);

$r2 = array_reverse($r2);


$loop2 = "";
foreach ($r2 as $row) {
    if (in_array($row['DATE(order_date)'], $date)) {
        if ($iiii == $leniiii - 1) {
            $loop2 .= '"'.round($row['COUNT(*)'], 2).'"';
        }else{
            $loop2 .= '"'.round($row['COUNT(*)'], 2).'", ';
        }
    }else{
        if ($iiii == $leniiii - 1) {
            $loop2 .= '"0"';
        }else{
            $loop2 .= '"0", ';
        }
    }

    $iiii++;
}


$r2count = count($r2);
$r2i = 0;
$r2max = array();

while($r2i < $r2count) {
$r2max[] = $r2[$r2i]['COUNT(*)'];
$r2i++;
}

$totalsum2 = round(array_sum($r2max), 2);

$totalsum3 = $totalsum2 / $orders;

$maxtotal2 = max($r2max);
$maxtotal2 = $maxtotal2 * 2;
$maxtotal2 = round($maxtotal2, -1);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    
                <span style="float:left;">
                <h4><i class="fa fa-chart-area"></i> Orders</h4>
</span>
<span style="float:right;"> 

<div class="input-group">
<select class="form-select orders-select" aria-label="Default select example" style="width:250px;">
<option value="7" <?php if ($orders==7) echo 'selected="selected"';?>>Show Last 7 Days </options>
<option value="14" <?php if ($orders==14) echo 'selected="selected"';?>>Show Last 14 Days</options>
<option value="30" <?php if ($orders==30) echo 'selected="selected"';?>>Show Last 30 Days</options>
</select>
  <button class="btn btn-outline-secondary show-orders" type="button">Show me!</button>
</div>
</span>

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
                <div class="card-footer small text-muted">
                <span class="badge badge-primary" style="float:right;"><i class="fa fa-shopping-cart"></i> Average Orders: <b><?php echo round($totalsum3); ?>/Day</b></span>
               <span class="badge badge-primary" style="float:left;"> <b><?php echo $totalsum2; ?></b>  Orders <?php echo $ordersmsg; ?></span>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                <span style="float:left;">
                <h4><i class="fa fa-dollar-sign"></i> Earnings</h4>
</span>
<span style="float:right;"> 
<div class="input-group">
<select class="form-select earnings-select" aria-label="Default select example" style="width:250px;">
<option value="7" <?php if ($earnings==7) echo 'selected="selected"';?>>Show Last 7 Days </options>
<option value="14" <?php if ($earnings==14) echo 'selected="selected"';?>>Show Last 14 Days</options>
<option value="30" <?php if ($earnings==30) echo 'selected="selected"';?>>Show Last 30 Days</options>
</select>
  <button class="btn btn-outline-secondary show-earnings" type="button">Show me!</button>
</div>
</span>
                
<script>
$(".show-orders").click(function(){
let orders = $(".orders-select").val();
let url = "dashboard.php?orders=";
let result = url.concat(orders);
let addon = "&earnings=<?php echo $earnings; ?>";
let resultnew = result.concat(addon);
window.location.href = resultnew;
return false;
});

$(".show-earnings").click(function(){
let earnings = $(".earnings-select").val();
let urltwo = "dashboard.php?orders=<?php echo $orders; ?>&earnings=";
let resulttwo = urltwo.concat(earnings);
window.location.href = resulttwo;
return false;
});
</script>






                
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
                <div class="card-footer small text-muted">
                    <span class="badge badge-primary" style="float:right;"><i class="fa fa-dollar-sign"></i> Average Earnings: <b>$<?php echo round($totalsum4); ?>/Day</b></span>
                    <span class="badge badge-primary" style="float:left;"><i class="fa fa-dollar-sign"></i> <b><?php echo $totalsum; ?></b> Earned <?php echo $earningsmsg; ?> </span>
                </div>
               
            </div>
        </div>
    </div>

<style>
  .badge-primary {
    color: #fff;
    background-color: #007bff;
    font-size: 1.1em;
    padding: 0.6em 1em;
}
</style>
    <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("orderChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php echo $totaldates2; ?>],
    datasets: [{
      label: "Orders",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php echo $loop2; ?>],
    }],
  },
  options: {
    animations: {
      tension: {
        duration: 1000,
        easing: 'linear',
        from: 1,
        to: 0,
        loop: true
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'day'
        },
        gridLines: {
          display: false
        },
        ticks: {
          min: 0,
          max: <?php echo $maxtotal2; ?>,
          maxTicksLimit: 15
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?php echo $maxtotal2; ?>,
          maxTicksLimit: 10
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
    labels: [<?php echo $totaldates; ?>],
    datasets: [{
      label: "$USD",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php echo $loop; ?>]
    }],
  },
  options: {
    animations: {
      tension: {
        duration: 1000,
        easing: 'linear',
        from: 1,
        to: 0,
        loop: true
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'day'
        },
        gridLines: {
          display: false
        },
        ticks: {
          min: 0,
          max: <?php echo $maxtotal; ?>,
          maxTicksLimit: 15
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
    
<?php } ?>