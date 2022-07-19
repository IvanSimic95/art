<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/session.php';
$title = "Future Baby Drawing | Melissa Psychic";
$description = "I will draw your FUTURE BABY with 100% accuracy";
$menu_order="men_2_0";

$t_product_name = "FUTURE BABY";
$t_product_image = '/assets/img/baby-mob.jpg';
$t_product_image_pc = '/assets/img/baby-dsk.jpg';
$t_product_form_name = "baby";
$t_product_hover_text = "I will connect with your higher soul, discover accurate and comprehensive information about your destiny, and explore the blockages you may have in your love life, career, health, or relationships with others. I will use your energies and frequencies so I can identify your strength, weaknesses and offer you guidance and clarity for a better and happier life.";
$t_product_sales = "2300";
$t_product_title = "I will use my Psychic Abilities to draw your FUTURE BABY within 48 hours with 100% accuracy";
$t_about_title = "I will use my Psychic Abilities to draw your FUTURE BABY within 48 hours with 100% accuracy";
$t_about_content = "<p>
My name is Melissa, and I feel honored to guide you through the beautiful life journey that is waiting for you. My dear, having a baby and accepting the feelings of true love embrace your whole being is the most special gift life will offer you.
</p><p>
From a very young age, I practiced and developed the special gifts I am happy to share with you – a unique combination of artistic talents, empathic projection, clairsentience and clairvoyance, resulting in a beautiful portrait of your future baby, as well as a detailed description of their characteristics and personality traits. 
A deep connection to your pure soul energy will help me see the exact timeframe for when you will give birth to a beautiful baby boy or girl. For this to happen, you only have to tell me your date of birth and your name. 
</p><p>
Having a baby will help you blossom beautifully, as your love will become more delicate and your joy will take over all the sadness you have felt in the past. You will know what it’s like being a nurturing and caring mother, with feelings of love and protection embracing you and your family.
My knowledge in clairvoyance, psychic art and spiritual healing allows me to connect with the purest vibrations of your Higher Self, helping me see essential parts of your future, such as when you will be ready to give birth and how you can instantly heal any type of energy blockages you might have. 
</p><p>
The future baby drawing I’m offering you is not just a simple sketch – It is an entirely difficult process that involves deep mediation, energy healing and profound introspection inside your Higher Soul.
</p><p>
First, I enter into a deep meditative trance state, where your Higher Self shows me the facial features and life details of the baby that is meant for you in this lifetime. With the help of automatic drawing, I then create a portrait and an in-depth description of their personality.
</p><p>
After this, I connect to your aura frequencies, and I am able to see when in the future you are covered with the colors and vibrations of true love, which is the exact moment when you and your future baby unite in this lifetime.
</p><p>
Throughout my journey I’ve helped tens of thousands of people find the meaning of true love, and seeing others be happy and fulfilled is what makes me keep going. 
This is your special chance to be closer than ever to your future baby and finally know when your life will become the beautiful story that you deserve!
</p><p>
Due to my countless TV apparitions and excellent feedback from stars and celebrities, I have limited the number of sales to 10/day.
</p>";

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