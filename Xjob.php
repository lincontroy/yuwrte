<?php
include "./db/dbconn.php";
date_default_timezone_set('Africa/Nairobi');

$dateToday =  date('d/m/Y');
$Hournow =  date('H');
$get_real_hour =  date('H');
$date_review =  date('d/m/Y H:i:s');


$investments = "SELECT * FROM assignedWork WHERE `status` = 0" ;
$investmentsQuery = mysqli_query($conn,$investments);
if(!$investmentsQuery){
    die("hey! error");
}
   if(mysqli_num_rows($investmentsQuery) > 0){
 foreach($investmentsQuery as $investmentArry){
$reviewHr = $investmentArry['reviewHr'];
     if( $reviewHr == $Hournow ){
        $refBonusID =  $investmentArry['id'];
        $updateInvestments = "UPDATE `assignedWork` SET `status`= 1, `updatedAt`= '$date_review'  WHERE `id` = '$refBonusID'";
        $updateInvestmentsQuery = mysqli_query($conn,$updateInvestments);
        echo 'ok[reviewed], ';
    }else{
        echo 'false[none], ';
    }
 }
   }
   else{
       echo "Zero task to be reviewed";
   }
?>