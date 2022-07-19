<?php

    $url = "https://api.talkjs.com/v1/ArJWsup2/users/53";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');

    $headers = array(
       "Content-Type: application/json",
       "Authorization: Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98",
    );
    $adminData = json_encode(array(
        "name"  => "Melissa Psychic",
        "email-1" => "contact@soulmate-artist.com",
        "photoUrl" => "https://www.soulmate-artist.com/assets/img/avatars/1.png",
        "welcomeMessage" => "Hey there! :-) Im Melissa Psychic :-)",
        "roole" => "admin"
    )); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, $adminData);   
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Create Admin - Error:' . curl_error($curl);
    }
    curl_close($curl);
    var_dump($resp);

?>