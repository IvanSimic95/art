


<?php $title = "Dashboard | Melissa Psychic"; ?>
<?php $description = "Dashboard"; ?>
<?php $menu_order="0_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>

<div class="breadcrumbs">
  <div class="container">
    <a href="/index">Melissa</a> > Dashboard
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

      </div>
      <div class="table_bodies">

      </div>
    </div>
  </div>







<div class="table-responsive">
  <table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th scope="col">Order Name:</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Email</th>
        <th scope="col">Order Status:</th>
        <th scope="col">Order Price:</th>
        <th scope="col">Order Chat:</th>
      </tr>
    </thead>

    <tbody>









  <?php
  while($row = $result->fetch_assoc()) {
      echo "
      <tr>
      <td>" . $row["user_name"]. "</td>
      <td>" . ucwords($row["order_email"]) . "</td>
      <td>" . ucwords($row["order_product"]) . "</td>
      <td>" . $row["order_status"]. "</td>
      <td>" . $row["order_price"]. "</td>
      <td class='chat' id='talkjs-" . $row["order_id"] . "'>Chat</td>
      </tr>";
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
 </tbody>
 </table>
</div>










   </div>
  </div>
</div>
  </div>
</div>

<style>
.gradient-top{
background: linear-gradient( 90deg,#d130eb,#4a30eb 80%,#2b216c);
margin-top: -25px;
margin-left: -25px;
margin-right: -25px;
border-top-left-radius: 8px;
border-top-right-radius: 8px;
padding: 7px;
  }
h1 {
font-size: 26px;
    font-weight: bold;
margin-bottom:0!important;
    color: #fff!important;


    text-align: center;

	text-transform:uppercase;
}
h3{
margin-bottom:0px;
color: #fff!important;
text-align: center;
}
</style>




<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>
