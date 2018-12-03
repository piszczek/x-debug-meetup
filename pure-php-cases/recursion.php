<?php

//infinite loop protection
if (!isset($_SERVER['HTTP_USER_AGENT'])) {
    echo "recursion";
    die;
}

// create curl resource
$ch = curl_init();

//get remote url - if is in recursion get X_XDEBUG_REMOTE_ADDRESS
$remoteUrl = $_SERVER['HTTP_X_XDEBUG_REMOTE_ADDRESS'] ?? $_SERVER['REMOTE_ADDR'];

curl_setopt($ch, CURLOPT_URL, 'pure.meetup.php/recursion.php');
curl_setopt($ch, CURLOPT_COOKIE, 'XDEBUG_SESSION=PHPSTORM');
curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-Xdebug-Remote-Address: " . $remoteUrl]);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);


echo "Response : <b>{$output}</b>";
