<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
$parser = new TheIconic\NameParser\Parser();

$sql = "SELECT * FROM orders WHERE first_name = '' && order_status = 'processing' ORDER BY order_id DESC LIMIT 100";
$sqlResoult = $conn->query($sql);

	if($sqlResoult->num_rows == 0) {
	   echo "No Orders";
	} else {
		echo "Processing Orders: ".$sqlResoult->num_rows."<br><br>";
while($row = $sqlResoult->fetch_assoc()) {

            $orderDate = $row["order_date"];
			$user_name = $row["user_name"];
			$orderID = $row["order_id"];
			$orderEmail = $row["order_email"];
			$orderAge = $row["user_age"];
			$orderPrio = $row["order_priority"];
			$orderProduct = $row["order_product"];
			$orderSex = $row["pick_sex"];
			$userSex = $row["user_sex"];
			$date1 = $orderDate;
			$date2 =  date("Y-m-d H:i:s");
			$start = new \DateTime($date1);
			$end = new \DateTime($date2);
			$interval = new \DateInterval('PT1H');
			$periods = new \DatePeriod($start, $interval, $end);
			$hours = iterator_count($periods);
            $product = $orderProduct;
            echo $orderID."<br>";


            $sql2 = "SELECT * FROM orders WHERE order_email = '$orderEmail' ORDER BY order_id ASC LIMIT 1";
            $sqlResoult2 = $conn->query($sql2);

            while($row2 = $sqlResoult2->fetch_assoc()) {
                $user_name = $row2["user_name"];

                $name = $parser->parse($user_name);

                $fName = $name->getFirstname();
                $lName = $name->getLastname();
            }

if($user_name != ""){
$findGenderFunc = findGender($fName);
$userGender = $findGenderFunc['0']['gender'];
$userGenderAcc = $findGenderFunc['0']['accuracy'];


if($userGender=="male"){
$partnerGender = "female";
}else{
$partnerGender = "male";
}
$newUserName = $fName." ".$lName;
    $sqlupdate = "UPDATE `orders` SET `first_name`='$fName', `last_name`='$lName',`user_name`='$newUserName',`user_sex`='$userGender',`pick_sex`='$partnerGender',`genderAcc`='$userGenderAcc' WHERE order_id='$orderID'";
		if ($conn->query($sqlupdate) === TRUE) {
		    echo "Updated";
		}else{
			echo "Order NOT Updated!";
		}


        

//First create TalkJS User with same ID as conversation
$ch = curl_init();
$data = [
"id" => $orderID,
"name" => $user_name,
"email" => [$orderEmail],
"role" => "customer",
"photoUrl" => "https://avatars.dicebear.com/api/adventurer/".$orderEmail.".svg?skinColor=variant02",
"custom" => ["email" => $orderEmail, "lastOrder" => $orderID]
];
$data1 = json_encode($data);
curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/users/'.$orderID);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    
curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
    
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
$result = curl_exec($ch);
if (curl_errno($ch)) {
echo 'Error:' . curl_error($ch);
}
curl_close($ch);
echo $result;


//Now create new conversation
$ch2 = curl_init();
$data2 = [
"subject" => "Order #".$orderID." | ".$product,
"participants" => ["administrator", $orderID],
"custom" => ["status" => "Paid"]
];
$data22 = json_encode($data2);
curl_setopt($ch2, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/conversations/'.$orderID);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'PUT');

curl_setopt($ch2, CURLOPT_POSTFIELDS, $data22);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);

$result2 = curl_exec($ch2);
if (curl_errno($ch2)) {
    echo 'Error:' . curl_error($ch2);
}
curl_close($ch2);
echo $result2;			  

  //Send CURL for message -> TalkJS
  $ch = curl_init();
  $data = [[
	  "text" => $OrderProcessingMessage,
	  "type" => "SystemMessage"
  ],
  [
	  "sender"  => "administrator",
	  "text" => $message,
	  "type" => "UserMessage"
  ]];
  
  $data1 = json_encode($data);

  curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/conversations/' . $orderID . '/messages');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

  curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);

  $headers = array();
  $headers[] = 'Content-Type: application/json';
  $headers[] = 'Authorization: Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
	  echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);

			// curl implementation
$ch = curl_init();
$data3 = [
"custom" => ["status" => "Processing"]
];
$data33 = json_encode($data);
print_r($data1);
curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/conversations/'.$orderID);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

curl_setopt($ch, CURLOPT_POSTFIELDS, $data33);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
//Change chat order status


    }
}
}
?>