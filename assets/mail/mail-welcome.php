
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
			$message = 'Hello '.$customerName .',\nI\`m happy to tell you we are processing your order (#*' .$orderId .'*):\n*_'.$orderProduct .'_*\nYour order will be delivered to your email in '.$orderPriority .' hours or less.\n\nIf this is your first order your new account will be created automatically.\nIn order to automatically login to your account just <'.$emailLink .'|click here> and we will take you to your customer dashboard.\n\nYour account details are:\nUsername: *'.$orderEmail .'*\nAutomatic login link: <'.$emailLink.'|Dashboard>\n\n_Thank You!_\n*Psychic Melissa*';
			?>

			<div class="chat_box" style="width: 420px; margin: 0px; height: 500px; position:fixed;bottom:0;right:0;z-index:999;">
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
						var other = new Talk.User(<?php echo $orderId; ?>);
						window.talkSession = new Talk.Session({
								appId: "ArJWsup2",
								me: me
						});
						var conversation = talkSession.getOrCreateConversation("<?php echo $orderId; ?>");

						conversation.setParticipant(other);
						conversation.setParticipant(me);
					//	conversation.sendMessage('<?php echo $message; ?>');
							var chatbox = window.talkSession.createChatbox(conversation);
						chatbox.mount(document.getElementById("talkjs-container-<?php echo $row["order_id"]; ?>"));
					})
			</script>

			<script type="text/javascript">
			let data<?php echo $row["order_id"]; ?> =  [
			    {
			      "sender": "administrator",
			      "text": "<?php echo $message; ?>",
			      "type": "UserMessage"
			    }
				];


					fetch("https://api.talkjs.com/v1/ArJWsup2/conversations/<?php echo $row["order_id"]; ?>/messages", {
						method: "POST",
						headers: {
								'Content-Type' : "application/json",
								'Authorization': 'Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98'
        			},
						body: JSON.stringify(data<?php echo $row["order_id"]; ?>)
					}).then(res => {
						console.log("Request complete! response:", res);
					});



			</script>
			<?php


			// Update Order Status Processing

			$sqlupdate = "UPDATE `orders` SET `order_status`='processing' WHERE order_id='$orderId'";
			if ($conn->query($sqlupdate) === TRUE) {
      			// echo "Update successfully status order #ID =" .$orderId .' to status "Processing" <br><hr>';
      		} else {
			    // echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
 ?>
