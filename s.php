<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/session.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
$_SESSION['fbfirepixel'] = 0;
$createChat = $genderAcc =   $skipSelect = "";
// set parameters and execute
isset($_GET['order']) ? $orderID = $_GET['order'] : $orderID = "";

if(isset($orderID)) {


$sql = "UPDATE `orders` SET `order_status`='paid' WHERE order_id='$orderID'";
$result = $conn->query($sql);

?>