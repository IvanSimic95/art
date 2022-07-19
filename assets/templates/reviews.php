<div id="post_review"></div>

<div class="table_headers">
  <h3 class="tab1 active">Reviews ()</h3>
  <!--<h3 class="tab2">Add Review</h3>-->
</div>
<div class="tab_bodies">
  <div class="review_tab">
<div class="contents">

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/time.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

    $sql = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$t_product_name."' ORDER BY review_date DESC LIMIT 10";
	$sql2 = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$t_product_name."' ORDER BY review_date DESC";
	
    $result = $conn->query($sql);
	$result2 = $conn->query($sql2);
	
	$count = $result2->num_rows;
	$totalpages = ($count - 10) / 5;
	
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
<img src="assets/img/placeholder.png" data-src="https://avatars.dicebear.com/api/adventurer/' . $row["review_name"]. '.svg?skinColor=variant0'.rand(1,3).'" class="lazyload" alt="' . $row["review_name"]. ' Avatar">
</div> 

<div class="review-rating">
<div class="review-author-name">' . $row["review_name"]. '</div> 
<div class="review-verified"><i aria-hidden="true" class="fas fa-user-check"></i> Verfied Purchase</div>
<div class="review-date"><i aria-hidden="true" class="fa fa-clock-o"></i> <time class="format-me" title="' .$newdate. '">' .$time. '</time></div>
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
     ?>


<div class="pagination">
    <a href="https://<?php echo $domain; ?>/assets/templates/load-review.php?product=<?php echo $t_product_name; ?>&page=1" class="next">Next</a>
</div>
<button class="load-more btn">Load More</button>
</div>

  </div>
  <script src="https://unpkg.com/@webcreate/infinite-ajax-scroll/dist/infinite-ajax-scroll.min.js"></script>
  <script>
  let ias = new InfiniteAjaxScroll('.contents', {
  item: '.item',
  next: '.next',
  pagination: '.pagination',
  trigger: '.load-more',
  logger: false
});
function timeSince(date) {
   var seconds = Math.floor((new Date() - date) / 1000);
   var interval = seconds / 31536000;
   if (interval > 1) {
     return Math.floor(interval) + " years";
   }
   interval = seconds / 2592000;
   if (interval > 1) {
     var months = Math.floor(interval);
		if (months == 1) {
				return months + " month";
			}else{
				return months + " months";
			}
   }
   interval = seconds / 86400;
   if (interval > 1) {
	   var days = Math.floor(interval);
		if (days == 1) {
				return days + " day";
			}else{
				return days + " days";
			}
   }
   interval = seconds / 3600;
   if (interval > 1) {
     var hours = Math.floor(interval);
		if (hours == 1) {
				return hours + " hour";
			}else{
				return hours + " hours";
			}
   }
   interval = seconds / 60;
   if (interval > 1) {
     return Math.floor(interval) + " minutes";
   }
   return Math.floor(seconds) + " seconds";
 }
 
 
function handler() {
$('.single_review').each(function(){
     if( $(this).find('.review-stars').html() == "5.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "4.5" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i>');
     if( $(this).find('.review-stars').html() == "4.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "3.5" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "3.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "2.5" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "2.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "1.5" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "1.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "0.5" ) $(this).find('.review-stars').html('<i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "0.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
	$(this).find('.format-me').removeClass();
})
}
ias.on('appended', handler);
</script>
  <script>
  $( document ).ready(function() {
	  jQuery('.tab1').text('Reviews (<?php echo $count; ?>)');
}) 
  function timeSince(date) {
   var seconds = Math.floor((new Date() - date) / 1000);
   var interval = seconds / 31536000;
   if (interval > 1) {
     return Math.floor(interval) + " years";
   }
   interval = seconds / 2592000;
   if (interval > 1) {
     var months = Math.floor(interval);
		if (months == 1) {
				return months + " month";
			}else{
				return months + " months";
			}
   }
   interval = seconds / 86400;
   if (interval > 1) {
	   var days = Math.floor(interval);
		if (days == 1) {
				return days + " day";
			}else{
				return days + " days";
			}
   }
   interval = seconds / 3600;
   if (interval > 1) {
     var hours = Math.floor(interval);
		if (hours == 1) {
				return hours + " hour";
			}else{
				return hours + " hours";
			}
   }
   interval = seconds / 60;
   if (interval > 1) {
     return Math.floor(interval) + " minutes";
   }
   return Math.floor(seconds) + " seconds";
 }

  $('.single_review').each(function(){
     if( $(this).find('.review-stars').html() == "5.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "4.5" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i>');
     if( $(this).find('.review-stars').html() == "4.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "3.5" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "3.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "2.5" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "2.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "1.5" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "1.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "0.5" ) $(this).find('.review-stars').html('<i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');
     if( $(this).find('.review-stars').html() == "0.0" ) $(this).find('.review-stars').html('<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>');

	$(this).find('.format-me').removeClass();
	
	
 })
  </script>
  <div class="add_review_tab" style="display:none">
    <h2>You need to be a verified customer in order to leave a review</h2>
    <h4>Please enter your email address to verify your orders</h4>
    <form class="check_user" action="/assets/templates/check_user_review.php" method="post">
      <input type="email" name="check_email" value="" required placeholder="Your Email">
      <input type="submit" name="check_submit" value="Submit">
    </form>
    <h3 class="review_error">You have not made a purchase yet. <br>You can post your review after purchasing.</h3>
    <form class="add_review" action="/assets/templates/add_review.php" method="post">
      <h2>Leave a review for your purchase:</h2>
      <input type="text" name="review_name" value="" required placeholder="Full Name">
      <select class="review_rating" name="review_rating">
        <option value="5.0" selected>5.0</option>
        <option value="4.0" >4.0</option>
        <option value="3.0" >3.0</option>
        <option value="2.0" >2.0</option>
        <option value="1.0" >1.0</option>
      </select>
      <textarea name="rating_testimonial" rows="8" cols="80" placeholder="Write your review here"></textarea>
      <input type="submit" name="rating_submit" value="Post Review">
    </form>
    <h3 class="review_success">Your review has been sent! Will appear after will be approved.</h3>
  </div>
</div>


<script>
var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
  }
  return false;
};

if(getUrlParameter('status')) {
  setTimeout( function() {
      $('.review_error').show();
      document.getElementById("post_review").scrollIntoView();
      $('.table_headers h3').removeClass('active');
  		$('.tab2').addClass('active');
  		$('.review_tab').hide();
  		$('.add_review_tab').show();
    }, 300 );

}
if(getUrlParameter('postas')) {
  setTimeout( function() {
        var email = getUrlParameter('postas');
        $('.check_user').hide();
        document.getElementById("post_review").scrollIntoView();
        $('.table_headers h3').removeClass('active');
    		$('.tab2').addClass('active');
    		$('.review_tab').hide();
    		$('.add_review_tab').show();
        $('.add_review_tab h2, .add_review_tab h4').hide();
        $('.add_review').show();
    }, 300 );
}
if(getUrlParameter('review')) {
    setTimeout( function() {
      $('.add_review').hide();
      $('.review_success').show();
      $('.check_user').hide();
      document.getElementById("post_review").scrollIntoView();
      $('.table_headers h3').removeClass('active');
  		$('.tab2').addClass('active');
  		$('.review_tab').hide();
  		$('.add_review_tab').show();
      $('.add_review_tab h2, .add_review_tab h4').hide();
    }, 300 );
}
</script>
<style>
.contents{
	padding-bottom: 15px;
    border-bottom: solid 1px #f3f4f7;
    background-color: #fff;
    padding: 15px;
	}
	.load-more{
	width:100%;
	border:0!important;
	padding:15px 10px 15px 10px!important;
	cursor: pointer;
	}
	</style>