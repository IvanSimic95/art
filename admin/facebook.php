<?php
session_start();
$email_address= !empty($_SESSION['email'])?$_SESSION['email']:'';
if(empty($email_address))
{
  header("location:index.php");
}

$todaysDate = date("Y-m-d");
$date = $todaysDate;

$startDate = "$date";
$endDate = "$date";

if(isset($_GET['sdate'])){
$startDate = $_GET['sdate'];
}

if(isset($_GET['edate'])){
$endDate = $_GET['edate'];
}


include_once $_SERVER['DOCUMENT_ROOT'].'/admin/partials/head.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/admin/partials/navbar.php';
?>
<script src="https://cdn.datatables.net/searchpanes/1.4.0/js/dataTables.searchPanes.min.js"></script>
<div class="container-fluid px-4">


    <div class="row justify-content-center" style="margin-top:20px;">
        <div class="col-xl-12 col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                   

                    <span style="float:left;">
                    <h4> <i class="fas fa-table me-1"></i>
                    Campaigns</h4>
</span>


                    <span style="float:right;"> 
                    <form class="form-inline" action="" method="get">
<div class="input-group">
<input type="text" name="sdate" class="form-control" id="sdate" value="<?php echo $startDate; ?>">
<input type="text" name="edate" class="form-control" id="edate" placeholder="End Date" value="<?php echo $endDate; ?>">
  <button class="btn btn-outline-secondary show-orders" type="submit">Save!</button>
</div></form>
</span>



                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Sales Count</th>
                                <th>Sales in $</th>
                            
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            
                        include_once $_SERVER['DOCUMENT_ROOT'].'/admin/scripts/campaigns.php';
                        ?>

                        </tbody>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                                <th>Name</th>
                                <th>Sales Count</th>
                                <th>Sales in $</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer small text-muted"><i class="fa fa-clock" style="margin-right:5px;"></i>From: <?php echo $startDate; ?> - <?php echo $endDate; ?></div>
            </div>
        </div>

        
    </div>
</div>
</div>
</div>
<style>
.card {
    height: 100%;
}
</style>


<?php include_once $_SERVER['DOCUMENT_ROOT'].'/admin/partials/footer.php';