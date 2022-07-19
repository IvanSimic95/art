<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
	
	$sql = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$t_product_name."' ORDER BY review_date DESC";
    $result = $conn->query($sql);
	$count = $result->num_rows;


    $sql5 = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$t_product_name."' AND review_rating = '5.0' ORDER BY review_date DESC";
    $fiveresult = $conn->query($sql5);
	$countfive = $fiveresult->num_rows;

	
	$sql4 = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$t_product_name."' AND review_rating = '4.0' ORDER BY review_date DESC";
    $fourresult = $conn->query($sql4);
	$countfour = $fourresult->num_rows;

	
	$sql3 = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$t_product_name."' AND review_rating = '3.0' ORDER BY review_date DESC";
    $threeresult = $conn->query($sql3);
	$countthree = $threeresult->num_rows;

	
	$sql2 = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$t_product_name."' AND review_rating = '2.0' ORDER BY review_date DESC";
    $tworesult = $conn->query($sql2);
	$counttwo = $tworesult->num_rows;

	
	$sql1 = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product = '".$t_product_name."' AND review_rating = '1.0' ORDER BY review_date DESC";
    $oneresult = $conn->query($sql1);
	$countone = $oneresult->num_rows;
	
	
	$avgrate = $countfive*"5" + $countfour*"4" + $countthree*"3" + $counttwo*"2" + $countone*"1";
	$avgratet = $countfive + $countfour + $countthree + $counttwo + $countone;
	$avgratefinal = $avgrate / $avgratet;
	$avg = round($avgratefinal, "2");



$avgsplit = explode(".", $avg);//Try splitting average rating number from its decimals
$countsplit = count($avgsplit);//Check how many array elements after split

//If array only 1 element that means its round number
if($countsplit == 1){
$deci = "no";
$avgprimary = $avgsplit[0];
$avgsecondary = "0"; 
$avg = $avg . ".00";
}else{//If more than one then it had decimals
$deci = "yes";
$avgprimary = $avgsplit[0];
$avgsecondary = $avgsplit[1]; 
}

if($avgsecondary < 10){
$avgsecondary = $avgsecondary ."0";
}

//If avg rating is lower than 5 calculate empty stars number, if its 5 there are none empty
if($avgprimary < "5"){
$emptycalc = "4" - $avgprimary;
}else{
$emptycalc = "0";
}

$starhtml = '<span class="sprw-star-icon full"><i class="fa fa-star"></i></span>';
$emptystarhtml = '<span class="sprw-star-icon"><i class="fa fa-star"></i></span>';

if($avgsecondary < 30){
$avgsecondary = $avgsecondary + 20;
}

function get_percentage($total, $number)
{
  if ( $total > 0 ) {
   return round(($number * 100) / $total, 2);
  } else {
    return 0;
  }
}

$bar5 = get_percentage($avgratet,$countfive);
$bar5 = round($bar5, "0");

$bar4 = get_percentage($avgratet,$countfour);
$bar4 = round($bar4, "0");

$bar3 = get_percentage($avgratet,$countthree);
$bar3 = round($bar3, "0");

$bar2 = get_percentage($avgratet,$counttwo);
$bar2 = round($bar2, "0");

$bar1 = get_percentage($avgratet,$countone);
$bar1 = round($bar1, "0");

?>
<div class="gradient-border">
<div class="sprw-reviews sprw-list sprw-template-one" style="padding-bottom:20px;">
<div class="sprw-rating-info-wrap">
    <div class="sprw-average-rating-wrap">
        <div class="sprw-number-outer-wrap">
            <div class="sprw-rating-number-wrap">
                <?php echo $avg; ?> </div>
        </div>
        <div class="sprw-middle-outer-wrap">
            <div class="sprw-average-rating-star">
                <div class="sprw-star-rating"> 
				<?php echo str_repeat($starhtml,5); ?>
                    <style>
                        .sprw-star-rating .half.sprw-fraction:before {
                            width: <?php echo $avgsecondary; ?>%;
                        }
                    </style>
                </div>
            </div>
            <div class="sprw-middle-content-wrap">
                <div class="sprw-review-count">
                    <span class="sprw-count-number">
                        <?php echo $count; ?> reviews </span>
                </div>
            </div>
        </div>
    </div>
    <div class="sprw-rating-bar-wrap">
        <div class="sprw-star-wrap"><span class="sprw-rating-count">
                <div class="sprw-star-rating"> <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </span>
            <div id="sprw-skill-bar" data-width="<?php echo $bar5; ?>" class="sb_progress" style="position: relative; width: 100%; background-color: rgb(221, 221, 221); height: 30px;">
                <div class="sb_bar" style="position: absolute; width: <?php echo $bar5; ?>%; height: 100%; background-color: rgb(255, 167, 0);">
                    <div class="sb_label" style="padding-left: 5px; line-height: 30px; color: rgb(255, 255, 255);"></div>
                </div>
            </div><span class="sprw-rating-number"><?php echo $countfive ?></span>
        </div>
        <div class="sprw-star-wrap"><span class="sprw-rating-count">
                <div class="sprw-star-rating"> <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </span>
            <div id="sprw-skill-bars" data-width="<?php echo $bar4; ?>" class="sb_progress" style="position: relative; width: 100%; background-color: rgb(221, 221, 221); height: 30px;">
                <div class="sb_bar" style="position: absolute; width: <?php echo $bar4; ?>%; height: 100%; background-color: rgb(255, 167, 0);">
                    <div class="sb_label" style="padding-left: 5px; line-height: 30px; color: rgb(255, 255, 255);"></div>
                </div>
            </div><span class="sprw-rating-number"><?php echo $countfour; ?></span>
        </div>
        <div class="sprw-star-wrap"><span class="sprw-rating-count">
                <div class="sprw-star-rating"> <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </span>
            <div id="sprw-skill-bars" data-width="<?php echo $bar3; ?>" class="sb_progress" style="position: relative; width: 100%; background-color: rgb(221, 221, 221); height: 30px;">
                <div class="sb_bar" style="position: absolute; width: <?php echo $bar3; ?>%; height: 100%; background-color: rgb(255, 167, 0);">
                    <div class="sb_label" style="padding-left: 5px; line-height: 30px; color: rgb(255, 255, 255);"></div>
                </div>
            </div><span class="sprw-rating-number"><?php echo $countthree; ?></span>
        </div>
        <div class="sprw-star-wrap"><span class="sprw-rating-count">
                <div class="sprw-star-rating"> <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </span>
            <div id="sprw-skill-bars" data-width="<?php echo $bar2; ?>" class="sb_progress" style="position: relative; width: 100%; background-color: rgb(221, 221, 221); height: 30px;">
                <div class="sb_bar" style="position: absolute; width: <?php echo $bar2; ?>%; height: 100%; background-color: rgb(255, 167, 0);">
                    <div class="sb_label" style="padding-left: 5px; line-height: 30px; color: rgb(255, 255, 255);"></div>
                </div>
            </div><span class="sprw-rating-number"><?php echo $counttwo; ?></span>
        </div>
        <div class="sprw-star-wrap"><span class="sprw-rating-count">
                <div class="sprw-star-rating"> <span class="sprw-star-icon full">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                    <span class="sprw-star-icon empty">
                        <i class="fa fa-star"></i>
                    </span>
                </div>
            </span>
            <div id="sprw-skill-bars" data-width="<?php echo $bar1; ?>" class="sb_progress" style="position: relative; width: 100%; background-color: rgb(221, 221, 221); height: 30px;">
                <div class="sb_bar" style="position: absolute; width: <?php echo $bar1; ?>%; height: 100%; background-color: rgb(255, 167, 0);">
                    <div class="sb_label" style="padding-left: 5px; line-height: 30px; color: rgb(255, 255, 255);"></div>
                </div>
            </div><span class="sprw-rating-number"><?php echo $countone; ?></span>
        </div>
    </div>
</div>
</div>
</div>


<?php
use Melbahja\Seo\Schema;
use Melbahja\Seo\Schema\Thing;

$product = new Thing('Product');
$product->type = "Product";
$product->name  = $t_product_title;
$product->sku   = $t_product_form_name.$t_product_sales;
$product->image = "/assets/img/da1.jpg";
$product->description = $t_about_title;
$product->offers = new Thing('Offer', [
    'availability' => 'https://schema.org/InStock',
    'priceCurrency' => 'USD',
    "price" => "19.99",
    'url' => 'https://soulmate-artist.com/soulmate-drawing.php',
    "itemCondition" => "https://schema.org/NewCondition",
]);
$product->review = new Thing('aggregateRating', [
    'ratingValue' => $avg,
    'reviewCount' => $count
]);

$webpage = new Thing("WebPage", [
    '@id' => "https://soulmate-artist.com/soulmate-drawing.php",
    'url' => "https://soulmate-artist.com/soulmate-drawing.php",
    'name' => 'Soulmate Drawing & Reading',
]);


$schema = new Schema(
    $product,
    $webpage);
    ?>
<script type="application/ld+json">
<?php echo json_encode($schema, JSON_PRETTY_PRINT); ?>
</script>