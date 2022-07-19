<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/session.php';
date_default_timezone_set('Europe/Bucharest');
error_reporting(E_ALL);
ini_set('display_errors', '1');

$startpixel = 1;
$FBPixel = "3687138444845960";
$FBPurchasePixel = "";
$FBViewContent = "";
$productMETA = "";

//Data for FB Conversions API
$accessToken1 = "EAAQdSy3JN5QBAPgrqO52jtPQWl04D2nti6V5gHaiYkl50iBLu3O5jIohmZA0GsWBNqQOs";
$accessToken2 = "MYZB9qGeZBZAZBVHkuTdj26ZAXWRMhMM9TuvTLkRKJtxxksdCLXStTWKjipEMDYY00DSfiZCS6KaaTUZCHjpYZCQBZCv8AeAgWgqQHKYARWZAqa7bu0rmT";
$fbAccessToken = $accessToken1.$accessToken2;
$sendFBAPI = 1; #Set to 1 to send data via api

if(!isset($_SESSION['PixelDATA'])){
$_SESSION['PixelDATA'] = 0;
}

error_reporting(0);
ini_set('display_errors', 0);



//START Order Messages
$processingWelcome = "We are now processing your *Order #%ORDERID%*\n\nYour order will be delivered to your email in %PRIORITY% hours or less.\n\nIf this is your first order your new account will be created automatically\n\nIn order to automatically login to your account just <%EMAILLINK%|Click Here!>\n\n_With Love!_\n*Melissa*";


//Complete Soulmate, Twin Flame & Future Spouse Text added Before and After Order Text
$generalOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I've seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$generalOrderFooter = "\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\n*Melissa* \n\n Note: My dear, while I was connecting with your energy, I noticed some problems that you have and I strongly suggest you to contact Amelia, she is my mentor and she helped me throughout time to cope with my own emotional and spiritual journey. I talked to her about your case and she’ll be happy to help you,  so feel free to talk to her directly by clicking here: https://m.me/HealerAmelia 
";

//Complete Future Baby Text added Before and After Order Text
$babyOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I've seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$babyOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\n*Melissa*";

//Complete Reading Text added Before and After Order Text
$readingOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I've seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$readingOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\n*Melissa*";

//Complete Past Life Text added Before and After Order Text
$pastOrderHeader = "Dear %FIRSTNAME%\n\nFirst of all, thank you so much for giving me the opportunity to create a meaningful connection with you! As we continue, please make yourself comfortable and feel wholeheartedly everything I've seen while connecting with your aura and energy. I hope that sharing this with you will kindle a light of joy in your heart, and let you know that beautiful things are on the way.\n\n";
$pastOrderFooter = "\n\n It was such a pleasure doing your reading, my dear. I hope that you enjoy it as much as I enjoyed connecting with your beautiful soul energy!\n\nWith Love,\n*Melissa*";


//Order Processing & Order Complete Notifications
$OrderProcessingMessage = "Your Order status is now set to *Processing*!";

$OrderCompleteMessage = "Your Order status is now set to *Complete*!";
$ContinueConvoMsg = "If you want to chat with Melissa, simply reply to this conversation!";
//END Order Messages

//Save to order log function
function formLog($array) {
    $dataToLog = $array;
    $data = implode(" | ", $dataToLog);
    $data .= PHP_EOL;
    $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/order.log";
    $success = file_put_contents($pathToFile, $data, FILE_APPEND);
    if ($success === TRUE){
      echo "log saved";
    }
  }

  //Save to order log function
function formLogNew($array) {
  $dataToLog = $array;
  $data = json_encode($dataToLog);
  $data .= PHP_EOL;
  $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/test.log";
  $success = file_put_contents($pathToFile, $data, FILE_APPEND);
  if ($success === TRUE){
    echo "log saved";
  }
}

function formLogNewAgain($array){
  $dataToLog = $array;
  $data = implode(" | ", $dataToLog);
  $data .= PHP_EOL;
  $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/paid.log";
  $success = file_put_contents($pathToFile, $data, FILE_APPEND);
  if ($success === TRUE){
    echo "log saved";
  }
}

//Save to order log function
function startLog($array) {
  $dataToLog = $array;
  $data = implode(" | ", $dataToLog);
  $data .= PHP_EOL;
  $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/start.log";
  $success = file_put_contents($pathToFile, $data, FILE_APPEND);
  if ($success === TRUE){
    echo "log saved";
  }
}

//Save to order log function
function missingLog($array) {
  $dataToLog = $array;
  $data = implode(" | ", $dataToLog);
  $data .= PHP_EOL;
  $pathToFile = $_SERVER['DOCUMENT_ROOT']."/logs/missing.log";
  $success = file_put_contents($pathToFile, $data, FILE_APPEND);
  if ($success === TRUE){
    echo "log saved";
  }
}



//Find First and Last name
function splitNames($name) {
  $apiKey = 'Whc29bSnvP3zrQG3hYCwXKMoYu5h4ZQukS6n'; //Your API Key
  $getNames = json_decode(file_get_contents('https://gender-api.com/get?key=' . $apiKey . '&split=' . urlencode($name)));
  $data = [[
          "fname" => $getNames->first_name,
          "lname"  => $getNames->last_name
          ]];
  return $data;
  }
  
  //Find User Gender
  function findGender($name) {
  $apiKey = 'Whc29bSnvP3zrQG3hYCwXKMoYu5h4ZQukS6n'; //Your API Key
  $getGender = json_decode(file_get_contents('https://gender-api.com/get?key=' . $apiKey . '&name=' . urlencode($name)));
  $data = [[
          "gender" => $getGender->gender,
          "accuracy"  => $getGender->accuracy
          ]];
  return $data;
  }


  function escapeJsonString($value) {
    $escapers =     array("\\",     "/",   "\"",  "\n",  "\r",  "\t", "\x08", "\x0c");
    $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t",  "\\f",  "\\b");
    $result = str_replace($escapers, $replacements, $value);
    return $result;
  }

//START Database Configuration
$domain = $_SERVER['HTTP_HOST'];
if($domain == "soulmate.test"){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "soulmate";
	$base_url = "https://soulmate.test";
}else{
    $servername = "localhost";
    $username = "soulmate_user";
    $password = "zcV7_CuxEPDB";
    $dbname = "soulmate_shop";
	$base_url = "https://soulmate-artist.com";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query('set character_set_client=utf8');
$conn->query('set character_set_connection=utf8');
$conn->query('set character_set_results=utf8');
$conn->query('set character_set_server=utf8');
$conn->set_charset('utf8mb4');

// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
//END Database Configuration



if(isset($_GET['utm_campaign'])){
  $fbTrack = 1;
  
  $fbVariable = $_GET['utm_campaign'];
  $ex = explode(" ",$fbVariable);
  
  $fbCampaign = $ex["0"];
  $fbAdset = $ex["1"];
  $fbAd = $ex["2"];
  
  //Set fb ads session variables
  $_SESSION['fbCampaign'] = $fbCampaign;
  $_SESSION['fbAdset'] = $fbAdset;
  $_SESSION['fbAd'] = $fbAd;
  }else{
  $fbTrack = 0;
  
    $fbCampaign = "";
    $fbAdset = "";
    $fbAd = "";
  
    if(!isset($_SESSION['fbCampaign'])){
      $_SESSION['fbCampaign'] = $fbCampaign;
    }
  
    if(!isset($_SESSION['fbAdset'])){
      $_SESSION['fbAdset'] = $fbAdset;
    }
  
    if(!isset($_SESSION['fbAd'])){
      $_SESSION['fbAd'] = $fbAd;
    }
  
  }
  

?>