<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/session.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
$_SESSION['fbfirepixel'] = 0;
$createChat = $genderAcc =   $skipSelect = "";
// set parameters and execute
isset($_GET['emailaddress']) ? $order_email = $_GET['emailaddress'] : $order_email = "";
isset($_GET['order_id']) ? $order_buygoods = $_GET['order_id'] : $order_buygoods = "";
isset($_GET['total']) ? $order_price = $_GET['total'] : $order_price = "19.99";

$cookie_id = $_SESSION['user_cookie_id'];
$lastOrderID = $_SESSION['lastorder'];

$_SESSION['BGEmail'] = $order_email;

if(isset($cookie_id)) {
  //Find Correct Order
  $sql = "SELECT * FROM `orders` WHERE `cookie_id` = '$cookie_id' ORDER BY  `order_id` DESC LIMIT 1";
  $result = $conn->query($sql);
  $count = $result->num_rows;

  //If order is found input data from BG and update status to paid
  if($result->num_rows != 0) {
  $row = $result->fetch_assoc();
  $orderID = $row['order_id'];
  $first_name = $row['first_name'];
  $product = $row['order_product'];
  $genderAcc = $row['genderAcc'];
  $affid = $row['affid'];
  $s1 = $row['s1'];
  $s2 = $row['s2'];
  $order_product_nice = $row['order_product_nice'];

  if($affid==1){
    $fireiframe = 1;
  }else{
    $fireiframe = 0;
  }

  $_SESSION['UserEmail'] = $order_email;

  $_SESSION['fbc'] = $row['fbc'];
  $_SESSION['fbp'] = $row['fbp'];

  $_SESSION['fbfirepixel'] = 1;
  $_SESSION['fborderID'] = $orderID;
  $_SESSION['fborderPrice'] = $order_price;
  $_SESSION['fbproduct'] = $product;


  $_SESSION['PixelDATA'] = "1";
  $_SESSION['Pixelemail'] = $order_email;
  $_SESSION['Pixelfname'] = $first_name;
  $_SESSION['Pixellname'] = $row['last_name'];
  $_SESSION['Pixelgender']= $row['user_sex'];
  $_SESSION['Pixeldob']   = date("Ymd", strtotime($row['birthday']));
  $_SESSION['PixelID']    = $row['order_id'];

  $sql = "UPDATE `orders` SET `order_email`='$order_email', `order_price`='$order_price', `buygoods_order_id`='$order_buygoods', `order_status`='paid' WHERE order_id='$orderID'";
  $result = $conn->query($sql);

  //echo  $genderAcc;

  //If gender Accuracy is over 90 redirect to readings page
  if($genderAcc>89){
  $skipSelect = 1;
  }else{
  $skipSelect = 0;
  }

  //Enable Chat Creation
  $createChat = 1;
  }else{
    $logaArray[] = "Error updating order on success page, session data saved to other log file.";
    formLogNewAgain($logaArray);
  }

if(!isset($product)){
  $product="soulmate";
}
?>



<?php $title = "Success | Melissa Psychic"; ?>
<?php $description = "Success"; ?>
<?php $menu_order="men_0_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/create_chat.php'; ?>
<div class="breadcrumbs">
  <div class="container">
    <a href="/index.php">Melissa</a> > Success
  </div>
</div>

<?php if($fireiframe==1){ ?>

<iframe src="https://newrideanddrive.com/p.ashx?a=177&e=180&f=pb&r=<?php echo $s2; ?>&t=<?php echo $orderID; ?>" height="1" width="1" frameborder="0"></iframe>

<?php } ?>

<?php if($product == "baby"){ ?>
  <div class="general_section">
  <div class="container" >
  <div class="white-wrapper col-md-8 offset-md-4"style="min-height:300px;padding:20px 30px 20px 30px;"> <h1>Thank you for your order!</h1>
  <br><br>
  <h2 style="text-align:center;">Your order is now complete & you will receive an email with your order details and dashboard login link.</h2>
  </div>
  </div>
  </div>


<?php }else{ ?>
<?php if($skipSelect==1){?>
  <div class="general_section">
  <div class="container" >
  <div class="white-wrapper col-md-8 offset-md-4"style="min-height:300px;padding:20px 30px 20px 30px;"> <h1>Processing your order...</h1>
  <br><br>
  <h2 style="text-align:center;">This usually takes about 3 seconds to finish processing.</h2>
  </div>
  </div>
  </div>

<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    setTimeout(function(){
      window.location.href = "https://<?php echo $domain; ?>/readings.php";
     }, 3000);
  });

</script>

<?php }else{ ?>
<div class="general_section">
  <div class="container">
  <div class="white-wrapper col-md-10 offset-md-2"> <h1>Choose your Sexual Orientation!</h1>
    <form class="pick_sex" action="/readings.php" method="post">
      <div class="form_box">
          <span>I would like to recieve a drawing of a:</span>
          <div class="radio_box">
          <div class="row" style="display:flex;flex-wrap: wrap;">
          <div class='col-6 text-center'>
        <input type="radio" name="pick_sex" id="match_1" value="male" checked> 
				<label class="imgbgchk label-man" for="match_1" style="position: relative;">
        <div class="labbel-wrapper">
        <img src="assets/img/man.png">
				<div class="tick_container">
                <div class="tick"><i class="fa fa-check"></i></div>
        </div>
  </div>
				</label> 
  </div>
  <div class='col-6 text-center'>
           	<input type="radio" name="pick_sex" id="match_2" value="female"> 
				<label class="imgbgchk label-woman" for="match_2" style="position: relative;">
        <div class="labbel-wrapper">
        <img src="assets/img/woman.png">
          <div class="tick_container">
                <div class="tick"><i class="fa fa-check"></i></div>
              </div>
  </div>
				</label> 
  </div>
  </div>
          </div>
      </div>
      <input class="cookie" type="hidden" name="cookie_id" value="<?php echo $cookie_id; ?>">
      <div class="form_box">
        <input type="submit" class="disabled" id="submit-button" name="form_submit" value="Choose a man or a woman" disabled>
      </div>
    </form>


  </div>

  </div>
</div>

<script>
$(".label-man").click(function(){
  $(this).find('.tick_container').css('opacity', '1');
  $(this).find('.labbel-wrapper').addClass('greenshadow');
  $(".label-woman").find('.labbel-wrapper').removeClass('greenshadow');
  $(".label-woman").find('.tick_container').css('opacity', '0');
  $("#submit-button").val('Confirm a Man!');
  $("#submit-button").removeClass('disabled');
  $("#submit-button").removeAttr('disabled');
});

$(".label-woman").click(function(){
  $(this).find('.tick_container').css('opacity', '1');
  $(this).find('.labbel-wrapper').addClass('greenshadow');
  $(".label-man").find('.labbel-wrapper').removeClass('greenshadow');
  $(".label-man").find('.tick_container').css('opacity', '0');
  $("#submit-button").val('Confirm a Woman!');
  $("#submit-button").removeClass('disabled');
  $("#submit-button").removeAttr('disabled');
});
  </script>

<?php 
    }  
  }

}else{
  header('Location: /');
}

 ?>


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
$startpixel = 0;
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; 
?>