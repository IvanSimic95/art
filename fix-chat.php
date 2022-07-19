<?php
$errorDisplay = "";


isset($_GET['order']) ? $orderID        = $_GET['order']    : $errorDisplay .= " Missing Order ID <br>";
isset($_GET['order']) ? $first_name     = $_GET['name']     : $errorDisplay .= " Missing Name <br>";
isset($_GET['order']) ? $order_email    = $_GET['email']    : $errorDisplay .= " Missing Email <br>";
isset($_GET['order']) ? $product        = $_GET['product']  : $errorDisplay .= " Missing Product <br>";
isset($_GET['order']) ? $codename       = $_GET['codename'] : $errorDisplay .= " Missing Codename <br>";


$signature = hash_hmac('sha256', strval($orderID), 'sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98');

empty($errorDisplay) ?  $testError = FALSE : $testError = TRUE;
if($testError == TRUE){
$errorDisplay .= "<hr> URL should be like this: https://soulmate-artist.com/fix-chat.php?order=123&name=ivan&email=test@test.com&product=Soulmate Drawing & Reading&codename=soulmate";
$errorDisplay .= "Any missing variable = script can't fix up chat!";
}else{


?>


<script>
    (function(t,a,l,k,j,s){
    s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
    ;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
    .push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
</script>


<script>  
    Talk.ready.then(function() {
      var other = new Talk.User({
          id: "<?php echo $orderID; ?>",
          name: "<?php echo $first_name; ?>",
          email: "<?php echo $order_email; ?>",
          photoUrl: "https://avatars.dicebear.com/api/adventurer/<?php echo $order_email; ?>.svg?skinColor=variant02",
          role: "Scustomer",
          custom: {
          email: "<?php echo $order_email; ?>",
          lastOrder: "<?php echo $orderID; ?>"
          }
      });
      var me = new Talk.User("administrator");
      window.talkSession = new Talk.Session({
          appId: "ArJWsup2",
          me: other,
          signature: "<?php echo $signature; ?>"
      });
      var conversation = talkSession.getOrCreateConversation("<?php echo $orderID; ?>");
          conversation.setAttributes({
          subject: "<?php echo "Order #" . $orderID . " | " .$product; ?>",
          custom: { 
          category: "<?php echo $codename; ?>", 
          status: "Paid"
          }
      });

      conversation.setParticipant(other);
      conversation.setParticipant(me);

        var chatbox = window.talkSession.createChatbox(conversation);
        chatbox.mount(document.getElementById("talkjs-container-<?php echo $orderID; ?>"));
    })

</script>

<div id="talkjs-container-<?php echo $orderID; ?>">

</div>
<?php

}

?>