<?php
require 'aaConfig.php';

header("Content-type: application/json");
$response = '{
"ResultCode": 0,
"ResultDesc": "Confirmation Received Successfully"
}';


    // Response from M-PESA Stream
    $mpesaResponse = file_get_contents('php://input');
    
    
    
    // log the response
    $logFile = "aaConfirmationResponse.txt";
    $jsonMpesaResponse = json_decode($mpesaResponse, true); // We will then use this to save to database

    // write to file
    $log = fopen($logFile, "a");
    
    fwrite($log, $mpesaResponse);
    fclose($log);
   
    // print_r($mpesaResponse);
    // $response;
    insert_response($jsonMpesaResponse);
?>