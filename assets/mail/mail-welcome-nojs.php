
<?php
	$servername = "localhost";
	$username = "melissap_melissapsychic";
	$password = ";w[#i&[zcrm?";
	$dbname = "melissap_website";
	$base_url = "https://www.soulmate-artist.com";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

// 1. Check and select completed orders.

	$sqlpending = "SELECT * FROM `orders` WHERE `order_status` = 'paid'";
	$resultpending = $conn->query($sqlpending);
	if($resultpending->num_rows == 0) {
	   echo "NO Completed orders found <br>";
	}else{
		while($row = $resultpending->fetch_assoc()) {
			$customerName = $row["user_name"];
			$orderId = $row["order_id"];
			$orderProduct = $row["order_product"];
			$orderPriority = $row["order_priority"];
			$orderEmail = $row["order_email"];
			$emailLink = $base_url ."/dashboard.php?check_email=" .$orderEmail;
			$message = 'Hello '.$customerName . ",". chr(10) .'I`m happy to tell you we are processing your order' . chr(10) . '(#*' .$orderId .'*): *_<'.$orderProduct .'>_*' . chr(10) . 'Your order will be delivered to your email in '.$orderPriority .' hours or less.' . chr(10) . '' . chr(10) . 'If this is your first order your new account will be created automatically.' . chr(10) . 'In order to automatically login to your account just <'.$emailLink .'|click here> and we will take you to your customer dashboard.' . chr(10) . '' . chr(10) . 'Your account details are:' . chr(10) . 'Username: *'.$orderEmail .'*' . chr(10) . 'Automatic login link: <'.$emailLink.'|Dashboard>' . chr(10) . '' . chr(10) . '_Thank You!_' . chr(10) . '*Psychic Melissa*';


			$ch = curl_init();
			$data = [[
				"sender"  => "administrator",
				"text" => $message,
				"type" => "UserMessage",
			]];
			$data1 = json_encode($data);

			curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/conversations/' . $row["order_id"] . '/messages');
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
			  echo $result;





		 //	Update Order Status Processing

			$sqlupdate = "UPDATE `orders` SET `order_status`='processing' WHERE order_id='$orderId'";
			if ($conn->query($sqlupdate) === TRUE) {
      			// echo "Update successfully status order #ID =" .$orderId .' to status "Processing" <br><hr>';
      		} else {
			    // echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
 ?>
