<?php 
header('Content-type: text/html; charset=utf-8');
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/session.php';
$title = "Soulmate Drawing | Melissa Psychic";
$description = "I will draw your SOULMATE with 100% accuracy";
$menu_order="men_2_0"; 
$bgproduct = "";

$t_product_name = "SOULMATE";
$t_product_image = '/assets/img/mobonly.jpg';
$t_product_image_pc = '/assets/img/ptdsk.png';
$t_product_form_name = "soulmate";
$t_product_hover_text = "I will connect with your higher soul, discover accurate and comprehensive information about your destiny, and explore the blockages you may have in your love life, career, health, or relationships with others. I will use your energies and frequencies so I can identify your strength, weaknesses and offer you guidance and clarity for a better and happier life.";
$t_product_sales = "8700";
$t_product_title = "I will use my Psychic Abilities to draw your Soulmate with 100% accuracy";
$t_about_title =  "<center><div style='color:#ff00f3;'> <b>I WILL USE MY PSYCHIC ABILITIES TO DRAW YOUR SOULMATE  WITH 100% ACCURACY</b></div></center>";
$t_about_content = "
<div style='color:#a700f5;'> <b> <p>My name is Melissa, and I feel honored to guide you through the beautiful love journey that is waiting for you. </p> </b>
<p> My dear, meeting your soulmate and accepting the feelings of true love embrace your whole being is one of the most special gifts life will offer you.</p>
<p>From a very young age, I practiced and developed the special gifts I am happy to share with you – a unique combination of artistic talents, empathic projection, clairsentience and clairvoyance, resulting in a beautiful portrait of your true soulmate, as well as a detailed description of their characteristics and personality traits. </p>
<p>A deep connection to your pure soul energy will help me see the exact timeframe for when you and your soulmate will meet. For this to happen, you only have to tell me your date of birth and your name. </p>
<p>Finding your soulmate will help you blossom beautifully, as your love will become more delicate and your joy will take over all the sadness you have felt in the past. You will be ready to pursue your dreams and ideals, with feelings of love and protection embracing your heart.</p>
<p>My knowledge in clairvoyance, psychic art and spiritual healing allows me to connect with the purest vibrations of your Higher Self, helping me see essential parts of your future, such as when you will be ready to fully let true love into your life and how you can instantly heal any type of blockages you may have. </p>

<p>The soulmate drawing I’m offering you is not just a simple sketch – It is an entirely difficult process that involves deep mediation, energy healing and profound introspection inside your Higher Soul.</p>

<p>First, I enter into a deep meditative trance state, where your Higher Self shows me the facial features and life details of the soul that is meant for you in this lifetime. With the help of automatic drawing, I then create a portrait and an in-depth description of their personality.</p>

<p>After this, I connect to your aura frequencies, and I am able to see when in the future you are covered with the colors and vibrations of true romantic love, which is the exact moment when you and your soulmate reunite in this lifetime.</p>

<p>Throughout my journey I’ve helped tens of thousands of people find their true love, and seeing others be happy and fulfilled is what makes me keep going. </p>
<p>This is your special chance to be closer than ever to your soulmate and finally know when your life will become the love story that you deserve!</p>


 <b> <p> <center>  <h2><div style='color:#ff00f3;'> <b>100% ACCURACY OR MONEY BACK  </b> </div> </h2> </center> </p> </b> 
 
 <p><div style='color:#ff00f3;'> <center> IF MY PREDICTIONS DON’T COME TRUE WITHIN THE TIME FRAME I PROVIDE, YOU WILL RECEIVE A FULL REFUND, NO QUESTION ASKED! </center> </div> </p> 

<b> <p>DUE TO MY COUNTLESS TV APPEARANCES AND EXCELLENT FEEDBACK FROM STARS AND CELEBRITIES, I HAVE LIMITED THE NUMBER OF SALES TO 10/DAY</p> </b> </div>

";

$PRurl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]".strtok($_SERVER["REQUEST_URI"],'?');

$productMETA = <<<EOT
    <!-- Meta Catalog Tags --> 
    <meta property="og:url" content="$PRurl" />
    <meta property="og:type" content="website" />

    <meta property="product:brand" content="Melissa Psychic">
    <meta property="product:availability" content="in stock">
    <meta property="product:condition" content="new">
    <meta property="product:price:amount" content="29.99">
    <meta property="product:price:currency" content="USD">
    <meta property="product:retailer_item_id" content="$t_product_form_name">


EOT;


include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/product_template.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php';