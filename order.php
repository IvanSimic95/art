<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

// set parameters and execute
$cookie_id = $_GET['cookie_id'];

$user_birthday = $_GET['form_day']."-".$_GET['form_month']."-".$_GET['form_year'];
$birthday = new DateTime($user_birthday);
$interval = $birthday->diff(new DateTime);

$user_age = $interval->y;

$user_name = $_GET['form_name'];
$order_product = $_GET['product'];
$order_priority = $_GET['priority'];
$order_date = date('Y-m-d H:i:s');
$partnerGender = "male";
$affid = $_GET['affid'];

isset($_GET['fbp']) ? $uFBP = $_GET['fbp'] : $uFBP = "";
isset($_GET['fbc']) ? $uFBC = $_GET['fbc'] : $uFBC = "";

//Full name -> First and Last Name
$parser = new TheIconic\NameParser\Parser();
$name = $parser->parse($user_name);

$fName = $name->getFirstname();
$lName = $name->getLastname();

$_SESSION['orderFName'] = $fName;
$_SESSION['orderLName'] = $lName;

$_SESSION['orderName'] = $fName." ".$lName;

$_SESSION['orderAge'] = $user_age;

$_SESSION['orderBirthday'] = $user_birthday;


$fbCampaign = $_SESSION['fbCampaign'];
$fbAdset = $_SESSION['fbAdset'];
$fbAd = $_SESSION['fbAd'];

//Find User Gender
function findGender($name) {
$apiKey = 'Whc29bSnvP3zrQG3hYCwXKMoYu5h4ZQukS6n'; //Your API Key
$getGender = json_decode(file_get_contents('https://gender-api.com/get?key=' . $apiKey . '&name=' . urlencode($name)));
$data = [[
        "gender" => $getGender->gender,
        "accuracy"  => $getGender->accuracy
        ]];
return $data;
}

    
$findGenderFunc = findGender($fName);
$userGender = $findGenderFunc['0']['gender'];
$userGenderAcc = $findGenderFunc['0']['accuracy'];

if($userGender=="male"){$partnerGender = "female";}
if($userGender=="female"){$partnerGender = "male";}

$_SESSION['userGender'] = $userGender;
$_SESSION['partnerGender'] = $partnerGender;

$returnURL = "https://soulmate-artist.com/success.php";
$returnEncoded = base64_encode($returnURL);

$order_product_nice = "";


switch ($order_product) {
  case "soulmate":
  $order_product_nice = "Soulmate Drawing";
  break;
  
  case "twinflame":
  $order_product_nice = "Twin Flame Drawing";
  break;
  
  case "husband":

  if($partnerGender=="male"){
    $order_product_nice = "Future Husband Drawing";
  }else{
    $order_product_nice = "Future Wife Drawing";
  }
  
  break;

}

if($user_name ) {




    $sql = "INSERT INTO orders (cookie_id, user_age, first_name, last_name, user_name, birthday, order_status, order_date, order_email, order_product, order_product_nice, order_priority, order_price, buygoods_order_id, user_sex, genderAcc, pick_sex, fbc, fbp)
                          VALUES ('$cookie_id', '$user_age', '$fName', '$lName', '$user_name', '$user_birthday', 'pending', '$order_date', '', '$order_product', '$order_product_nice', '$order_priority', '', '', '$userGender', '$userGenderAcc', '$partnerGender', '$uFBC', '$uFBP')";

    
    if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $lastRowInsert = mysqli_insert_id($conn);
    $_SESSION['lastorder'] = $lastRowInsert;
    $conn->close();
?>



<?php $title = "Order | Melissa Psychic"; ?>
<?php $description = "Order"; ?>
<?php $menu_order="men_0_0"; ?>
<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>

<div class="breadcrumbs">
  <div class="container">
    <a href="/index.php">Melissa</a> > Order
  </div>
</div>


  <div class="general_section">
  <div class="container" >
  <div class="white-wrapper col-md-8 offset-md-4"style="min-height:300px;padding:20px 30px 20px 30px;"> <h1>Please dont close this page!</h1>
  <br><br>
  <h2 style="text-align:center;">You are being redirected to the Payment Page</h2>
  </div>
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
var prio = getUrlParameter('priority');
var product = getUrlParameter('product');


document.addEventListener("DOMContentLoaded", function(event) {
    setTimeout(function(){
      window.location.href = "https://www.buygoods.com/secure/checkout.html?account_id=6274&product_codename=" + product + prio + "&affid=<?php echo $affID; ?>&subid=<?php echo $cookie_id; ?>&subid2=<?php echo $lastRowInsert; ?>&subid3=<?php echo $uFBC; ?>&subid4=<?php echo $uFBP; ?>&subid5=<?php echo $user_birthday; ?>&redirect=<?php echo $returnEncoded; ?>";
     }, 1000);
  });
</script>


<?php
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

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>
