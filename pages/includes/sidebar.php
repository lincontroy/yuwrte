<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" style="background-color: lightblue;">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="ri-apps-fill"></i>
          <!-- My modules -->
          <?php
if($result['active'] == "inactive"){
echo '       <span style= "color: blue;">Home</span>';
}
else{
  echo '       <span style= "color: blue;"> Home</span>';
}
  ?>

        </a>
      </li>
      
      <?php 
 if( $result['email'] == 'samt7141@gmail.com' ||  $result['email'] == 'LINCOLNMUNENE37@GMAIL.COM'){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin/">
          <i class="bi bi-check"></i>
          <span>Admin</span>
        </a>
      </li>
      
<?php
}
?>
      <li class="nav-item">
          <?php
             if($result['active'] == "active"){
                echo '<a class="nav-link collapsed" href="index.php">
          <i class="ri-booklet-fill"></i>
          <span style= "color: blue;">Access Freelance Jobs</span>
        </a>';
                 }else{
                 echo ' <a class="nav-link collapsed" href="activate.php">
          <i class="bx bxs-message-square-error"></i>
          <span style= "color: blue;">Verify Account</span>
        </a>';
                 }
                ?>
      </li>
      
      <li class="nav-item">
          <?php
             if($result['active'] == "active"){
                echo '<a class="nav-link collapsed" href="offered-jobs.php">
          <i class="ri-article-fill"></i>
          <span style= "color: blue;">Offered Jobs</span>
        </a>';
                 }else{
                 echo ' <a class="nav-link collapsed" href="offered-jobs.php">
          <i class="ri-article-fill"></i>
          
          <span style= "color: blue;">Offered Jobs</span>
        </a>';
                 }
                ?>
      </li>
      
      <li class="nav-item">
          <?php
             if($result['active'] == "active"){
                echo '<a class="nav-link collapsed" href="submit.php">
          <i class="ri-drag-drop-fill"></i>
          <span style= "color: blue;">Submit Job</span>
        </a>';
                 }else{
                 echo ' <a class="nav-link collapsed" href="submit.php">
          <i class="ri-drag-drop-fill"></i>
          
          <span style= "color: blue;">Submit Job</span>
        </a>';
                 }
                ?>
      </li>
      
      <li class="nav-item">
          <?php
             if($result['active'] == "active"){
                echo '<a class="nav-link collapsed" href="withdraw.php">
          <i class="ri-bank-card-fill"></i>
          <span style= "color: blue;">Withdraw Earnings</span>
        </a>';
                 }else{
                 echo ' <a class="nav-link collapsed" href="withdraw.php">
          <i class="ri-bank-card-fill"></i>
          
          <span style= "color: blue;">Withdraw Earnings</span>
        </a>';
                 }
                ?>
      </li>
 
      
        <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="ri-account-circle-fill"></i>
          <span style= "color: blue;">Profile</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="ri-door-lock-fill"></i>
          <span style= "color: blue;">Log Out</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->