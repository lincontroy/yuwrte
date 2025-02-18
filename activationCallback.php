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
$phone = $_GET['phone'];

$datass= $decodedResponce;
//$datass = json_decode($var);
foreach($datass as $datas){
foreach($datas as $data){
$MerchantRequestID=$data->MerchantRequestID;
$ResultCode=$data->ResultCode;
$ResultDesc=$data->ResultDesc;
$logfile = "activationDumps.txt";
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
$updateToActivte = "UPDATE `users` SET `active`='active' WHERE `phone` = '$phone'";
$updateToActivteResult = mysqli_query($conn,$updateToActivte);
// add ref balances here
if(!$updateToActivteResult){
die("error: ".mysqli_error($conn));
}else{
foreach($activationResult  as $userDetails){
$userEmail = $userDetails['email'];
$donwlineId = $userDetails['id'];
$uplines = "SELECT * FROM `referals` WHERE `downline_email` = '$userEmail'";
$uplineresult = mysqli_query($conn,$uplines);
if(!$uplineresult){
die("error: ".mysqli_error($conn));
}else{
if(mysqli_num_rows($uplineresult) > 0){
foreach($uplineresult as $upline){
$upEmail = $upline['upline_email']; 
$upline = "SELECT * FROM `users` WHERE `email`='$upEmail'";
$uplineResult = mysqli_query($conn,$upline);
if(!$uplineResult){
die("Error: ".mysqli_error($conn));
}
if(mysqli_num_rows($uplineresult) > 0){
foreach($uplineResult as $uplineDetails){
$usersInvited = $uplineDetails['invites'];
 $userName = $uplineDetails['username'];
$userInvtesActive= $uplineDetails['activeInvites'];
$userEmail2 = $uplineDetails['email'];
$upline_id = $uplineDetails['id'];
    $newBall = $uplineDetails['ref_bal'] + 200;
    $newRef_earnings = $uplineDetails['ref_earnings'] + 200;
    $newActiveINvites = $userInvtesActive + 1;
$updateUplineBall = "UPDATE `users` SET `ref_bal`= '$newBall',`ref_earnings` = '$newRef_earnings',`activeInvites` = '$newActiveINvites' WHERE `email`='$upEmail'";
    $updateUplineBallResult = mysqli_query($conn,$updateUplineBall);
// add bonuses to table
$BonusInsert= "INSERT INTO `referalbonus`(`upline_id`, `downline_id`, `amount`,`date`,`status`) VALUES ('$upline_id','$donwlineId',200,'$php_date',1)";
mysqli_query($conn,$BonusInsert); 

//echo $msg ;
// sendMail($userEmail2,$userName,$msg);
}

}
}
}
}
}
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