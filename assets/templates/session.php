<?php
//Check if session is set, if not set a new one
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
  session_start();
  }
//Check if user cookie ID is set, if not set a new one
$randomNumber = rand(155654654,955654654);
if(!isset($_SESSION['user_cookie_id'])) {
$_SESSION['user_cookie_id'] = $randomNumber;
}

$randomNumber2 = rand(155654654,955654654);
if(!isset($_SESSION['user_cookie_id2'])) {
$_SESSION['user_cookie_id2'] = $randomNumber2;
}

$randomNumber3 = rand(155654654,955123454);
if(!isset($_SESSION['user_cookie_id3'])) {
$_SESSION['user_cookie_id3'] = $randomNumber3;
}

$cFBC = "_fbc";
$cFBP = "_fbp";

if(isset($_COOKIE[$cFBC])){
  $UserFBC = $_COOKIE[$cFBC];
}else{
  $UserFBC = "";
}

if(isset($_COOKIE[$cFBP])){
  $UserFBP = $_COOKIE[$cFBP];
}else{
  $UserFBP = "";
}

if(!isset($_SESSION['BGEmail'])){
  $_SESSION['BGEmail'] = "";
}

if(!isset($_SESSION['fbfirepixel'])){
    $_SESSION['fbfirepixel'] = 0;
}

//Check if funnel page is set, if not set a new one
if(!isset($_SESSION['funnel_page'])) {
$_SESSION['funnel_page'] = "main";
}

if(isset($_GET['logout'])){
$_SESSION = array();
session_destroy();
}

if(isset($_GET['aff_id'])){
  $_SESSION['aff_id'] = $_GET['aff_id'];
}

if(isset($_GET['subid'])){
  $_SESSION['subid'] = $_GET['subid'];
}

if(isset($_GET['subid2'])){
  $_SESSION['subid2'] = $_GET['subid2'];
}


$bgproduct = "";
?>