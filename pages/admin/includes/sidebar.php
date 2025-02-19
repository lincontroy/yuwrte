<?php
 if( $result['email'] != 'samt7141@gmail.com' || $result['email'] != 'LINCOLNMUNENE37@GMAIL.COM'){  
    
    echo "<script> alert('Opps')</script>"; 
header("Location: ../logout.php");
}   
?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>


                             <li>
                                <a href="index.php" class="waves-effect">
                                    <span class="badge rounded-pill bg-primary float-end">1</span>
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Admin's Dashboard </span>
                                </a>
                            </li>


                            <li>
                                <a href="../" class="waves-effect">
                                    <span class="badge rounded-pill bg-primary float-end">2</span>
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Clients' Dashboard </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="post.php" class="waves-effect">
                                    <span class="badge rounded-pill bg-primary float-end">2</span>
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Post Jobs</span>
                                </a>
                     
                            </li>
                         
                                 <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-network-1"></i>
                                    <span>Users</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li> <a href="active_users.php">  <i class="dripicons-network-5"></i>Active</a></li>
                                    <li><a href="inactive_users.php">   <i class="dripicons-network-2"></i>Inactive</a></li>
                                </ul>
                            </li>
                            

                                 

                            <li class="menu-title">Others</li>

                                     <li>
                                <a href="../logout.php" class="waves-effect">
                                    <i class="mdi mdi-logout"></i>
                                    <span>Logout</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->