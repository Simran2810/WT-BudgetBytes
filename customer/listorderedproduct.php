
<?php
require_once ("../include/initialize.php");
  if (!isset($_SESSION['cus_id'])){
      redirect("index.php");
     }


if (isset($_POST['id'])){

if ($_POST['actions']=='confirm') {
							
	$status	= 'Confirmed';	
	
	 
}elseif ($_POST['actions']=='cancel'){
	
	$status	= 'Cancelled';
	
}

$order = New Order();
$order->STATS       = $status;
$order->update($_POST['id']);


}

if(isset($_POST['close'])){
	unset($_SESSION['ordernumber']);
}

if (isset($_POST['ordernumber'])){
	$_SESSION['ordernumber'] = $_POST['ordernumber'];
}


$query = "SELECT * FROM `tblpayment` p ,`tblcustomer` c 
				WHERE   p.`CUSTOMERID`=c.`CUSTOMERID` and ORDERNUMBER='".$_SESSION['ordernumber']."'";
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();


?>
 

<div class="modal-dialog" style="width:60%">
  <div class="modal-content">
	<div class="modal-header">
		<button class="close" id="btnclose" data-dismiss="modal" type= "button">×</button>
		 <span id="printout">
 
		<table>
			<tr>
				<td align="center"> 
				<img src="<?php echo web_root; ?>images/bg2.jpg"  height="90px" style="-webkit-border-radius:5px; -moz-border-radius:5px;" alt="Image">
        		</td>
				<td width="87%" align="center">
				<h3 >Katerina's Homemade Goodies</h3>
				<h4 >Rizal Ave. Victory Norte<br/>
				Santiago City<br/>
				</h4>
				</td>
			</tr>
		</table>
		
		
		 
 	 <div class="modal-body"> 
<?php 
	 $query = "SELECT * FROM `tblpayment` p ,`tblcustomer` c 
				WHERE   p.`CUSTOMERID`=c.`CUSTOMERID` and ORDERNUMBER='".$_SESSION['ordernumber']."'";
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();

		if($cur->STATS=='Confirmed'){

		
		if ($cur->PAYMENTMETHOD=="Cash on Pickup") {
			 
		
?>
 	 <h4>Your order has been confirmed and ready for Pick Up</h4><br/>
		<h5>DEAR Ma'am/Sir ,</h5>
		<h5>As you have ordered cash on pick up, please have the exact amount of cash to pay to our staff and bring this billing details.</h5>
		 <hr/>
		 <h4><strong>Pick up Information</strong></h4>
		 <div class="row">
		 	<div class="col-md-6">
		 		<p> ORDER NUMBER : <?php echo $_SESSION['ordernumber']; ?></p>
		 		<?php 
		 			$query="SELECT sum(O_QTY) as 'countitem' FROM `tblorder` WHERE `ORDERNUMBER`='".$_SESSION['ordernumber']."'";
		 			$mydb->setQuery($query);
					$res = $mydb->loadResultList();
					?>
		 		<p>Items to be pickup : <?php
		 		foreach ( $res as $row) echo $row->countitem; ?></p> 
		 	</div>
		 	<div class="col-md-6">
		 	<p>Name : <?php echo $cur->FIRSTNAME . ' '.  $cur->LASTNAME ;?></p>
		 	<p>Address : <?php echo $cur->ADDRESS;?></p>
		 		 <?php echo $cur->CONTACTNUMBER;?>
		 	</div>
		 </div>
<?php 
}elseif ($cur->PAYMENTMETHOD=="Cash on Delivery"){
		 
?>
 	 <h4>Your order has been confirmed and delivered</h4><br/>
 		<h5>DEAR Ma'am/Sir ,</h5>
		<h5>Your order is on its way! As you have ordered via Cash on Delivery, please have the exact amount of cash for our deliverer.	</h5>
		 <hr/>
		 <h4><strong>Delivery Information</strong></h4>
		 <div class="row">
		 	<div class="col-md-6">
		 		<p> ORDER NUMBER : <?php echo $_SESSION['ordernumber']; ?></p>

		 			<?php 
		 			$query="SELECT sum(O_QTY) as 'countitem' FROM `tblorder` WHERE `ORDERNUMBER`='".$_SESSION['ordernumber']."'";
		 			$mydb->setQuery($query);
					$res = $mydb->loadResultList();
					?>
		 		<p>Items to be delivered : <?php
		 		foreach ( $res as $row) echo $row->countitem; ?></p> 

		 	</div>
		 	<div class="col-md-6">
		 	<p>Name : <?php echo $cur->FIRSTNAME . ' '.  $cur->LASTNAME ;?></p>
		 	<p>Address : <?php echo $cur->ADDRESS;?></p>
		 		<?php echo $cur->CONTACTNUMBER;?>
		 	</div>
		 </div>
<?php 
}
}else{
	echo "<h5>Your order is on process. Please check your profile for notification of confirmation.</h5>";
}
?>
<hr/>
 <h4><strong>Order Information</strong></h4>
		<table id="table" class="katerina-table">
			<thead>
				<tr>
					
					<th>PRODUCT NAME</th>
					<th>DATE ORDER</th> 
					<th>PRICE</th>
					<th>QUANTITY</th>
					<th>TOTAL PRICE</th>
					<th></th> 
				</tr>
				</thead>
				<tbody>
 
				<?php
				 
				  $query = "SELECT * FROM `tblproducts` p ,`tblcustomer` c ,`tblorder` o
				  				WHERE p.`PRODUCTID` = o.`PRODUCTID` and  o.`CUSTOMERID`=c.`CUSTOMERID` 
				  				and ORDERNUMBER='".$_SESSION['ordernumber']."'";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
						echo '<tr>';  
				  		
				  		echo '<td>'. $result->PRODUCTNAME.'</td>';
				  		echo '<td>'.date_format(date_create($result->DATEORDER),"M/d/Y h:i:s").'</td>';
				  		echo '<td> &#8369 '. number_format($result->PRICE,2).' </td>';
				  		echo '<td align="center" >'. $result->O_QTY.'</td>';
				  		?>
				  		 <td> &#8369 <output><?php echo  number_format($result->O_PRICE,2); ?></output></td> 
				  		<?php
				  		
				  		echo '</tr>';
				 
				}
				?> 
			</tbody>
		<tfoot >
		<?php 
				 $query = "SELECT * FROM `tblpayment` p ,`tblcustomer` c 
				WHERE   p.`CUSTOMERID`=c.`CUSTOMERID` and ORDERNUMBER='".$_SESSION['ordernumber']."'";
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();

		if ($cur->PAYMENTMETHOD=="Cash on Delivery") {
		
			$price = 25.00;
		}else{
			$price = 0.00;
		}


		$tot =   $cur->TOTALPRICE  - 25.00;
		?>

	 </tfoot>
       </table> <hr/>
 		<div class="row">
		  	<div class="col-md-6 pull-left">
		  		 <?php ?>
		  		<div>Payment Method : <?php echo $cur->PAYMENTMETHOD; ?></div>

		  	</div>
		  	<div class="col-md-4 pull-right">
		  		<div>Total Price : &#8369 <?php echo number_format($tot,2);?></div>
		  		<div>Delivery Fee : &#8369 <?php echo number_format($price,2); ?></div>
		  		<div>Overall Price : &#8369 <?php echo number_format($cur->TOTALPRICE,2); ?></div>
		  	</div>
		  </div>
		 
		  <?php
		  if($cur->STATS=="Confirmed"){
		  ?>
		   <hr/> 
		  <div class="row">
		 		 <p>Please print this as a proof of purchased</p><br/>
		  	  <p>We hope you enjoy your purchased products. Have a nice day!</p>
		  	  <p>Sincerely.</p>
		  	  <h4>Katerina's Homemade Goodies</h4>
		  </div>
		  <?php }?>
  </div> 

</span>

		<div class="modal-footer">
		 <div id="divButtons" name="divButtons">
		<?php if($result->STATS=='Pending' || $result->STATS=='Cancelled' ){ ?>

               <?php }else{  ?>
                <button  onclick="tablePrint();" class="btn btn_katerina pull-right "><span class="glyphicon glyphicon-print" ></span> Print</button>     
             
               <?php } ?>
			<button class="btn btn_katerina" id="btnclose" data-dismiss="modal" type=
			"button">Close</button> 
		 </div> 
	
		</div>
	
</div>
</div>
 
  <script>
function tablePrint(){ 

    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
    
   
    return false; 

    } 
   
</script>