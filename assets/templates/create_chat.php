<?php
if($createChat==1){

$product = strtolower($product);
$product = ucwords($product);
$order_product_codename = $product;

switch ($product) {
    case "Husband":
    $product = "Future Husband Drawing";
    break;

    case "Pastlife":
    $product = "Past Life Drawing";
    break;

    case "Baby":
    $product = "Future Baby Drawing";
    break;
  
    case "Soulmate":
    $product = "Soulmate Drawing";
    break;
  
    case "Twinflame":
    $product = "Twin Flame Drawing";
    break;

          case "General":
          $product = "Personal Reading: General";
          break;

          case "General Love":
          $product = "Personal Reading: General & Love";
          break;

          case "General Love Career":
          $product = "Personal Reading: General, Love & Career";
          break;

          case "General Love Career Health":
          $product = "Personal Reading: General, Love, Career & Health";
          break;

          
          case "Love":
          $product = "Personal Reading: Love";
          break; 

          case "Love Career":
          $product = "Personal Reading: Love & Career";
          break;

          case "Love Career Health":
          $product = "Personal Reading: Love, Career & Health";
          break;


          case "Career":
          $product = "Personal Reading: Career";
          break;

          case "Career Health":
          $product = "Personal Reading: Health & Career";
          break;

          case "Health":
          $product = "Personal Reading: Health";
          break; 
      }

$signature = hash_hmac('sha256', strval($orderID), 'sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98');
?>
 <div id="talkjs-container-<?php echo $orderID; ?>" style="width: 90%; margin: 30px; height: 500px; position:fixed;bottom:0;right:0;z-index:999;display:none !important">
     <i>Loading chat...</i>
 </div>

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
          subject: "<?php echo "Order #" . $orderID . " | " .$order_product_nice; ?>",
          custom: { 
          category: "<?php echo $order_product_codename; ?>", 
          status: "Paid"
          }
      });

      conversation.setParticipant(other);
      conversation.setParticipant(me);

        var chatbox = window.talkSession.createChatbox(conversation);
        chatbox.mount(document.getElementById("talkjs-container-<?php echo $orderID; ?>"));
    })

</script>
<?php
}
?>