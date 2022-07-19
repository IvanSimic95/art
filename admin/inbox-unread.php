<?php
session_start();
$email_address= !empty($_SESSION['email'])?$_SESSION['email']:'';
if(empty($email_address))
{
  header("location:index.php");
}
include_once $_SERVER['DOCUMENT_ROOT'].'/admin/partials/head.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/admin/partials/navbar.php';
$signature = hash_hmac('sha256', 'administrator', 'sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98');
?>
<div class="container-fluid px-4">
    <div class="row justify-content-start" style="">
        <div class="col-xl-8 col-md-8">
            <div class="card mb-4">
              
                
              
                    <div class="col-md-12" id="talkjs-container" style="height:800px;">
               
             </div>
        </div>
    </div>
</div>
<style>
.card {
    height: 100%;
}
</style>
<script>
   Talk.ready.then(function() {
     var admin = new Talk.User({
         id: "administrator",
         name: "Melissa",
         email: "contact@soulmate-artist.com",
         photoUrl: "/assets/img/avatars/admin.png",
         role: "administrator"
     });
     window.talkSession = new Talk.Session({
         appId: "ArJWsup2",
         me: admin,
         signature: "<?php echo $signature; ?>"
     });
     var inbox = window.talkSession.createInbox();
     inbox.setFeedFilter({ hasUnreadMessages: true });
     inbox.mount(document.getElementById('talkjs-container'));
   })

</script>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/admin/partials/footer.php';