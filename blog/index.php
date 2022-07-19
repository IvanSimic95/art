<?php

if(isset($_GET['id'])) {
$id = $_GET['id'];
}else{
$id = "0";	
}
if($id == "0"){
?>
<?php $title = "Blog | Melissa Psychic"; ?>
<?php $description = "Blog"; ?>
<?php $menu_order="men_4_0"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/header.php'; ?>
<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

    $sql = "SELECT * FROM blog ORDER BY id DESC";
    $result = $conn->query($sql);
	$count = $result->num_rows;
	
    
	  
?>
<div class="breadcrumbs">
  <div class="container">
    <a href="/index.php">Melissa</a> > Blog
  </div>
</div>
<div class="general_section">
  <div class="container">
    <div class="article_loop">
	
      <?php
	  if($result->num_rows != 0) {
$x = 1;


      while($row = $result->fetch_assoc()) {
switch ($x) {
    case 1:
        $sidesone = '<div class="sides">';
        $sidestwo = '';
    break;
    case 2:
        $sidesone = '';
        $sidestwo = '</div>';
    break;
        case 3:
        $sidesone = '<div class="sides">';
        $sidestwo = '';
    break;
    case 4:
        $sidesone = '';
        $sidestwo = '</div>';
    break;
        case 5:
        $sidesone = '<div class="sides">';
        $sidestwo = '';
    break;
    case 6:
        $sidesone = '';
        $sidestwo = '</div>';
    break;
        case 7:
        $sidesone = '<div class="sides">';
        $sidestwo = '';
    break;
    case 8:
        $sidesone = '';
        $sidestwo = '</div>';
    break;
        case 9:
        $sidesone = '<div class="sides">';
        $sidestwo = '';
    break;
    case 10:
        $sidesone = '';
        $sidestwo = '</div>';
    break;
default:
     $sidesone = '';
    $sidestwo = '</div>';
}

echo $sidesone.'

<div class="single_article">
<h2><a href="/blog/' . $row["shortlink"]. '">' . $row["title"]. '</a></h2>
<a href="/blog/' . $row["shortlink"]. '"><img src="/assets/img/blog/' . $row["image"]. '" alt="' . $row["title"]. '"></a>

<div class="short-text">'.trim(substr($row["text"], 0, 150)).'...</div>
<a href="/blog/' . $row["shortlink"]. '" class="load-more btn" style="opacity: 1;">Read More</a>
</div>'.$sidestwo;

$x++;
	}} else {
        echo "No Blog Posts";
    }
      $conn->close();
	  ?>
      
    </div>
</div>
  </div>
</div>

<style>.load-more {
    width: 100%;
    border: 0!important;
    padding: 15px 10px 15px 10px!important;
    cursor: pointer;
	text-align:center;
}
.single_article:last-child{
    padding: 25px;
    border-radius: 8px;
    margin-top: 15px;
	margin-bottom: 40px;
	border-bottom: solid 4px;
}
.single_article{
    background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    margin-top: 15px;
	    width: 48%;
		    box-sizing: border-box;
float:left;
	    margin-bottom: 40px;
		border-bottom: solid 4px;
		min-height:600px;
}
.single_article:nth-child(even) {
float:right;
	}
.single_article:nth-child(odd) > h2,
.single_article:nth-child(odd) > .btn
{
background: linear-gradient( 270deg,#d130eb,#4a30eb 80%,#2b216c)!important;
	}
.single_article img{
	border-radius:8px;
	width:100%;
float:none;
    padding-bottom: 0!important;
    padding-right: 0!important;
	}
h2{
font-size: 36px;
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
    text-transform: uppercase;
}
.short-text{
display:block;
} 
@media only screen and (max-width: 1050px) {
.single_article{
    background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    margin-top: 15px;
	    width: 100%;
float:none;
	    margin-bottom: 40px;
		border-bottom: solid 4px;
}}

@media only screen and (max-width: 768px) {
    
.single_article{
min-height:400px;
padding:15px;
} 
h2 a{
font-size:18px;
text-transform: capitalize;


} 

h2{
margin-top: -15px;
    margin-left: -15px;
    margin-right: -15px;

} 

.short-text{
display:none;
} 
}
</style>






<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/footer.php'; ?>
<?php }else{?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/templates/blog-controll.php'; ?>
<?php }?>