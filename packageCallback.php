<?php
include_once './db/dbconn.php';
date_default_timezone_set('Africa/Nairobi');
$php_date=  date('d/m/Y H:i:s');
ob_start();

$responce = file_get_contents('php://input');
$decodedResponce = json_decode($responce);

$amount;
$mpesaCode ;
$balance;
$transactionDate;
$package = $_GET['package'];
$phone = $_GET['phone'];

$datass= $decodedResponce;
//$datass = json_decode($var);
foreach($datass as $datas){
foreach($datas as $data){
$MerchantRequestID=$data->MerchantRequestID;
$ResultCode=$data->ResultCode;
$ResultDesc=$data->ResultDesc;
$logfile = "packageDumps2.txt";
$log = fopen($logfile,"a");
fwrite($log,json_encode($data));
fclose($log);
if($ResultDesc == "The service request is processed successfully."){
$CallbackMetadata=$data->CallbackMetadata; 
foreach($CallbackMetadata as $callBack){
$amount = $callBack[0]->Value;
$mpesaCode = $callBack[1]->Value;
$balance= $callBack[2]->Value;
$transactionDate = $callBack[3]->Value;
// $phone= $callBack[4]->Value;
$activationInsert= "INSERT INTO `deposits`(`transId`, `date`, `phone`,`amout`,`status`) VALUES ('$mpesaCode','$php_date','$phone','$amount',0)";
$resultQuery = mysqli_query($conn,$activationInsert); 

// start of activation process
if(!$resultQuery){
die("error: ".mysqli_error($conn));
}else{
$activateAcc = "SELECT * FROM `users` WHERE `phone`='$phone'";
$activationResult = mysqli_query($conn,$activateAcc);
if(!$activationResult){
die("Error: ".mysqli_error($conn));
}else{
if(mysqli_num_rows($activationResult) > 0){

$updateToActivte1 = "UPDATE `users` SET `$package` = '$package' WHERE `phone` = '$phone'";
$updatePurchase = mysqli_query($conn,$updateToActivte1);
if($updatePurchase){
$addPackage= "INSERT INTO `packages`(`phone`, `package`, `amount`,`createdAt`) VALUES ('$phone','$package','$amount','$php_date')";
mysqli_query($conn,$addPackage);
}
} 
else{
echo "user does not exist";
}
}
}
// end of activation process
}
}
}
}
?>