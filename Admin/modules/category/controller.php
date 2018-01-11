
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

	case 'assign':
	doassignsubj();
	break;

	case 'delsubj':
	doDelsubj();
	break;
	case 'grade':
	savegrade();
	break;
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ( $_POST['CATEGORY'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$category = New Category();
			$category->CATEGORY		= $_POST['CATEGORY'];
			$category->create();

			message("New [". $_POST['CATEGORY'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$category = New Category();
			$category->CATEGORY	= $_POST['CATEGORY'];
			$category->update($_POST['CATEGORYID']);

			message("[". $_POST['CATEGORY'] ."] has been updated!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){
		if (isset($_POST['selector'])==''){
		message("Select the records first before you delete!","error");
		redirect('index.php');
		}else{

		$id = $_POST['selector'];
		$key = count($id);

		for($i=0;$i<$key;$i++){

			$category = New Category();
			$category->delete($id[$i]);

			message("Category already Deleted!","info");
			redirect('index.php');
		}
		}
		
	}
?>