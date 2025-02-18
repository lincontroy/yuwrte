<?php
include_once "includes/header.php";
include_once "includes/navheader.php";
include_once "includes/sidebar.php";
?> 

  <main id="main" class="main" style="background-color: #ffffff;">

    <div class="pagetitle">
        <h1 class="card-title"> <strong>
              <!--<i class="ri-edit-circle-fill"></i>-->
              PROFILE</strong></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">home</a></li>
          <li class="breadcrumb-item">pages</li>
          <li class="breadcrumb-item active">profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card" style="background-color: #f7f5bc;">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
              <h2><?php  echo strtoupper($result['firstname']) . " " . strtoupper($result['lastname'])?></h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card" style="background-color: lightblue;">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php  echo strtoupper($result['firstname']) . " " . strtoupper($result['lastname'])?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8"><?php  echo strtoupper($result['username'])?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php  echo strtoupper($result['phone'])?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php  echo strtoupper($result['email'])?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Account Status</div>
                    <div class="col-lg-9 col-md-8">
                      <?php
if( $result['active'] == "active"){
  echo  '<i class="bx bxs-badge-check"></i>';
echo "VERIFIED";
}else
{
    echo  '<i class="bx bxs-message-square-error"></i>';
  echo "NOT VERIFIED <br> ";
  echo'<a href="activate.php"><strong>VERIFY ACCOUNT</strong> <i class="bx bxs-chevrons-right"></i></a>';
  
}
                      ?>
                    </div>
                  </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php
include_once 'includes/footer.php';
                ?>