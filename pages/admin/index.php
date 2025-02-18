<?php  
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";
?>


<div class="main-content">
        
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">



          <div class="card card-plain mb-2 bg-primary ">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
              <h4 class="font-weight-bolder mb-0">Welcome Admin <?php echo strtoupper($result['username']) ?> !</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>

  

            <div class="col-md-4 mt-md-0 mt-0">
                <a href="active_users.php">
              <div class="card">
                <div class="card-body text-center">
                  <h3 class="text-gradient text-primary"><span id="status1">
                  	                          <?php  
                                         
                                        $uplines = "SELECT * FROM `users` WHERE `active` = 'active' ";
                                        $user_result = mysqli_query($conn,$uplines);
                                        if(!$user_result){
                                             die("error: ".mysqli_error($conn));
                                        }else{
                                             if(mysqli_num_rows($user_result) > 0){
                                              echo mysqli_num_rows($user_result);
}
else{
  echo "0";
}
}

              ?>
                  </span> <span class="text-lg ms-n2"></span></h3>
                  <h6 class="mb-0 font-weight-bolder" style=" color:blue; text-decoration:underline;">Active Users </h6>
                </div>
              </div>
                          </a>
            </div>



            

            <div class="col-md-4 mt-md-0 mt-0">
                           <a href="inactive_users.php"> 
              <div class="card">
                <div class="card-body text-center">
                  <h3 class="text-gradient text-primary"> <span id="status2" >                       
                                       <?php  
                                        $uplines = "SELECT * FROM `users` WHERE `active` = 'inactive' ";
                                        $user_result = mysqli_query($conn,$uplines);
                                        if(!$user_result){
                                             die("error: ".mysqli_error($conn));
                                        }else{
                                             if(mysqli_num_rows($user_result) > 0){
                                              echo mysqli_num_rows($user_result);
}
else{
  echo "0";
}
}
              ?></span> </h3>
                  <h6 class="mb-0 font-weight-bolder" style="color:red; text-decoration:underline;">Inactive Users </h6>
                </div>
              </div>
               </a>
            </div>
           
            
        <div class="col-md-4 mt-md-0 mt-0">
              <div class="card">
                <div class="card-body text-center">
                  <h3 class="text-gradient text-primary"><span id="status3" >
                  	                          <?php  
                $addup = 0;
                $username = $result['username'];
                $depoHist = "SELECT * FROM `deposits` WHERE `status` =0 ";
                $depoHistResults = mysqli_query($conn,$depoHist);
                if(!$depoHistResults){
                  die("Error: ".mysqli_error($conn));
                }
                foreach ($depoHistResults as $depoHistResult) {
                  // code...
                  $addup = $addup + $depoHistResult["expected_amount"];
                }
                echo "Ksh " . number_format($addup);

              ?>

                  </span> </h3>
                  <h6 class="mb-0 font-weight-bolder">Total Money In</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-md-0 mt-0">
              <div class="card">
                <div class="card-body text-center">
                  <h3 class="text-gradient text-primary"><span id="status4">    
                //   <?php
                // $addup2 = 0;
                // $addup3 = 0;
                // $username = $result['username'];
                // $UnuseDepo = 'SELECT * FROM `deposit` WHERE BillRefNumber ="" AND status = 0 ';
                // $UnuseDepoResults = mysqli_query($conn,$UnuseDepo);
                // if(!$UnuseDepoResults){
                //   die("Error: ".mysqli_error($conn));
                // }
                // foreach ($UnuseDepoResults as $UnuseDepoResults2) {
                //   // code...
                //   $addup2 = $addup2 + $UnuseDepoResults2["TransAmount"];
                //   $addup3 = $addup2;
                // }
                // echo "Ksh " . number_format($addup3);
                //  ?>
                    </span> </h3>
                  <h6 class="mb-0 font-weight-bolder">Total Profits Made</h6>
                </div>
              </div>
            </div>               


        <div class="col-md-4 mt-md-0 mt-0">
              <div class="card">
                <div class="card-body text-center">
                  <h3 class="text-gradient text-primary"><span id="status4">                                 
                  <?php
                $addup = 0;
                $username = $result['username'];
                $depoHist = "SELECT * FROM `users` where 'active' = 'active' ";
                $depoHistResults = mysqli_query($conn,$depoHist);
                if(!$depoHistResults){
                  die("Error: ".mysqli_error($conn));
                }
                foreach ($depoHistResults as $depoHistResult) {
                  // code...
                  $addup = $addup + $depoHistResult["b2c"];
                }
                echo "Ksh " . number_format($addup);
?> </span> </h3>
                  <h6 class="mb-0 font-weight-bolder">Total Withdrawals Made</h6>
                </div>
              </div>
            </div>

     
     


<!-- change password -->
          <div class="card card-plain mb-2 bg-success">
            <div class="card-body p-0">
            	<hr>
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <h5 class="font-weight-bolder mb-0">Change Password</h5>
                  </div>

                </div>
              </div>
              <hr>
            </div>
          </div>
          
<?php
			if(isset($_POST['change_pass'])){
    $change_username44 = mysqli_real_escape_string($conn, $_POST['username']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['password']);
           $hashfomat = "$2y$10$";
           $salt = "iusesomecrazystrings22";
           $hash_salt = $hashfomat.$salt;
           $password = crypt($new_pass,$hash_salt);
    
$countPass = "SELECT * FROM users WHERE username = '$change_username44' ";
$orderPass = $conn->query($countPass);
$countActivePass = $orderPass->num_rows;
if($countActivePass >= 1){
			// affects users table
  $updateQuery = "UPDATE users SET password = '$password' WHERE username = '$change_username44'";
  mysqli_query($conn,$updateQuery);	
  	         echo ' 
                                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> <strong>Password updated successfully</strong> </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ';
}
else{
		         echo ' 
                                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"> <strong>Error</strong> </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ';
}
}
?>	

<form action="" method="POST">          
        <div class="form-group mb-2">
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" required="" class="form-control" placeholder="Username" name="username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
</div>
          <div class="form-group mb-2">
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">**</span>
        <input type="text" required="" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
    </div>
</div>

    <button type="submit" name="change_pass" class="btn btn-info mb-3">Change Password</button>
</form>
          
    

<!-- activate / deactaivate -->
          <div class="card card-plain mb-2 bg-success">
            <div class="card-body p-0">
            	<hr>
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <h5 class="font-weight-bolder mb-0">Activate User</h5>
                  </div>

                </div>
              </div>
              <hr>
            </div>
          </div>
          
          	<?php
			if(isset($_POST['block_user_btn'])){
    $block_username = mysqli_real_escape_string($conn, $_POST['username']);
      $block_radio = mysqli_real_escape_string($conn, $_POST['block_radio']);
if($block_radio == 'inactive'){
 $updateQuery = "UPDATE users SET active= 'inactive' WHERE username = '$block_username'";
              $updateQueryResults = mysqli_query($conn,$updateQuery);
	         echo ' 
                                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> <strong>User blocked successfully</strong> </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ';
}
elseif ($block_radio == 'active') {
	 $updateQuery = "UPDATE users SET active = 'active' WHERE username = '$block_username'";
              $updateQueryResults = mysqli_query($conn,$updateQuery);
              	         echo ' 
                                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> <strong>User activated successfully</strong> </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ';
}
			}
				?>
				
          <form action="" method="POST">                  <div class="form-group">
    <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" required="" name="username" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
</div>
<div class="form-check mb-2">
  <input required="" class="form-check-input" type="radio" value="active" name="block_radio" id="customRadio1">
  <label class="custom-control-label" for="customRadio1">ACTIVATE</label>
</div>
<div class="form-check mb-2">
  <input required="" class="form-check-input" type="radio" value="inactive" name="block_radio" id="customRadio2">
  <label class="custom-control-label" for="customRadio2">DEACTIVATE ACCOUNT</label>
</div>
    <button type="submit" name="block_user_btn" class="btn btn-info mb-3">Deactivate/Activate Now</button>
</form>
                 


      <!-- settle payments -->
          <div class="card card-plain mb-2 bg-success">
            <div class="card-body p-0">
            	<hr>
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <h5 class="font-weight-bolder mb-0">Manage Withdrawals</h5>
                  </div>

                </div>
              </div>
              <hr>
            </div>
          </div>         
          
             <?php
if(isset($_POST['set_paid_submit'])){
    $id_pressed = mysqli_real_escape_string($conn, $_POST['get_id']);
    // $real_userId = mysqli_real_escape_string($conn, $_POST['get_real_userId']);
    $amount_affected = mysqli_real_escape_string($conn, $_POST['get_amount']);
    $get_username = mysqli_real_escape_string($conn, $_POST['get_username']);
//update withdrawals table 
$withdrawalsUpdates= "UPDATE b2c SET status = 1  WHERE id = '$id_pressed' && amount = '$amount_affected' ";
$resultQuery = mysqli_query($conn,$withdrawalsUpdates);
	         echo ' 
                                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> <strong>User info updated successfully</strong> </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ';
}
         ?>
         
          
                                      <div class="card-body">
                                <div class="table-responsive recentOrderTable">
                                    <table class="table verticle-middle table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Amount</th>
                                                 <th scope="col">Phone</th>
                                                   <th scope="col">M-PESA Code</th>
                                                       <th>Type</th>
                                                   <th scope="col">Status</th>
                                                      <!--<th scope="col">Receiver's Name</th>-->
                                                         <th scope="col">Date</th>
                                                    <!--<th scope="col">Description</th>-->
                                                       <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                  <?php
                    $pendingWithdraw = "SELECT * FROM `b2c`";
                    $pendingWithdrawResults = mysqli_query($conn,$pendingWithdraw);
                    if(!$pendingWithdrawResults){
                      die("Error: ".mysqli_error($conn));
                    }
                    if(mysqli_num_rows($pendingWithdrawResults) == 0){
                      echo "<p> no  Withdrawals made available </p>";
                    }else{
                    foreach ($pendingWithdrawResults as $pendingWithdrawResult) {
                      ?>
                                  <tr>
                                                <td><?php echo $pendingWithdrawResult['id'] ?> </td>
                                                <td><?php echo $pendingWithdrawResult['username'] ?></td>
                                                <td> Ksh <?php echo $pendingWithdrawResult['amount'] ?></td>
                                                <td><?php echo $pendingWithdrawResult['phone'] ?></td>
                                                   <td><?php echo $pendingWithdrawResult['trx_id'] ?></td>
                                                       <td><?php echo $pendingWithdrawResult['type'] ?></td>
                                                <?php
                                                if($pendingWithdrawResult['status'] == 0 ){ ?>
                                           <td><span class="btn btn-rounded btn-danger">Pending</span></td>
                                           <?php
                                                }
                                                else{ ?>
         <td><span class="btn btn-rounded btn-success">Completed</span></td>
                                                    <?php
                                                }
                                                ?>
                                                   <!--<td><?php // echo $pendingWithdrawResult['receiver_name']?></td>-->
                                                      <td><?php echo $pendingWithdrawResult['date']?></td>
                                                   <!--<td><?php // echo $pendingWithdrawResult['description']?></td>-->
                                                   
                                                <td>
                                                    <div class="dropdown custom-dropdown mb-0">
                                                        <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="12" cy="5" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="12" cy="19" r="2"/></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form method="POST" action="">
                                <input type="hidden" name="get_amount" value="<?php  echo $pendingWithdrawResult['amount']; ?>">
                                <input type="hidden" name="get_username" value="<?php  echo $pendingWithdrawResult['username']; ?>">
                                <input type="hidden" name="get_id" value="<?php  echo $pendingWithdrawResult['id']; ?>">
                                <!--<input type="hidden" name="get_real_userId" value="<?php // echo $pendingWithdrawResult['id']; ?>">-->
 <button name="set_paid_submit"  class="dropdown-item text-danger">PAID</button>
                     </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                                
                                            </tr>

                                                          <?php
                    }
                    }
         ?>
         
         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end of withdrawals table-->
                            
                            
                            
                   



</div>
</div>
</div>
</div>


<!-- footer here -->


<!-- footer here -->
<?php 
include_once 'includes/footer.php';
?>