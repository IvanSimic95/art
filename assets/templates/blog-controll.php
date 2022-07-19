<?php
if(isset($_GET['id'])) {
$id = $_GET['id'];
}
$shortlink = str_replace("/blog/", "",$id);
$cleanshortlink = preg_replace('/[^-a-zA-Z0-9_]/', '', $shortlink);
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

    $sql = "SELECT * FROM blog WHERE shortlink = '".$cleanshortlink."' ORDER BY id DESC";
    $result = $conn->query($sql);
	$count = $result->num_rows;
	if($count != 1){ //Die if something is not right
	header("HTTP/1.0 404 Not Found");
	die('Page not found.');
	}
	$row   = mysqli_fetch_assoc($result);
	
	$aid = $row['id'];
	$atitle = $row['title'];
	$aimage = $row['image'];
	$atext = $row['text'];
	$aparagraph = $row['paragraph'];
	$ashortlink = $row['shortlink'];
	

	
	$splitText = explode('<br><br>', $atext);
	
	$countsplit = count($splitText);
	
	
	

if ($aid % 2 == 0) {
  $imgside = "left";
  $textside = "right";
}else{
  $imgside = "right";
  $textside = "left";
}
?>
<?php $title = $atitle; ?>
<?php $description = "Blog"; ?>
<?php $menu_order="men_4_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>
<div class="breadcrumbs">
  <div class="container">
    <a href="/index.php">Melissa</a> > <a href="/blog/">Blog</a> > <a href="<?php echo "/blog/".$ashortlink?>"><?php echo $atitle; ?></a>
  </div>
</div>

  <div class="container" style="padding-bottom:30px;">
  <div class="white-wrapper"> 
  <h1><?php echo $atitle; ?></h1>
 <div class="paragraph_area">
      <div class="sides">
        <div class="<?php echo $imgside; ?>">
            <p><img src="/assets/img/blog/<?php echo $aimage; ?>" alt="<?php echo $atitle; ?>"></p>
        </div>
        <div class="<?php echo $textside; ?>">
          <div class="paragraph">
			<?php
	$p = 0;		
	while($p < $aparagraph) {
	echo $splitText[$p];
	$p++;
	} 
			
			?>
		  
		  </div>
        </div>
      </div>
    </div>
    <div class="about_more">
	<?php 
	
	$x = $aparagraph;
	while($x < $countsplit) {
	echo $splitText[$x];
	$x++;
	} 
	
	
	?></div>
  </div>
  </div>
















<style>
.paragraph p,
.about_more p{
    margin-top: 5px;
    margin-bottom:20px!important;
}
.white-wrapper {
background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    margin-top: 15px;
	margin-bottom:25px;
}

.white-wrapper img {
border-radius: 8px;
width:100%;
margin-top:15px;
}

h1 {
font-size: 26px;
    font-weight: bold;
    background: linear-gradient( 90deg,#d130eb,#4a30eb 80%,#2b216c);
    color: #fff!important;
    margin-top: -25px;
    margin-left: -25px;
    margin-right: -25px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    text-align: center;
    padding: 15px;
	text-transform:uppercase;
}
</style>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>