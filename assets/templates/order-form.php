<?php
  if(isset($_GET['aff_id'])){
    $affID = $_GET['aff_id'];
  }else{
    $affID = "";
  }

  if(isset($_SESSION['aff_id'])){
    $affID = $_SESSION['aff_id'];
  }

  if(isset($_GET['subid'])){
    $subid = $_GET['subid'];
  }else{
    $subid = "";
  }

  if(isset($_SESSION['subid'])){
    $subid = $_SESSION['subid'];
  }
  
  if(isset($_GET['subid2'])){
    $subid2 = $_GET['subid2'];
  }else{
    $subid2 = "";
  }

  
  if(isset($_SESSION['subid2'])){
    $subid2 = $_SESSION['subid2'];
  }

  if(isset($_GET['affid'])){
    $newaffID = $_GET['affid'];
  }else{
    $newaffID = "0";
  }

  if(isset($_GET['s1'])){
    $s1 = $_GET['s1'];
  }else{
    $s1 = "0";
  }

  if(isset($_GET['s2'])){
    $s2 = $_GET['s2'];
  }else{
    $s2 = "0";
  }
  ?>

<form id="ajax-form" class="form-order" name="order_form" action="javascript:void(0)" method="post" data-rewardful>
  
  <div class="form_box">
    <label for="form_name">Your First and Last Name*</label>
    <input class="customer_name" type="text" id="fullname" name="form_name" value="" required>
  </div>
  <div class="form_box">
    <span>Your Birth Date*</span>
    <div class="sides">
      <div class="third">
       <!-- <label for="form_day">Day*</label>-->
        <select class="" name="form_day" required>
		<option value="" disabled selected hidden>Day</option>
          <option value="01">1</option>
          <option value="02">2</option>
          <option value="03">3</option>
          <option value="04">4</option>
          <option value="05">5</option>
          <option value="06">6</option>
          <option value="07">7</option>
          <option value="08">8</option>
          <option value="09">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select>
      </div>
      <div class="third">
       <!-- <label for="form_month">Month*</label>-->
        <select class="" name="form_month" required>
		<option value="" disabled selected hidden>Month</option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">Septemer</option>
          <option value="10">October</option>
          <option value="11">Novemer</option>
          <option value="12">December</option>
        </select>
      </div>
      <div class="third">
        <!--<label for="form_year">Year*</label>-->
		
        <select class="form_year" name="form_year" required>
		<option value="" disabled selected hidden>Year</option>
          <?php
           $ending_year  =date('Y', strtotime('-85 year'));
           $starting_year = date('Y', strtotime('-16 year'));
           $current_year = date('Y');
           for($starting_year; $starting_year >= $ending_year; $starting_year--) {
               echo '<option value="'.$starting_year.'"';
               echo ' >'.$starting_year.'</option>';
           }
           ?>
        </select>
      </div>
    </div>
  </div>
  <!--<div class="form_box">
      
      <div class="radio_box">
        <input type="radio" id="prio12" name="priority" value="12">
        <label class="inline" for="prio12">12 hours</label>
        <input type="radio" id="prio24" name="priority" value="24">
        <label class="inline" for="prio24">24 hours</label>
        <input type="radio" id="prio48" name="priority" value="48" checked>
        <label class="inline" for="prio48">48 hours</label>
      </div>
  </div>-->
  <span>Priority*</span>
  <div class="form_box input-group">
  
        <input id="prio12" type="radio" name="priority" value="12">
        <label for="prio12"><span><i class="fas fa-bolt"></i>12 Hours</span></label>
        
		<input id="prio24" type="radio" name="priority" value="24">
        <label for="prio24"> <span><i class="fas fa-stopwatch"></i>24 Hours</span></label>
		
		<input id="prio48" type="radio" name="priority" value="48" checked="true">
        <label for="prio48"> <span><i class="fas fa-clock"></i>48 Hours</span></label>
      </div>
	  
	  
  <input class="product" type="hidden" name="product" value="">
  <input class="cookie" type="hidden" name="cookie_id" value="<?php echo $_SESSION['user_cookie_id']; ?>">
  <input class="cookie" type="hidden" name="cookie_id2" value="<?php echo $_SESSION['user_cookie_id2']; ?>">
  <input class="cookie" type="hidden" name="cookie_id3" value="<?php echo $_SESSION['user_cookie_id3']; ?>">
  
  <input class="fbp" type="hidden" name="fbp" value="<?php echo $UserFBP; ?>">
  <input class="fbc" type="hidden" name="fbc" value="<?php echo $UserFBC; ?>">

  <input class="affid" type="hidden" name="aff_id" value="<?php echo $affID; ?>">
  <input class="subid" type="hidden" name="subid" value="<?php echo $subid; ?>">
  <input class="subid2" type="hidden" name="subid2" value="<?php echo $subid2; ?>">

  <input class="affid" type="hidden" name="affid" value="<?php echo $newaffID; ?>">
  <input class="subid" type="hidden" name="s1" value="<?php echo $s1; ?>">
  <input class="affid" type="hidden" name="s2" value="<?php echo $s2; ?>">


  <div id="show_message" class="alert alert-success" style="display: none">Loading..</div>
   <div id="error" class="alert alert-danger" style="display: none"></div>

  <div class="form_box">
    <button type="submit" name="form_submit" id="submitbtn" value="Place an order">Place an order</button>
  </div>


  

</form>

<div id="cartfuelpmct"></div>
<script id="cartfuel_pm_frame.js" src="https://app.cartfuel.io/js/embed/cartfuel_pm_frame.js"></script> 

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
  <script>


    var product_code = $('.product_code').text()
    $('.product').val(product_code);

            $(document).ready(function($){
             

              $("#cartfuel-payment-frame").hide();
		 
            // hide messages 
            $("#error").hide();
            $("#show_message").hide();
		 
            // on submit...
            $('#ajax-form').submit(function(e){
		 
                e.preventDefault();
		 
                $("#error").hide();
                $("#submitbtn").html('<i class="fas fa-spinner fa-pulse"></i> Loading...');
		 
               //First name required
               var name = $("input#fullname").val();
               if(name == ""){
                    $("#error").fadeIn().text("First & Last Name Field required.");
                    $("input#fname").focus();
                    return false;
                }		 
                // ajax
                $.ajax({
                    type:"POST",
                    url: "/ajax/order.php",
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(data){
                      var SubmitStatus = data[0];
                      var DataMSG = data[1];
         
                      if (SubmitStatus == "Success"){
                      var Redirect = data[2];
                      var orderID = data[3];
                      var referal = data[4];
                      $("#show_message").html(DataMSG);
                      $("#show_message").fadeIn();
                      $("#submitbtn").html('<i class="fas fa-spinner fa-pulse"></i> Redirecting...');
                      
                     $("#ajax-form").fadeOut();
                     $(".price_box").fadeOut();
                     $(".saved").fadeOut();
                     $(".saleend").fadeOut();
                     $(".prodtitle").fadeOut();
                    setTimeout(function() { 
                        cartfuelInit({id: Redirect, data:{order_ID: orderID, cookie_ID: <?php echo $_SESSION['user_cookie_id']; ?>, referal: referal}})
                    }, 300);
                 
                      
                      $("#cartfuel-payment-frame").fadeIn();

                      }else{
                      $("#error").html(DataMSG);
                      $("#error").fadeIn();
                      $("#submitbtn").html("Error Occured!");
                      }
  
                    }
                });
            });  
		 
            return false;
        });


  </script>