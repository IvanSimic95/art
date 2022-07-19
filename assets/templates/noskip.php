<?php
if(isset($_SESSION['funnel_page'])) {

//Last page set as funnel step variable
$sPage = $_SESSION['funnel_page'];

//Currently loaded page
$currentURL = $_SERVER['REQUEST_URI'];
$currentURL = str_replace('/','',$currentURL);



//If user was last on Main Product Page
if($sPage == "main") {
    if($currentURL == "soulmate-drawing.php" OR $currentURL=="twin-drawing.php" OR $currentURL=="wife-husband-drawing.php"){ 
    //Correct Funnel Page
    }else{ 
    header('Location: /soulmate-drawing.php');
    die();
    }
    
}

//If user was last on Upsell #1 Page
if($sPage == "readings") {
    if($currentURL == "readings.php"){ 
    //Correct Funnel Page
    }else{ 
    header('Location: /readings.php');
    die();
    }
    
}

//If user was last on Upsell #2 Page
if($sPage == "future-baby") {
    if($currentURL == "future-baby.php"){ 
    //Correct Funnel Page
    }else{ 
    header('Location: /future-baby.php');
    die();
    }
}

//If user was last on thank you Page
if($sPage == "funnel-complete") {
    if($currentURL == "order-complete.php"){ 
    //Correct Funnel Page
    }else{ 
    header('Location: /order-complete.php');
    die();
    }
}

}
?>