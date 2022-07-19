<?php
// set parameters and execute
$order_email = $_POST['check_email'];
// echo "order email=" . $order_email;
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

$sql = "SELECT * FROM orders WHERE order_email = '$order_email'";

$result = $conn->query($sql);


$referrer  = $_SERVER['HTTP_REFERER'];
$referrer = strtok($referrer, '?');
$referrerYes = $referrer ."?status=no_orders";
// echo $referrerYes;
$referrerNo = $referrer ."?postas=" . $order_email;
// echo $referrerNo;

if($result->num_rows == 0 || $order_email == "") {

   header("Location: $referrerYes");
   die();


} else {
   header("Location: $referrerNo");
   die();
}
 ?>
