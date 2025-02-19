<?php  
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";
?>


<div class="main-content">
        
        <div class="page-content">
            <div class="container-fluid">

          <div class="card card-plain mb-0 bg-primary">
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
                <div class="row">


        
                            <div class="card-header bg-success">
                                <h5 class="card-title">Active Users' Details</h5>
                            </div>
                 
                    <?php
                        if(isset($_POST['updateBALbtn'])){
        $get_table_id=  mysqli_real_escape_string($conn, $_POST['table_id']);
        $get_newBALamount=  mysqli_real_escape_string($conn, $_POST['newBALamount']);
          $get_tableusername=  mysqli_real_escape_string($conn, $_POST['table_username']);
             $newRefAmount =  mysqli_real_escape_string($conn, $_POST['newRefAmount']);
            $newPhone    =  mysqli_real_escape_string($conn, $_POST['newPhone']);

    
$countID = "SELECT * FROM users WHERE id = '$get_table_id' ";
$orderID = $conn->query($countID);
$countActiveID = $orderID->num_rows;
if($countActiveID >= 1){
			// affects users table
  $updateQueryID = "UPDATE users SET balance = '$get_newBALamount' , ref_bal = '$newRefAmount', phone = '$newPhone' WHERE id = '$get_table_id'";
  mysqli_query($conn,$updateQueryID);	
    	         echo ' 
                                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> <strong>Balance updated successfully</strong> </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ';
}
else{
    	         echo ' 
                                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"> <strong>Error..</strong> </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ';
}
}
?>


                          <div class="table-responsive mb-0" data-bs-pattern="priority-columns">
                                    <table  id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr class="text-teal">
                                                <!--<th></th>-->
                                                <th>ID</th>
                                                <th>Username</th>
                                                 <th>Mobile</th>
                                                   <th>Balances</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
               <?php
                    $pendingUsers = "SELECT * FROM `users` where active = 'active' ";
                    $pendingUsersResults = mysqli_query($conn,$pendingUsers);
                    if(!$pendingUsersResults){
                      die("Error: ".mysqli_error($conn));
                    }
                    if(mysqli_num_rows($pendingUsersResults) == 0){
                      echo "<td> user data not available </td>";
                    }else{
                    foreach ($pendingUsersResults as $pendingUsersResultsss) {
                      ?>
                                          <tr>
											<!--<td><img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""></td>-->
                                                <td><?php echo $pendingUsersResultsss['id'] ?></td>
                                                <td><?php echo $pendingUsersResultsss['username'] ?></td>
												<td><?php echo $pendingUsersResultsss['phone'] ?></td>
												   <td>KSH <?php echo number_format(!is_null($value) ? $value : 0); ?></td>
                                                  <td><span class="btn btn-rounded btn-success" style="margin-top:-8px;"><?php echo ucfirst($pendingUsersResultsss['active']) ?></span></td>
                                                <td>
													<div class="d-flex">
		<a value="<?php 
		echo $pendingUsersResultsss['id']; 
		?>" name="edit_balances" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" style="margin-top:-8px;" data-bs-target="#exampleModalCenterBal<?php echo $pendingUsersResultsss['id'];?>"><i class="fas fa-edit"></i></a>
													</div>
												</td>
                                            </tr>
                                            
                            
                                            
                                            
                                                                                        <div class="modal fade" id="exampleModalCenterBal<?php echo $pendingUsersResultsss['id'];  ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit User Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form method="POST" action="" class="d-flex align-items-center">
                                                <div class="modal-body">
                                                     <div class="mb-3 mb-2">
                                                        <label class="sr-only"> ID</label>
                                                        <input type="hidden"  name="table_id"  class="form-control" autocomplete="NO" placeholder = "Enter table id " value="<?php echo $pendingUsersResultsss['id']; ?>">
                                                    </div>
                                                    
                                                    <?php
                    $get_id =  $pendingUsersResultsss['id'];
                    $pendingUsers = "SELECT * FROM `users` where id = '$get_id' ";
                    $pendingUsersResults = mysqli_query($conn,$pendingUsers);
                                                    ?>
                                                          <div class="mb-3 mb-2">
                                                        <label class="sr-only"> ID</label>
                                                        <input type="text" readonly="" name="table_id" required ="" class="form-control" autocomplete="NO" placeholder = "User id " value="<?php echo $pendingUsersResultsss['id']; ?>">
                                                    </div>
                                                    
                                                          <div class="mb-3 mb-2">
                                                        <label class="sr-only"> Username</label>
                                                        <input type="text" readonly=""  name="table_username" required="" class="form-control" autocomplete="NO" placeholder = "Username" value="<?php echo $pendingUsersResultsss['username']; ?>">
                                                    </div>
                                                  
                                                                                                        <div class="mb-3 mb-2">
                                                        <label class=""> New Balance</label>
                                                        <input type="text" name="newBALamount"  required="" class="form-control" value="<?php echo $pendingUsersResultsss['balance']; ?>" autocomplete="NO" placeholder="Enter New Amount">
                                                    </div>
                                                    
                                                         <div class="mb-3 mb-2">
                                                        <label class=""> New Ref Balance </label>
                                                        <input type="text" name="newRefAmount"  required="" class="form-control" value="<?php echo $pendingUsersResultsss['ref_bal']; ?>"  autocomplete="NO" placeholder="Enter New Ref Amount">
                                                    </div>
                                                 
                                                    
                                                         <div class="mb-3 mb-2">
                                                        <label class=""> New Phone Number</label>
                                                        <input type="text" name="newPhone"  required="" class="form-control" value="<?php echo $pendingUsersResultsss['phone']; ?>" autocomplete="NO" placeholder="Enter new Phone number">
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="updateBALbtn" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                         <?php
                    }
                    }
                                         ?>
                                        </tbody>
                                    </table>
                                </div>
                           
                   
                 



</div>
</div>
</div>
</div>


<!-- footer here -->


<!-- footer here -->
<?php 
include_once 'includes/footer.php';
?>