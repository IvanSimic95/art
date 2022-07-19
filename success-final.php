<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

// set parameters and execute
isset($_GET['emailaddress']) ? $order_email = $_GET['emailaddress'] : $order_email = "";
isset($_GET['order_id']) ? $order_buygoods = $_GET['order_id'] : $order_buygoods = "N/A";
isset($_GET['total']) ? $order_price = $_GET['total'] : $order_price = "19.99";
$cookie_id = $_SESSION['user_cookie_id3'];
$createChat = "";

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
  $order_product_nice = $row['order_product_nice'];
  $product = $row['order_product'];
  $sql = "UPDATE `orders` SET `order_email`='$order_email', `order_price`='$order_price', `buygoods_order_id`='$order_buygoods', `order_status`='paid' WHERE order_id='$orderID'";
  $result = $conn->query($sql);

  $createChat = 1;
  }

}

//Close connection to Database
$conn->close();
?>
<?php $title = "Processing.. | Melissa Psychic"; ?>
<?php $description = "Success"; ?>
<?php $menu_order="men_0_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/create_chat.php'; ?>

<div class="general_section">
  <div class="container" >
  <div class="white-wrapper col-md-8 offset-md-4"style="min-height:300px;padding:20px 30px 20px 30px;"> <h1>Processing your order...</h1>
  <br><br>
  <h2 style="text-align:center;">This usually takes about 5 seconds to finish processing.</h2>
  </div>
  </div>
  </div>

<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    setTimeout(function(){
      window.location.href = "https://<?php echo $domain; ?>/order-complete.php";
     }, 3000);
  });

</script>
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
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>