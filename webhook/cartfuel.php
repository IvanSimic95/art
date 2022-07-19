<?php
$json = file_get_contents('php://input');
$obj=json_decode($json); // put the second parameter as true if you want it to be a associative array

$order_email = $obj->customer->email;
$order_price = "29.99";
$order_buygoods = $obj->customer->user_id;
$cookie_id = $obj->metadata->cookie_ID;
$mOrderID = $obj->metadata->order_ID;
$cName = $obj->customer->name;
$productImage = "https://soulmate-artist.com/assets/img/14dk.jpg";
$productFullTitle = $obj->product->product_name;
$logaArray[] = "Order #".$mOrderID;
$logaArray[] = $order_email;
$logaArray[] = $productFullTitle;
$logaArray[] = $json;
if($order_email) {
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

    $sql = "UPDATE `orders` SET `order_status`='paid',`order_email`='$order_email',`order_price`='$order_price',`buygoods_order_id`='$order_buygoods' WHERE order_id='$mOrderID'" ;

    if ($conn->query($sql) === TRUE) {
      //echo "Order Status updated to Paid succesfully!";
      $logaArray[] = "Order Updated";
    } else {
        $logaArray[] = "Error Updating: " . $sql . "<br>" . $conn->error;
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }

//First create TalkJS User with same ID as conversation
$ch = curl_init();
$data = [
"id" => $mOrderID,
"name" => $cName,
"email" => [$order_email],
"role" => "customer",
"photoUrl" => "https://avatars.dicebear.com/api/adventurer/".$order_email.".svg?skinColor=variant02",
"custom" => ["email" => $order_email, "lastOrder" => $mOrderID]
];
$data1 = json_encode($data);
print_r($data1);
curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/users/'.$mOrderID);
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

$logaArray[] = $result;
//Now create new conversation
$ch2 = curl_init();
$data2 = [
"subject" => "Order #".$mOrderID." | ".$productFullTitle,
"participants" => ["administrator", $mOrderID],
"photoUrl" => $productImage,
"custom" => ["status" => "Paid"]
];
$data22 = json_encode($data2);
print_r($data1);
curl_setopt($ch2, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/conversations/'.$mOrderID);
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

$logaArray[] = $result2;

formLogNewAgain($logaArray);


}
?>