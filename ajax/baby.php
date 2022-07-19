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
    
    $submit = $_POST['submitbtnselect'];
    if($submit == "NoThanks"){
        $_SESSION['fbfireUpsellpixel'] = 0;
        $submitStatus = "NoThanks";
        $RedirectURL = "https://".$domain."/success-final.php";
        $returnData = [$submitStatus,$RedirectURL];
        echo json_encode($returnData);
    }else{

$user_name = $_POST['form_name'];
$fName = $_POST['first_name'];
$lName = $_POST['last_name'];

$cookie_id = $_POST['cookie_id'];
$birthday = $_POST['form_birthday'];
$user_age = $_POST['form_age'];

$user_birthday = $birthday;

$order_product = "baby";
$order_priority = $_POST['priority'];

$pricenow = $_POST['price'];

$bgemail = $_SESSION['BGEmail'];
$order_product_nice = "Future Baby Reading";
$order_date = date('Y-m-d H:i:s');

$userGender = $_POST['usergender'];
$partnerGender = $_POST['partnergender'];
$userGenderAcc = 100;

$oStatus = "pending";

isset($_POST['fbp']) ? $uFBP = $_POST['fbp'] : $uFBP = "";
isset($_POST['fbc']) ? $uFBC = $_POST['fbc'] : $uFBC = "";

$returnURL = "https://".$domain."/success-final.php";
$returnEncoded = base64_encode($returnURL);

$redirectPayment = "https://www.buygoods.com/secure/upsell?account_id=6274&product_codename=".$order_product.$order_priority."&redirect=".$returnEncoded;


$sql = "INSERT INTO orders (cookie_id, user_age, first_name, last_name, user_name, birthday, order_status, order_date, order_email, order_product, order_product_nice, order_priority, order_price, buygoods_order_id, user_sex, genderAcc, pick_sex, fbc, fbp) VALUES ('$cookie_id', '$user_age', '$fName', '$lName', '$user_name', '$user_birthday', '$oStatus', '$order_date', '$bgemail', '$order_product', '$order_product_nice', '$order_priority', '$pricenow', '', '$userGender', '$userGenderAcc', '$partnerGender', '$uFBC', '$uFBP')";

if(mysqli_query($conn,$sql)){
$submitStatus = "Success";
$SuccessMessage = "Information saved, Redirecting you to Payment Page Now!";
$returnData = [$submitStatus,$SuccessMessage,$redirectPayment];
echo json_encode($returnData);
} else {
$submitStatus = "Error";
$ErrorMessage = "Error: " . $sql . "" . mysqli_error($conn);
$returnData = [$submitStatus,$ErrorMessage];
echo json_encode($returnData);
}
mysqli_close($conn);


}
}else{
echo "Direct access is not allowed!";  
}


?>