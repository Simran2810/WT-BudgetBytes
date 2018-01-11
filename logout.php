<?php 
require_once 'include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
unset( $_SESSION['cus_id']);
unset( $_SESSION['USERID'] );
unset( $_SESSION['NAME'] );
unset( $_SESSION['UEMAIL'] );
unset( $_SESSION['PASS'] );
unset( $_SESSION['TYPE'] );
unset($_SESSION['katerina_cart']);
unset($_SESSION['katerina_carttwo']);
unset($_SESSION['FIRSTNAME']);
unset($_SESSION['LASTNAME']);
unset($_SESSION['ADDRESS']);
unset($_SESSION['CONTACTNUMBER']);
 	
// 4. Destroy the session
// session_destroy();
redirect("index.php?logout=1");
?>