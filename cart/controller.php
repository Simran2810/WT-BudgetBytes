<?php
require_once ("../include/initialize.php");
  // if (!isset($_SESSION['USERID'])){
  //     redirect("index.php");
  //    }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;
 
	}
   
	function doInsert(){
	 

   if(isset($_POST['PRODUCTID'])){
    $pid= $_POST['PRODUCTID'];
    $price= $_POST['PRICE'];

    $sql = "SELECT * FROM `tblproducts` WHERE `PRODUCTID` ='" . $pid. "'";
       $result = mysql_query($sql) or die(mysql_error());
       while ($row = mysql_fetch_array($result)) {
       
       		if ($price<50){
				$tot = round(50/$price) * $price;
				$qty =  round(50/$price);
				// message($tot ,"success");

					
			}else{
				$tot = floatval ($price) * 1;
				$qty = 1;
	 

       	}

       	if($row['QTY']>$qty){
			addtocart($pid,$qty , $tot);
		}else{
			echo "<script> alert('Product cannot be ordered because the available quantity does not reached its minimun price.')</script>";
		redirect(web_root."index.php?page=2");
		}
       } 
				// message("1 item has been added in the cart", "success");
				redirect(web_root."index.php?page=6");
				
			}
}
		 

 

	function doEdit(){

  if (isset($_POST['updateid'])){  

    $max=count($_SESSION['katerina_cart']);
    for($i=0;$i<$max;$i++){

      $pid=$_SESSION['katerina_cart'][$i]['productid'];
 
      $qty=intval(isset($_GET['QTY'.$pid]) ? $_GET['QTY'.$_POST['updateid']] : "");
       $price=(double)(isset($_GET['subTOT'.$pid]) ? $_GET['subTOT'.$_POST['updateid']] : "");


       $sql = "SELECT * FROM `tblproducts` WHERE `PRODUCTID` ='" . $pid. "'";
       $result = mysql_query($sql) or die(mysql_error());
       while ($row = mysql_fetch_array($result)) {
       	# code...
		     
		 if($row['PRICE']< 50){
		       $fixedqty=round(50 /$row['PRICE']) ;
		  
		         // echo "<script> alert('".$fixedqty. ' ' .$row['PRICE']."') </script>";
		     
		      if($qty>=$fixedqty  && $qty<=999){
		      	// la pa natapos... price

		        $_SESSION['katerina_cart'][$i]['qty']=$qty;
		        $_SESSION['katerina_cart'][$i]['price']=$price;
		      }
       	}else{
       		if($qty>0  && $qty<=999){
		      	// la pa natapos... price

		        $_SESSION['katerina_cart'][$i]['qty']=$qty;
		        $_SESSION['katerina_cart'][$i]['price']=$price;
		      }

       	}
       }
    }
 
			message("Cart has been updated.", "success");
			redirect(web_root."index.php?page=6");
  } 
 
}


	function doDelete(){
	 
 
		if(isset($_GET['id'])) {
		removetocart($_GET['id']);
		}else{
		unset($_SESSION['katerina_cart']);
		}
			

		message("1 item has been removed in the cart.","success");
		redirect(web_root."index.php?page=6");
		 

		
	}
?>