<?php
if(isset($_GET['product'])) {
$product = $_GET['product'];
}else{
$product = "SOULMATE";	
}

switch ($product) {
  case "SOULMATE":
   $product = "SOULMATE";
    break;
case "tf":
    $product = "TWIN FLAME";
    break;
case "fh":
    $product = "FUTURE HUSBAND/WIFE";
    break;
case "fh":
    $product = "FUTURE BABY";
    break;
case "all":
    $product = "ALL PRODUCTS";
    break;
  default:
    $product = "SOULMATE";
}

include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';
    $dateoffset = rand(60,180);
	$newdate = date('Y-m-d H:i:s', strtotime("-$dateoffset minutes"));
	
	if($product == "ALL PRODUCTS"){
	$newdate1 = date('Y-m-d H:i:s');
	$newdate2 = date('Y-m-d H:i:s', strtotime("-1 minutes"));
	$newdate3 = date('Y-m-d H:i:s', strtotime("-5 minutes"));
	$newdate4 = date('Y-m-d H:i:s', strtotime("-10 minutes"));
	
	
	
	$sql1 = "SELECT review_id FROM reviews WHERE review_moderated = 'approved' AND product = 'SOULMATE' order by RAND() LIMIT 1";
	$sql2 = "SELECT review_id FROM reviews WHERE review_moderated = 'approved' AND product = 'TWIN FLAME' order by RAND() LIMIT 1";
	$sql3 = "SELECT review_id FROM reviews WHERE review_moderated = 'approved' AND product = 'FUTURE HUSBAND/WIFE' order by RAND() LIMIT 1";
	$sql4 = "SELECT review_id FROM reviews WHERE review_moderated = 'approved' AND product = 'FUTURE BABY' order by RAND() LIMIT 1";
	
	$result1 = $conn->query($sql1);
	$result2 = $conn->query($sql2);
	$result3 = $conn->query($sql3);
	$result4 = $conn->query($sql4);
	
	$r1 = $result1->fetch_assoc();
	$r2 = $result2->fetch_assoc();
	$r3 = $result3->fetch_assoc();
	$r4 = $result4->fetch_assoc();
	
	$id1 = $r1['review_id'];
	$id2 = $r2['review_id'];
	$id3 = $r3['review_id'];
	$id4 = $r4['review_id'];
	
	echo "Fetched review with ID: ".$id1."<br>";
	echo "Fetched review with ID: ".$id2."<br>";
	echo "Fetched review with ID: ".$id3."<br>";
	echo "Fetched review with ID: ".$id4."<br>";
	
	echo "<hr>";
	
	echo "New Date #1: ".$newdate1."<br>";
	echo "New Date #2: ".$newdate2."<br>";
	echo "New Date #3: ".$newdate3."<br>";
	echo "New Date #4: ".$newdate4."<br>";
	
	echo "<hr>";
	
	$sql11 = "UPDATE reviews SET review_date = '".$newdate1."' WHERE review_id = '".$id1."'";
	$sql12 = "UPDATE reviews SET review_date = '".$newdate2."' WHERE review_id = '".$id2."'";
	$sql13 = "UPDATE reviews SET review_date = '".$newdate3."' WHERE review_id = '".$id3."'";
	$sql14 = "UPDATE reviews SET review_date = '".$newdate4."' WHERE review_id = '".$id4."'";
	
	$result11 = $conn->query($sql11);
	$result12 = $conn->query($sql12);
	$result13 = $conn->query($sql13);
	$result14 = $conn->query($sql14);
	
	echo "Updated SOULMATE Review (#".$id1.") with new date & time:".$newdate1."<br>";
	echo "Updated TWIN FLAME Review (#".$id2.") with new date & time:".$newdate2."<br>";
	echo "Updated FUTURE HUSBAND/WIFE Review (#".$id3.") with new date & time:".$newdate3."<br>";
	echo "Updated FUTURE BABY Review (#".$id4.") with new date & time:".$newdate4."<br>";
	
	
	}else{
	$sql21 = "SELECT review_id FROM reviews WHERE review_moderated = 'approved' AND product = 'SOULMATE' order by RAND() LIMIT 1";
    $result = $conn->query($sql21);
	$r = $result->fetch_assoc();
	$id = $r['review_id'];
	echo "Fetched review with ID: ".$id."<br>";
	
	echo "New Date: ".$newdate."<br>";
	
	$sql22 = "UPDATE reviews SET review_date = '".$newdate."' WHERE review_id = '".$id."'";
	$result22 = $conn->query($sql22);
	echo "Updated ".$product." Review (#".$id.") with new date & time:".$newdate;
	}
	
	
?>