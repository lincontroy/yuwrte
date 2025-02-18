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
          
           </div>
           
          </div>
        <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Post Jobs</h5>

<!--add job-->


<?php
if (isset($_POST['addJob'])) {
// require the db connection
$Field = (!empty($_POST['field'])) ? $_POST['field'] : '';
$amount = (!empty($_POST['amount'])) ? $_POST['amount'] : '';
$context = (!empty($_POST['context'])) ? $_POST['context'] : '';
$type = (!empty($_POST['type'])) ? $_POST['type'] : '';
$display_date1 = (!empty($_POST['display_date'])) ? $_POST['display_date'] : '';
$display_date  = date("Y-m-d", strtotime('+0 days', strtotime($display_date1)));;
$due = date("d-m-Y", strtotime('+4 days', strtotime($display_date1)));
$createdAt =  date('d/m/Y H:i:s');
$bids = rand(0, 100);
// insert the new record
$quiz_query = "INSERT INTO `questions` (field, due, amount, context, type, date, bids ,createdAt) VALUES ('" . $Field . "', '" . $due . "', '" . $amount . "', '" . $context . "' , '" . $type . "' , '" . $display_date . "','" . $bids . "', '" . $createdAt . "' )";
$result = mysqli_query($conn, $quiz_query);
if($result){
echo '  <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
<i class="mdi mdi-check-all label-icon"></i>Task successfully added.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; 
?>
<script type="text/javascript">
setTimeout(function(){ 
window.location.href='./post'
}, 2000);  
</script>
<?php
}
}
?>
                    
                    
              <!-- General Form Elements -->
              <form method="post" action="">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Field</label>
                  <div class="col-sm-10">
                    <input type="text" autofocus="" name="field" required="" placeholder="Enter field" class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Type</label>
                  <div class="col-sm-10">
<select required="" name="type" class="form-control">
    <option> ==== Choose one option ====</option>
<option value="article"> ARTICLE WRITNG</option>
<!--<option value="editing"> EDITING AND PROOF READING</option>-->
<!--<option value="seo"> SEO </option>-->
<option value="academic"> ACADEMIC WRITNG</option>
 <!--<option value="business"> BUSINESS</option>-->
</select>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Display Date</label>
                  <div class="col-sm-10">
                    <input type="date" required="" name="display_date" placeholder="Enter date to display it" class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Job Price</label>
                  <div class="col-sm-10">
                    <input type="number" input-type="number" name="amount" required="" placeholder="Enter amount" class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Context</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required="" name="context" placeholder="Enter context here" style="height: 100px"></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                    
                  <label class="col-sm-2 col-form-label">Submit</label>
                  <div class="col-sm-10">
                    <button type="submit" name="addJob" class="btn btn-primary">ADD JOB</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
        </div>
         </div>
        </div>
          
          
   <?php        
include_once 'includes/footer.php';
?>