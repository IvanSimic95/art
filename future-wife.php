aaa
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/session.php';

$title = "Future Husband/Wife Drawing | Melissa Psychic";
$description = "I will draw your FUTURE HUSBAND/WIFE with 100% accuracy";
$menu_order="men_2_0";
$bgproduct = "";

$t_product_name = "FUTURE HUSBAND/WIFE";
$t_product_image = '/assets/img/13mob1.png';
$t_product_image_pc = '/assets/img/wifed.jpg';
$t_product_form_name = "futurespouse";

$t_product_hover_text = "I will connect with your higher soul, discover accurate and comprehensive information about your destiny, and explore the blockages you may have in your love life, career, health, or relationships with others. I will use your energies and frequencies so I can identify your strength, weaknesses and offer you guidance and clarity for a better and happier life.";
$t_product_sales = "6300";
$t_product_title = "I Will Use My Psychic Abilities To Draw Your Future Wife";
$t_about_title = " <center><div style='color:#ff00f3;'> <b>I Will Use My Psychic Abilities To Draw Your Future Wife </b></div></center>";
$t_about_content = "<p>
<p> <b> <div style='color:#a700f5;'>  <center> GUARANTEED 100% ACCURACY OR MONEY BACK</p> </b> </div> </center>
<div style='font-size:120%'> <p> My name is <b>Melissa</b>, and I am known as the only Psychic Artist with 100% accuracy who can help you easily identify your future wife when your paths cross. </p>

<p> After years of practice, I managed to create a unique way to use my artistic talent and the skills born of Clairvoyance to give you a psychic portrait along with a detailed description of the cognitive-affective traits of your future partner. In addition, you will receive an exact record of the timeframe you are going to meet her. And for all this, I just need you to tell me your date of birth and your full name. </p>
<p> Finding your future partner is important because it will bring significant changes in your life and guide you to reach a higher level of emotional and spiritual development. This person will not only be your romantic partner, but also your guide in the complex process of self-discovery and self-knowledge. </p>
<p> My knowledge of numerology, astrology, and clairvoyance skills allow me to accurately read your vibrational energy and figure out what the ideal time is, and when you are ready to accept those changes in your life and meet your own soulmate. </p>
<p> <b> BONUS: I will also perform a Psychic Connection between you two, to make sure that there will be no energy or other blockages between you two! </p> </b>
<p> Additionally, my drawing talent and ability to see the facial features of your own future life partner when I am in a meditative trance state allows me to create useful robot portraits, and give you the unique opportunity to easily identify the ideal person for your soul. </p>
<p> Now you have the unique chance to be closer than ever before to meeting your partner and manifesting a sincere and genuine love in your life. For the first time, you will be able to know who to look for and when to do that, so you will have all the chances to meet them. </p>

<p> In the e-mail you receive from me, you will find a drawing of your future partner’s appearance and a detailed description of their character, and your order will be completed within 24 hours. </p>
<p>  <b> I decided to open this shop due to very high requests from people all around the world, after my countless appearances on TV and interviews, where everyone was convinced of the talent and accuracy of my predictions </p> </b> 
<br> 
<center> <p> <div style='color:#a700f5;'> <b> IF MY PREDICTIONS DON’T COME TRUE WITHIN THE TIME FRAME I PROVIDE, YOU WILL RECEIVE A FULL REFUND, NO QUESTION ASKED! </p> </b> <center></div> </div>
</div> <br> <div style='font-size:110%'><div style='color:#a700f5;'><center>  <b>MAXIMUM DISCRETION: DIGITAL DELIVERY ONLY! </p> </center>
<p>All orders are delivered to the provided email address and also can be accessed from user dashboard. Nothing will be shipped to your home address! </b></div>
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
?>