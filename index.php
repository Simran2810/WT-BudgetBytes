<?php
require_once ("include/initialize.php");

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';

switch ($view) {
	case '1' :
        $title="Home";	
		$content='home.php';		
		break;
	case '2' :
        $title="CakeAndBread";	
		$content='listproducts.php';		
		break;

	case '3' :
        $title="About Us";	
		$content='about.php';		
		break;

	case '4' :
        $title="Contact Us";	
		$content='contact.php';		
		break;

	case '5' :
        $title="customer Care";	
		$content='customercare.php';		
		break;

	case '6' :
		$title="CartList";	
		$content='cart/addtocart.php';       
		break;

	case '7' :
        $title="Checkout";	
		$content='customer/orderdetails.php';		
		break;

	case '8' :
	 $title="Customer Billing";	
	 $content='customer/customerbilling.php';	 
	break;
 
	case '9' :
        $title="Profile";	
		$content='customer/profile.php';		
	break;

	default :
	    $title="Home";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>

