<?php
if(isset($_GET['code'])){
    $code = $_GET['code'];

    $pieces = explode(",", $code);
    $splitCode = $pieces[0];

    $finishedCode = preg_replace('/[0-9]+/', '', $splitCode);

}else{

    $finishedCode = "soulmate";

}


echo $finishedCode;