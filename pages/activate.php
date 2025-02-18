<?php
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";
?> 

<main id="main" class="main" style="background-color: #ffffff;">

    <div class="pagetitle">
      <h1 class="card-title"> <strong>
              <!--<i class="ri-edit-circle-fill"></i>-->
              VERIFY ACCOUNT</strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">home</a></li>
          <li class="breadcrumb-item">pages</li>
          <li class="breadcrumb-item active">verify account</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        
         <div class="row">
        <div class="col-lg-10">

          <div class="card" style="background-color: lightblue;">
            <div class="card-body">
              <h5 class="card-title" style="font-weight: bold;">Hello <?php echo strtoupper($result['username'])?></strong>, Verify your Account!</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Full Name:</strong> </label>
                  <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?php  echo strtoupper($result['firstname']) . " " . strtoupper($result['lastname'])?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>USERNAME:</strong> </label>
                  <div class="col-sm-10">
                    <input readonly type="text" class="form-control" value="<?php  echo strtoupper($result['username'])?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Email:</strong></label>
                  <div class="col-sm-10">
                    <input readonly type="email" class="form-control" value="<?php  echo strtoupper($result['email'])?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Phone Number:</strong></label>
                  <div class="col-sm-10">
                    <input readonly type="phone" class="form-control" value="<?php  echo strtoupper($result['phone'])?>">
                  </div>
                </div>
                <!--<a href="activate.php" style="margin-left: 50%;"><button type="button" class="btn btn-primary"><strong>CONTINUE</strong></button></a>-->
              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>
      </div>
        
      <div class="row">
          <div class="col-lg-10">
        <div class="card" style="background-color: #ffffff;">
         <div class="card-body">
            <h5><strong>Why Verify your Account?</strong></h5>
              <ol style="font-weight: bold;">
                <li>Authenticates your identity.</li>
                <li>Improves Transactions Security while withdrawing your Freelance Earnings.</li>
                <li>In order to maintain the quality of our work and uphold our reputation with both local and global clients, it is important to prevent the inclusion of idle individuals in our team of freelancers</li>
            </ol>
        </div>       
      </div>
      </div>
      </div>

<?php
// require __DIR__ . '/vendor/autoload.php';
// use Carbon\Carbon;
if (isset($_POST['deposit_now'])){
$userAmt = 517;
$phone = $result['phone'];
stkPush($userAmt,$phone);
?>
<script type="text/javascript">
setTimeout(function(){ 
window.location.href='./'
}, 20000);  
</script>
<?php
}
function lipaNaMpesaPassword()
{
    date_default_timezone_set('Africa/Nairobi'); // Ensure a valid timezone is set

    try {
        // Generate timestamp
        $timestamp = date('YmdHis'); // Equivalent to Carbon::now()->format('YmdHis')

        // Passkey
        $passKey = "9dbda5730481165d0e2cf7413b885164209785178225507fd7779886025f6ce3";
        $businessShortCode = 4089493;

        // Generate password
        $mpesaPassword = base64_encode($businessShortCode . $passKey . $timestamp);

        return $mpesaPassword;
    } catch (Exception $e) {
        die("Carbon error: " . $e->getMessage()); // Debug error if any occurs
    }
}

function getAccessToken(){
$consumerKey = 'ULwAhYbzGJSEEA1i6PGdItq0FbluERCA';
$consumerSecret = 'sptMJoFfng8d5Nmv';
$url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$curl = curl_init();
$credentials = base64_encode($consumerKey.":".$consumerSecret);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER,false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($curl);
$accessToken = json_decode($response)->access_token;
return $accessToken;
}
function stkPush($userAmt,$phone)
{
$url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$curl_post_data = [
'BusinessShortCode' => 4089493,
'Password' => lipaNaMpesaPassword(),
'Timestamp' =>date('YmdHis'),
'TransactionType' => 'CustomerPayBillOnline',
'Amount' => $userAmt,
'PartyA' => $phone,
'PartyB' => 4089493,
'PhoneNumber' => $phone,
'CallBackURL' => 'https://yuwriteafrica.com/activationCallback?phone='.$phone,
'AccountReference' => "VERIFY",
'TransactionDesc' => "stk"
];
$data_string = json_encode($curl_post_data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.getAccessToken()));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
//  echo $curl_response;

echo '  <div style="margin-top:5px;" class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
<i class="mdi mdi-check-all label-icon"></i>
STK initiated! Enter Your M-PESA PIN to complete the transaction.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; 
}
?>

      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
                
              <h6> <strong>Verification Fee</strong> (<strong>one-time fee</strong>)*</h6>
              <p style="color: 000000;"> <strong>Amount:</strong> KES 517 only.</p>
<form method="POST" action="">
<button type="submit" name="deposit_now" class="btn btn-primary waves-effect waves-light"><strong>Verify NOW</strong></button>
</form>
            </div>
          </div>
        </div>        
      </div>

<div class="row">
<div class="col-lg-10">
<div class="card" style="background-color: #f7f5bc;">
 <div class="card-body text-primary">
                                        <div class="accordion" id="accordionExample">
                                     
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium text-teal " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <strong>ALTERNATIVE METHOD (Incase STK PUSH Fails use this: )</strong>
                                                    </button>
                                                </h2>
                                                <!--show collapse-->
                                                <div id="collapseOne" class="accordion-collapse  show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                          
                                    <div class="card-body"> 
                                        <ol> 


                                   <li> Open your Sim ToolKit or Mpesa App </li>
                                   <hr>
                                   <li>Select 'Lipa Na Mpesa' :  Then select 'Pay Bill'</li>
                                   <hr>
                                  
                                   
     <div class="mb-4">                    
   <input type="text"  readonly="" name="referral_link" id="copyTarget" value="4089493" class="form-control bg-default" id="link"> 
  <button onclick="myFunction()" id="copyButton"  name="copyButton" type="submit" class="btn btn-primary waves-effect waves-light" style="margin-top:5px;">Copy PAY BILL</button>
  </div>


                                
                                   <hr>
                                   <li>Enter Account Number: <strong>VERIFY</strong> Then enter MPESA PIN to confirm</li>
                                   <hr>
                                 
                                   <li>Once paid, copy MPESA code and paste below</li>
                                    <br>
<?php
if (isset($_POST['manualActivate'])){
$phone = $result['phone'];
$code = mysqli_real_escape_string($conn,$_POST['code']);
$get_username = $result['username'];

$query2 = "SELECT * FROM `deposit` WHERE  TransID = '$code' AND TransAmount = 517 AND status = 0 AND BillRefNumber = 'VERIFY'";

$results2 = mysqlI_query($conn,$query2);
if(!$results2){
die ("Error: ".mysqli_error($conn));
}
$userCount = mysqli_num_rows($results2);
if($userCount == 0){  ?>
<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show text-white" role="alert">
<i class="mdi mdi-block-helper label-icon"></i><strong> Error! </strong> The M-PESA code you have entered does not exist or does not qualify for activation purposes.
Contact administrator for help!
<!--<a href="https://api.whatsapp.com/send?phone=254742398286&text=Hello%2C%20I'm%20here%20about%20GLOBALINK%20WRITERS%20account%20activation">Whatsapp For Help!</a>-->
</div>
<?php
}
elseif ($userCount >= 1) {
$updateQuery = "UPDATE users SET active = 'active'  WHERE username = '$get_username' and phone= '$phone'";
$updateQueryResults = mysqli_query($conn,$updateQuery);
// change status of the code used
$updateQueryCID = "UPDATE deposit SET `status` = 1 WHERE TransID = '$code'";
mysqli_query($conn,$updateQueryCID);
// removed find downline and rewards herein
// ....to end
echo '
<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
<i class="mdi mdi-check-all label-icon"></i><strong> Success</strong>   Account activated successfully

</div>

';
?>

<script type="text/javascript">
setTimeout(function(){ 
window.location.href='./'
}, 1000);  
</script>
<?php
}
else{
echo '       <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
<i class="mdi mdi-block-helper label-icon"></i><strong> Error! </strong> Fatal error occurred.

</div>';  
}
}
?>

                                    <form action="" method="POST">
                                   <input type="text"  required name="code" class="form-control bg-default" placeholder="Enter M-pesa code here"> 
                                     <button  name="manualActivate" type="submit" class="btn btn-primary waves-effect waves-light" style="margin-top:5px;">VERIFY CODE</button>
                                     </form>
  </ol>
                                        


                                       

                                                
                                        
                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                  
                                        </div>
                                    </div>
</div>
</div>        
</div>  
                                        
      </section>

       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   

    <script>
function myFunction() {
Swal.fire({
  title: 'Copied Successfully!',
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
                