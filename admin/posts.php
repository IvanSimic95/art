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

<div class="container-fluid px-4">



    <div class="row justify-content-center" style="margin-top:20px;">
        <div class="col-xl-10 col-md-8">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                All Blog Posts
                </div>
                <div class="card-body">
                <div class="row justify-content-center m-2" style="margin:20px;">
                <?php
$sql = "SELECT * FROM blog ORDER BY id DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 0) {
                        } else {
                        while ($row = $result->fetch_assoc()) {
                          
                        
                            echo '
                        <div class="col-xl-4 col-md-6 col-sm-12" style="border-radius:5px;padding:20px;">
                        <div class="shadow" style="border-radius:5px;padding:20px;">
                        <h4>' . $row["title"] . '</h4>
                        <img src="https://melissa.test/assets/img/blog/' . $row["image"] . '" style="width:100%;">
                        <a href="edit-post.php?id=' . $row["id"] . '" class="btn btn-primary mt-2" style="width:100%;">Edit Post #' . $row["id"] . '</a>
                        </div>
                        </div>
                        ';
                     

                        }
                        $conn->close();
                                }
                                ?>
               </div>
                </div>
                <div class="card-footer small text-muted"> </div>
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
h2 {
text-align:center;
}
</style>


<?php include_once $_SERVER['DOCUMENT_ROOT'].'/admin/partials/footer.php';