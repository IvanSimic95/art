<?php
session_start();
$email_address= !empty($_SESSION['email'])?$_SESSION['email']:'';
if(empty($email_address))
{
  header("location:index.php");
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
                    <i class="fas fa-table me-1"></i>
                    Reviews
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Rating</th>
                                <th>Text</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            
                        include_once $_SERVER['DOCUMENT_ROOT'].'/admin/scripts/reviews.php';
                        ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Rating</th>
                                <th>Text</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer small text-muted"><i class="fa fa-clock" style="margin-right:5px;"></i>Updated
                    <?php echo time_ago(date('F jS, Y, H:i:s')); ?> </div>
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