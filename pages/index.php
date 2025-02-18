<?php
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";

// if($result['active'] == 'inactive'){
?>
<script type="text/javascript">
// setTimeout(function(){ 
// window.location.href='../activate'
// }, 500);   
</script>
<?php
// }
?> 

  <main id="main" class="main" style="background-color: #ffffff;">
       
    <div class="pagetitle">
        <h1 class="card-title"> <strong>
              <i class="ri-24-hours-fill"></i>
              THE PREMIER FREELANCE HUB</strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">home</a></li>
          <li class="breadcrumb-item">freelance jobs</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="main content">
       <div class="page-content">
       <div class="container-fluid">
           
   <section class="section">
      <div class="row">
        <div class="col-lg-6">
              <a href="https://t.me/+_CV9YwBPu7gxNjlk"> <button type="button" class="btn btn-primary"> <i class="bx bx-bell"></i>  <strong>New Jobs & Upcoming Training Updates!</strong> </button></a>
        </div>
      </div>
    </section>
    <hr>
    
    <div class="row" style="background-color: lightblue;">
    
    <div class="col-lg-4">
      <div class="card">
        <img src="assets/img/article.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            
          <h5 class="card-title"> <strong>
              <!--<i class="ri-edit-circle-fill"></i>-->
              ARTICLE WRITING JOBS</strong></h5> 
          <p class="card-text" style="color: #000000;">It takes just one job to develop a successful relationship that can propel your freelance career forward.<br> 
           <?php
if($result['active'] == "active"){
if($result['talentbadge'] == "talentbadge"){
echo '  <a href="./job?type=article"><button type="button" class="btn btn-primary"> <i class="bi bi-star me-1"></i>EXPLORE JOBS</button></a>';
}else{
?>
 <a href="./buy?purchase=talentbadge"><button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>EXPLORE JOBS</button></a>
<?php
}
}
else{
?>
 <a href="./activate"><button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>EXPLORE JOBS</button></a>
<?php
}
?>
        </p>
                     
        </div>
      </div>
    </div>
    
      
    <div class="col-lg-4">
      <div class="card">
        <img src="assets/img/academic.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            
          <h5 class="card-title"> <strong>
              <!--<i class="ri-edit-circle-fill"></i>-->
              ACADEMIC WRITING JOBS</strong></h5> 
          <p class="card-text" style="color: #000000;">Explore the best Academic Writing jobs and land a remote Academic Writing job today.<br> 
            <?php
if($result['active'] == "active"){
if($result['talentbadge'] == "talentbadge"){
echo '  <a href="./job?type=academic"><button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>EXPLORE JOBS</button> </a>';
}else{
?>
<a href="./buy?purchase=talentbadge"><button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>EXPLORE JOBS</button></a>
<?php
}
}
else{
?>
 <a href="./activate"><button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i>EXPLORE JOBS</button></a>

<?php
}
?>
        </p>
                     
        </div>
      </div>
    </div> 
    
    <div class="col-lg-4">
          <div class="card" style="background-color: #f7f5bc;">
            <img src="assets/img/training.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
      <div class="logo d-flex align-items-center">
       <!--<h5  class="card-title"><strong>-->
       <!--       <i class="ri-video-download-fill"></i>-->
       <!--    VIRTUAL LESSONS</strong></h5>-->
      </div>
    </div>
              <p class="card-text" style="color: #000000;"> These free online lessons in freelancing are dedicated to helping you excel as an independent freelancer. Freelancing involves seeking and completing temporary contracts for different clients.<br> 
<?php
if($result['active'] == "active"){
if($result['training'] == "training"){
  echo ' <a href="lessons.php"><button type="button" class="btn btn-primary"><strong>HOW-TO LESSONS</strong></button></a>';
}else{
?>
<a href="./buy?purchase=training"><button type="button" class="btn btn-primary"><strong>HOW-TO LESSONS</strong></button></a>
<?php
}
}
else{
?>
<a href="./activate"><button type="button" class="btn btn-primary"><strong>HOW-TO LESSONS</strong></button></a>
<?php
}
?>
               </p>
            </div>
          </div>
        </div> <!-- End Card with an image on top -->
        
       
      
        </div>
        <hr>
        
        <div class="row" style="background-color: lightblue;">  
 
 <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                    
                    <!--<i class="bx bxs-credit-card-alt"></i> -->
                  <h5 class="card-title">USERNAME</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                       <h6> <span><?php  echo strtoupper($result['username'])?></span> </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
      <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                    
                    <!--<i class="bx bxs-credit-card-alt"></i> -->
                  <h5 class="card-title">ACCOUNT STATUS</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                       <h6> <span><?php
if( $result['active'] == "active"){
  echo  '<i class="bx bxs-badge-check"></i>';
echo "VERIFIED";
}else
{
    echo  '<i class="bx bxs-message-square-error"></i>';
  echo "NOT VERIFIED <br> ";
  echo'<a href="activate.php"><strong>VERIFY ACCOUNT</strong></a>';
  
}
                      ?></span> </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                    
                    <!--<i class="bx bxs-credit-card-front"></i> -->
                  <h5 class="card-title">ACCOUNT RATING</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                       <h6> <span>0</span> <i class="bx bxs-star"></i></h6>
                       <h6> <span>0</span> reviews</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <hr>
        
<div class="row" style="background-color: lightblue;">
      <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                    
                    <i class="bx bxs-credit-card"></i> 
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
                    
                    <i class="bx bxs-credit-card-alt"></i> 
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
                    
                    <i class="bx bxs-credit-card-front"></i> 
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
 <hr>
    <div class="row">
        <div class="col-lg-10">

          <div class="card" style="background-color: lightblue;">
            <div class="card-body">
              <h5 class="card-title" style="font-weight: bold;">Hello <?php echo strtoupper($result['username'])?></strong>. Are you a new freelancer?</h5>

              <!-- General Form Elements -->
              
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>UPCOMING TRAINING LINK:</strong> </label>
                  <div class="col-sm-10">
                    <input readonly type="text" name="referral_link" id="copyTarget"  class="form-control" value="<?php
if( $result['active'] == "active"){
echo "
"
;
}else
{
  echo'Verify account to access training link';
  
}
                      ?>" id="link">
                      <button onclick="myFunction()" id="copyButton"  name="copyButton" type="submit" class="btn btn-primary waves-effect waves-light" style="margin-top:5px;">Copy Link</button>
                  </div>
                 </div>
                 
                </div>
              </div>
         </div>
        </div>
      
      <hr>
      <div class="row">
        <div class="col-lg-10">

          <div class="card" style="background-color: lightblue;">
            <div class="card-body">
              <h5 class="card-title" style="font-weight: bold;"><i class="bx bxs-phone"></i> Incase of any query, Contact Support.</h5>
              
               <div class="social-links mt-3">
              <a href="https://t.me/Athomeworkplace" class="telegram"><i class="bi bi-telegram"></i></a> <strong>Send a DM</strong><br>
              <a href="https://api.whatsapp.com/send?phone=+254759501574"><i class="bi bi-whatsapp"></i></a> <strong>Whatsapp</strong>
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

  </main><!-- End #main -->

  <?php
include_once 'includes/footer.php';
                ?>