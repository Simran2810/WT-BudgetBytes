<?php
require_once ("../include/initialize.php");

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

	case 'photos' :
	doupdateimage();
	break;

	case 'processorder' :
	processorder();
	break;


	}

   
function doInsert(){
	// if(isset($_POST['btnsignup'])){
			@$errofile = $_FILES['image']['error'];
			@$type = $_FILES['image']['type'];
			@$temp = $_FILES['image']['tmp_name'];
			@$myfile =$_FILES['image']['name'];
		 	@$location="customer_image/".$myfile;
 
			@$file=$_FILES['image']['tmp_name'];
			@$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			@$image_name= addslashes($_FILES['image']['name']); 
			@$image_size= getimagesize($_FILES['image']['tmp_name']);

			if (@$_FILES["image"]["size"] > 5000000) {
			    message("Your file is too large. The image cannot be uploaded. You can set or upload an image in your profile", "error");
			    // $uploadOk = 0;
			// }elseif ($image_size==FALSE ) {
			// 	message("Uploaded file is not an image!", "error");
				// redirect(web_root."index.php?page=6");
			}else{
					//uploading the file
					move_uploaded_file($temp,"customer_image/" . $myfile);
				}
		 

						$customer = New Customer();
						$customer->CUSTOMERID 		= $_POST['CUSTOMERID'];
						$customer->FIRSTNAME 		= $_POST['FIRSTNAME'];
						$customer->LASTNAME 		= $_POST['LASTNAME'];
						$customer->CITYADDRESS 		= $_POST['CITYADDRESS'];
						$customer->ADDRESS 			= $_POST['HOMENUMBER']. ' ' . $_POST['STREET'] . ' ' .$_POST['BARANGGY'] . ' ' . $_POST['CITYADDRESS']; 
						$customer->CONTACTNUMBER 	= $_POST['CONTACTNUMBER'];
						$customer->ZIPCODE 			= $_POST['ZIPCODE'];
						$customer->IMAGE 			= $location;
						$customer->cus_uname		= $_POST['USERNAME'];
						$customer->cus_pass			= sha1($_POST['PASS']);	
						$customer->DATEJOIN 		= date('Y-m-d h-i-s');
						$customer->TERMS 			= 1;
						$customer->create();


						$user = New User();
						$user->USERID			=	$_POST['CUSTOMERID'];
						$user->NAME				=	$_POST['FIRSTNAME']. ' ' .$_POST['LASTNAME'];
						// $user->UEMAIL			=	$_POST['UEMAIL'];
						$user->USERNAME			=	$_POST['USERNAME'];
						$user->PASS				=	sha1($_POST['PASS']);						
						$user->TYPE				=	'Customer';
						$user->create();

						$autonum = New Autonumber(); 
						$autonum->auto_update(1);

						$email = trim($_POST['USERNAME']);
						$h_upass = sha1(trim($_POST['PASS']));


						//it creates a new objects of member
					    $user = new Customer();
					    //make use of the static function, and we passed to parameters
					    $res = $user::cusAuthentication($email, $h_upass); 

						// message("New [". $_POST['LASTNAME'] ."] created successfully!", "success");
			 
						
						if(isset($_POST['savecustomer'])){
						 echo "<script> alert('You are now successfully registered. It will redirect to your order details.'); </script>";
						redirect(web_root."index.php?page=7");
						}else{
							redirect(web_root."index.php?page=9");
						echo "<script> alert('You are now successfully registered.'); </script>";
					
						}
					// }
		 
			 
		// }


	  }
 
	function doEdit(){
		if(isset($_POST['save'])){

			
			$customer = New Customer();
			$customer->FIRSTNAME 		= $_POST['FIRSTNAME'];
			$customer->LASTNAME 		= $_POST['LASTNAME'];
			// $customer->CITYADDRESS 		= $_POST['CITYADDRESS'];
			$customer->ADDRESS 			= $_POST['ADDRESS'];
			$customer->CONTACTNUMBER 	= $_POST['CONTACTNUMBER'];
			$customer->cus_uname 		= $_POST['USERNAME'];
			$customer->cus_pass 		= sha1($_POST['password1']); 
			$customer->ZIPCODE 			= $_POST['ZIPCODE']; 
			$customer->update($_SESSION['cus_id']);

			 

			message("[". $_POST['LASTNAME'] ."] has been updated!", "success");
			redirect(web_root.'index.php?page=9');
		}
	}


	function doDelete(){

		if(isset($_SESSION['TYPE'])=='Customer'){

			if (isset($_POST['selector'])==''){
			message("Select the records first before you delete!","error");
			redirect(web_root.'index.php?page=9');
			}else{
		
			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){ 

			$order = New Order();
			$order->delete($id[$i]);
 
			message("Order has been Deleted!","info");
			redirect(web_root.'index.php?page=9'); 


		} 


		}
	}else{

		if (isset($_POST['selector'])==''){
			message("Select the records first before you delete!","error");
			redirect('index.php');
			}else{

			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){ 

			$customer = New Customer();
			$customer->delete($id[$i]);

			$user = New User();
			$user->delete($id[$i]);

			message("Customer has been Deleted!","info");
			redirect('index.php');

			}
		}

	}
		
	}

	 
		function processorder(){

			// if ($_POST['paymethod']=='cd'){
			// 	$paymethod = 'Cash on Delivery';
			// }else{
			// 	$paymethod = 'Cash on Pickup';
			// }

			$count_cart = count($_SESSION['katerina_cart']);
             for ($i=0; $i < $count_cart  ; $i++) { 
			$order = New Order();
			$order->PRODUCTID		= $_SESSION['katerina_cart'][$i]['productid'];
			$order->DATEORDER		=  date("Y-m-d h:i:s");
			$order->O_QTY			= $_SESSION['katerina_cart'][$i]['qty'];
			$order->O_PRICE			= $_SESSION['katerina_cart'][$i]['price'];
			$order->STATS 			= 'Pending';
		
		 
			$order->ORDERTYPE 		= $_GET['paymethod'];
			$order->DATECLAIM		= $_GET['date'];
			$order->ORDERNUMBER		=$_GET['ordernumber'];
			$order->CUSTOMERID		= $_SESSION['cus_id'];
		  	$order->create(); 
 
		  	$product = New Product();			 
			$product->updateqty($_SESSION['katerina_cart'][$i]['productid'],$_SESSION['katerina_cart'][$i]['qty']);
		 //  	 $query ="UPDATE  tblproducts 
		 //  	 SET QTY=QTY - '".$_SESSION['katerina_cart'][$i]['qty']."'
		 //  	  WHERE PRODUCTID = '".$_SESSION['katerina_cart'][$i]['productid']."'";
			// mysql_query($query) or die(mysql_error());

		  }

      

		   $carttwo = count($_SESSION['katerina_carttwo']);
    		for ($i=0; $i <  $carttwo ; $i++) { 
		  $payment = New Payment();
		  $payment->ORDERNUMBER			=$_SESSION['katerina_carttwo'][$i]['ordernum'];
		  $payment->CUSTOMERID			= $_SESSION['cus_id'];
		  $payment->DATEORDER			= date("Y-m-d h:i:s");
		  $payment->PAYMENTMETHOD		=  $_SESSION['katerina_carttwo'][$i]['pmethod'];
		  $payment->CLAIMDATE			= 	$_SESSION['katerina_carttwo'][$i]['fdate'];
		  $payment->TOTALPRICE			=	$_SESSION['katerina_carttwo'][$i]['tprice'];
		  $payment->STATS 				= 'Pending';
		  $payment->REMARKS 			= '';
		  $payment->create();
		}
		  $autonum = New Autonumber(); 
		  $autonum->auto_update(3);

			$payment = New Payment(); 
		 	$singlepayment = $payment->single_payment($_GET['ordernumber']);

		 	$_SESSION['ordernumber'] = $singlepayment->ORDERNUMBER;


		     unset($_SESSION['katerina_cart']);
		     unset($_SESSION['katerina_carttwo']);

			message("New order created successfully!", "success"); 		 
			redirect(web_root."index.php?page=9");

		}

 function doupdateimage(){
 
		@$errofile = $_FILES['photo']['error'];
			@$type = $_FILES['photo']['type'];
			@$temp = $_FILES['photo']['tmp_name'];
			@$myfile =$_FILES['photo']['name'];
		 	@$location="customer_image/".$myfile;
 
			@$file=$_FILES['photo']['tmp_name'];
			@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
			@$image_name= addslashes($_FILES['photo']['name']); 
			@$image_size= getimagesize($_FILES['photo']['tmp_name']);



		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect(web_root.'index.php?page=9'); 
			}else{
					//uploading the file
					move_uploaded_file($temp,"customer_image/" . $myfile);
		 			
						$customer = New Customer();
						$customer->IMAGE 			= $location;
						$customer->update($_SESSION['cus_id']);

					 

						message("Image has been updated.!", "success"); 		
						redirect(web_root.'index.php?page=9'); 
						 
							
					}
			}
			 
		}
?>