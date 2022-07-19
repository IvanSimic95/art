<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$error = $order_name = $order_email = "";

if(isset($_SESSION['email'])){

$order_email = $_SESSION['email'];
}else{

// set parameters and execute
if(isset($_GET['check_email'])) {
$order_email = $_GET['check_email'];}

if(isset($_GET['username'])) {
$order_name = str_replace('%20', ' ', $_GET['username']);}


}

include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
$startpixel = 0;
$sql = "SELECT * FROM orders WHERE order_email = '$order_email' ORDER BY order_id DESC";

$result = $conn->query($sql);

if( ($result->num_rows == 0 || $order_email == "") && ($result->num_rows == 0 || $order_name == "")) {

			if($order_email==""){$error = "";}else{$error = "Email is not valid, account not found!";}

   include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/check_user.php';

} else {

$_SESSION['valid'] = true;
$_SESSION['timeout'] = time();
$_SESSION['email'] = $order_email;

include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/signed_in.php';
}

 ?>
