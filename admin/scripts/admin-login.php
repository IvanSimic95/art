<?php
// by default, error messages are empty
$email = $password = $call_login=$set_email=$emailErr=$passErr='';

if(isset($_POST['email']))$email = $_POST['email'];
if(isset($_POST['password']))$password = $_POST['password'];

if($email=="admin@soulmate-artist.com" && $password=="123Dadada123!")
 {
   session_start();
   $_SESSION['email']=$email;
   header("location:dashboard.php");
  }else
  {
   return "Login Failed";
  }
// function to check valid login data into database table
function login($db, $email, $password)
{
    /*
       // checking valid user
      $check_email="SELECT email FROM admin_profile WHERE email='$email' AND status=1";
      $run_email=mysqli_query($db,$check_email);
      if($run_email){
      if(mysqli_num_rows($run_email)>0)
      {
        // checking email and password
        $check_user="SELECT email, password FROM admin_profile WHERE email='$email' AND password='$password'";
        $run_user= mysqli_query($db,$check_user);
        if(mysqli_num_rows($run_user)>0)
         {
          session_start();
          $_SESSION['email']=$email;
          header("location:dashboard.php");
         }else
         {
          return "Your Password is wrong";
         }

      }
      else
      {
        return "Your Email is not exist";
      }
       }else{
        echo $db->error;
       }


    */


}
?>