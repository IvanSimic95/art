<?php
if(isset($_GET['page'])) {
$page = $_GET['page'];
}else{
$page = "0";	
}
if(isset($_GET['product'])) {
$product = $_GET['product'];
}else{
$product = "SOULMATE";	
}
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/time.php';
$perpage = 5;
$offset = ($page-1) * $perpage; 
	
$offset = $offset + 10;

$total_pages_sql = "SELECT COUNT(*) FROM reviews WHERE product = '".$product."'";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_rows = $total_rows - 10;
$total_pages = ceil($total_rows / $perpage);

$nextpage = $page + 1;

    $sql = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$product."' ORDER BY review_date DESC LIMIT ".$offset.", ".$perpage;

    $result = $conn->query($sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
	$count = $result->num_rows;
    if($result->num_rows != 0) {

      while($row = $result->fetch_assoc()) {
         // echo '<div class="single_review sides"><div class="review_content"><h3><span class="review-name">' . $row["review_name"]. '</span> <span class="verified-badge"><i class="fas fa-user-check"></i> Verfied Purchase</span><time>' . $row["review_date"]. '</time> ago</h3><div class="rating">' . $row["review_rating"]. '</div><div class="testimonial">' . $row["review_text"]. '</div></div></div>';
        $newdate = date('F jS, Y, H:i:s', strtotime($row["review_date"]));
        $time = time_ago($row["review_date"]);
		echo '
		<div class="item">
<div class="single_review">
<div class="review-header">

<div class="review-author-img">
<img src="https://avatars.dicebear.com/api/adventurer/' . $row["review_name"]. '.svg?skinColor=variant0'.rand(1,3).'" alt="' . $row["review_name"]. ' Avatar">
</div> 

<div class="review-rating">
<div class="review-author-name">' . $row["review_name"]. '</div> 
<div class="review-verified"><i aria-hidden="true" class="fas fa-user-check"></i> Verfied Purchase</div>
<div class="review-date"><i aria-hidden="true" class="fa fa-clock-o"></i> <time class="format-me" title="' .$newdate. '">' . $time. '</time></div>
<div class="review-stars">' . $row["review_rating"]. '</div>

</div> 


</div>

<div class="review-content">
' . $row["review_text"]. '
</div>

</div></div>';
		
		}






    } else {
        echo "No Reviews";
    }
      $conn->close();
	  
	  if($page != $total_pages){
     ?>
	 
	 <div class="pagination">
    <a href="https://<?php echo $domain; ?>/assets/templates/load-review.php?product=<?php echo $product; ?>&page=<?php echo $nextpage; ?>" class="next">Next</a>
</div>
<?php
} ?>