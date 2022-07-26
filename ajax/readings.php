<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

if(!$conn){ //CHECK DB CONNECTION FIRST
$submitStatus = "Database Error!";
$EMessage = 'Could not Connect to Database Server:'.mysql_error();
$returnData = [$submitStatus,$EMessage];
echo json_encode($returnData);
die();
}

$request = $_SERVER['REQUEST_METHOD'];

if ($request === 'POST') {
    
   
$user_name = $_POST['form_name'];
$fName = $_POST['first_name'];
$lName = $_POST['last_name'];

$pricenow = $_POST['price'];

$cookie_id = $_POST['cookie_id'];
$birthday = $_POST['form_birthday'];
$user_age = $_POST['form_age'];

$user_birthday = $birthday;

$ReadingsCounter = 0;

if(isset($_POST['general'])) {
    $general = $_POST['general']." "; 
    $ReadingsCounter = $ReadingsCounter + 1;
}else{
    $general = "";
}

if(isset($_POST['love'])) {
    $love = $_POST['love']." "; 
    $ReadingsCounter = $ReadingsCounter + 1;
}else{
    $love = "";
}
if(isset($_POST['career'])) {
    $career = $_POST['career']." ";
    $ReadingsCounter = $ReadingsCounter + 1;
}else{
    $career = "";
}
if(isset($_POST['health'])) {
    $health = $_POST['health']; 
    $ReadingsCounter++;
}else{
    $health = "";
}

$order_product = $general.$love.$career.$health;
$order_priority = "24";

$order_date = date('Y-m-d H:i:s');

$order_email = $_POST['bgemail'];

$userGender = $_POST['usergender'];
$partnerGender = $_POST['partnergender'];
$userGenderAcc = 100;
$order_product_nice = "Personal Reading";
$oStatus = "pending";

isset($_POST['fbp']) ? $uFBP = $_POST['fbp'] : $uFBP = "";
isset($_POST['fbc']) ? $uFBC = $_POST['fbc'] : $uFBC = "";

switch ($ReadingsCounter){
    case "1":
        $price = 1999;
      break;
    case "2":
        $price = 2999;
      break;
    case "3":
        $price = 3999;
      break;
      case "4":
        $price = 4999;
        break;
  }

$sql = "INSERT INTO orders (cookie_id, user_age, first_name, last_name, user_name, birthday, order_status, order_date, order_email, order_product, order_product_nice, order_priority, order_price, buygoods_order_id, user_sex, genderAcc, pick_sex, fbc, fbp) VALUES ('$cookie_id', '$user_age', '$fName', '$lName', '$user_name', '$user_birthday', '$oStatus', '$order_date', '$order_email', '$order_product', '$order_product_nice', '$order_priority', '$pricenow', '', '$userGender', '$userGenderAcc', '$partnerGender', '$uFBC', '$uFBP')";

if(mysqli_query($conn,$sql)){
    $lastRowInsert = mysqli_insert_id($conn);
$submitStatus = "Success";
$SuccessMessage = "Information saved, Redirecting you to Payment Page Now!";

$returnURL = "https://".$domain."/success-reading.php?order=".$lastRowInsert;

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
  "back_url" => "https://".$domain."/readings.php"
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


$returnData = [$submitStatus,$SuccessMessage,$buyLink,$lastRowInsert];
echo json_encode($returnData);
} else {
$submitStatus = "Error";
$ErrorMessage = "Error: " . $sql . "" . mysqli_error($conn);
$returnData = [$submitStatus,$ErrorMessage];
echo json_encode($returnData);
}
mysqli_close($conn);



}else{
echo "Direct access is not allowed!";  
}


?>