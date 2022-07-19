<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TalkJS Unread Counter</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="max-width: 800px">
        <div class="row">
            <h1>TalkJS Unread Counter Example</h1>
            <h2>Unread conversations:
                <span id="unread-message-count"></span>
            </h2>
            <p>To write replies and test the unreads, open `
                <a href="./other.html" target="_blank">other.html</a>` in another tab or window.</p>
            <p>Learn more on TalkJS Docs:
                <a href="https://talkjs.com/docs/api/classes/unreads.html">JS SDK Unreads</a>
            </p>
            <p style="font-size: 75%">Note: Please update the TalkJS credentials in source.</p>
        </div>
        <div class="row">
            <div class="col-md-12" id="talkjs-container" style="height:700px;">
            </div>
        </div>
    </div>
    <script>
    (function(t,a,l,k,j,s){
        s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
        ;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
        .push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
    </script>


<?php
$order_id = "002";
$user_name = "Test Customer";
$order_email = "ivan.simic2903@gmail.com";
$order_product = "Soulmate Drawing & Reading";



?>
<script>
   Talk.ready.then(function() {

     var other = new Talk.User({
         id: "<?php echo "user-".$order_id; ?>",
         name: "<?php echo $user_name; ?>",
         email: "<?php echo $order_email; ?>",
         photoUrl: "https://avatars.dicebear.com/api/adventurer/<?php echo $user_name; ?>.svg?skinColor=variant02",
         role: "Scustomer"
     });
     console.log(other);

     var admin = new Talk.User({
         id: "administrator",
         name: "Melissa",
         email: "contact@soulmate-artist.com",
         photoUrl: "/assets/img/avatars/admin.png",
         role: "admin"
     });
     console.log(admin);

     window.talkSession = new Talk.Session({
         appId: "ArJWsup2",
         me: admin
     });
     var conversation = talkSession.getOrCreateConversation("<?php echo $order_id; ?>");
         conversation.setAttributes({
         subject: "<?php echo "Order #" . $order_id; ?>"
     });

     conversation.setParticipant(other);
     conversation.setParticipant(admin);
     //var chatbox = window.talkSession.createChatbox(conversation);
     //chatbox.mount(document.getElementById("talkjs-container"));

     var inbox = window.talkSession.createInbox(conversation);
     inbox.mount(document.getElementById('talkjs-container'));
   })

</script>

</body>

</html>