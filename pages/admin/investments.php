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
 
              
                                  <!-- settle payments -->
          <div class="card card-plain mb-2 ">
            <div class="card-body p-0 bg-success">
            	<hr>
              <div class="row" >
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <h5 class="font-weight-bolder mb-0">INVESTMENTS MADE</h5>
                  </div>
                </div>
              </div>
              <hr>
            </div>
          </div>
          
            <!-- row -->
       
                    <div class="col-xl-12">
                          <div class="table-responsive mb-0" data-bs-pattern="priority-columns">
                                    <table  id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr class="text-teal">
                                        <th>#</th>
                                              <th>Username</th>
                                        <th>Created</th>
                                        <th>Amount</th>
                                        <th>R.O.I</th>
                                        <th>Maturity</th>
                            
                                    </tr>
                                </thead>
                                <tbody>
                                         <?php
date_default_timezone_set('Africa/Nairobi');
$date =  date('d/m/Y');

            $trans = "SELECT * FROM `investments` ";
            $transRes = mysqli_query($conn,$trans);
            if(!$transRes){
              die("Error:".mysqli_error($conn));
            }
            if(mysqli_num_rows($transRes) ==0){
              ?>
                                       <tr>
                  <td class="text-black font-weight-normal">No data available</td>
                </tr>

     <?php
            }else{
              foreach ($transRes as $transRe) {
                ?>                                           
                                       <tr>
                                        <td><span class="text-black font-w500"><?php echo $transRe['id']?></span></td>
                                          <td><span class="text-black text-nowrap"><?php echo $transRe['username']?></span></td>
                                        <td><span class="text-black text-nowrap"><?php echo $transRe['created_on']?></span></td>
                                          <td><span class="text-black text-nowrap">KSH <?php echo number_format($transRe['amount'])?></span></td>
                                              <td><span class="text-black text-nowrap">KSH <?php echo number_format($transRe['expected_amount'])?></span></td>
                                   
                                        <td><span class="text-black"><?php
                                        
                                        if($transRe['time'] == "5"){
                                        echo $transRe['maturity'].": 5:00 AM";
                                        }
                                        elseif ($transRe['time'] == "18"){
                                              echo $transRe['maturity'].": 6:00 PM" ;
                                        }
                               
                                          else{
                                              echo $transRe['maturity'] ;
                                        }
                                        ?></span></td>
                                        
            
                                    
                                                                </tr>
                                                                
                                <?php
}
}
                ?>
                                </tbody>
                                                    
                            </table>
                        </div>
                    </div>
              
         
          
          
          
          <!--display todays investments-->
          <div class="card card-plain mb-2">
            <div class="card-body p-0 bg-success">
            	<hr>
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <h5 class="font-weight-bolder mb-0">TODAY'S MATURITY</h5>
                  </div>
                </div>
              </div>
              <hr>
            </div>
          </div>
          
            <!-- row -->

                    <div class="col-xl-12">
                         <div class="table-responsive mb-0" data-bs-pattern="priority-columns">
                                    <table  id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr class="text-teal">
                                        <th>#</th>
                                              <th>Username</th>
                                        <th>Created</th>
                                        <th>Amount</th>
                                        <th>R.O.I</th>
                                        <th>Maturity</th>
                                              <th>Status</th>
                            
                                    </tr>
                                </thead>
                                <tbody>
                                         <?php
date_default_timezone_set('Africa/Nairobi');
$date =  date('d/m/Y');

            $trans = "SELECT * FROM `investments` WHERE `maturity` = '$date' ";
            $transRes = mysqli_query($conn,$trans);
            if(!$transRes){
              die("Error:".mysqli_error($conn));
            }
            if(mysqli_num_rows($transRes) ==0){
              ?>
                                       <tr>
                  <td class="text-black font-weight-normal">No data available</td>
                </tr>

     <?php
            }else{
              foreach ($transRes as $transRe) {
                ?>                                           
                                       <tr>
                                        <td><span class="text-black font-w500"><?php echo $transRe['id']?></span></td>
                                          <td><span class="text-black text-nowrap"><?php echo $transRe['username']?></span></td>
                                        <td><span class="text-black text-nowrap"><?php echo $transRe['created_on']?></span></td>
                                          <td><span class="text-black text-nowrap">KSH <?php echo number_format($transRe['amount'])?></span></td>
                                              <td><span class="text-black text-nowrap">KSH <?php echo number_format($transRe['expected_amount'])?></span></td>
                                   
                                        <td><span class="text-black"><?php
                                        
                                        if($transRe['time'] == "5"){
                                        echo $transRe['maturity'].": 5:00 AM";
                                        }
                                        elseif ($transRe['time'] == "18"){
                                              echo $transRe['maturity'].": 6:00 PM" ;
                                        }
                                   
                                              else{
                                              echo $transRe['maturity'] ;
                                        }
                                        ?></span></td>
                                        
                                                               <td><span class="text-black">
                                                <?php if($transRe['status'] == 0 ){ ?>
    <button type="submit" name="invest_now"  class="btn btn-primary btn-sm"> Running</button>
                
                 <?php  }  else if($transRe['status'] == 1 ){?>
                    <button type="button" class="btn btn-outline-success btn-sm">Matured</button>
                  <?php
                 }
               ?>
               
                                           </span></td>
                                        
            
                                    
                                                                </tr>
                                                                
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
</div>






<!-- footer here -->


<!-- footer here -->
<?php 
include_once 'includes/footer.php';
?>