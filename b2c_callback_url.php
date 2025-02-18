<?php
include_once './db/dbconn.php';

  $json = file_get_contents('php://input');
  $logFile = "B2CResultResponse.json";
  $log = fopen($logFile, "a");
  fwrite($log, $json);
  fclose($log);
  $json = json_decode($json);
 
//  {"Result":{"ResultType":0,"ResultCode":0,"ResultDesc":"The service request is processed successfully.","OriginatorConversationID":"19628-257871957-1","ConversationID":"AG_20230207_203077135adc9ee7ec42","TransactionID":"RB70605ARW","ResultParameters":{"ResultParameter":[{"Key":"ReceiverPartyPublicName","Value":"254715687155 - GEORGE KARIUKI NG'ANG'A"},{"Key":"TransactionCompletedDateTime","Value":"07.02.2023 21:47:21"},{"Key":"B2CUtilityAccountAvailableFunds","Value":2218.57},{"Key":"B2CWorkingAccountAvailableFunds","Value":0.00},{"Key":"B2CRecipientIsRegisteredCustomer","Value":"Y"},{"Key":"B2CChargesPaidAccountAvailableFunds","Value":0.00},{"Key":"TransactionAmount","Value":3000},{"Key":"TransactionReceipt","Value":"RB70605ARW"}]},"ReferenceData":{"ReferenceItem":{"Key":"QueueTimeoutURL","Value":"http:\/\/internalapi.safaricom.co.ke\/mpesa\/b2cresults\/v1\/submit"}}}}
 
 
$ResultCode = $json->Result->ResultCode;
$ConversationID = $json->Result->ConversationID;
$ResultDesc = $json->Result->ResultDesc;
$trx_id = $json->Result->TransactionID;

$name = isset($json->Result->ResultParameters->ResultParameter[0]->Value) ? explode(' - ', $json->Result->ResultParameters->ResultParameter[0]->Value)[1] : null;

$phone_num = isset($json->Result->ResultParameters->ResultParameter[0]->Value) ? explode(' - ', $json->Result->ResultParameters->ResultParameter[0]->Value)[0] : null;
$org_balance = isset($json->Result->ResultParameters->ResultParameter[2]->Value) ? explode(' - ', $json->Result->ResultParameters->ResultParameter[2]->Value)[0] : null;



if($ResultCode == 0){
$updateInvestments = "UPDATE `b2c` SET  `trx_id` = '$trx_id'   ,  `description` = '$ResultDesc'  , `result_code` = '$ResultCode'  ,   `phone` = '$phone_num'  ,  `amount` = '$org_balance' ,   `receiver_name` = '$name' ,  `status` = 1  WHERE `conversation_id` = '$ConversationID'";
mysqli_query($conn,$updateInvestments);   
}
else if($ResultCode == 1){
$updateInvestments = "UPDATE `b2c` SET  `trx_id` = '$trx_id'   ,  `description` = '$ResultDesc' , `result_code` = '$ResultCode' ,  `receiver_name` = '$name' ,  `status` = 0  WHERE `conversation_id` = '$ConversationID'";
mysqli_query($conn,$updateInvestments);   
}
else{
$updateInvestments = "UPDATE `b2c` SET  `trx_id` = 'Error'   ,  `description` = 'Fatal Error' , `result_code` = '2' ,  `receiver_name` = 'Error' ,  `status` = 0  WHERE `conversation_id` = '$ConversationID'";
mysqli_query($conn,$updateInvestments);    
}
 
 ?>



