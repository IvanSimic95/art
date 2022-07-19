<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.soulmate-artist.com/assets/mail/mail-welcome.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_GET, 1);

curl_setopt($ch, CURLOPT_HTTPHEADER);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
echo $result ;
 ?>
