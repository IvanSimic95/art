


<?php $title = "Contact | Melissa Psychic"; ?>

<?php $description = "Contact, Support, FAQ"; ?>

<?php $menu_order="men_5_0"; ?>

<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>

<div class="breadcrumbs">

  <div class="container">

    <a href="/index.php">Melissa</a> > Contact

  </div>

</div>

<section class="contact_page">
  <div class="container">
<div class="row">
    <div class="col-sm-6">
        <div class="wrap-white">

            <h1>Frequently Asked Questions</h1>
    </div>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/faq.php'; ?>

  </div>
<div class="col-sm-6">
<div class="wrap-white">


            <h2>Send us a Message!</h2>

			<div id="sb-tickets"></div>
 </div>
 <div class="wrap-white">
	<div class="contact_form">
    <form class="contact" name="sentMessage" id="contactForm">
        <div class="form_box">
            <label for="contact_name">Your Name*</label>
            <input type="text" name="contact_name" id="name" class="form-control" required>
            <p class="help-block text-danger"></p>
        </div>
        <div class="form_box">
            <label for="contact_email">Your Email*</label>
            <input type="email" name="contact_email" id="email" class="form-control" required>
            <p class="help-block text-danger"></p>
        </div>
        <div class="form_box">
            <label for="contact_subject">ORDER ID (if applicable) </label>
            <input type="tel" name="contact_subject" id="subject" class="form-control">
            <p class="help-block text-danger"></p>
        </div>
        <div class="form_box">
            <label for="contact_message">Message</label>
            <textarea name="contact_message" id="message" rows="8" cols="80"></textarea>
            <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <div class="form_box">
            <input type="submit" name="contact_submit" value="Submit Message">
        </div>
    </form>
	</div>
 </div>
</div>
</div>
</div>
</section>


<style>
.wrap-white{
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    margin-top: 15px;
	margin-bottom:20px;
}
.contact_page h1{
margin-bottom:0;
font-size:36px;
    font-weight: bold;
    background: -webkit-linear-gradient(#d130eb,#4a30eb 80%,#2b216c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
	    text-align: center;
	}


.contact_page h2{
margin-bottom:0;
font-size:36px!important;
    font-weight: bold;
    background: -webkit-linear-gradient(#d130eb,#4a30eb 80%,#2b216c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
	    text-align: center;
		margin-bottom:0px!important;
	}
.contact_page h3{
margin-bottom:0;
font-size:18px!important;
    font-weight: bold;
    background: -webkit-linear-gradient(#d130eb,#4a30eb 80%,#2b216c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
	    text-align: center;
		margin-bottom:15px;
	}


.my-divider{
margin-bottom:5px;
	}
</style>


<!--contact js file-->
<script type="text/javascript" src="/assets/js/contact_me.js"></script>
<!--jqBootstrapValidation js file-->
<script src="/assets/js/jqBootstrapValidation.js"></script>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>
