<?php

        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        // Create User

        $clientData = json_encode(array(
        "name"  => "Tudor",
        "e-mail" => "tudor@tmdigi.com",
        "photoUrl" => "https://www.psychic-art.com/assets/img/avatars/53.png",
        "welcomeMessage" => "Hey there! Im TUDOR :-)",
        "roole" => "client"
        ));
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/users/53');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        curl_setopt($ch, CURLOPT_POSTFIELDS, $clientData);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $query = http_build_query($result, '', '&');
        echo $query;
        if (curl_errno($ch)) {
            echo 'Create User - Error:' . curl_error($ch);
        }
        $resp = curl_exec($ch);
        curl_close($ch);
        var_dump($resp);

        // Create Admin
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $adminData = json_encode(array(
                "name"  => "Melissa Psychic",
                "email-1" => "contact@psychic-art.com",
                "photoUrl" => "https://www.psychic-art.com/assets/img/avatars/1.png",
                "welcomeMessage" => "Hey there! :-) Im Melissa Psychic :-)",
                "roole" => "admin"
        ));
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/users/1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        curl_setopt($ch, CURLOPT_POSTFIELDS, $adminData);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Create Admin - Error:' . curl_error($ch);
        }
        $resp = curl_exec($ch);
        curl_close($ch);
        var_dump($resp);


        // Start Conversation
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $arrayConversation = array(
           "participants"  => array("53", "1"),
           "subject" => "What a lovely day! Start Conversation"
        );
        $startConversation = array_values($arrayConversation);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.talkjs.com/v1/ArJWsup2/conversations/53');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($startConversation));

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Start Conversation - Error:' . curl_error($ch);
        }
        $resp = curl_exec($ch);
        curl_close($ch);
        var_dump($resp);

?>