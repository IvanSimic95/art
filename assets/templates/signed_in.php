


<?php $title = "Dashboard | Melissa Psychic"; ?>
<?php $description = "Dashboard"; ?>
<?php $menu_order="6_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>

<div class="breadcrumbs">
  <div class="container">
    <a href="/index">Melissa</a> > Dashboard - <?php echo $_SESSION['email']; ?>
  </div>
</div>
<script>
    (function(t,a,l,k,j,s){
    s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
    ;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
    .push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
</script>

<div class="general_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
   <div class="white-wrapper">
  <div class="gradient-top">
    <h1>Dashboard</h1>
    <h3>Here is a list of your orders and their details!</h3>
  </div>
    <div class="table_box">
      <div class="table_inside">
        <div class="table_heads">
          <h5>Name</h5><h5>Email </h5><h5>Product</h5><h5>Price</h5><h5>Status</h5><h5>Chat</h5>
        </div>
        <div class="table_bodies">
          <?php
          while($row = $result->fetch_assoc()) {
            $product = ucwords($row["order_product"]);
            $partnerGender = $row["pick_sex"];
            switch ($product) {
              case "Husband":
                if($partnerGender=="male"){
                  $product  = "Future Husband Drawing";
                }else{
                  $product  = "Future Wife Drawing";
                }
                break;
                case "Futurespouse":
                  if($partnerGender=="male"){
                    $product  = "Future Husband Drawing";
                  }else{
                    $product  = "Future Wife Drawing";
                  }
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
            }
            if($row["order_status"]=="shipped"){$status="completed";}else{$status = $row["order_status"];}
              echo "<div class='order_single'><span>" . $row["user_name"]. "</span><span>" . ucwords($row["order_email"]) . "</span><span>" . $product . "</span><span>$" . $row["order_price"]. "</span><span class='sbadge sbadge-" . $status . "'>" . $status . " <i class='fas fa-check'></i><i class='fas fa-stream'></i><i class='fas fa-redo'></i><i class='fas fa-ban'></i></span><span class='chat' id='talkjs-" . $row["order_id"] . "'><a class='btn'>View Order #" . $row["order_id"] . "</a></span></div>";
              ?>
              <div class="chat_box" style="width: 420px; margin: 0px; height: 500px; position:fixed;bottom:0;right:0;z-index:999;">
                <i class="fas fa-times"></i>
                <div class="chat_loader" id="talkjs-container-<?php echo $row["order_id"]; ?>" style="width: 420px; margin: 0px; height: 500px;">
                    <i>Loading chat...</i>
                </div>
              </div>

              <script>
                  Talk.ready.then(function() {
                    var me = new Talk.User("administrator");
                    var other = new Talk.User(<?php echo $row["order_id"]; ?>);
                    window.talkSession = new Talk.Session({
                        appId: "ArJWsup2",
                        me: other
                    });
                    var conversation = talkSession.getOrCreateConversation("<?php echo $row["order_id"]; ?>");

                    conversation.setParticipant(other);
                    conversation.setParticipant(me);
                      var chatbox = window.talkSession.createChatbox(conversation);
                    chatbox.mount(document.getElementById("talkjs-container-<?php echo $row["order_id"]; ?>"));
                  })
              </script>
              <?php
            }



            $conn->close();
           ?>
        </div>
      </div>
    </div>



  </div>
  </div>
  </div>
  </div>
  </div>

  <style>
  .chat > .btn{
padding: 4px 20px 4px 20px;
border-radius: 10px;
width: 100%;
  }
  .chat{
padding: 3px!important;
  }
  .gradient-top{
  background: linear-gradient( 90deg,#d130eb,#4a30eb 80%,#2b216c);
  margin-top: -25px;
  margin-left: -25px;
  margin-right: -25px;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  padding: 7px;
  }
  .gradient-top h1 {
  font-size: 26px;
   font-weight: bold;
  margin-bottom:0!important;
   color: #fff!important;


   text-align: center;

  text-transform:uppercase;
  }
  .gradient-top h3{
  margin-bottom:0px;
  color: #fff!important;
  text-align: center;
  }

  @media only screen and (max-width: 1080px) {
.table_box{
width:100%;
}
}
  </style>



<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>
