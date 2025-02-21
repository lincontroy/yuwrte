<?php
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";


// business
// editing
// seo
// academic
// article

$type = $_GET['type'];
if(!isset($_GET['type'])){
?>
<script type="text/javascript">
setTimeout(function(){ 
window.location.href='./index'
}, 500);   
</script>
<?php
}
?> 



?> 
<main id="main" class="main" style="background-color: #ffffff;">
<div class="pagetitle">
    <h1 class="card-title"> <strong>
              <!--<i class="ri-edit-circle-fill"></i>-->
              AVAILABLE JOBS</strong></h1>
      <h6><strong><?php echo strtoupper($type) ?> WRITING</strong></h6>
      <p>Explore your new jobs here</p>
                                        <?php  
if(isset($_POST['getJob'])){
$get_task_id = mysqli_real_escape_string($conn,$_POST['get_task_id']);
$date =  date('d/m/Y') ;
$hour =  date('H') ;
$rand = rand(3, 6); 
$reviewHr = $hour + $rand;
if($reviewHr > 23){
   $reviewHr = 1; 
}
$createdAt=  date('d/m/Y H:i:s');
$userNAME = $result['username'];
$check_tasks = "SELECT * FROM `assignedWork` where username = '$userNAME' and dateAssigned = '$date' ";
$check_tasks_result = mysqli_query($conn,$check_tasks);
if(mysqli_num_rows($check_tasks_result) > 0){
echo '<div class="countdown green margin-bottom-10">
<div style="margin-top:10px; font-size:15px;" class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
1 bid per day!
</div>
</div>';
?>
<script type="text/javascript">
setTimeout(function(){ 
window.location.href='./offered-jobs'
}, 3000);   
</script>
<?php
}
else{
$assignJob= "INSERT INTO `assignedWork`(`username`, `taskAssigned`, `dateAssigned`, `bidHr` , `reviewHr` ,`createdAt`) VALUES ('$userNAME','$get_task_id', '$date', '$hour', '$reviewHr',  '$createdAt') ";
mysqli_query($conn,$assignJob); 
echo '<div class="countdown green margin-bottom-10">
<div style="margin-top:10px; font-size:15px;" class="alert alert-success alert-dismissible fade show mb-2" role="alert">
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
Bidded successfully. Kindly await bid approval.
</div>
</div>';
?>
<script type="text/javascript">
setTimeout(function(){ 
window.location.href='./offered-jobs'
}, 3000);   
</script>
<?php
}
}
?>


    </div><!-- End Page Title -->
 <?php
       $usersemailinDbQuery = "SELECT * FROM `questions` WHERE `type` = '{$type}'  ORDER BY `questions`.`date` DESC ";
          $usersemailinDbQueryResult = mysqli_query($conn,$usersemailinDbQuery);
         // echo mysqli_num_rows($usersemailinDbQueryResult);
          if(mysqli_num_rows($usersemailinDbQueryResult)<0){
         echo         ' 
                                
                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <strong>Error</strong> - No '.$type.' work found
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        ';
          }
          else{
           foreach($usersemailinDbQueryResult as $usersemailinDbQueryResulttt){
      ?>  

<form method="post" action="">
<?php
$real_task_id = $usersemailinDbQueryResulttt['id'] ;
$real_username = $result['username'] ;
$check_if_taken = "SELECT * FROM `assignedWork` where taskAssigned = '$real_task_id' AND username = '$real_username'";
$run_check_if_taken = mysqli_query($conn,$check_if_taken);
if(!$run_check_if_taken){
die ("Error: ".mysqli_error($conn));
}
$nowCount = mysqli_num_rows($run_check_if_taken);
if($nowCount > 0){

echo '<div class="row" style="display:none;"> ';
}
else{
echo '<div class="row"> ';
}
?>
<div class="card col-lg-8">
  <div class="card-body">
   <p style="font-weight: bold;"><?php echo $usersemailinDbQueryResulttt['context']; ?></p> 
   <span>FIELD: <?php echo strtoupper($usersemailinDbQueryResulttt['field']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
   <span>KSH <?php echo number_format($usersemailinDbQueryResulttt['amount']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
   <span>  DUE: <?php echo $usersemailinDbQueryResulttt['due']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
   <span>JOB ID: <?php echo $usersemailinDbQueryResulttt['id']; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
   <!--<i class="ri-skip-forward-line"></i>-->
  </div>
  <input type="hidden" value="<?php echo $usersemailinDbQueryResulttt['id']; ?>" name="get_task_id">
  <input type="submit" name="getJob" value="GET JOB">
</div>
</div>

<hr>
</form>
<?php
}
}
?>
    </main>
    
    
<?php
include_once 'includes/footer.php';
                ?>