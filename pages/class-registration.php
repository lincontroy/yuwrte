<?php
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";
?>

 <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="font-weight: bold;">Please Complete and Submit!</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Full Name:</strong> </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php  echo strtoupper($result['firstname']) . " " . strtoupper($result['lastname'])?>">
                  </div>
                </div>
                <div class="row mb-3">
                   <label for="inputEmail" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Email:</strong></label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" value="<?php  echo strtoupper($result['email'])?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Phone Number:</strong></label>
                  <div class="col-sm-10">
                    <input type="phone" class="form-control" value="<?php  echo strtoupper($result['phone'])?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Upload your CV/Resume in PDF!</strong></label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
            
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Category:</strong></label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Article Writing Training</option>
                      <option value="1">Academic Writing Training</option>
                      <option value="2">Resume Writing Training</option>
                      <option value="3">Web Content/Blog Writing Training</option>
                      <option value="4">Technical Writing Training</option>
                      <option value="5">News Writing Training</option>
                      <option value="6">Copy Writing Training (SEO)</option>
                      <option value="7">Content Writing Training</option>
                      <option value="8">Editing & Proofreading Training</option>
                      <option value="9">Press release Writing Training</option>
                      <option value="10">Product description Writing Training</option>
                      <option value="11">Business Writing Training</option>
                      
                      
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" style="color: #000000;"> <strong>Submit Form</strong></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
<?php
include_once 'includes/footer.php';
                ?>