<link rel="stylesheet" href="/assets/css/faq.css">



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

$sql = "SELECT * FROM faq ORDER BY id DESC";

$result = $conn->query($sql);

$count = $result->num_rows;

if($result->num_rows != 0) {
echo '<ul class="faq">';
while($row = $result->fetch_assoc()) {

echo '
<div class="my-divider">
<li class="q"><i class="fas fa-chevron-right"></i><span class="faq-question">'.$row["question"].'</span></li>
<li class="a">'.$row["answer"].'</li>
</div>';
}

echo '</ul>';




} else {
    echo "No FAQ";
}
  $conn->close();
?>
<script>
// Accordian
var action="click";
var speed="500";

$(document).ready(function() {
    // Question handler
    $('li.q').on(action, function() {
        // Get next element
		$(this).toggleClass("remove-radius");
        $(this).next().slideToggle(speed).siblings('li.a').slideUp();
		$(this).find("i").toggleClass("rotate");
    });
});
</script>
