<?php
require_once("../../../include/initialize.php");
//checkAdmin();
	# code...

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';



if ($_SESSION['TYPE']=='Administrator') {

	switch ($view) {

	case 'list' :
		$content    = 'list.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;

	case 'view' :
		$content    = 'view.php';
		break;

	default :
		$content    = 'list.php';
	}

}elseif ($_SESSION['TYPE']=='Customer') {
	# code...
	switch ($view) {

	 case 'profile' :
		$content    = 'profile.php';		
		break;

		default :
		$content    = 'profile.php';	
 
}		
   
	
}
require_once ("../../theme/templates.php");
?>
  
