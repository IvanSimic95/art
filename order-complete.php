<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

$showError = 0;
$succesStatus = 0;
$showSuccess = 1;

$p  = $_SESSION['UserEmail'];
$pieces = explode("@", $p);




$successMSG = "Your order is now complete & you will receive an email with your order details and dashboard login link.<br>".$pieces[0];
if(isset($_POST['form_submit'])){

  isset($_POST['cookie']) ? $cookieID = $_POST['cookie'] : $errorDisplay .= "<li>Missing Order ID </li>";
  isset($_POST['gender'])  ? $newGender  = $_POST['gender']  : $errorDisplay .= "<li>Missing User Gender </li>";
  isset($_POST['pgender']) ? $newPGender = $_POST['pgender'] : $errorDisplay .= "<li>Missing Partner Gender </li>";

  $cookieID2 = $_POST['cookie2'];
  $cookieID3 = $_POST['cookie3'];

  $genderAcc = "101";

  //Check if any errors are present
  empty($errorDisplay) ?  $testError = FALSE : $testError = TRUE;
  if($testError == TRUE){ //Errors found, activate error message and display it
  $showError = 1;
  $showErrorText = $errorDisplay;
  $showSuccess = 0;
  }else{ //No errors found, proceed with updating order data

    $succesStatus = 1;
    $_SESSION['orderGender'] = $_POST['gender'];
    $_SESSION['orderPartnerGender'] = $_POST['pgender'];

    //Update order in DB
    $sql2 = "UPDATE `orders` SET `user_sex`='$newGender',`pick_sex`='$newPGender',`genderAcc`='$genderAcc' WHERE `cookie_id`='$cookieID'";
    $sql3 = "UPDATE `orders` SET `user_sex`='$newGender',`pick_sex`='$newPGender',`genderAcc`='$genderAcc' WHERE `cookie_id`='$cookieID2'";
    $sql4 = "UPDATE `orders` SET `user_sex`='$newGender',`pick_sex`='$newPGender',`genderAcc`='$genderAcc' WHERE `cookie_id`='$cookieID3'";

    if ($conn->query($sql2) === TRUE) {
      $showError = 0;
      $successMSG = "Changes saved to your order!";
      $showSuccess = 1;
      $succesStatus = 1;
    } else {
      $showError = 1;
      $showErrorText = "Error: " . $sql2->error . "<br>" . $conn->error;
      $showSuccess = 0;
    }

    if ($conn->query($sql3) === TRUE) {
    } 

    if ($conn->query($sql4) === TRUE) {
    }

  }

}
?>


<?php $title = "Dashboard | Melissa Psychic"; ?>
<?php $description = "Dashboard"; ?>
<?php $menu_order="0_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>


<div class="breadcrumbs">
  <div class="container">
    <a href="/index.php">Melissa</a> > Dashboard
  </div>
</div>
<div class="container">

<div class="row">

      <div class="col-md-8 col-md-offset-2">
   <div class="white-wrapper" style="padding:30px;">




<div class="login-form">
  <div class="gradient-top">
    <h1>Thank you for your order</h1>
    
  </div>

    
   

    <?php 
    if(isset($_SESSION['lastorder'])){
      if($_SESSION['lastorder'] != ""){
        
    ?>
    
    <?php if($showSuccess==1){ ?>
<h3 id="finalnotice"><?php echo $successMSG; ?></h3>

<hr>
<?php 
} 
if($succesStatus == 0){
?>

    
<form id="completeOrder" class="form-order needs-validation display-block text-start" name="completeOrder" action="?updateInfo=Yes" method="post">

<div class="form_box" style="text-align:start">
<label for="SelectGender" style="left: 0;">Your Gender</label>
  <select class="form-select" id="SelectGender" aria-label="SelectGender" required="" name="gender">
    <option <?php if($_SESSION['orderGender']=="male")echo 'selected=""'; ?> value="male"><span class="fa fa-user"></span> Male</option>
    <option <?php if($_SESSION['orderGender']=="female")echo 'selected=""'; ?>value="female">Female</option>
  </select>
  
  </div>

  <div class="form_box" style="text-align:start">
  <label for="SelectPGender" style="left: 0;">Preferred Partner Gender</label>
  <select class="form-select" id="SelectPGender" aria-label="SelectPGender" required="" name="pgender">
    <option <?php if($_SESSION['orderPartnerGender']=="male")echo 'selected=""'; ?> value="male"><span class="fa fa-user"></span> Male</option>
    <option <?php if($_SESSION['orderPartnerGender']=="female")echo 'selected=""'; ?>value="female"><span class="fa fa-user"></span> Female</option>
  </select>
  
  </div>

<hr class="mb-3">
<div class="error-container">
<ol class="<?php if($showError == 1)echo "alert-danger rounded-3 px-5 py-3"; ?>">
<?php if($showError == 1)echo "<p class='h4' style='margin-left:-1.5rem'>Errors Detected!</p>"; ?>
<?php if($showError == 1)echo $showErrorText; ?>
</ol>
</div>

<input class="orderID" type="hidden" name="cookie" value="<?php echo $_SESSION['user_cookie_id']; ?>">
<input class="orderID" type="hidden" name="cookie2" value="<?php echo $_SESSION['user_cookie_id2']; ?>">
<input class="orderID" type="hidden" name="cookie3" value="<?php echo $_SESSION['user_cookie_id3']; ?>">

<button style="margin-top:15px; padding:15px; width:100%; font-size:130%; font-weight:bold;" id="SaveChanges" type="submit" name="form_submit" class="btn" value="Save Changes!"><i class="fa fa-square-check"></i> Save Changes!</button>
<hr class="mb-3">
    <?php } ?>
</form>

    <?php 
      }
    }else{ 
    ?>
<h3 id="finalnotice"><?php echo $successMSG; ?></h3>
<?php if($_SESSION['BGEmail'] != ""){ ?>
      <a style="margin-top:15px; padding:15px; width:100%; font-size:130%; font-weight:bold;" id="#SkipChanges" class="btn" href="/dashboard.php?check_email=<?php echo $_SESSION['BGEmail']; ?>"><i class="fas fa-user-shield" aria-hidden="true"></i> Proceed to User Dashboard!</a>
      <?php } ?>
<?php } ?>

    
</div>
</div>
</div>
</div>
</div>
<style>
.white-wrapper {
margin-top:50px;
margin-bottom:150px;
}
.login-form
{
text-align:center;
min-height: 200px;
padding-top: 100px;
}
.checkmark{
max-width:100px;
}
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
background: linear-gradient(90deg,#d130eb,#4a30eb 80%,#2b216c);
margin-top: -130px;
margin-left: -30px;
margin-right: -30px;
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
padding:10px;
}
h3{
font-size: 20px;
margin-bottom:0px;
text-align: center;
margin-top:40px;
padding-left:50px;
padding-right:50px;
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
</style>


<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>