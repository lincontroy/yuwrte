<?php
/* TESTED ON PHP Version 7.2.8. Refer to the version of your php if some/parts/whole has errors */
/**
* This function serves the purpose of saving the data into our database.
* It has the connection it, so by just doing it right, you will be up and running without any struggles
* @param array. The M-PESA response array is passed into the function which we use PDO to insert it to our db.
*
**/

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
function insert_response($jsonMpesaResponse){
    
    
    // return $jsonMpesaResponse;
	# 1.1. Config Section
		$dbName = 'yuwritea_yuwriteafrica';
		$dbHost = '127.0.0.1';
		$dbUser = 'yuwritea_yuwriteafrica';
		$dbPass = '24cupbv8EuESrHg';
		
		
	# 1.1.1 establish a connection
	try{
// 		$con = new PDO("mysql:dbhost=$dbHost;dbname=$dbName", $dbUser, $dbPass);

        define("DB_HOST", "localhost");
        define("DB_USER", "yuwritea_yuwriteafrica");
        define("DB_PASSWORD", "24cupbv8EuESrHg");
        define("DB_DATABASE", "yuwritea_yuwriteafrica");
    
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		echo "Connection was successful";
	}
	catch(PDOException $e){
		die("Error Connecting ".$e->getMessage());
	}
	# 1.1.2 Insert Response to Database
	try{

        $decoded_data = json_encode($jsonMpesaResponse);
        
        
        // print_r($decoded_data);
        
        

        $TransactionType = trim($jsonMpesaResponse['TransactionType']);
        $TransID = $jsonMpesaResponse['TransID'];
        $TransTime = $jsonMpesaResponse['TransTime'];
        $TransAmount = $jsonMpesaResponse['TransAmount'];
        $BusinessShortCode = $jsonMpesaResponse['BusinessShortCode'];
        $BillRefNumber = $jsonMpesaResponse['BillRefNumber'];
        $InvoiceNumber = $jsonMpesaResponse['InvoiceNumber'];
        $OrgAccountBalance = $jsonMpesaResponse['OrgAccountBalance'];
        $ThirdPartyTransID = $jsonMpesaResponse['ThirdPartyTransID'];
        $MSISDN = $jsonMpesaResponse['MSISDN'];
        $FirstName = $jsonMpesaResponse['FirstName'];
        
        
 
        
        // $stmt = $con->prepare("INSERT INTO `deposit`(`TransID`, `TransTime`, `TransAmount`,`BusinessShortCode`,`BillRefNumber`,`InvoiceNumber`,`OrgAccountBalance`,`ThirdPartyTransID`,`MSISDN`,`FirstName`) VALUES (:TransID, :TransTime, :TransAmount,:BusinessShortCode,:BillRefNumber,:InvoiceNumber,:OrgAccountBalance,:ThirdPartyTransID,:MSISDN,:FirstName)");
        
         $sql="INSERT INTO `deposit`(`TransactionType`,`TransID`, `TransTime`, `TransAmount`,`BusinessShortCode`,`BillRefNumber`,`InvoiceNumber`,`OrgAccountBalance`,`ThirdPartyTransID`,`MSISDN`,`FirstName`) VALUES ('$TransactionType','$TransID','$TransTime','$TransAmount','$BusinessShortCode','$BillRefNumber','$InvoiceNumber','$OrgAccountBalance','$ThirdPartyTransID','$MSISDN','$FirstName')";
      
        
         
     
   
      
        try{
            
            $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            
        }catch(PDOException $e){
            
            echo $e->getMessage();
            
            
        }
        
    

//         $insert = $con->prepare("INSERT INTO `deposit`(`TransactionType`,`TransID`, `TransTime`, `TransAmount`,`BusinessShortCode`,`BillRefNumber`,`InvoiceNumber`,`OrgAccountBalance`,`ThirdPartyTransID`,`MSISDN`,`FirstName`) VALUES (:TransactionType,:TransID, :TransTime, :TransAmount,:BusinessShortCode,:BillRefNumber,:InvoiceNumber,:OrgAccountBalance,:ThirdPartyTransID,:MSISDN,:FirstName)");
// 		$insert->execute((array)($jsonMpesaResponse));
		
// 		$result = $stmt->execute(array(':TransID'=>$TransID, ':TransTime'=>$TransTime, ':TransAmount'=>$TransAmount, ':BusinessShortCode'=>$BusinessShortCode,':BillRefNumber'=>$BillRefNumber,':InvoiceNumber'=>$InvoiceNumber,':OrgAccountBalance'=>$OrgAccountBalance,':ThirdPartyTransID'=>$ThirdPartyTransID,':MSISDN'=>$MSISDN,':FirstName'=>$FirstName));
		# 1.1.2o Optional - Log the transaction to a .txt or .log file(May Expose your transactions if anyone gets the links, be careful with this. If you don't need it, comment it out or secure it)
		$Transaction = fopen('aaDeposit.text', 'a');
		fwrite($Transaction, json_encode($jsonMpesaResponse));
		fclose($Transaction);
	}
	catch(PDOException $e){
		# 1.1.2b Log the error to a file. Optionally, you can set it to send a text message or an email notification during production.
		$errLog = fopen('a_db_paybill_error.txt', 'a');
		fwrite($errLog, $e->getMessage());
		fclose($errLog);
		# 1.1.2o Optional. Log the failed transaction. Remember, it has only failed to save to your database but M-PESA Transaction itself was successful. 
		$logFailedTransaction = fopen('a_failedDeposit.txt', 'a');
		fwrite($logFailedTransaction, json_encode($jsonMpesaResponse));
		fclose($logFailedTransaction);
	}
}
?>