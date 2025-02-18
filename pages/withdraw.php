<?php
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";
?> 

<main id="main" class="main"  style="background-color: #ffffff;">

    <div class="pagetitle">
        <h1 class="card-title"> <strong>
              <!--<i class="ri-edit-circle-fill"></i>-->
              WITHDRAW YOUR EARNINGS</strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">home</a></li>
          <li class="breadcrumb-item">pages</li>
          <li class="breadcrumb-item active">withdraw earnings</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section>
      <div class="row" style="background-color: lightblue;">
      <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">TOTAL EARNED</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                      <h6> <span>KES</span> <?php echo number_format($result['ref_earnings']) ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">WITHDRAWALS MADE</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                       <h6> <span>KES</span> <?php echo number_format($result['withdrawals']) ?> </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">ACCOUNT BALANCE</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                       <h6> <span>KES</span> <?php echo number_format($result['ref_bal']) ?> </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="row" style="background-color: #f7f5bc;">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Withdraw your earnings here!</h5>
              <?php
if (isset($_POST['withdraw_now'])){
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);
    $phone = $result['phone'];
    $username = $result['username'];
    $get_balance= $result['ref_bal'];
    if($amount < 5000 ){
                    ?>
    <div class="alert alert-danger text-white alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <i class="mdi mdi-alert-outline label-icon"></i><strong> Error !</strong> - Low balance! Your account balance is Ksh <?php echo $result['ref_bal'] ?>
                                       
                                        </div> <?php
    }
    else if($amount > $get_balance){
                         ?>
    <div class="alert alert-danger text-white alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <i class="mdi mdi-alert-outline label-icon"></i><strong> Error !</strong> - Low balance! Your account balance is Ksh <?php echo $result['ref_bal'] ?>
                                        
                                        </div> <?php  
    }
    else if($get_balance >= 10 ){
  /* Urls */
  $access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  $b2c_url = 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
  /* Required Variables */
  $consumerKey = 'Ixk7AP9iNtvhs8qx7Xd7KWzUTWwMDaiL';        # Fill with your app Consumer Key
  $consumerSecret = 'Z8GHPz52bfwAE8gB';     # Fill with your app Secret
  $headers = ['Content-Type:application/json; charset=utf8']; 
  // get security credentials
$cert= "-----BEGIN CERTIFICATE-----
MIIGkzCCBXugAwIBAgIKXfBp5gAAAD+hNjANBgkqhkiG9w0BAQsFADBbMRMwEQYK
CZImiZPyLGQBGRYDbmV0MRkwFwYKCZImiZPyLGQBGRYJc2FmYXJpY29tMSkwJwYD
VQQDEyBTYWZhcmljb20gSW50ZXJuYWwgSXNzdWluZyBDQSAwMjAeFw0xNzA0MjUx
NjA3MjRaFw0xODAzMjExMzIwMTNaMIGNMQswCQYDVQQGEwJLRTEQMA4GA1UECBMH
TmFpcm9iaTEQMA4GA1UEBxMHTmFpcm9iaTEaMBgGA1UEChMRU2FmYXJpY29tIExp
bWl0ZWQxEzARBgNVBAsTClRlY2hub2xvZ3kxKTAnBgNVBAMTIGFwaWdlZS5hcGlj
YWxsZXIuc2FmYXJpY29tLmNvLmtlMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIB
CgKCAQEAoknIb5Tm1hxOVdFsOejAs6veAai32Zv442BLuOGkFKUeCUM2s0K8XEsU
t6BP25rQGNlTCTEqfdtRrym6bt5k0fTDscf0yMCoYzaxTh1mejg8rPO6bD8MJB0c
FWRUeLEyWjMeEPsYVSJFv7T58IdAn7/RhkrpBl1dT7SmIZfNVkIlD35+Cxgab+u7
+c7dHh6mWguEEoE3NbV7Xjl60zbD/Buvmu6i9EYz+27jNVPI6pRXHvp+ajIzTSsi
eD8Ztz1eoC9mphErasAGpMbR1sba9bM6hjw4tyTWnJDz7RdQQmnsW1NfFdYdK0qD
RKUX7SG6rQkBqVhndFve4SDFRq6wvQIDAQABo4IDJDCCAyAwHQYDVR0OBBYEFG2w
ycrgEBPFzPUZVjh8KoJ3EpuyMB8GA1UdIwQYMBaAFOsy1E9+YJo6mCBjug1evuh5
TtUkMIIBOwYDVR0fBIIBMjCCAS4wggEqoIIBJqCCASKGgdZsZGFwOi8vL0NOPVNh
ZmFyaWNvbSUyMEludGVybmFsJTIwSXNzdWluZyUyMENBJTIwMDIsQ049U1ZEVDNJ
U1NDQTAxLENOPUNEUCxDTj1QdWJsaWMlMjBLZXklMjBTZXJ2aWNlcyxDTj1TZXJ2
aWNlcyxDTj1Db25maWd1cmF0aW9uLERDPXNhZmFyaWNvbSxEQz1uZXQ/Y2VydGlm
aWNhdGVSZXZvY2F0aW9uTGlzdD9iYXNlP29iamVjdENsYXNzPWNSTERpc3RyaWJ1
dGlvblBvaW50hkdodHRwOi8vY3JsLnNhZmFyaWNvbS5jby5rZS9TYWZhcmljb20l
MjBJbnRlcm5hbCUyMElzc3VpbmclMjBDQSUyMDAyLmNybDCCAQkGCCsGAQUFBwEB
BIH8MIH5MIHJBggrBgEFBQcwAoaBvGxkYXA6Ly8vQ049U2FmYXJpY29tJTIwSW50
ZXJuYWwlMjBJc3N1aW5nJTIwQ0ElMjAwMixDTj1BSUEsQ049UHVibGljJTIwS2V5
JTIwU2VydmljZXMsQ049U2VydmljZXMsQ049Q29uZmlndXJhdGlvbixEQz1zYWZh
cmljb20sREM9bmV0P2NBQ2VydGlmaWNhdGU/YmFzZT9vYmplY3RDbGFzcz1jZXJ0
aWZpY2F0aW9uQXV0aG9yaXR5MCsGCCsGAQUFBzABhh9odHRwOi8vY3JsLnNhZmFy
aWNvbS5jby5rZS9vY3NwMAsGA1UdDwQEAwIFoDA9BgkrBgEEAYI3FQcEMDAuBiYr
BgEEAYI3FQiHz4xWhMLEA4XphTaE3tENhqCICGeGwcdsg7m5awIBZAIBDDAdBgNV
HSUEFjAUBggrBgEFBQcDAgYIKwYBBQUHAwEwJwYJKwYBBAGCNxUKBBowGDAKBggr
BgEFBQcDAjAKBggrBgEFBQcDATANBgkqhkiG9w0BAQsFAAOCAQEAC/hWx7KTwSYr
x2SOyyHNLTRmCnCJmqxA/Q+IzpW1mGtw4Sb/8jdsoWrDiYLxoKGkgkvmQmB2J3zU
ngzJIM2EeU921vbjLqX9sLWStZbNC2Udk5HEecdpe1AN/ltIoE09ntglUNINyCmf
zChs2maF0Rd/y5hGnMM9bX9ub0sqrkzL3ihfmv4vkXNxYR8k246ZZ8tjQEVsKehE
dqAmj8WYkYdWIHQlkKFP9ba0RJv7aBKb8/KP+qZ5hJip0I5Ey6JJ3wlEWRWUYUKh
gYoPHrJ92ToadnFCCpOlLKWc0xVxANofy6fqreOVboPO0qTAYpoXakmgeRNLUiar
0ah6M/q/KA==
-----END CERTIFICATE-----";


$publicKey = $cert;
$plaintext = "API@Yuwrite1";
openssl_public_encrypt($plaintext, $encrypted, $publicKey, OPENSSL_PKCS1_PADDING);
$SecurityCredential = base64_encode($encrypted);

  /* from the test credentials provided on you developers account */
  $InitiatorName = 'EMMANUEL3A';      # Initiator
  
  # choose between SalaryPayment, BusinessPayment, PromotionPayment 
  $CommandID = 'PromotionPayment';
  $Amount = $amount;
  $PartyA = '3036483';             # shortcode 1
  $PartyB = $phone;             # Phone number you're sending money to
  $Remarks = 'Tryna test';      # Remarks ** can not be empty
  $QueueTimeOutURL = 'https://yuwriteafrica.com/b2c_timeout_url';    # your QueueTimeOutURL
  $ResultURL = 'https://yuwriteafrica.com/b2c_callback_url';          # your ResultURL
  $Occasion = 'Christmas Yeap';           # Occasion

  /* Obtain Access Token */
  $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
  $response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $response = json_decode($response);
  $access_token = $response->access_token;
  curl_close($curl);

  /* Main B2C Request to the API */
  $b2cHeader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $b2c_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $b2cHeader); //setting custom header

  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' => $Occasion
  );

  $data_string = json_encode($curl_post_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  $curl_response = curl_exec($curl);
//  print_r($curl_response);
//  echo $curl_response;
  
// $json = json_decode($curl_response);
// echo $ConversationID = $json->ConversationID;
// echo $OriginatorConversationID = $json->OriginatorConversationID;
// echo $ResponseCode = $json->ResponseCode;
// echo $ResponseDescription = $json->ResponseDescription;

$json = json_decode($curl_response, true);
if( $json['ResponseCode'] == "0"){
 $ConversationID =  $json['ConversationID'];
 $OriginatorConversationID =  $json['OriginatorConversationID'];
 $ResponseCode =  $json['ResponseCode'];
 $ResponseDescription =  $json['ResponseDescription'];

$date =  date('d-m-Y H:i:s') ;
$trx_amount = $amount;
$phone;
$invoice;
$receiver_name;

$query = "INSERT INTO `b2c`(`username`, `conversation_id`,`request_code`,`trx_amount`, `phone`, `amount`, `invoice` , `receiver_name` , `date`, `type`) 
VALUES ('$username','$ConversationID','$OriginatorConversationID','$trx_amount','$phone','$amount','$invoice','$receiver_name','$date','AFFILIATE')";
mysqli_query($conn,$query);

// update users table column withdrawals
$sql_query4="select * FROM users WHERE username = '$username'";
$result_set=mysqli_query($conn,$sql_query4) or die('error');
$user_me=mysqli_fetch_array($result_set);
//  add Withdrawals made
$clients_Withdrawals = $user_me['withdrawals'];
$final_value = ($clients_Withdrawals + $amount);
//  offset  ref bal
$clients_bal= $result['ref_bal'];
$final_val = ($clients_bal - $amount);

$x = "UPDATE users SET withdrawals = '$final_value', ref_bal = '$final_val'  WHERE username = '$username'";
 mysqli_query($conn, $x);

  echo '  <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <i class="mdi mdi-check-all label-icon"></i><strong>Success! </strong> Withdrawal initiated successfully.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>'; 

}
else{
?>  <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <i class="mdi mdi-alert-outline label-icon"></i><strong>Error !</strong> - Withdrawal not available at the moment
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div> <?php
}

}
   }
?>

<form action="" method="POST">
<div class="d-grid gap-2 mt-3">
<input type="text"  disabled=""  name="bal" value="ACCOUNT BAL KES <?php echo $result['ref_bal'] ?>"  class="form-control bg-default"> 

<input type="text"  required="" min="10"  name="amount" placeholder="Enter amount to withdraw" class="form-control bg-default"> 

<div>
<button class="btn btn-primary" name="withdraw_now" type="submit">Withdraw Balances</button>
</div>
</div>
</form>
             
            </div>
          </div>
        </div>        
      </div>
    </section>

     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  

    <script>
function myFunction() {
Swal.fire({
  title: 'Link Copied Successfully!',
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
})
}
</script>

              <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            copyToClipboard(document.getElementById("copyTarget"));
        });
        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);
                // copy the selection
                var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch(e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }
            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
    </script> 
    
</main>

<?php
include_once 'includes/footer.php';
                ?>