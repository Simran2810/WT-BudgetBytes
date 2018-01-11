
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
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ( $_POST['DESCRIPTION'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$setting = New Setting();
			$setting->DESCRIPTION		= $_POST['DESCRIPTION'];
			$setting->TYPE 				= $_POST['TYPE'];
			$setting->create();

			message("New [". $_POST['DESCRIPTION'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$setting = New Setting();
			$setting->DESCRIPTION	= $_POST['DESCRIPTION'];
			$setting->TYPE 				= $_POST['TYPE'];
			$setting->update($_POST['ID']);

			message("[". $_POST['DESCRIPTION'] ."] has been updated!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){

		$id = $_POST['selector'];
		$key = count($id);

		for($i=0;$i<$key;$i++){

			$setting = New Setting();
			$setting->delete($id[$i]);

			message("setting already Deleted!","info");
			redirect('index.php');
		}

		
	}
?>