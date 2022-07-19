


<form class="form-order" name="order_form" action="/order.php" method="get">
  <div class="form_box">
    <label for="form_name">Your Name*</label>
    <input class="customer_name" type="text" name="form_name" value="" required>
  </div>
  <div class="form_box">
    <span>Your Birth Date*</span>
    <div class="sides">
      <div class="third">
       <!-- <label for="form_day">Day*</label>-->
        <select class="" name="form_day" required>
		<option value="" disabled selected hidden>Day</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
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
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">Septemer</option>
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
          $starting_year  =date('Y', strtotime('-85 year'));
           $ending_year = date('Y', strtotime('-18 year'));
           $current_year = date('Y');
           for($starting_year; $starting_year <= $ending_year; $starting_year++) {
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
  
  <input class="fbp" type="hidden" name="fbp" value="<?php echo $UserFBP; ?>">
  <input class="fbc" type="hidden" name="fbc" value="<?php echo $UserFBC; ?>">

  <div class="form_box">
    <input type="submit" name="form_submit" value="Place an order">
  </div>
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

  </script>

</form>
