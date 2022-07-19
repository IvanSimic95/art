<?php

if(isset($_GET['id'])){
$order = $_GET['id'];
}else{
$order = 0;
}

if(isset($_GET['product'])){
    $product = $_GET['product'];
    }else{
    $product = "soulmate";
    }

switch ($product) {
    case 'soulmate':
        # code...
        break;
    
    default:
        # code...
        break;
}
?>

<div id="cartfuelpmct"></div> <script defer> cartfuelInit({id:"7cd972c5-ade1-4c98-b225-d944a73b317e", data: { orderID: "<?php echo $order; ?>" } }) </script>