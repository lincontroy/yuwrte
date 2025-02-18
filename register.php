<?php
ob_start();
include "db/dbconn.php";
session_start();

if(isset($_GET['upline'])){
$_GET['upline'];
  $uplineU_name =mysqli_real_escape_string($conn,$_GET['upline']);
  $query = "SELECT * FROM `users` WHERE `id`='$uplineU_name'";
  $results= mysqlI_query($conn,$query);
  if(!$results){
    die("Seek referral link  ~ by CEO ".mysqli_error($conn));
  }
  foreach ($results as $result) {
    $_SESSION ['user'] = $result;
  }
$get_clicks = $result['link_clicks'];
$add_clicks = $get_clicks + 1;
   $addClicks = "UPDATE `users` SET `link_clicks`='$add_clicks' WHERE `id` = '$uplineU_name'";
    mysqli_query($conn,$addClicks);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>YUWRITE AFRICA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link href="assets/img/favicon.png" rel="icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #ffffff;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?php
    if(isset($_POST['register_now'])){
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password =mysqli_real_escape_string($conn,$_POST['password']);
        $old_phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $trimmed = substr($old_phone, 1); 
        $phone = "254".$trimmed;
        $php_date=  date('d/m/Y H:i:s');
    

        
        if(empty($username)||empty($email)||empty($password)||empty($phone) ||empty($fname) ||empty($lname) ){ 
                        echo         ' 
                                
                                  <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                          <strong>Error</strong> -  All fields must be filled.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        
                                        ';
                            }else{

        $usersU_nameinDbQuery = "SELECT * FROM `users` WHERE `username` = '$username'";
        $usersU_nameinDbQueryResult = mysqli_query($conn,$usersU_nameinDbQuery);
       // echo mysqli_num_rows($usersU_nameinDbQueryResult);
          if(mysqli_num_rows($usersU_nameinDbQueryResult)>0){
     

                  echo         ' 
                                
                                 <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                         <strong>Error</strong> - Username already exists.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        
                                        ';


          }
          $usersemailinDbQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
          $usersemailinDbQueryResult = mysqli_query($conn,$usersemailinDbQuery);
         // echo mysqli_num_rows($usersemailinDbQueryResult);
          if(mysqli_num_rows($usersemailinDbQueryResult)>0){
         echo         ' 
                                
                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <strong>Error</strong> -  Email already in use.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        ';
          }
          $usersPhoneinDbQuery = "SELECT * FROM `users` WHERE `phone` = '$phone'";
          $usersPhoneinDbQueryResult = mysqli_query($conn,$usersPhoneinDbQuery);
         // echo mysqli_num_rows($usersPhoneinDbQueryResult);
          if(mysqli_num_rows($usersPhoneinDbQueryResult)>0){
      echo         ' 
                                
                                  <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                          <strong>Error</strong> -  Phone number already taken.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        ';
          }
   if((mysqli_num_rows($usersU_nameinDbQueryResult) ==0)&&(mysqli_num_rows($usersemailinDbQueryResult)==0)&&(mysqli_num_rows($usersPhoneinDbQueryResult)==0)){
            
           if(isset($_GET['upline'])){
             $uplineU_name =mysqli_real_escape_string($conn,$_GET['upline']);
             $uplineUserQuery = "SELECT * FROM `users` WHERE `id`='$uplineU_name'";
             $uplineUserResults = mysqli_query($conn,$uplineUserQuery);
             if(!$uplineUserResults){
               die("Error ".mysqli_error($conn));
             }
             $userLength = mysqli_num_rows($uplineUserResults);
             if($userLength == 0 ){
        echo '  
              
               <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <strong>Error</strong> - Invalid invitation link!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        
                                        ';
             }else{
             foreach($uplineUserResults as $upline_u){
             $uplineEmail = $upline_u['email'];
              $uplineId = $upline_u['id'];
            //  echo $uplineEmail;
            //  echo "123 <br>";
             $referalQuery="INSERT INTO `referals`(`upline_id`, `upline_email`, `downline_email`) VALUES ('$uplineId','$uplineEmail','$email')";
             $referalResults = mysqli_query($conn,$referalQuery);
             if(! $referalResults){
               die(mysqli_error($conn));
             }
           }
           //query
           $query = "INSERT INTO `users`(`firstname`, `lastname`,`username`,`phone`, `email`, `password`, `date`) VALUES ('$fname','$lname','$username','$phone','$email','$password','$php_date' )";
           $result = mysqli_query($conn,$query);
           if(!$result){
            die("error:" .mysqli_error($conn));
           }else{
              $_SESSION['email'] = $email;
              
                  echo         ' 
                                
                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <strong>Success</strong> Welcome on board Account created successful...re-directing
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        ';
                                
                                ?>
                                <script type="text/javascript">
        setTimeout(function(){ 
       window.location.href='./pages'
      }, 1000);  
</script>
                                <?php
       }
        }
       
   }
   else{
                 //query
           $query = "INSERT INTO `users`(`firstname`, `lastname`,`username`,`phone`, `email`, `password`, `date`) VALUES ('$fname','$lname','$username','$phone','$email','$password','$php_date' )";
           $result = mysqli_query($conn,$query);
           if(!$result){
            die("error:" .mysqli_error($conn));
           }else{
               $uplineId = 3;
               $uplineEmail = "system@gmail.com";
            $referalQuery2="INSERT INTO `referals`(`upline_id`, `upline_email`, `downline_email`) VALUES ('$uplineId','$uplineEmail','$email')";
            mysqli_query($conn,$referalQuery2);
             
              $_SESSION['email'] = $email;
                  echo         ' 
                  <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                         <strong>Success</strong>  Welcome on board Account created successful...re-directing
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        ';
                                
                                ?>
                                <script type="text/javascript">
        setTimeout(function(){ 
       window.location.href='./pages'
      }, 1000);  
</script>
                                <?php
       }
   }
   
   
   }
                            }
 }
?>
				<form action="" method="post"  class="login100-form validate-form">
					<a href="index.php"><h1 class="login100-form-title p-b-43" style="font-weight: bold;"> 
						CREATE ACCOUNT
					</h1>
					</a>

					<div class="wrap-input100 validate-input" data-validate = "Valid fisrtname is required">
						<input class="input100" type="text" name="fname" id="fname">
						<span class="focus-input100"></span>
						<span class="label-input100"><strong>Firstname</strong></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid lastname is required">
						<input class="input100" type="text" name="lname" id="lname">
						<span class="focus-input100"></span>
						<span class="label-input100"><strong>Lastname</strong></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid usernmae is required">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100"></span>
						<span class="label-input100"><strong>Username</strong></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required">
						<input class="input100" type="text" name="email" id="email">
						<span class="focus-input100"></span>
						<span class="label-input100"><strong>Email</strong></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid phonenumber is required">
						<input class="input100" type="text" name="phone" id="phone" inputmode="numeric" minlength="10" maxlength="10">
						<span class="focus-input100"></span>
						<span class="label-input100"><strong>Phone Number 0712... or 01...</strong></span>
					</div>				
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100"><strong>Password</strong></span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">

					</div>
			
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="register_now" id="submit">
							REGISTER FREELANCER
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
					    Already have an account?
						<a href="login.php" ><span class="txt2" style="color: blue;">
							<strong>LOGIN HERE</strong>
						</span>
					</a>
					</div>
					
				</form>

				<div class="login100-more" style="background-image: url('images/bg.jpeg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>