<div class="breadcrumbs">
  <div class="container">
    <a href="/index.php">Melissa</a> > <?php echo $t_product_name; ?> Drawing
  </div>
</div>
<div class="product_page">
  <div class="container">
    <div class="sides">
      <div class="left">
	
        <div class="product_box">
            <img src="<?php echo $t_product_image; ?>" />
		</div>
		
		<div class="product_box_pc">
            <img src="<?php echo $t_product_image_pc; ?>" />
		</div>
		
          <span class="product_code" style="display:none;"><?php echo $t_product_form_name; ?></span>
          <!-- <div class="hover_box">
            <div class="paragraph">
              <?php echo $t_product_hover_text; ?>
            </div>
            <div class="sales">
              <?php echo $t_product_sales; ?>+ sales
              <div class="rating">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </div> -->
        </div>
      
      <div class="right">
	   
	  <div class="product-purchase">
        <h1 class="prodtitle"><?php echo $t_product_title; ?></h1>
        <!--<span class="bestseller">Bestseller</span>-->
        <div class="price_box">
          <span class="new_prce">$29.99</span>
          <span class="old_price"><del>$299.99<del></span>

        </div>
        <span class="saved"> <strong>You save <span class="saveda">$270 (90%)</p></strong> </span>
        <h2 class="saleend">Sale ends in few hours</h2>
          <!--<span class="vat"> <strong>VAT included (where applicable)</strong> </span>-->

          <?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/order-form.php'; ?>
          <!-- <div class="disclamer">
            I will use my Psychic Abilities to draw your <?php echo $t_product_name; ?> within 48 hours with 100% accuracy, All i need is your full name and birth date!
          </div> -->
      </div>
	  </div>

    </div>
    <!-- <div class="icons_product">
      <div class="sides">
        <div class="third">
          <i class="fas fa-user-shield"></i>
          <h3>Secure Purchase</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin lacus et augue ullamcorper consequat. Sed egestas quam a aliquet congue.</p>
        </div>
        <div class="third">
          <i class="fas fa-cart-plus"></i>
          <h3>In High Demand</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin lacus et augue ullamcorper consequat. Sed egestas quam a aliquet congue.</p>
        </div>
        <div class="third">
          <i class="fas fa-truck-moving"></i>
          <h3>3 Delivery Options</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin lacus et augue ullamcorper consequat. Sed egestas quam a aliquet congue.</p>
        </div>
      </div>

    </div> -->
  </div>
</div>
<div class="container" style="margin-top:20px;">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/review-total.php'; ?>
</div>

<div class="container" style="margin-top:30px;">
 <div class="gradient-border">
  <div class="product_text">
    <h2><?php echo $t_about_title; ?></h2>
    <?php echo $t_about_content; ?>
    <hr>
    <h2 style="text-align:center">VIDEO TESTIMONIALS:</h2>
    <div class="sides" style="text-align:center;">
      <div class="third" style="position: relative;">
      <img id="video3" src="/assets/img/thumb1.png" data-video="/assets/img/videos/v2wht.mp4"> 
      </div>
      <div class="third" style="position: relative;">
      <img id="video2" src="/assets/img/thumb2.png" data-video="/assets/img/videos/gooddd.mp4">
      </div>
      <div class="third" style="position: relative;">
      <img id="video1" src="/assets/img/thumb3.png" data-video="/assets/img/videos/final.mp4">
      </div>
    </div>
  </div>
 </div>
</div>
<!-- <div class="product_description">
  <div class="container">
    <h2><?php echo $t_about_title; ?></h2>
    <?php echo $t_about_content; ?>
    
  </div>
</div> -->
<section class="reviews">
  <div class="container">
   
      <?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/reviews.php'; ?>
  </div>
</section>
<script>
jQuery('input[name="priority"]').change(function(){
    if (this.value == '12') {
        jQuery('.new_prce').animate({'opacity' : 0}, 200, function(){jQuery('.new_prce').html('$49.99').animate({'opacity': 1}, 200);});
		jQuery('.old_price del').animate({'opacity' : 0}, 300, function(){jQuery('.old_price del').html('$499.99').animate({'opacity': 1}, 300);});
		jQuery('.saveda').animate({'opacity' : 0}, 400, function(){jQuery('.saveda').html('$450 (90%)').animate({'opacity': 1}, 400);});	
    }
    if (this.value == '24') {
		jQuery('.new_prce').animate({'opacity' : 0}, 200, function(){jQuery('.new_prce').html('$39.99').animate({'opacity': 1}, 200);});
		jQuery('.old_price del').animate({'opacity' : 0}, 300, function(){jQuery('.old_price del').html('$399.99').animate({'opacity': 1}, 300);});
		jQuery('.saveda').animate({'opacity' : 0}, 400, function(){jQuery('.saveda').html('$360 (90%)').animate({'opacity': 1}, 400);});
    }
    if (this.value == '48') {
		jQuery('.new_prce').animate({'opacity' : 0}, 200, function(){jQuery('.new_prce').html('$29.99').animate({'opacity': 1}, 200);});
		jQuery('.old_price del').animate({'opacity' : 0}, 300, function(){jQuery('.old_price del').html('$299.99').animate({'opacity': 1}, 300);});
		jQuery('.saveda').animate({'opacity' : 0}, 400, function(){jQuery('.saveda').html('$270 (90%)').animate({'opacity': 1}, 400);});
    }
})
</script>



<?php

$FBViewContent = <<<EOT
<script>
fbq('track', 'ViewContent', {
  value: 29.99, 
  currency: 'USD',
  content_type: 'product', 
  content_ids: '$t_product_form_name'
});
</script>
EOT;

?>