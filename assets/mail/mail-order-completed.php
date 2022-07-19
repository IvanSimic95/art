<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';


	$sql = 'SELECT * from orders WHERE order_status = "processing"';
	$sqlResoult = $conn->query($sql);
	if($sqlResoult->num_rows == 0) {
	   echo "No Orders found in database";
	} else {
		while($row = $sqlResoult->fetch_assoc()) {
		//  	echo "<hr>";
			$orderDate = $row["order_date"];
		//  	echo $orderDate . "</br>";
			$orderName = $row["user_name"];
		//  	echo $orderDate . "</br>";
			$orderID = $row["order_id"];
		//  	echo $orderID . "</br>";
			$orderEmail = $row["order_email"];
			//  echo $orderEmail . "</br>";
			$orderAge = $row["user_age"];
		//  	echo $orderAge . "</br>";
			$orderPrio = $row["order_priority"];
			//  echo $orderPrio . " (Priority)</br>";
			$orderProduct = $row["order_product"];
			//  echo $orderProduct . "</br>";

			$orderSex = $row["pick_sex"];
			//  echo $orderSex . "</br>";
			$orderChatID = $row["chatID"];
			$date1 = $orderDate;
			//  echo $orderDate . '<br>';
			$date2 =  date("Y-m-d H:i:s");
			//  echo $date2 . '<br>';
			$start = new \DateTime($date1);
			$end = new \DateTime($date2);
			$interval = new \DateInterval('PT1H');
			$periods = new \DatePeriod($start, $interval, $end);
			$hours = iterator_count($periods);
			//  echo "Hours Passed: "  . $hours . "<br>";
			$trigger = 0;
			$randomDelay = rand(0,4);
			if ($hours >= ($orderPrio - $randomDelay )) {
				 //  echo "De trimis poza <br>";
				 $trigger = 1;
			}else {
				//  echo "Nu trimite inca <br>";
			}
			if ($orderProduct == "soulmate" || $orderProduct == "husband" || $orderProduct =="twinflame") {
				$image_send = 1;
				if ($orderSex == "male") {
					$prod_type = "";
					if ($orderProduct == "soulmate") {
						$prod_type = "1";
					}elseif($orderProduct == "husband"){
						$prod_type = "2";
					}elseif($orderProduct =="twinflame"){
						$prod_type = "3";
					}

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

					$sql_pick = "SELECT * FROM email_image_new WHERE age < '$age_max' AND age > '$age_min' AND sex = 'male' order by RAND() limit 1";
					$sql_pick_res = $conn->query($sql_pick);
					if($sql_pick_res->num_rows == 0) {
					     //echo "No Orders found in database";
							 $image_name = "";
					} else {
						while($rowImages = $sql_pick_res->fetch_assoc()) {
							$image_name = $rowImages["image_name"];
							 // echo $image_name . " </br>";
						}
					}


					$sql_text = "SELECT * FROM email_text WHERE prod_id = '$prod_type' order by RAND() limit 1";
					$sql_text_res = $conn->query($sql_text);
					if($sql_text_res->num_rows == 0) {
						   // echo "No Orders found in database";
							 $email_text = "";
					} else {
						while($rowText = $sql_text_res->fetch_assoc()) {
							$email_text = $rowText["prod_text"];
							 // echo $email_text . " </br>";

						}
					}
						// end of male
				}else{
					$prod_type = "";
					if ($orderProduct == "soulmate") {
						$prod_type = "1f";
					}elseif($orderProduct == "husband"){
						$prod_type = "2f";
					}elseif($orderProduct =="twinflame"){
						$prod_type = "3f";
					}



					$age_max = $orderAge;
					$age_min = $orderAge - 8;
					if ($age_max > 60) {
						$age_min = 52;
						$age_max = 60;

					}
					if ($age_min < 25) {
						$age_min = 25;
						$age_max = 33;
					}

					$sql_pick = "SELECT * FROM email_image_new WHERE age < '$age_max' AND age > '$age_min' AND sex = 'female' order by RAND() limit 1";
					$sql_pick_res = $conn->query($sql_pick);
					if($sql_pick_res->num_rows == 0) {
						 // echo "No Orders found in database";
					  	  $image_name = "";
					} else {
						while($rowImages = $sql_pick_res->fetch_assoc()) {
							$image_name = $rowImages["image_name"];
							 // echo $image_name . " </br>";
						}
					}

					$sql_text = "SELECT * FROM email_text WHERE prod_id = '$prod_type' order by RAND() limit 1";
					$sql_text_res = $conn->query($sql_text);
					if($sql_text_res->num_rows == 0) {
						 // echo "No Orders found in database";
						  $email_text = "";
					} else {
						while($rowText = $sql_text_res->fetch_assoc()) {
							$email_text = $rowText["prod_text"];

							//  echo $email_text . " </br>";

						}
					}


				}
				// end of female
			}elseif ($orderProduct == "baby")  {
				$image_send = 1;
				$prod_type = "b";
				$sql_pick = "SELECT * FROM email_image_new WHERE sex = 'baby' order by RAND() limit 1";
				$sql_pick_res = $conn->query($sql_pick);
				if($sql_pick_res->num_rows == 0) {
					 // echo "No Orders found in database";
					 $image_name = "";
				} else {
					while($rowImages = $sql_pick_res->fetch_assoc()) {
						$image_name = $rowImages["image_name"];
						 //echo $image_name . " </br>";
					}
				}
				$sql_text = "SELECT * FROM email_text WHERE prod_id = '$prod_type' order by RAND() limit 1";
				$sql_text_res = $conn->query($sql_text);
				if($sql_text_res->num_rows == 0) {
					 // echo "No Orders found in database";
						$email_text = "";
				} else {
					while($rowText = $sql_text_res->fetch_assoc()) {
						$email_text = $rowText["prod_text"];

						//  echo $email_text . " </br>";

					}
				}
			}elseif (strpos($orderProduct, 'general') !== false || strpos($orderProduct, 'love') !== false || strpos($orderProduct, 'career') !== false || strpos($orderProduct, 'health') !== false) {
				$email_text = "";
				$image_send = 0;
				if (strpos($orderProduct, 'general') !== false) {

					$sql_text = "SELECT * FROM upsell1 WHERE reading_type = 'General' order by RAND() limit 1";
					$sql_text_res = $conn->query($sql_text);
					if($sql_text_res->num_rows == 0) {
					} else {
						while($rowText = $sql_text_res->fetch_assoc()) {
							$email_text .= $rowText["reading_text"] . "\n\n";
						}
					}
				}
				if (strpos($orderProduct, 'love') !== false) {
					$sql_text = "SELECT * FROM upsell1 WHERE reading_type = 'Love' order by RAND() limit 1";
					$sql_text_res = $conn->query($sql_text);
					if($sql_text_res->num_rows == 0) {
					} else {
						while($rowText = $sql_text_res->fetch_assoc()) {
							$email_text .= $rowText["reading_text"] . "\n\n";
						}
					}
				}
				if (strpos($orderProduct, 'career') !== false) {
					$sql_text = "SELECT * FROM upsell1 WHERE reading_type = 'Career' order by RAND() limit 1";
					$sql_text_res = $conn->query($sql_text);
					if($sql_text_res->num_rows == 0) {
					} else {
						while($rowText = $sql_text_res->fetch_assoc()) {
							$email_text .= $rowText["reading_text"] . "\n\n";
						}
					}
				}
				if (strpos($orderProduct, 'health') !== false) {
					$sql_text = "SELECT * FROM upsell1 WHERE reading_type = 'Health' order by RAND() limit 1";
					$sql_text_res = $conn->query($sql_text);
					if($sql_text_res->num_rows == 0) {
					} else {
						while($rowText = $sql_text_res->fetch_assoc()) {
							$email_text .= $rowText["reading_text"] . "\n\n";
						}
					}
				}

			}elseif ($orderProduct == "pastlife") {
				$image_send = 1;
				$sql_pick = "SELECT * FROM upsell2_images order by RAND() limit 1";
				$sql_pick_res = $conn->query($sql_pick);
				if($sql_pick_res->num_rows == 0) {
					 // echo "No Orders found in database";
					 $image_name = "";
				} else {
					while($rowImages = $sql_pick_res->fetch_assoc()) {
						$image_name = $rowImages["image_name"];
						 //echo $image_name . " </br>";
					}
				}
				$sql_text = "SELECT * FROM upsell2_text order by RAND() limit 1";
				$sql_text_res = $conn->query($sql_text);
				if($sql_text_res->num_rows == 0) {
					 // echo "No Orders found in database";
						$email_text = "";
				} else {
					while($rowText = $sql_text_res->fetch_assoc()) {
						$email_text = $rowText["text"];

						//  echo $email_text . " </br>";

					}
				}
			 }
			// end of baby

			echo "<HR>";
			//echo "trigger = " . $trigger;
				if ($trigger == 1) {
					?>
					<div class="chat_box" style="width: 420px; margin: 0px; height: 500px; position:fixed;bottom:0;right:0;z-index:999; display:none !important">
						<i class="fas fa-times"></i>
						<div class="chat_loader" id="talkjs-container-<?php echo $row["order_id"]; ?>" style="width: 420px; margin: 0px; height: 500px;">
								<i>Loading chat...</i>
						</div>
					</div>
					<script>
							(function(t,a,l,k,j,s){
							s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
							;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
							.push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
					</script>
					<script>
							Talk.ready.then(function() {
								var me = new Talk.User("administrator");
								var other = new Talk.User(<?php echo $orderID; ?>);
								window.talkSession = new Talk.Session({
										appId: "ArJWsup2",
										me: me
								});
								var conversation = talkSession.getOrCreateConversation("<?php echo $orderID; ?>");

								conversation.setParticipant(other);
								conversation.setParticipant(me);

									var chatbox = window.talkSession.createChatbox(conversation);
								chatbox.mount(document.getElementById("talkjs-container-<?php echo $orderID; ?>"));
							})
					</script>
					<?php
					if ($image_send) {
						// define image name and new path
							$rootDir = '/home/melissapsychic/public_html';
							$ext = "." .pathinfo($image_name, PATHINFO_EXTENSION);
							$randomImageName = rand(55547,75547);

						// Old Paths
							$oldImagename = $image_name;
							if ($orderProduct == "soulmate" || $orderProduct == "husband" || $orderProduct =="twinflame" || $orderProduct == "baby") {
								$oldImageShortPath = "assets/cloud/etsy/" .$image_name;
								$oldImageServerPath = $rootDir ."/assets/cloud/etsy/" .$image_name;
							}elseif ($orderProduct == "pastlife"){
								$oldImageShortPath = "assets/cloud/upsell2/" .$image_name;
								$oldImageServerPath = $rootDir ."/assets/cloud/upsell2/" .$image_name;
							}else{

							}

							$oldImageFullPath = $base_url .$oldImageShortPath;

						// new Paths
							$newImagename = $orderProduct ."-" .$randomImageName ."-" .$orderID .$ext;
							$newImageShortPath = "/assets/mail/delivery-images/" .$newImagename;
							$newImageServerPath = $rootDir .$newImageShortPath;
							$newImageFullPath = $base_url .$newImageShortPath;

							echo 'New Image path = <a href="' .$newImageFullPath .'">' .$newImageFullPath ."</a><br> Old image path = ".$oldImageFullPath ."<br></a><br> ";


						// Set new image path and name
						//	$newImageNameHash = copy($oldImageServerPath, $newImageServerPath);


							$ch = curl_init();
							$authorization = "Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98";
							curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/files');
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_POST, 1);
							$target = '/home/melissapsychic/public_html/assets/mail/delivery-images/' . $newImagename;
							$cfile = curl_file_create($target);
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
							$token = str_replace("}","",str_replace("{","",$attachment)) ;
								echo $token;

							?>

							<script type="text/javascript">
							let data<?php echo $orderID; ?>image =  [
									{
										"sender": "administrator",
										<?php echo $token; ?>,
										"type": "UserMessage"
									}
								];


									fetch("https://api.talkjs.com/v1/ArJWsup2/conversations/<?php echo $orderID; ?>/messages", {
										method: "POST",
										headers: {
												'Content-Type' : "application/json",
												'Authorization': 'Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98'
											},
										body: JSON.stringify(data<?php echo $orderID; ?>image)
									}).then(res => {
										console.log("Request complete! response:", res);
									});
								</script>
						
<?php
//SEND IMAGE TO NEW CHAT
require($_SERVER["DOCUMENT_ROOT"] . "/chat/include/functions.php");

$image = "https://soulmate-artist.com/assets/img/da2.jpg";
$image2 = '[image url="'.$image.'"]';


//Send msg to convoID
$msgr = sb_send_message(1, $orderChatID, $image2, "[]", "2", "", "false", "");


//add note to conversation
$noter = sb_add_note($orderChatID, 1, "Order Finished", "Image Sent"); 


					
					
					
					}




					echo "TEXT = <br>".$email_text ."<hr>";
				?>





				<?php
					$email_text = trim(preg_replace('/\s\s+/', '\n', $email_text));
					$email_text = str_replace('"', "'", $email_text);
				 ?>

				<script type="text/javascript">
				let data<?php echo $orderID; ?>text =  [
						{
							"sender": "administrator",
							"text": "<?php echo $email_text; ?>",
							"type": "UserMessage"
						}
					];


						fetch("https://api.talkjs.com/v1/ArJWsup2/conversations/<?php echo $orderID; ?>/messages", {
							method: "POST",
							headers: {
									'Content-Type' : "application/json",
									'Authorization': 'Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98'
								},
							body: JSON.stringify(data<?php echo $orderID; ?>text)
						}).then(res => {
							console.log("Request complete! response:", res);
						});
					</script>
<?php
//SEND EMAIL TEXT TO NEW CHAT
$chatTitle = ucwords($orderProduct) . " #" . $orderID;

//Send msg to convoID
$msgr = sb_send_message(1, $orderChatID, $email_text, "[]", "2", "", "false", "");


//add note to conversation
$noter = sb_add_note($orderChatID, 1, "Order Finished", "Text Sent"); 

?>
				<?php


				// Set order to shipped
					$sqlupdate = "UPDATE `orders` SET `order_status`='shipped' WHERE order_id='$orderID'";
					if ($conn->query($sqlupdate) === TRUE) {
		      			echo "<br>Update successfully status order #ID =" .$orderID .' to status "shipped" <br><hr>';
		      		} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
			}


		} 	// end of loop



	}
	 // end of processing
?>
