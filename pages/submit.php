<?php
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";
?>
<main id="main" class="main"  style="background-color: #ffffff;">

    <div class="pagetitle">
      <h1 class="card-title"> <strong>
              
              SUBMIT JOB</strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">submit job</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
                       <section class="section">
                         <div class="row">
                            <div class="col-lg-10">
                                <div style="background-color: lightblue">
                                    <div class="card-body">
                                        <h4 class="card-title text-white"> Upload File</h4>
                                        
                                        <form action="" method="POST" enctype="multipart/form-data">
                                       <div class="mb-5 dropzone>
                                            
                                                <div class=" fallback="">
                                                    <input name="productimage1" id="productimage1" required="" type="file" enctype="multipart/form-data">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                    </div>
                                                    
                                                    <!--<h4 class="text-white">Upload </h4>-->
                                                </div>
                                       
                                        </form>
                                         <div class="text-center mt-3">
                                            <button type="submit" name="upload_now" class="btn btn-dark waves-effect waves-light">Submit Job</button>
                                        </div>
                                        </div>

                                       
                                    </div>
                             </div>
                    </div>
            <hr>
            
                  
        <div class="row">            
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Submitted Jobs</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job ID</th>
                    <th scope="col">Submitted on</th>
                    <th scope="col">Reviewed on</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td></td>
                  </tr>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
          </div>
        </div>
        </section>

<?php
include_once 'includes/footer.php';
                ?>