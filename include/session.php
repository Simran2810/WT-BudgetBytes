<?php
	//before we store information of our member, we need to start first the session
	
	session_start();
	//
	function customer_logged_in(){
		return isset($_SESSION['cus_id']);
	}
	
	//create a new function to check if the session variable member_id is on set
	function admin_logged_in() {
		return isset($_SESSION['USERID']);
        
	}
	//this function if session member is not set then it will be redirected to login.php
	function confirm_logged_in() {
		if (!customer_logged_in()) {?> 
			<script type="text/javascript">
				window.location = "index.php";
			</script>

		<?php
		}
		 
	}


function admin_confirm_logged_in() {
		if (!admin_logged_in()) {?>
			<script type="text/javascript">
				window.location ="index.php";
			</script>

		<?php
		}
	}

	function studlogged_in() {
		return isset($_SESSION['IDNO']);
        
	}
	function studconfirm_logged_in() {
		if (!studlogged_in()) {?>
			<script type="text/javascript">
				window.location = "login.php";
			</script>

		<?php
		}
	}

	function message($msg="", $msgtype="") {
	  if(!empty($msg)) {
	    // then this is "set message"
	    // make sure you understand why $this->message=$msg wouldn't work
	    $_SESSION['message'] = $msg;
	    $_SESSION['msgtype'] = $msgtype;
	  } else {
	    // then this is "get message"
			return $message;
	  }
	}
	function check_message(){
	
		if(isset($_SESSION['message'])){
			if(isset($_SESSION['msgtype'])){
				if ($_SESSION['msgtype']=="info"){
	 				echo  '<div class="alert alert-info">'. $_SESSION['message'] . '</div>';
	 				 
				}elseif($_SESSION['msgtype']=="error"){
					echo  '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
									
				}elseif($_SESSION['msgtype']=="success"){
					echo  '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
				}	
				unset($_SESSION['message']);
	 			unset($_SESSION['msgtype']);
	   		}
  
		}	

	}
function product_exists($pid){
    $pid=intval($pid);
    $max=count($_SESSION['katerina_cart']);
    $flag=0;
    for($i=0;$i<$max;$i++){
      if($pid==$_SESSION['katerina_cart'][$i]['productid']){
        $flag=1;
        message("Item is already in the cart.","error");
        break;
      }
    }
    return $flag;
  }
 function addtocart($pid,$q,$price){
    if($pid<1 or $q<1) return;
    if (!empty($_SESSION['katerina_cart'])){


    if(is_array($_SESSION['katerina_cart'])){
      if(product_exists($pid)) return;
      $max=count($_SESSION['katerina_cart']);
      $_SESSION['katerina_cart'][$max]['productid']=$pid;
      $_SESSION['katerina_cart'][$max]['qty']=$q;
      $_SESSION['katerina_cart'][$max]['price']=$price;
    }
    else{
     $_SESSION['katerina_cart']=array();
      $_SESSION['katerina_cart'][0]['productid']=$pid;
      $_SESSION['katerina_cart'][0]['qty']=$q;
      $_SESSION['katerina_cart'][0]['price']=$price;
    }
}else{
     $_SESSION['katerina_cart']=array();
      $_SESSION['katerina_cart'][0]['productid']=$pid;
      $_SESSION['katerina_cart'][0]['qty']=$q;
      $_SESSION['katerina_cart'][0]['price']=$price;
}
	
         message("1 Item added in the cart.","success");
}
  function removetocart($pid){
		$pid=intval($pid);
		$max=count($_SESSION['katerina_cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['katerina_cart'][$i]['productid']){
				unset($_SESSION['katerina_cart'][$i]);
				break;
			}
		}
		$_SESSION['katerina_cart']=array_values($_SESSION['katerina_cart']);
	}



function product_existstwo($ordernum){
    $ordernum=intval($ordernum);
    $max=count($_SESSION['katerina_cart']);
    $flag=0;
    for($i=0;$i<$max;$i++){
      if($ordernum==$_SESSION['katerina_cart'][$i]['productid']){
        $flag=1;
        break;
      }
    }
    return $flag;
  }
 function addtocarttwo($ordernum,$tprice,$fdate,$pmethod){
 if($ordernum<1) return;
    if (!empty($_SESSION['katerina_carttwo'])){
     if(product_existstwo($ordernum)) return;

    if(is_array($_SESSION['katerina_carttwo'])){
     
      $max=count($_SESSION['katerina_cart']);
      $_SESSION['katerina_carttwo'][$max]['ordernum']=$ordernum;
      $_SESSION['katerina_carttwo'][$max]['tprice']=$tprice;
      $_SESSION['katerina_carttwo'][$max]['fdate']=$fdate;
      $_SESSION['katerina_carttwo'][$max]['pmethod']=$pmethod;
    }
    else{
      $_SESSION['katerina_carttwo']=array();
      $_SESSION['katerina_carttwo'][0]['ordernum']=$ordernum;
      $_SESSION['katerina_carttwo'][0]['tprice']=$tprice;
      $_SESSION['katerina_carttwo'][0]['fdate']=$fdate;
      $_SESSION['katerina_carttwo'][0]['pmethod']=$pmethod;
    }
}else{
      $_SESSION['katerina_carttwo']=array();
      $_SESSION['katerina_carttwo'][0]['ordernum']=$ordernum;
      $_SESSION['katerina_carttwo'][0]['tprice']=$tprice;
      $_SESSION['katerina_carttwo'][0]['fdate']=$fdate;
      $_SESSION['katerina_carttwo'][0]['pmethod']=$pmethod;
}
}
  function removetocarttwo($pid){
		$pid=intval($pid);
		$max=count($_SESSION['katerina_carttwo']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['katerina_carttwo'][$i]['productid']){
				unset($_SESSION['katerina_carttwo'][$i]);
				break;
			}
		}
		$_SESSION['katerina_cart']=array_values($_SESSION['katerina_carttwo']);
	}

?>
