<?php
session_start();
//echo $cookie_id;
// set parameters and execute
$order_email = $_GET['emailaddress'];
$order_price = $_GET['total'];
$order_buygoods = $_GET['order_id'];
$cookie_id = $_SESSION['user_cookie_id'];
//echo $cookie_id;

if ($order_email) {

  
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/vars.php';
  $sql = "SELECT * FROM orders WHERE order_email ='$order_email'";
  $result = $conn->query($sql);
  if ($result->num_rows == 0 || $order_email == "") {

  }
  else {
    while ($row = $result->fetch_assoc()) {
      $retained_username = $row["user_name"];
    }
  }  $conn->close();  // end of fetch email from past order


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $sql = "UPDATE `orders` SET `user_name` = '$retained_username', `order_status`='paid',`order_email`='$order_email',`order_price`='$order_price',`buygoods_order_id`='$order_buygoods' WHERE cookie_id='$cookie_id'";


  if ($conn->query($sql) === TRUE) {
    $sql = "SELECT * FROM orders WHERE cookie_id='$cookie_id'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0 || $order_email == "") {


    }
    else {
      while ($row = $result->fetch_assoc()) {
        $order_id = $row["order_id"];
        $user_name = $row["user_name"];
        $order_email = $row["order_email"];
        $order_product = 'Readings';
      }

    }


    // echo "Update successfully";
   // session_unset();
   // session_destroy();
  //unset($_COOKIE['user_cookie_id']);
  }
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

  header("Location: /order-complete.php");  die();
?>



<?php $title = "Past Life | Melissa Psychic"; ?>
<?php $description = "Past Life Readings"; ?>
<?php $menu_order = "men_0_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/templates/session.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/templates/header.php'; ?>
<style>
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
  font-family: Nunito,sans-serif;
    font-style: normal;
    font-weight: 800;
}
h2 {
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
h3 {
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
    <a href="/index.php">Melissa</a> > Past Life
  </div>
</div>


<div class="general_section upsale_page">
  <div class="container">
  <div class="white-wrapper col-md-10 offset-md-2"> <h1>Final Chance!</h1>
    <img src="/assets/img/psychic.jpg" alt="upsell">
    <form class="readings" action="/order3.php" method="get">
      <h2>Past Life Reading + Portrait</h2>
      <input class="cookie" type="hidden" name="cookie_id" value="<?php echo $_SESSION['user_cookie_id']; ?>">
      <div class="meta_part">

        <div class="sides">
          <div class="price_box">
            <span class="new_prce">$14.99</span>
          </div>
          <div class="gradient">Woudn't it be great to just know the truth instead of cunsumming yourself with constant thoughts?</div>
          <input type="submit" name="past_life" value="Yes i want my past life reading">

        </div>
      </div>
      
      <a class="nothanks" href="/order-complete.php">No thanks</a>
    </form>
  </div>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/templates/create_chat.php'; ?>

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
}
else {
  header("Location: /order-complete.php");
  die();
}

?>



<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/templates/footer.php'; ?>
