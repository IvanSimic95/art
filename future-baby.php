<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
$title = "Future Baby Drawing | Melissa Psychic";
$description = "Future Baby Drawing"; 
$menu_order="men_0_0"; 
$cookie_id = $_SESSION['user_cookie_id3'];




include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; 
?>
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
    <a href="/index.php">Melissa</a> > Future Baby Drawing
  </div>
</div>


<div class="general_section upsale_page">
  <div class="container">
  <div class="white-wrapper col-md-10 offset-md-2"> <h1>Final step!</h1>
    <img src="/assets/img/babyyyyy.jpg" alt="upsell">
    <form id="ajax-form" class="form-order" name="order_form" action="javascript:void(0)" method="post">
      <h2>Future Baby Reading + Portrait</h2>
    
      <input class="customer_name" type="hidden" id="fullname" name="form_name" value="<?php echo $_SESSION['orderFName'].' '.$_SESSION['orderLName']; ?>">
        <input class="customer_name" type="hidden" id="firstname" name="first_name" value="<?php echo $_SESSION['orderFName']; ?>">
        <input class="customer_name" type="hidden" id="lastname" name="last_name" value="<?php echo $_SESSION['orderLName']; ?>">
        <input class="birthday" type="hidden" id="birthday" name="form_birthday" value="<?php echo $_SESSION['orderBirthday']; ?>">
        <input class="userage" type="hidden" id="userage" name="form_age" value="<?php echo $_SESSION['orderAge']; ?>">
        <input class="usergender" type="hidden" id="usergender" name="usergender" value="<?php echo $_SESSION['orderGender']; ?>">
        <input class="partnergender" type="hidden" id="partnergender" name="partnergender" value="<?php echo $_SESSION['orderGender']; ?>">
        <input class="cookie" type="hidden" name="cookie_id" value="<?php echo $_SESSION['user_cookie_id3']; ?>">
        <input class="email" type="hidden" name="bgemail" value="<?php echo $_SESSION['BGEmail']; ?>">
        <input class="price" type="hidden" id="product_price" name="price" value="19.99">
        <input class="fbp" type="hidden" name="fbp" value="<?php echo $UserFBP; ?>">
        <input class="fbc" type="hidden" name="fbc" value="<?php echo $UserFBC; ?>">
        <input class="submitbtnselect" type="hidden" name="submitbtnselect" id="submitbtnselect" value="submit">
        <input type="hidden" name="priority" value="24">
        <div id="error" class="alert alert-danger" style="display: none"></div>
      <div class="meta_part">
      <div id="purchasedupsell" class="alert alert-succes">Awesome! We will use same payment method as for your previous order.<br> Redirecting to payment page now...</div>
      <div class="onsubmithide">
        <div class="sides">
          <div class="price_box">
            <span class="new_prce">$19.99</span>
          </div>

          

          
          <br> 
          <div class="gradient">This reading will let you know when you will become pregnant, as well as an in-depth description about your future baby's gender, passions, skills, talents, and much more. Knowing more about your future baby will help you make sure that everything will be going well with your pregnancy, and prepare for the most wonderful experience your life has to offer!</div>
          <script id="cartfuel_up2_frame.js" src="https://app.cartfuel.io/js/embed/cartfuel_up2_frame.js"></script> 
          <div id="cartfueluppmct"></div> <script defer> cartfuelUpInit({id:"8e3d722c-da80-4a7e-ba18-0b095ebbe0d3"}) </script> 
        </div>
   
      
</div>   </div>
    </form>
  </div>
</div>
<script>
jQuery('input[name="priority"]').change(function(){
    if (this.value == '12') {
    jQuery('.new_prce').animate({'opacity' : 0}, 200, function(){jQuery('.new_prce').html('$39.99').animate({'opacity': 1}, 200);});
		jQuery('.old_price del').animate({'opacity' : 0}, 300, function(){jQuery('.old_price del').html('$399.99').animate({'opacity': 1}, 300);});
		jQuery('.saveda').animate({'opacity' : 0}, 400, function(){jQuery('.saveda').html('$450 (90%)').animate({'opacity': 1}, 400);});	
    jQuery('#product_price').val('39.99');
    }
    if (this.value == '24') {
		jQuery('.new_prce').animate({'opacity' : 0}, 200, function(){jQuery('.new_prce').html('$29.99').animate({'opacity': 1}, 200);});
		jQuery('.old_price del').animate({'opacity' : 0}, 300, function(){jQuery('.old_price del').html('$299.99').animate({'opacity': 1}, 300);});
		jQuery('.saveda').animate({'opacity' : 0}, 400, function(){jQuery('.saveda').html('$360 (90%)').animate({'opacity': 1}, 400);});
    jQuery('#product_price').val('29.99');
    }
    if (this.value == '48') {
		jQuery('.new_prce').animate({'opacity' : 0}, 200, function(){jQuery('.new_prce').html('$19.99').animate({'opacity': 1}, 200);});
		jQuery('.old_price del').animate({'opacity' : 0}, 300, function(){jQuery('.old_price del').html('$199.99').animate({'opacity': 1}, 300);});
		jQuery('.saveda').animate({'opacity' : 0}, 400, function(){jQuery('.saveda').html('$270 (90%)').animate({'opacity': 1}, 400);});
    jQuery('#product_price').val('19.99');
    }
})



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

      $.ajax({
          type:"POST",
          url: "/ajax/baby.php",
          dataType: 'json',
          data: $(this).serialize(),
          success: function(data){
            var SubmitStatus = data[0];
            if (SubmitStatus == "Success"){
           var DataMSG = data[1];
            var Redirect = data[2];
            $("#purchasedupsell").fadeIn();
            setTimeout(function(){
            window.location.href = Redirect;
            }, 2000);
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
<script>


var product_code = $('.product_code').text()
$('.product').val(product_code);

</script>
<style>@media(max-width: 1080px) {
	
	
	.form_box > .sides{
		display: flex!important;
		 justify-content: space-between!important;
		
		 align-items:stretch;
		}
		
	form > div:nth-child(2) > div > div:nth-child(2)
	{
	margin-left:10px;
	margin-right:10px;
		}
	}
	
.third {
	margin-bottom:0!important;
   }
.input-group {
border-radius: 8px!important;
    height: 46px!important;
    border: 1px solid #cad1da!important;
	display: inline-flex!important;
	justify-content:space-evenly!important;
	width:100%!important;
	align-items: center;
}

select:invalid { color: gray; }
	
	
.input-group input[type="radio"] {
  display: none!important;
}
.input-group input[type="radio"] + label,
.input-group select {
  flex-grow: 0;
  flex-shrink: 0;
  flex-basis: 33%;
  padding: 13px 2px;
  text-align:center;
  cursor: pointer;
}
.input-group input[type="radio"] + label:first-of-type {
  border-top-left-radius: 8px;
  border-bottom-left-radius: 8px;
  border-right: 1px solid #cad1da!important;
}
.input-group input[type="radio"] + label:last-of-type {
  border-top-right-radius: 8px;
  border-bottom-right-radius: 8px;
  border-left: 1px solid #cad1da!important;
}
.input-group input[type="radio"] + label i {
  padding-right: 0.4em;
}
.input-group input[type="radio"]:checked + label,
.input-group input:checked + label:before,
.input-group select:focus,
.input-group select:active {
 background: linear-gradient(90deg,#d130eb,#4a30eb 80%,#2b216c);
  color: #fff!important;
  font-weight: bold;
  border-color: #bd8200;
}
</style>

<style>
  .labbel-wrapper {
height:100%;
border-radius:15px;

} 
  .disabled {

    cursor: not-allowed!important;
} 
  .col-6 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}
@media only screen and (min-width: 768px) {
  .offset-md-2 {
    margin-left: 8.333333%;
}
.offset-md-4 {
    margin-left: 16.666666%;
}
}
.greenshadow{
  box-shadow: 1px -1px 18px 11px rgba(76,175,80,0.74);
-webkit-box-shadow: 1px -1px 18px 11px rgba(76,175,80,0.74);
-moz-box-shadow: 1px -1px 18px 11px rgba(76,175,80,0.74);
        }
   .imgbgchk:checked + label>.tick_container{
            opacity: 1;
        }
/*         aNIMATION */
        .imgbgchk:checked + label>img{
            transform: scale(1.25);
            opacity: 0.3;
        }
        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }
        .tick {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 6px 12px;
            height: 35px;
            width: 40px;
            border-radius: 100%;
        }
  .pick_sex {
    width:100%;
    max-width:initial;
  }
  h1 {
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
}
.labbel-wrapper > img{
  width:250px;
}
label {
  border: 1px solid rgba(250, 250, 250, 0.15);
  box-sizing: border-box;
  display: block;
  height: 100%;
  width: 100%;
  padding: 10px 10px 30px 10px;
  cursor: pointer;
  opacity: 0.5;
  transition: all 0.5s ease-in-out;
}
label:hover, label:focus, label:active {
  border: 1px solid rgba(250, 250, 250, 0.5);
}

.form__button {
  height: 40px;
  border: none;
  background-color: #00703f;
  color: #FAFAFA;
  text-transform: uppercase;
  font-family: "Source Sans Pro", sans-serif;
  padding: 0 20px;
  border-radius: 20px;
  font-weight: 900;
  cursor: pointer;
  margin: 40px 0;
  transition: all 0.25s ease-in-out;
}
.form__button:hover, .form__button:focus {
  background-color: #00824A;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
  outline: none;
}

/* Input style */
input[type=radio] {
  opacity: 0;
  width: 0;
  height: 0;
}

input[type=radio]:active ~ label {
  opacity: 1;
}

input[type=radio]:checked ~ label {
  opacity: 1;
  border: 1px solid #FAFAFA;
}
</style>




<?php 
$FirePixelUP = $_SESSION['fbfireUpsellpixel'];

if($FirePixelUP == 1){
  $orderID = $_SESSION['fborderID'];
  $orderPrice = $_SESSION['fborderPrice'];
  $product = $_SESSION['fbproduct'];

$FBPurchasePixel = <<<EOT
<script>
fbq('trackCustom', 'Upsell', {
  value: $orderPrice , 
  currency: 'USD'
}, 
{eventID: '$orderID'});
</script>
EOT;

$_SESSION['fbfireUpsellpixel'] = 0;
}
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>