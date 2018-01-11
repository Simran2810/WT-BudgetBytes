
<?php
require_once ("../../../include/initialize.php");
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }


if (isset($_POST['id'])){

if ($_POST['actions']=='confirm') {
							# code...
	$status	= 'Confirmed';	
	// $remarks ='Your order has been confirmed. The ordered products will be yours in the exact date and time that you have set.';
	 
}elseif ($_POST['actions']=='cancel'){
	// $order = New Order();
	$status	= 'Cancelled';
	// $remarks ='Your order has been cancelled due to lack of communication and incomplete information.';
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

<div class="modal-dialog" style="width:80%">
<div class="modal-content">
	<div class="modal-header">
		<button class="close" id="btnclose" data-dismiss="modal" type=
		"button">×</button>

		<!-- <h2 class="modal-title" id="myModalLabel"><strong>List of Ordered Products</strong></h2> -->
		<table class="table">
			<tr>
				<td>Name : <?php echo $cur->FIRSTNAME . ' '.  $cur->LASTNAME ;?></td>
				<td>Address : <?php echo $cur->ADDRESS; ?></td>
			</tr>
			 <tr><h2>ORDER NUMBER : <?php echo $_SESSION['ordernumber']; ?></h2></tr>
		</table>
		
	</div>

	<form action="controller.php?action=photos&id=<?php echo $customerid; ?>" enctype="multipart/form-data" method=
	"post">
		<div class="modal-body"> 
		<table id="table" class="katerina-table">
			<thead>
				<tr>
					<th>PRODUCT</th>
					<th>DESCRIPTION</th>
					<th>PRICE</th>
					<th>QUANTITY</th>
					<th>TOTAL PRICE</th>
					<th>DATE ORDER</th>
					<th>STATUS</th>
					<!-- <th></th>  -->
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
				  		echo '<td ><img src="../product/'. $result->IMAGES.'" width="60px" height="60px" title="'.$result->PRODUCTNAME.'"/></td>';
				  		// echo '<td>' . $result->PRODUCTNAME.'</td>';
				  		// echo '<td>'. $result->FIRSTNAME.' '. $result->LASTNAME.'</td>';
				  		echo '<td>'. $result->PRODUCTNAME.'</td>';
				  		echo '<td> &#8369 '.number_format($result->PRICE,2).' </td>';
				  		echo '<td align="center" >'. $result->O_QTY.'</td>';
				  		?>
				  		 <td> &#8369 <output><?php echo number_format($result->O_PRICE,2); ?></output></td> 
				  		<?php
				  		echo '<td>'. date_format(date_create($result->DATEORDER),"M/d/Y h:i:s").'</td>';
				  		echo '<td id="status" >'. $result->STATS.'</td>';
				  		// echo '<td><a  href="#"  data-id="'.$result->ORDERID.'"  class="cancel btn btn-danger btn-xs">Cancel</a>
				  		// 		<a href="#"  data-id="'.$result->ORDERID.'"   class="confirm btn btn-primary btn-xs">Confirm</a></td>';
				  		
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
			# code...
			$price = 10;
		}else{
			$price = 0;
		}
		?>
		 <tr>
		 	<!-- <td>Claimed Date</td> <td><?php //echo date_format(date_create($cur->CLAIMDATE),"M/d/Y h:i:s"); ?></td><td></td> -->
		 	<td></td><td></td><td></td>
             <td><div   align="right"> Total Price : </div><div   align="right"> Delivery Fee : </div></td>
             <td><div   align="left"> &#8369 <span id="sum">0.00</span></div><div   align="left">  &#8369 <span id="fee"><?php echo number_format($price,2); ?></span></div></td>
		 </tr>
         <tr> 
             <td>Payment Method</td>
             <td><?php echo $cur->PAYMENTMETHOD; ?></td><td></td>
             <td><div align="right"> Overall Price :</div></td>
             <td><div align="left"> &#8369 <span id="overall"><?php echo number_format($cur->TOTALPRICE,2); ?></span></div> 
         </tr>
          </tfoot>
       </table>  
		</div> 
		<div class="modal-footer">
			<button class="btn btn_katerina" id="btnclose" data-dismiss="modal" type=
			"button">Close</button> <!-- <button class="btn btn-primary"
			name="savephoto" type="submit">Upload Photo</button> -->
		</div>
	</form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script>
  var table = document.getElementById('table');
    var items = table.getElementsByTagName('output');
    var sum = 0;

    // total price
    for(var i=0; i<items.length; i++)
        sum +=  parseInt(items[i].value);        
// for cart
    var totprice = document.getElementById('sum');
    totprice.innerHTML =  sum.toFixed(2);
    </script>