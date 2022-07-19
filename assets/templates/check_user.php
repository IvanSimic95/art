<?php $title = "Dashboard | Melissa Psychic"; ?>
<?php $description = "Dashboard"; ?>
<?php $menu_order="0_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>

<div class="breadcrumbs">
  <div class="container">
    <a href="/index">Melissa</a> > Dashboard
  </div>
</div>


<div class="general_section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
   <div class="white-wrapper">




<div class="login-form">
  <div class="gradient-top">
    <h1>Dashboard</h1>
    <h3>Enter the email you used for purchase and we will log you in!</h3>
  </div>

     <img id="profile-img" class="profile-img-card img-thumbnail" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
     <form class="check_user" action="" method="get">

  <div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope-o"></i></span>
  <input class="customer_email" type="email" name="check_email"  required placeholder="Your Email">
</div>


       <input type="submit"  value="Submit">
     </form>
</div>
<div class="login-error" style="display:none;">
  <?php
  if(isset($_GET['check_email'])) {
  echo '
  <style>
  .login-form{
  display:none;
    }
  .login-error{
  display:block!important;
    }
  </style>
  ';
  $email = $_GET['check_email'];
  }else{

  $email = "";
    }
  ?>
  <div class="gradient-top">
    <h1>Login Failed!</h1>
    <h3>We couldn't find any orders with email: <b><?php echo $email; ?></b></h3>
  </div>

<center><img src="assets/img/fail-login.gif" style="width:70%;text-align:center;"/></center>
<a class="btn try-again">Try Again!</a>

</div>
   </div>
  </div>
</div>
  </div>
</div>

<script>
jQuery(document).ready(function( $ ) {

$(".try-again").click(function () {
$(".login-error").attr('style','display:none!important');
$(".login-form").attr('style','display:block!important');

});

});

</script>

<style>
.try-again{
  padding: 8px 20px!important;
  margin-top: 10px!important;
  margin-bottom: 10px!important;
  box-sizing: border-box!important;
  cursor: pointer!important;
  font-size: 140%!important;
  text-align: center!important;
  background: #fc00ff!important;
  color: #fff!important;
  font-weight: bold!important;
  transition: all 0.5s ease!important;
  width: 100%!important;
  height: 60px!important;
  background: linear-gradient( 90deg,#d130eb,#4a30eb 80%,#2b216c)!important;
  border-radius: 10px!important;
  line-height: 34px!important;
  text-align: center!important;
  color: #fff!important;
  box-shadow: 0 8px 15px rgb(0 0 0 / 30%)!important;

}
.profile-img-card {

    margin: 10px auto 10px;
    display: block;

}
.input-group-addon{
color:#fff;
background: linear-gradient( 90deg,#d130eb,#4a30eb 80%,#2b216c);
  }
.input-group-addon > i{
font-size:28px;
    }
.customer_email{
  width: 100%!important;
      padding: 8px 20px!important;
      box-sizing: border-box!important;
      border-radius: 8px!important;
      padding: 14px!important;
      border: 1px solid #cad1da!important;
      outline: none!important;
      height: auto!important;
      border-top-left-radius: 0!important;
      border-bottom-left-radius: 0!important;

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
.check_user input{
max-width:100%;
display:block;
  }
.check_user input[type='submit'] {
  padding: 8px 20px;
margin-top: 10px;
margin-bottom: 10px;
box-sizing: border-box;
cursor: pointer;
font-size: 140%;
text-align: center;
background: #fc00ff;
color: #fff;
font-weight: bold;
transition: all 0.5s ease;
width: 100%;
height: 60px;
background: linear-gradient(
90deg,#d130eb,#4a30eb 80%,#2b216c);
border-radius: 10px;
line-height: 34px;
text-align: center;
color: #fff;
box-shadow: 0 8px 15px rgb(0 0 0 / 30%);
}
.general_section > .container{
  padding-top: 50px;
      padding-bottom: 150px;
  }
  }
</style>






<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>
