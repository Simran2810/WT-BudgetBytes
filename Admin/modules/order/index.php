<?php
require_once("../../../include/initialize.php");
//checkAdmin();
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content    = 'list.php';		
		break;

	case 'addtocart' :
		$content    = 'addtocart.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;

	 case 'addorder' :
		$content    = 'addorder.php';		
		break;

case 'orderdetails' :
		$content    = 'orderdetails.php';		
		break;

	case 'billing' :
		$content    = 'billing.php';		
		break;

	case 'customerdetails' :
		$content    = 'customerdetail.php';		
		break;

	case 'orderedproduct' :
		$content    = 'orderedproduct.php';		
		break;

	default :
		$content    = 'list.php';		
}
require_once ("../../theme/templates.php");
?>
  
