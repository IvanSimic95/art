<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
echo "Starting complete-orders.php...<br><br>";


//Save to order log function
function sendData($order, $product, $image, $before, $after, $name) {
                // curl implementation
                $ch = curl_init();

                $data = [
                "order" => $order,
                "product"  => $product,
                "image" => $image,
				"before" => $before,
				"after" => $after,
				"name" => $name
				];

				$datae = json_encode($data);

                curl_setopt($ch, CURLOPT_URL, 'https://melissa.app.n8n.cloud/webhook-test/86a02b00-0fac-4f97-b34a-8481535147bd');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $datae);

                $headers = array();
                $headers[] = 'Content-Type: application/json';

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $result = curl_exec($ch);

                curl_close($ch);
}


function sendImage($folder, $image, $product, $orderID) {
// define image name and new path
$rootDir = $_SERVER['DOCUMENT_ROOT'];
$ext = ".jpg";
$sPath = "/assets/order/images/general/";
$randomImageName = rand(55547,75547);

// Old Paths
$oldImagename = $image_name;
$oldImageShortPath = "/assets/order/images/".$folde."/".$image.$ext;

$oldImageFullPath = $base_url.$oldImageShortPath;

$oldImageServerPath = $rootDir .$oldImageShortPath;

// new Paths
$newImagename = $product ."-" .$randomImageName ."-" .$orderID .$ext;
$newImageShortPath = "/assets/email/delivery-images/".$newImagename;
$newImageServerPath = $rootDir .$newImageShortPath;
$newImageFullPath = $base_url .$newImageShortPath;

// Set new image path and name
$newImageNameHash = copy($oldImageServerPath, $newImageServerPath);

$ch = curl_init();
$authorization = "Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98";
curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/files');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

// Set image data for upload via CURL

$filename = $rootDir.'/assets/email/delivery-images/'.$newImagename;
$finfo = new \finfo(FILEINFO_MIME_TYPE);
$mimetype = $finfo->file($filename);
$cfile = curl_file_create($filename, $mimetype, basename($filename));
$imgdata = array('file' => $cfile);

curl_setopt($ch, CURLOPT_POSTFIELDS, $imgdata);

$headers = array();
$headers[] = 'Content-Type: multipart/form-data';
$headers[] = 'Authorization: ' . $authorization;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$attachment = curl_exec($ch);
if (curl_errno($ch)) {
echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$token = json_decode($attachment);
$Atoken_key = $token->attachmentToken;
echo $Atoken_key;
}




	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}


	$sql = 'SELECT * from orders WHERE order_status = "processing"';
	$sqlResoult = $conn->query($sql);
	if($sqlResoult->num_rows == 0) {
	   echo "No Orders with STATUS = PROCESSING found in database.<br><hr>";
	} else {
		echo "Processing Orders: ".$sqlResoult->num_rows."<br><br>";
		while($row = $sqlResoult->fetch_assoc()) {
			$orderDate = $row["order_date"];
			$orderName = $row["user_name"];
			$ex = explode(" ",$orderName);
			$fName = $ex["0"];
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
			
			$trigger = 0;
			$image_send = 0;

			$randomDelay = rand(0,3);
			
			if ($hours >= ($orderPrio - $randomDelay )) {
				$trigger = 1;
			}
				if ($orderProduct == "soulmate" || $orderProduct == "husband" || $orderProduct =="twinflame") {
				    $image_send = 1;
					$prod_type = "";
					$img_folder_name = "general";

					$theader = $generalOrderHeader;
					$tfooter = $generalOrderFooter;

					$age_max = $orderAge + 7;
					$age_min = $orderAge + 2;
					if ($age_max > 67) {
						$age_min = 63;
						$age_max = 67;
					}
					if ($age_min < 20) {
						$age_min = 20;
						$age_max = 24;
					}

					$sql_pick = "SELECT * FROM orders_image WHERE age < '$age_max' AND age > '$age_min' AND sex = '$orderSex' order by RAND() limit 1";
					$sql_pick_res = $conn->query($sql_pick);
					if($sql_pick_res->num_rows == 0) {
							 $image_name = "";
					} else {
						while($rowImages = $sql_pick_res->fetch_assoc()) {
							$image_name = $rowImages["name"];
						}
					}

				$IMGToken = sendImage($img_folder_name, $image_name, $orderProduct, $orderID);


				//START IF PRODUCT = FUTURE BABY
			    }elseif ($orderProduct == "baby")  { 
				$image_send = 1;
				$prod_type = "baby";
				$img_folder_name = "baby";
				$babyGender = "female";

				$theader = $babyOrderHeader;
				$tfooter = $babyOrderFooter;

						
				if($userSex == "male"){ //If customer sex is set as male
				$babyGender = "male";
				}elseif($userSex == "female"){ //If customer sex is set as female
				$babyGender = "female";
				}
					

				$sql_pick = "SELECT * FROM  orders_image WHERE product = 'baby' AND sex = '$babyGender' order by RAND() limit 1";
				$sql_pick_res = $conn->query($sql_pick);
				
				if($sql_pick_res->num_rows == 0) {
					$image_name = "";
				} else {
					while($rowImages = $sql_pick_res->fetch_assoc()) {
					$image_name = $rowImages['name'];
					}
				}

				$IMGToken = sendImage($img_folder_name, $image_name, $orderProduct, $orderID);



				}elseif (strpos($orderProduct, 'general') !== false || strpos($orderProduct, 'love') !== false || strpos($orderProduct, 'career') !== false || strpos($orderProduct, 'health') !== false) {


				$image_send = 0;
				$email_text = "";
				$theader = $readingOrderHeader;
				$tfooter = $readingOrderFooter;

				
				$IMGToken = "none";
				

			}
			if ($trigger == 1) {
				$theader = str_replace("%FIRSTNAME%", $fName, $theader);
				$send = sendData($orderID, $orderProduct, $IMGToken, $theader, $tfooter);
				echo $send;
		    }
		}
	} 
?>
