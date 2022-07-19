<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
date_default_timezone_set('UTC');
error_reporting(E_ALL);
ini_set('display_errors', '1');

$error = "";
//Save to order log function
function f($array) {
    $dataToLog = $array;
    $data = $dataToLog;
    $data .= PHP_EOL;
    $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/update.log";
    $success = file_put_contents($pathToFile, $data, FILE_APPEND);
    if ($success === TRUE){
      echo "log saved";
    }
}
if(isset($_GET['data'])){
$bgID = $_GET['data'];

  if(isset($bgID)) {
  //Find Correct Order
  $sql = "SELECT * FROM `orders` WHERE `buygoods_order_id` = '$bgID' ORDER BY  `order_id` DESC LIMIT 1";
  $result = $conn->query($sql);
  $count = $result->num_rows;

    //If order is found input data from BG and update status to paid
    if($result->num_rows != 0) {
      $row = $result->fetch_assoc();
      $ForderID = $row['order_id'];
      $Ffirst_name = $row['first_name'];
      $Flast_name = $row['last_name'];
      $Fproduct = $row['order_product'];
      $Fsex = $row['user_sex'];
      $FgenderAcc = $row['genderAcc'];
      $Faffid = $row['affid'];
      $Fbirthday = $row['birthday'];
      $Fs1 = $row['s1'];
      $Fs2 = $row['s2'];
      $Forder_product_nice = $row['order_product_nice'];
      $Fstatus = $row['order_status'];

      if($Fstatus != "shipped"){
      $sql = "UPDATE `orders` SET `order_status`='canceled' WHERE order_id='$ForderID'";
      $result = $conn->query($sql);
      $success = "Order #".$ForderID." status updated to Canceled";
      f($success);
      echo $success;
    }else{
      $success = "Order #".$ForderID." NOT Canceled - Status: ".$Fstatus;
      f($success);
      echo $success;
    }



    //Error Handling for not finding order with this Cookie ID
    }else{
      $error = "ORDER WITH THIS BG ID NOT FOUND: ".$action. " | " .$product_codename. " | " .$customer_emailaddress. " | " .$customer_phone. " | " .$subid3. " | " .$subid4. " | " .$orderID. " | " .$domain. " | " .$c1. " | " .$c2. " | " .$c3;
      f($error);
      echo $error;
    }
  //Error Handling for check cookie variable not being set due to some error
 
//Error Handling for action type and empty error variable
}else{
  $error = "ACTION WASNT NEWORDER OR ERROR VARIABLE WASNT EMPTY: ".$action. " | " .$product_codename. " | " .$customer_emailaddress. " | " .$customer_phone. " | " .$subid3. " | " .$subid4. " | " .$subid5;
  f($error);
  echo $error;
}

//Error handling when data is missing from URL
}else{
$error = "Data wasn't sent";
echo $error;
}
  ?>