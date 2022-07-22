<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

if(!$conn){ //CHECK DB CONNECTION FIRST
$submitStatus = "Database Error!";
$EMessage = 'Could not Connect to Database Server:'.mysql_error();
$returnData = [$submitStatus,$EMessage];
echo json_encode($returnData);
die();
}

$request = $_SERVER['REQUEST_METHOD'];

if ($request === 'POST') {

$cookie_id = $_POST['cookie_id'];
$cookie_id2 = $_POST['cookie_id2'];
$cookie_id3 = $_POST['cookie_id3'];

$user_birthday = $_POST['form_day']."-".$_POST['form_month']."-".$_POST['form_year'];
$post_user_birthday = $_POST['form_year']."-".$_POST['form_month']."-".$_POST['form_day'];
$birthday = new DateTime($user_birthday);
$interval = $birthday->diff(new DateTime);

$user_age = $interval->y;

$user_name = $_POST['form_name'];
$order_product = $_POST['product'];
$order_priority = $_POST['priority'];
$order_date = date('Y-m-d H:i:s');

$order_email = $_POST['form_email'];

$affid = $_POST['aff_id'];
$subid = $_POST['subid'];
$subid2 = $_POST['subid2'];

if(isset($_POST['referral'])) {
$referal = $_POST['referral'];
}else{
$referal = "";
}

$newaffid = $_POST['affid'];
$s1 = $_POST['s1'];
$s2 = $_POST['s2'];

isset($_POST['fbp']) ? $uFBP = $_POST['fbp'] : $uFBP = "";
isset($_POST['fbc']) ? $uFBC = $_POST['fbc'] : $uFBC = "";

$parser = new TheIconic\NameParser\Parser();
$name = $parser->parse($user_name);

$fName = $name->getFirstname();
$lName = $name->getLastname();

$oStatus = "pending";
    
$findGenderFunc = findGender($fName);
$userGender = $findGenderFunc['0']['gender'];
$userGenderAcc = $findGenderFunc['0']['accuracy'];

$fbCampaign = $_SESSION['fbCampaign'];
$fbAdset = $_SESSION['fbAdset'];
$fbAd = $_SESSION['fbAd'];


if($userGender=="male"){
$partnerGender = "female";
}else{
$partnerGender = "male";
}

$returnURL = "https://".$domain."/success.php";
$returnEncoded = base64_encode($returnURL);



$_SESSION['orderFName'] = $fName;
$_SESSION['orderLName'] = $lName;
$_SESSION['orderAge'] = $user_age;
$_SESSION['orderBirthday'] = $user_birthday;
$_SESSION['orderGender'] = $userGender;
$_SESSION['orderPartnerGender'] = $partnerGender;
$_SESSION['orderEmail'] = $order_email; 

$order_product_nice = "Soulmate Drawing";

$order_product_test = ucwords($order_product);
switch ($order_product_test) {
  case "Husband":
    if($partnerGender=="male"){
      $order_product_nice  = "Future Husband Drawing";
    }else{
        $order_product_nice  = "Future Wife Drawing";
    }
    break;
    case "Futurespouse":
      if($partnerGender=="male"){
        $order_product_nice  = "Future Husband Drawing";
      }else{
        $order_product_nice  = "Future Wife Drawing";
      }
      break;
case "Pastlife":
    $order_product_nice = "Past Life Drawing";
    break;
case "Baby":
    $order_product_nice = "Future Baby Drawing";
    break;
case "Soulmate":
    $order_product_nice = "Soulmate Drawing";
    break;
case "Twinflame":
    $order_product_nice = "Twin Flame Drawing";
        break;
}

switch ($order_priority){
  case "48":
    $price = 2999;
    break;
  case "24":
    $price = 3999;
    break;
  case "12":
    $price = 4999;
    break;
}

$sql = "INSERT INTO orders (cookie_id, user_age, first_name, last_name, user_name, birthday, order_status, order_date, order_email, order_product, order_product_nice, order_priority, order_price, buygoods_order_id, user_sex, genderAcc, pick_sex, fbc, fbp, fbCampaign, fbAdset, fbAd, affid, s1, s2) VALUES ('$cookie_id', '$user_age', '$fName', '$lName', '$user_name', '$user_birthday', '$oStatus', '$order_date', '$order_email', '$order_product', '$order_product_nice', '$order_priority', '$price', '', '$userGender', '$userGenderAcc', '$partnerGender', '$uFBC', '$uFBP', '$fbCampaign', '$fbAdset', '$fbAd', '$newaffid', '$s1', '$s2')";


function generateSignature($jsonString){
  return base64_encode(
      hash_hmac('sha512',
          "api_pk_bf87eb1b07fa45618e55e16589ba0043" . $jsonString . "api_pk_bf87eb1b07fa45618e55e16589ba0043",
          "api_sk_2904a0b54de84f558c64d90989b832e6")
  );
}






if(mysqli_query($conn,$sql)){
$lastRowInsert = mysqli_insert_id($conn);
$subidfull5 = $lastRowInsert."|".$domain."|".$cookie_id."|".$cookie_id2."|".$cookie_id3;
$subid5 = base64_encode($subidfull5);



//First create TalkJS User with same ID as conversation
$ch = curl_init();
$data = [
  "order" => [
    "currency" => "USD", 
    "amount" => $price, 
    "order_id" => strval($lastRowInsert), 
    "order_description" => $order_product_nice,
    "customer_email" =>  $order_email,
    "website" => "https://".$domain,
    "customer_first_name" => $fName,
    "customer_last_name" => $lName,
    "customer_date_of_birth" => $post_user_birthday,
    "success_url" => $returnURL
  ],
"page_customization" => [
  "public_name" => "Psychic Art", 
  "order_title" => $order_product_nice, 
  "order_description" => "Order Description Sample",
  "back_url" => "https://".$domain."/soulmate-drawing.php"
]

];
$data1 = json_encode($data);
$signature = generateSignature($data1);
curl_setopt($ch, CURLOPT_URL, 'https://payment-page.solidgate.com/api/v1/init');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    
$headers = array();
$headers[] = 'Merchant: api_pk_bf87eb1b07fa45618e55e16589ba0043';
$headers[] = 'Signature: '.$signature;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
$result = curl_exec($ch);
if (curl_errno($ch)) {
echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$obj = json_decode($result);
$buyLink = $obj->url;

$submitStatus = "Success";
$SuccessMessage = "Information saved, Redirecting you to Payment Page Now!";
$returnData = [$submitStatus,$SuccessMessage,$buyLink,$lastRowInsert,$referal];
$_SESSION['paymentOrder'] = $lastRowInsert;
echo json_encode($returnData);
} else {
$lastRowInsert = "";
$submitStatus = "Error";
$ErrorMessage = "Error: " . $sql . "" . mysqli_error($conn);
$returnData = [$submitStatus,$ErrorMessage];
echo json_encode($returnData);
}
$_SESSION['lastorder'] = $lastRowInsert;

$conn->close();



}else{
echo "Direct access is not allowed!";  
}


?>