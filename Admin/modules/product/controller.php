

<?php
require_once ("../../../include/initialize.php");
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }


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
		 	$location="uploaded_photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=add");
		}else{
	 
				@$file=$_FILES['image']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				@$image_name= addslashes($_FILES['image']['name']); 
				@$image_size= getimagesize($_FILES['image']['tmp_name']);

			if ($image_size==FALSE || $type=='video/wmv') {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=add");
			}else{
					//uploading the file
					move_uploaded_file($temp,"uploaded_photos/" . $myfile);
		 	
					if ($_POST['PRODUCTNAME'] == "" OR $_POST['PRICE'] == "") {
					$messageStats = false;
					message("All fields are required!","error");
					redirect('index.php?view=add');
					}else{	

						$product = new Product();
				       	$product_name 	= $_POST['PRODUCTNAME'];

						$res = $product->find_all_products($product_name);
						
						
						if ($res >=1) {
							message("Product name is already exist!", "error");
							redirect("index.php?view=add");
						}else{
 


						$productin = New Productin();
						$productin->PRODUCTID 		= $_POST['PRODUCTID']; 
						$productin->QTY				= $_POST['QTY'];
						$productin->DATERECEIVE		= Date("Y-m-d h:i:s");
						$productin->UPDATEPRICE		= $_POST['PRICE'];    
						$productin->create();


						//  $productin = New Productin();
  				// 		 $singleproductin = $productin->single_productin($_POST['PRODUCTID']);

  				// 		 if ( $singleproductin->PRODUCTID = $_POST['PRODUCTID'] ){
  				// 		 	$product = New Product();
  				// 		 	$product->updateqtyplus($_POST['PRODUCTID'],$_POST['QTY']);
  				// 		 }else{
  				// 		 	$product = New Product();
						$productin->PRODUCTID 		= $_POST['PRODUCTID']; 
						$product->PRODUCTNAME 		= $_POST['PRODUCTNAME'];
						$product->IMAGES 			= $location; 
						$product->CATEGORYID		= $_POST['CATEGORY'];
						$product->QTY				= $_POST['QTY'];
						$product->PRICE				= $_POST['PRICE']; 
						$product->STATUS			= 'Available';
						$product->create();
						}

  					

						
 

						message("New [". $_POST['PRODUCTNAME'] ."] created successfully!", "success");
						redirect("index.php");
						}
							
					}
			}
			 
		}


	  }
 
	function doEdit(){
		if (@$_GET['stats']=='NotAvailable'){
			$product = New Product();
			$product->STATUS	= 'Available';
			$product->update(@$_GET['id']);

		}elseif(@$_GET['stats']=='Available'){
			$product = New Product();
			$product->STATUS	= 'NotAvailable';
			$product->update(@$_GET['id']);
		}else{

		if (isset($_GET['front'])){
			$product = New Product();
			$product->FRONTPAGE	= True;
			$product->update(@$_GET['id']);

		}

		if(isset($_POST['save'])){
 

			$product = New Product();
			$product->PRODUCTNAME 	= $_POST['PRODUCTNAME']; 
			$product->CATEGORYID	= $_POST['CATEGORY'];
			// $product->QTY			= $_POST['QTY'];
			$product->PRICE			= $_POST['PRICE']; 
			$product->update($_POST['PRODUCTID']);


			$productin = New Productin();
			$productin->PRODUCTID 		= $_POST['PRODUCTID']; 
			$productin->QTY				= $_POST['QTY'];
			$productin->DATERECEIVE		= Date("Y-m-d h:i:s");  
			$productin->UPDATEPRICE		= $_POST['PRICE'];   
			$productin->create();


			 $product = New Product;
			 $singleproduct = $product->single_product($_POST['PRODUCTID']);

				 if ( $singleproduct->PRODUCTID = $_POST['PRODUCTID'] ){
				 	$product = New Product();
				 	$product->updateqtyplus($_POST['PRODUCTID'],$_POST['QTY']);
				 } 




			message("[". $_POST['PRODUCTNAME'] ."] has been updated!", "success");
		}
		}	
			redirect("index.php");
		
	}


	function doDelete(){

		if (isset($_POST['selector'])==''){
		message("Select the records first before you delete!","error");
		redirect('index.php');
		}else{
			

			$id = $_POST['selector'];
			$key = count($id);

			for($i=0;$i<$key;$i++){

				$product = New Product();
				$product->delete($id[$i]);

				message("Product has been Deleted!","info");
				redirect('index.php');
			}

		}
	}

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="uploaded_photos/".$myfile;


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
					move_uploaded_file($temp,"uploaded_photos/" . $myfile);
		 	
					 

						$product = New Product();
						$product->IMAGES 			= $location;
						$product->update($_GET['id']);
						redirect("index.php?view=view&id=". $_GET['id']);
						 
							
					}
			}
			 
		}
 
?>