<?php
    ob_start();
    include_once "db/dbconn.php";
     session_start();
     ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
  if(!isset($_SESSION['email'])){
    echo "<script> alert('You need to login first')</script>";
    header("Location: login.php");
  }

  $userEmail = $_SESSION['email'];
  $query = "SELECT * FROM `users` WHERE `email`='$userEmail'";
  $results= mysqlI_query($conn,$query);
  if(!$results){
    die("Error: ".mysqli_error($conn));
  }
  foreach ($results as $result) {
    $_SESSION ['user'] = $result;
  }
    if($result['active'] == 'inactive'){

    echo "<script> alert('You need to activate your account first')</script>";
    header("Location: login.php");
  }
  
  ?>

  <!doctype html>
<html lang="en">
    
<!-- Mirrored from themesbrand.com/admiria/layouts/vertical/dashboard-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Jan 2022 10:43:37 GMT -->
<head>
    
        <meta charset="utf-8">
        <title>WELCOME <?php echo strtoupper($result ['username']);?> | At homeworkplace</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="GLOWING SPLINT AGENCIES" name="description">
        <meta content="GLOWING SPLINT AGENCIES" name="author">
        <!-- App favicon -->

               <!-- Responsive Table css -->
        <link href="assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css">

                        <!-- C3 Chart css -->
        <link href="assets/libs/c3/c3.min.css" rel="stylesheet" type="text/css">
    
            <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
        
    </head>

    <body data-sidebar="dark">