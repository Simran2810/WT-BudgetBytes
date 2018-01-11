<?php
require_once("../include/initialize.php");
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        $title="Home";	
		$content='home.php';		
		break;
	case '2' :
        $title="Profile";	
		$content='teacherprof.php';		
		break;
	case '3' :
        $title="Instructor Subject";	
		$content='instructorsubj.php';		
		break;
	case '4' :
        $title="Instructor Class";	
		$content='instclass.php';		
		break;
	case '5' :
        $title="Grade";	
		$content='grades.php';		
		break;
	case '8' :
        $title="Profile";	
		$content='Admin/modules/customer/index.php?view=profile';		
		break;
	
	default :
	    $title="Home";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>