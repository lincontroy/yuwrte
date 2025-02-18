<?php
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";
?>

<main id="main" class="main" style="background-color: #ffffff;">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">home</a></li>
          <li class="breadcrumb-item">pages</li>
          <li class="breadcrumb-item active">offered jobs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section>
    <div class="row">
        <div class="col-lg-10">
            <div class="card" style="background-color: lightblue;">
            <div class="card-body">
              <!--<h5 class="card-title">Pills Tabs</h5>-->

              <!-- Pills Tabs -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="true">Pending Orders</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-open-tab" data-bs-toggle="pill" data-bs-target="#pills-open" type="button" role="tab" aria-controls="pills-open" aria-selected="false">Open Jobs</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-closed-tab" data-bs-toggle="pill" data-bs-target="#pills-closed" type="button" role="tab" aria-controls="pills-closed" aria-selected="false">Closed Jobs</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                  
                <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pending-tab">
 

<?php
$date_today =  date('Y-m-d');
$username =$result['username'];
// status 0  pending
$trans = "SELECT * FROM `assignedWork` where username = '$username' AND status = 0";
$transRes = mysqli_query($conn,$trans);
if(!$transRes){
die("Error:".mysqli_error($conn));
}
if(mysqli_num_rows($transRes) == '0'){
?>
<div class="countdown green margin-bottom-10">
<div style="margin-top:10px; font-size:15px;" class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
No pending bid!
</div>
</div>
<?php
}
else{
foreach ($transRes as $transRe) {
$id=  $transRe['taskAssigned'];
$quiz_query = "SELECT * FROM `questions` where id = '$id'";
$quiz_query_exec = mysqli_query($conn,$quiz_query);
if(!$quiz_query_exec){
die("Error:".mysqli_error($conn));
}
foreach ($quiz_query_exec as $quiz_query_exec_now) {
?>
<div class="row"> 
<div class="card col-lg-8">
<div class="card-body">
<p style="font-weight: bold;"><?php echo $quiz_query_exec_now['context'] ?></p>   <!--context -->
<span>FIELD: <?php echo $quiz_query_exec_now['field'] ?> </span>&nbsp;&nbsp;&nbsp;&nbsp;   <!--field -->
<span>KSH <?php echo $quiz_query_exec_now['amount'] ?> </span>&nbsp;&nbsp;&nbsp;&nbsp;      <!--ksh -->
<span>DUE:  <?php echo $quiz_query_exec_now['due'] ?>  </span>&nbsp;&nbsp;&nbsp;&nbsp;     <!--due -->
<span> STATUS: PENDING</span> &nbsp;&nbsp;&nbsp;&nbsp;       <!--status: pending order -->
<!--< class="ri-skip-forward-line"></i>-->
</div>
</div>
</div>
<?php
}
}
}
?>
                    
                 </div>
                <div class="tab-pane fade" id="pills-open" role="tabpanel" aria-labelledby="open-tab">
 
 <?php
$date_today =  date('Y-m-d');
$username =$result['username'];
// status 2  pending
$trans = "SELECT * FROM `assignedWork` where username = '$username' AND status = 2";
$transRes = mysqli_query($conn,$trans);
if(!$transRes){
die("Error:".mysqli_error($conn));
}
if(mysqli_num_rows($transRes) == '0'){
?>
<div class="countdown green margin-bottom-10">
<div style="margin-top:10px; font-size:15px;" class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
No accepted bid!
</div>
</div>
<?php
}
else{
foreach ($transRes as $transRe) {
$id=  $transRe['taskAssigned'];
$quiz_query = "SELECT * FROM `questions` where id = '$id'";
$quiz_query_exec = mysqli_query($conn,$quiz_query);
if(!$quiz_query_exec){
die("Error:".mysqli_error($conn));
}
foreach ($quiz_query_exec as $quiz_query_exec_now) {
?>
<div class="row"> 
<div class="card col-lg-8">
<div class="card-body">
<p style="font-weight: bold;"><?php echo $quiz_query_exec_now['context'] ?></p>   <!--context -->
<span>FIELD: <?php echo $quiz_query_exec_now['field'] ?> </span>&nbsp;&nbsp;&nbsp;&nbsp;   <!--field -->
<span>KSH <?php echo $quiz_query_exec_now['amount'] ?> </span>&nbsp;&nbsp;&nbsp;&nbsp;      <!--ksh -->
<span>DUE:  <?php echo $quiz_query_exec_now['due'] ?>  </span>&nbsp;&nbsp;&nbsp;&nbsp;     <!--due -->
<span> STATUS: ACCEPTED</span> &nbsp;&nbsp;&nbsp;&nbsp;       <!--status: pending order -->
<!--< class="ri-skip-forward-line"></i>-->
</div>
</div>
</div>
<?php
}
}
}
?>
                    
                  
                </div>
                <div class="tab-pane fade" id="pills-closed" role="tabpanel" aria-labelledby="closed-tab">
 <?php
$date_today =  date('Y-m-d');
$username =$result['username'];
// status 1 missed
$trans = "SELECT * FROM `assignedWork` where username = '$username' AND status = 1";
$transRes = mysqli_query($conn,$trans);
if(!$transRes){
die("Error:".mysqli_error($conn));
}
if(mysqli_num_rows($transRes) == '0'){
?>
<div class="countdown green margin-bottom-10">
<div style="margin-top:10px; font-size:15px;" class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
No missed bid!
</div>
</div>
<?php
}
else{
foreach ($transRes as $transRe) {
$id=  $transRe['taskAssigned'];
$quiz_query = "SELECT * FROM `questions` where id = '$id'";
$quiz_query_exec = mysqli_query($conn,$quiz_query);
if(!$quiz_query_exec){
die("Error:".mysqli_error($conn));
}
foreach ($quiz_query_exec as $quiz_query_exec_now) {
?>
<div class="row"> 
<div class="card col-lg-8">
<div class="card-body">
<p style="font-weight: bold;"><?php echo $quiz_query_exec_now['context'] ?></p>   <!--context -->
<span>FIELD: <?php echo $quiz_query_exec_now['field'] ?> </span>&nbsp;&nbsp;&nbsp;&nbsp;   <!--field -->
<span>KSH <?php echo $quiz_query_exec_now['amount'] ?> </span>&nbsp;&nbsp;&nbsp;&nbsp;      <!--ksh -->
<span>DUE:  <?php echo $quiz_query_exec_now['due'] ?>  </span>&nbsp;&nbsp;&nbsp;&nbsp;     <!--due -->
<span> STATUS: MISSED</span> &nbsp;&nbsp;&nbsp;&nbsp;       <!--status: pending order -->
<!--< class="ri-skip-forward-line"></i>-->
</div>
</div>
</div>
<?php
}
}
}
?>
                    
                 
                </div>
              </div><!-- End Pills Tabs -->

            </div>
          </div>
          </div>
         </div>
          </section>
    </main>      

<?php
include_once 'includes/footer.php';
                ?>