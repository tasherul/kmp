<?php

//API Url
//$url = 'https://gpcmp.grameenphone.com/ecmapigw/webresources/ecmapigw.v2';
 
//Initiate cURL.
$ch = curl_init($url);
 
//The JSON data.
$jsonData = array(
    'username' => 'BDPAdmin_4500',
    'password' => 'BDPAdmin_4500',
    'apicode' => '1',
    'msisdn' => '01913659900',
    'countrycode' => '880',
    'cli' => 'KMP LEAVE',
    'messagetype' => '3',
    'message' => 'Hello test My',
    'messageid' => '0'
);
 
 
 
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
 
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
 
//Execute the request
$result = curl_exec($ch);

?>