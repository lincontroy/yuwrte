<?php
ob_start();
include "db/dbconn.php";
session_start();

if(isset($_SESSION['email'])){
?>
<script type="text/javascript">
setTimeout(function(){ 
window.location.href='pages/'
}, 1000);   
</script>
<?php
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
      if(isset($_POST['login_now'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if (empty($username) ||empty($password)){
          echo "<div class='alert alert-warning' role='alert'>
            Please fill all the fields
            </div>";
        }
        
        
        $query = "SELECT * FROM `users` WHERE `username` = '$username' || `email` = '$username'  AND `password` = '$password'";
        $results = mysqlI_query($conn,$query);
        if(!$results){
          die ("Error: ".mysqli_error($conn));
        }
          $userCount = mysqli_num_rows($results);
          //echo $userCount;
          if($userCount == 0){
            echo         '
                                
                                   <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert" style="color: green;">
                                            <strong>Error</strong> -  Incorrect details. Either your password or email is incorrect.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        
                                        ';
            ?>
      <?php
         }else{
           foreach($results as $user){
             $dbUserName = $user['username'];
             if ($password == $user['password']) {
$dbEmail = $user['email'];

$_SESSION['email'] = $dbEmail;
echo         ' 
<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert" style="color: green;">
<strong>Success!</strong> - Login  successful...welcome!.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';

?>
<script type="text/javascript">
setTimeout(function(){ 
window.location.href='pages/'
}, 1000);   
</script>
<?php

             } else {
             echo         ' 
                                
                                 <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert" style="color: green;">
                                          <strong>Error!</strong> - Invalid Password or Email .
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        
                                        ';
             }

           }

          }
        }
       ?>
				<form action="" method="POST" class="login100-form validate-form">
					<a href="index.php"><h1 class="login100-form-title p-b-43" style="font-weight: bold;"> 
						LOGIN HERE
					</h1>
					</a>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required">
						<input class="input100" type="username" name="username" id="username">
						<span class="focus-input100"></span>
						<span class="label-input100"><strong>Email/Username</strong></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100"><strong>Password</strong></span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">

						<!--<div>-->
						<!--	<a href="#" class="txt1">-->
						<!--		Forgot Password?-->
						<!--	</a>-->
						<!--</div>-->
					</div>
			

					<div class="container-login100-form-btn">
						<button name="login_now" type="submit" id="login" type="button" class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
					    Don't have an account? 
						<a href="register.php" ><span class="txt2" style="color: blue;">
						<strong>CREATE ACCOUNT</strong>
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