<?php

function logout($baseurl = 'http://localhost:5000') {
    $ch = curl_init();

    $url = "$baseurl/logout.php";

    $cookieFile = "cookies";
    if(!file_exists($cookieFile)) {
        $fh = fopen($cookieFile, "w");
        fwrite($fh, "");
        fclose($fh);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile); // Cookie aware
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); // Cookie aware
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    return $result;
}
