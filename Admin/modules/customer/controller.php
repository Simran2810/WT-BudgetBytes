<?php
require_once ("../../../include/initialize.php");
	 

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

	}

   
function doInsert(){
	if(isset($_POST['save'])){
			$errofile = $_FILES['image']['error'];
			$type = $_FILES['image']['type'];
			$temp = $_FILES['image']['tmp_name'];
			$myfile =$_FILES['image']['name'];
		 	$location="customer_image/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=add");
		}else{
	 
				@$file=$_FILES['image']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				@$image_name= addslashes($_FILES['image']['name']); 
				@$image_size= getimagesize($_FILES['image']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=add");
			}else{
					//uploading the file
					move_uploaded_file($temp,"customer_image/" . $myfile);
		 	
					if ($_POST['FIRSTNAME'] == "" OR $_POST['LASTNAME'] == "" OR $_POST['CONTACTNUMBER'] == "") {
					$messageStats = false;
					message("All fields are required!","error");
					redirect('index.php?view=add');
					}else{	

						 

						$customer = New Customer();
						$customer->CUSTOMERID 		= $_POST['CUSTOMERID'];
						$customer->FIRSTNAME 		= $_POST['FIRSTNAME'];
						$customer->LASTNAME 		= $_POST['LASTNAME'];
						$customer->CITYADDRESS 		= $_POST['CITYADDRESS'];
						$customer->ADDRESS 			= $_POST['ADDRESS'];
						$customer->CONTACTNUMBER 	= $_POST['CONTACTNUMBER'];
						$customer->ZIPCODE 			= $_POST['ZIPCODE'];
						$customer->IMAGE 			= $location;
						$customer->create();


						$user = New User();
						$user->USERID			=	$_POST['CUSTOMERID'];
						$user->NAME				=	$_POST['FIRSTNAME']. ' ' .$_POST['LASTNAME'];
						$user->UEMAIL			=	$_POST['UEMAIL'];
						$user->PASS				=	sha1($_POST['PASS']);						
						$user->TYPE				=	'Customer';
						$user->create();

						$autonum = New Autonumber(); 
						$autonum->auto_update(1);

						message("New [". $_POST['LASTNAME'] ."] created successfully!", "success");
						redirect("index.php");
						}
							
					}
			}
			 
		}


	  }
 
	function doEdit(){
		if(isset($_POST['save'])){

			
			$customer = New Customer();
			$customer->FIRSTNAME 		= $_POST['FIRSTNAME'];
			$customer->LASTNAME 		= $_POST['LASTNAME'];
			$customer->CITYADDRESS 		= $_POST['CITYADDRESS'];
			$customer->ADDRESS 			= $_POST['ADDRESS'];
			$customer->CONTACTNUMBER 	= $_POST['CONTACTNUMBER'];
			$customer->ZIPCODE 			= $_POST['ZIPCODE']; 
			$customer->update($_POST['CUSTOMERID']);

			$user = New User(); 
			$user->UEMAIL			=	$_POST['UEMAIL'];
			$user->PASS				=	sha1($_POST['PASS']); 
			$user->update($_POST['CUSTOMERID']);

			message("[". $_POST['LASTNAME'] ."] has been updated!", "success");
			redirect("index.php");
		}
	}


	function doDelete(){

		if(isset($_SESSION['TYPE'])=='Customer'){

			if (isset($_POST['selector'])==''){
			message("Select the records first before you delete!","error");
			redirect('index.php?view=profile&id=' . $_SESSION['USERID']);
			}else{
		
			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){ 

			$order = New Order();
			$order->delete($id[$i]);
 
			message("Order has been Deleted!","info");
			redirect('index.php?view=profile&id=' . $_SESSION['USERID']); 


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

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="customer_image/".$myfile;


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
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"customer_image/" . $myfile);
		 	
					 

						$customer = New Customer();
						$customer->IMAGE 			= $location;
						$customer->update($_GET['id']);
						redirect("index.php?view=view&id=". $_GET['id']);
						 
							
					}
			}
			 
		}
 
?>