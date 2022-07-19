<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
$fireIframe = 0;
//Check if partner sex was manually picked by user
$sex_picked = "";
if(isset($_POST['pick_sex'])){
  $pick_sex = $_POST['pick_sex'];
  $sex_picked = "1";
}

//If sex was picked manually by user update it in order info
if ($sex_picked==1) {
    $order_id = $_POST['cookie_id'];
    $sql = "UPDATE `orders` SET `pick_sex`='$pick_sex' WHERE cookie_id='$order_id'";
    $result = $conn->query($sql);

    $_SESSION['orderPartnerGender'] = $pick_sex;
}

$lastOrderID = $_SESSION['lastorder'];
$sql = "SELECT * FROM `orders` WHERE `order_id` = '$lastOrderID' ORDER BY `order_id` DESC LIMIT 1";
$result = $conn->query($sql);
$count = $result->num_rows;
$row = $result->fetch_assoc();

//If order is found input data from BG and update status to paid
if($result->num_rows != 0) {

  $affid = $row['affid'];
  $s1 = $row['s1'];
  $s2 = $row['s2'];

  $TTproduct = $row['order_product'];
  $TTprice = $row['order_price'];

  if($affid == 1){
    $fireIframe = 1;
  }

}

$title = "Readings | Melissa Psychic";
$description = "Readings";
$menu_order="men_0_0";

include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; 
?>
<link rel="stylesheet" href="assets/css/upsell.css">
<style>
  @media only screen and (min-width: 768px) {
  .offset-md-2 {
    margin-left: 8.333333%;
}
.offset-md-4 {
    margin-left: 16.666666%;
}
}
.upsale_page h1 {
font-size: 36px;
    font-weight: bold;
    background: linear-gradient( 90deg,#d130eb,#4a30eb 80%,#2b216c);
    color: #fff!important;
    margin-top: -25px;
    margin-left: -25px;
    margin-right: -25px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    text-align: center;
    padding: 15px;
	text-transform:uppercase;
  font-family: Nunito,sans-serif;
    font-style: normal;
    font-weight: 800;
}
.upsale_page h2 {
  font-size: 28px!important;
    font-weight: bold;
    background: -webkit-linear-gradient(#d130eb,#4a30eb 80%,#2b216c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    font-family: Nunito,sans-serif;
    font-style: normal;
    font-weight: 800;
}
.upsale_page h3 {
  font-size: 20px!important;
    font-weight: bold;
    background: -webkit-linear-gradient(#d130eb,#4a30eb 80%,#2b216c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
}
.fill-control-description {
  font-size: 24px!important;
    font-weight: bold;
    background: -webkit-linear-gradient(#d130eb,#4a30eb 80%,#2b216c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
}
.col-6 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}

.price_box{
text-align:center;
}
.gradient{
  font-size: 18px!important;
    font-weight: bold;
    background: -webkit-linear-gradient(#d130eb,#4a30eb 80%,#2b216c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    margin-bottom:15px;
}

</style>
<div class="breadcrumbs">
  <div class="container">
    <a href="/index.php">Melissa</a> > Readings
  </div>
</div>


<div class="general_section upsale_page">
  <div class="container">

  
  <iframe src="https://<?php echo $domain; ?>/pixel-tt.php?product=<?php echo $TTproduct; ?>&price=<?php echo $TTprice; ?>" scrolling="no" frameborder="0" width="1" height="1"></iframe>


  <div class="white-wrapper col-md-10 offset-md-2"> <h1>You Unlocked a Special Service!</h1>
      <h3>THIS IS AN EXCLUSIVE SERVICE WHICH I'M ONLY OFFERING A FEW TIMES A YEAR! </h3>
    <center> <img src="/assets/img/sitee91.jpg" alt="upsell"> </center>
  
	<h3>PLEASE BE AWARE YOU CAN'T GET BACK TO THIS PAGE LATER!</h3>
   
    
  </div>
  <div class="white-wrapper col-md-10 offset-md-2">
  <form id="ajax-form" class="form-order" name="order_form" action="javascript:void(0)" method="post">
      <h1>Personal Psychic Reading</h1>
    
 <br>
          <center> <b> <div class="gradient"> <h3> WOULDN'T BE GREAT TO JUST KNOW THE TRUTH INSTEAD OF CUNSUMMING YOURSELF WITH CONSTANT THOUGHTS? </h3></span> </b> </center>
           <br> </r>
          <div class="gradient">Your personal psychic reading will help answer some important questions that you've been asking yourself for a long time. If you would like to know more about your future love life, career, health, or where your life is headed in general, this is the perfect service for you.</div>
                   <br>
            
                   <div class="gradient"> You will receive your reading within 24 hours with everything you need to find out about yourself. </div>
                   <br>
                   <div id="purchasedupsell" class="alert alert-succes">Awesome! We will use same payment method as for your previous order.<br> All you need to do is click the button below to confirm!</div>
                   <div id="purchasedupsellpay"><script id="cartfuel_up_frame.js" src="https://app.cartfuel.io/js/embed/cartfuel_up_frame.js"></script> 
      <div id="cartfueluppmct"></div></div>
                   <div class="onsubmithide">
                   <center> 
      <ul class="list-group list-group-flush">
          <li class="list-group-control">
					<label class="custom-control fill-checkbox">
			    <input type="checkbox" class="fill-control-input"  id="general" name="general" value="general" checked>
			    <span class="fill-control-indicator"></span>
			    <span class="fill-control-description">General Reading</span>
		      </label>
					</li>
          <li class="list-group-control">
					<label class="custom-control fill-checkbox">
			    <input type="checkbox" class="fill-control-input"  id="love" name="love" value="love">
			    <span class="fill-control-indicator"></span>
			    <span class="fill-control-description">Love Reading</span>
		      </label>
					</li>
          <li class="list-group-control">
					<label class="custom-control fill-checkbox">
			    <input type="checkbox" class="fill-control-input"  id="career" name="career" value="career">
			    <span class="fill-control-indicator"></span>
			    <span class="fill-control-description">Career Reading</span>
		      </label>
					</li>
          <li class="list-group-control">
					<label class="custom-control fill-checkbox">
			    <input type="checkbox" class="fill-control-input"  id="health" name="health" value="health">
			    <span class="fill-control-indicator"></span>
			    <span class="fill-control-description">Health Reading</span>
		      </label>
					</li>
           
				</ul>
      </center>

        <input class="customer_name" type="hidden" id="fullname" name="form_name" value="<?php echo $_SESSION['orderFName'].' '.$_SESSION['orderLName']; ?>">
        <input class="customer_name" type="hidden" id="firstname" name="first_name" value="<?php echo $_SESSION['orderFName']; ?>">
        <input class="customer_name" type="hidden" id="lastname" name="last_name" value="<?php echo $_SESSION['orderLName']; ?>">
        <input class="birthday" type="hidden" id="birthday" name="form_birthday" value="<?php echo $_SESSION['orderBirthday']; ?>">
        <input class="userage" type="hidden" id="userage" name="form_age" value="<?php echo $_SESSION['orderAge']; ?>">
        <input class="usergender" type="hidden" id="usergender" name="usergender" value="<?php echo $_SESSION['orderGender']; ?>">
        <input class="partnergender" type="hidden" id="partnergender" name="partnergender" value="<?php echo $_SESSION['orderPartnerGender']; ?>">
        <input class="email" type="hidden" name="bgemail" value="<?php echo $_SESSION['BGEmail']; ?>">
        <input class="cookie" type="hidden" name="cookie_id" value="<?php echo $_SESSION['user_cookie_id2']; ?>">
        <input class="price" type="hidden" id="product_price" name="price" value="19.99">
        <input class="fbp" type="hidden" name="fbp" value="<?php echo $UserFBP; ?>">
        <input class="fbc" type="hidden" name="fbc" value="<?php echo $UserFBC; ?>">
        <input class="submitbtnselect" type="hidden" name="submitbtnselect" id="submitbtnselect" value="submit">
        <div id="error" class="alert alert-danger" style="display: none"></div>
      <div class="meta_part">

        <div class="sides">
          <div class="price_box">
            <span class="new_prce">$19.99</span>
          </div>
          <div class="smallerText">Choose at least one option to Proceed!</div>
          <button id="addtopurchase" type="submit" name="submit" value="Add to my Purchase">Add to my Purchase</button>

        </div>
      </div>
      <button id="nothanks" class="nothanks" type="submit" name="submit" value="No Thanks">No Thanks!</button>
</div>
      </div></div>
    </form>
    
   
</div>





<script>
      var $checkboxes = $('.list-group-control input[type="checkbox"]');

      $checkboxes.change(function() {
        var $boxes = $('input:checked');
        var countCheckedCheckboxes = $boxes.length;
        if (countCheckedCheckboxes == 1) {
          $('.new_prce').text('$19.99');
          $('#product_price').val('19.99');
          $('.new_prce').show();
          $('.smallerText').hide();
          $('#addtopurchase').prop("disabled",false);
        }
        if (countCheckedCheckboxes == 2) {
          $('.new_prce').text('$29.99');
          $('#product_price').val('29.99');
          $('.new_prce').show();
          $('.smallerText').hide();
          $('#addtopurchase').prop("disabled",false);
        }
        if (countCheckedCheckboxes == 3) {
          $('.new_prce').text('$39.99');
          $('#product_price').val('39.99');
          $('.new_prce').show();
          $('.smallerText').hide();
          $('#addtopurchase').prop("disabled",false);
        }
        if (countCheckedCheckboxes == 4) {
          $('.new_prce').text('$49.99');
          $('#product_price').val('49.99');
          $('.new_prce').show();
          $('.smallerText').hide();
          $('#addtopurchase').prop("disabled",false);
        }
        if (countCheckedCheckboxes == 0) {
          $('.new_prce').hide();
          $('#product_price').val('00.00');
          $('.smallerText').show();
          $('#addtopurchase').prop("disabled",true);
        }
      });


      $(document).ready(function($){
		 
        $("#addtopurchase").click(function(){
        $("#submitbtnselect").val("submit")
        });

        $("#nothanks").click(function(){
        $("#submitbtnselect").val("NoThanks")
        });

     // hide messages 
     $("#error").hide();

     // on submit...
     $('#ajax-form').submit(function(e){
         e.preventDefault();
         $(".onsubmithide").fadeOut();
         //$("#submitbtn").html('<i class="fas fa-spinner fa-pulse"></i> Loading...');

         $.ajax({
             type:"POST",
             url: "/ajax/readings.php",
             dataType: 'json',
             data: $(this).serialize(),
             success: function(data){
               var SubmitStatus = data[0];
               if (SubmitStatus == "Success"){
              var DataMSG = data[1];
              var Redirect = data[2];
                      var orderID = data[3];
               $("#purchasedupsell").fadeIn();
               $("#purchasedupsellpay").fadeIn();
               setTimeout(function() { 
                        cartfuelUpInit({id: Redirect, data:{order_ID: orderID, cookie_ID: <?php echo $_SESSION['user_cookie_id']; ?> }})
                    }, 300);
                 
                      
                      $("#cartfuel-payment-frame").fadeIn();
               }else if(SubmitStatus == "NoThanks"){
                var Redirect = data[1];
                $("#purchasedupsell").html("You have choosen to skip this offer, redirecting you...");
                $("#purchasedupsell").fadeIn();

              setTimeout(function(){
               window.location.href = Redirect;
               }, 2000);
               }else{
              var DataMSG = data[1];
               $("#error").html(DataMSG);
               $("#error").fadeIn();
               }

             }
         });
     });  
     return false;
 });
    </script>
<?php 
$FirePixel = $_SESSION['fbfirepixel'];

if($FirePixel == 1){
  $orderID = $_SESSION['fborderID'];
  $orderPrice = $_SESSION['fborderPrice'];
  $product = $_SESSION['fbproduct'];

$FBPurchasePixel = <<<EOT
<script>
fbq('track', 'Purchase', {
  value: $orderPrice , 
  currency: 'USD',
  content_type: 'product', 
  content_ids: '$product'
}, 
{eventID: '$orderID'});
</script>
EOT;

$_SESSION['fbfirepixel'] = 0;
}
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php';

?>