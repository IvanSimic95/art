


<?php
// set parameters and execute


$review_name = $_POST['review_name'];
$review_rating = $_POST['review_rating'];
$review_text = $_POST['rating_testimonial'];
$review_date = date('Y-m-d H:i:s');

include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';


    $sql = "INSERT INTO reviews (review_id, review_name, review_rating, review_text, review_date, review_moderated)
                          VALUES (NULL, '$review_name', '$review_rating', '$review_text', '$review_date', 'pending')";


    if ($conn->query($sql) === TRUE) {
        $conn->close();
        $referrer  = $_SERVER['HTTP_REFERER'];
        $referrer = strtok($referrer, '?');
        $referrerPost = $referrer ."?review=posted";
        header("Location: $referrerPost");
        die();
    } else {
      // echo "Error: " . $sql . "<br>" . $conn->error;
      $conn->close();
    }


?>
