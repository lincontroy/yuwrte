<?php

define("DB_HOST","localhost");
define("DB_USER","yuwritea_yuwriteafrica");
define("DB_PASS","24cupbv8EuESrHg");
define("DB_NAME","yuwritea_yuwriteafrica");

// define("DB_HOST","localhost");
// define("DB_USER","root");
// define("DB_PASS","");
// define("DB_NAME","yuwritea_yuwriteafrica");

date_default_timezone_set('Africa/Nairobi');


$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$conn){
    die("hey db not connected");
}
?>
