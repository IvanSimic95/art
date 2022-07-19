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

$bgemail = $_POST['bgemail'];

$userGender = $_POST['usergender'];
$partnerGender = $_POST['partnergender'];
$userGenderAcc = 100;
$order_product_nice = "Personal Reading";
$oStatus = "pending";

isset($_POST['fbp']) ? $uFBP = $_POST['fbp'] : $uFBP = "";
isset($_POST['fbc']) ? $uFBC = $_POST['fbc'] : $uFBC = "";

switch ($ReadingsCounter){
    case "1":
      $buyLink = "03d326af-2ad3-4f7f-b6ae-1cbfa6c748d9";
      break;
    case "2":
      $buyLink = "2802ac30-58c5-44f5-baf0-e8324a32a533";
      break;
    case "3":
      $buyLink = "8e3d722c-da80-4a7e-ba18-0b095ebbe0d3";
      break;
      case "4":
        $buyLink = "1382ccdd-ec6f-4023-9f9c-b005c8b49d3e";
        break;
  }

$sql = "INSERT INTO orders (cookie_id, user_age, first_name, last_name, user_name, birthday, order_status, order_date, order_email, order_product, order_product_nice, order_priority, order_price, buygoods_order_id, user_sex, genderAcc, pick_sex, fbc, fbp) VALUES ('$cookie_id', '$user_age', '$fName', '$lName', '$user_name', '$user_birthday', '$oStatus', '$order_date', '$bgemail', '$order_product', '$order_product_nice', '$order_priority', '$pricenow', '', '$userGender', '$userGenderAcc', '$partnerGender', '$uFBC', '$uFBP')";

if(mysqli_query($conn,$sql)){
    $lastRowInsert = mysqli_insert_id($conn);
$submitStatus = "Success";
$SuccessMessage = "Information saved, Redirecting you to Payment Page Now!";
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