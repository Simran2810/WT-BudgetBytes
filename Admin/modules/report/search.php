
<?php require_once("../../../include/initialize.php");
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }


?>

<div class="container">
	<div class="panel">
		<div class="panel-body">
	<div class="row">

		<!-- <form class="form-inline pull-right" action="index.php" method="post"> 
		 <div class="form-group">
		<h4>Date Filter :: </h4>
		</div>
		 <div class="form-group">
		 <input class="form-control date start input-default" type="date" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] : ''; ?>"  name="start" id="from"    >
		 </div>
		  <div class="form-group"> 
		      <input class="form-control date end input-default" type="date" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] : ''; ?>"  name="end" id="end"  >
		  </div>
		  
		  <button type="submit" name="submit" class="btn btn_fixnmix btn-default"><span class="glyphicon glyphicon-search"></span></button>
		</form> -->

		<form class="form-inline pull-right" action="index.php" method="post"> 
		 <div class="form-group">
		<h4>Seach :: </h4>
		</div>
		 <div class="form-group">
		 <input class="form-control input-default" type="text" value="<?php echo (isset($_POST['procduct'])) ? $_POST['procduct'] : ''; ?>"  name="procduct" id="procduct"    >
		 </div>
		  <div class="form-group"> 
		  <select class="form-control input-default"  name="category">
		  	<?php 
		  		$query = "SELECT * FROM `tblcategory`";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
							echo '<option value='.$result->CATEGORYID.' >'.$result->CATEGORY.'</option>';
						}
				?>
		  </select>


        </div>
         <div class="form-group">
		<h4>From :: </h4>
		</div>
		 <div class="form-group">
		 <input class="form-control date start input-default" type="date" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] : ''; ?>"  name="start" id="start"    >
		 </div>
		  <div class="form-group">
		<h4>To :: </h4>
		</div>
		  <div class="form-group"> 
		      <input class="form-control date end input-default" type="date" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] : ''; ?>"  name="end" id="end"  >
		  </div>
		  
		  <button type="submit" name="search" class="btn btn_fixnmix btn-defualt"><span class="glyphicon glyphicon-search"></span></button>
		</form>

 </div> <br/> 
 
<form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<span id="printout">
<?php
if(isset($_POST['search'])){ ?> 

<div class="row" ><h3 align="center">List of Ordered Products From <?php echo ((@$_POST['start']) ? date_format(date_create($_POST['start']),'d/m/Y') : '') . ' to ' .  ((@$_POST['end']) ? date_format(date_create( $_POST['end']),'d/m/Y') : '');?></h3></div>
<table  class="table table-bordered" cellspacing="0">
<thead>
<tr bgcolor="#00CED1">

<td ><strong>Product Name</strong></td>
<td ><strong>Category</strong></td>
<td ><strong>Date Ordered</strong>
<td ><strong>Remaining Qty</strong></td>
<td ><strong>Original Price</strong></td> 
<td ><strong>Sold Qty</strong></td> 
<!-- <td ><strong>Quantity</strong></td> -->
<td ><strong>Total Price</strong></td>
</tr>
</thead>
<tbody>		


<?php 





	$query ="SELECT p.`PRODUCTID` ,  `PRODUCTNAME` ,  `CATEGORY` ,DATE_FORMAT(date(DATEORDER),'%d / %m  / %Y') as 'Dateoredered',  `QTY` ,  `PRICE` ,  `O_QTY` ,  `O_PRICE` 
			FROM  `tblproducts` p,  `tblorder` o,  `tblcategory` g
			WHERE p.`PRODUCTID` = o.`PRODUCTID` 
			AND p.`CATEGORYID` = g.`CATEGORYID`  AND `STATS`='Confirmed' AND  
			DATE(DATEORDER)>='".$_POST['start']."' AND DATE(DATEORDER) <='".$_POST['end']."' 
			 AND  g.`CATEGORYID` ='" . $_POST['category'] ."' 
			AND PRODUCTNAME LIKE '%" .$_POST['procduct']. "%'";

	$mydb->setQuery($query);
	$cur = $mydb->loadResultList();

	foreach ($cur as $result) {
		echo '	<tr >';
		echo '<td>'.$result->PRODUCTNAME.'</td>';
		echo '<td>'.$result->CATEGORY.'</td>';
		echo '<td>'.$result->Dateoredered.'</td>';
		echo '<td>'.$result->QTY.'</td>'; 
		echo '<td>'.$result->PRICE.'</td>';
		echo '<td>'.$result->O_QTY.'</td> ';
		// echo '<td>'.$row['ALLQTY'].'</td>'
		echo '<td>'.$result->O_PRICE.'</td>';
		echo '</tr>';
		@$overall +=$result->O_PRICE;
		@$overallqty +=$result->O_QTY;
		@$categ = $result->CATEGORY;
	}
} ?>
<?php if(isset($_POST['submit'])){ ?>
<div class="row" ><h3 align="center">Overall Income  From <?php echo ((@$_POST['start']) ? $_POST['start'] : '') . ' to ' .  ((@$_POST['end']) ? $_POST['end'] : '');?></h3></div>
<table  class="table table-bordered" cellspacing="0">
<thead>
<tr bgcolor="#bbd43b">

<td ><strong>Name</strong></td>
<td ><strong>Order Number</strong></td>
<td ><strong>Date Ordered</strong></td>
<td ><strong>Date Claimed</strong></td> 
<td ><strong>Payment Method</strong></td> 
<!-- <td ><strong>Quantity</strong></td> -->
<td ><strong>Total Price</strong></td>
</tr>
</thead>
<tbody>		
<?php
 

	
	$_SESSION['start']=$_POST['start'];
	$_SESSION['end']=$_POST['end'];	
 
	$query = "SELECT  `FIRSTNAME` ,  ' ',  `LASTNAME` ,  `ORDERNUMBER` ,  `DATEORDER` ,  `PAYMENTMETHOD` ,  `CLAIMDATE` ,ALLQTY,  `TOTALPRICE` ,  `STATS` 
				FROM  `tblcustomer` c,  `tblpayment` p
				WHERE c.`CUSTOMERID` = p.`CUSTOMERID` AND STATS='Confirmed' AND date(DATEORDER)>='".$_POST['start']."' AND date(DATEORDER) <='".$_POST['end']."'";
				$result = mysql_query($query) or die(mysql_error());

		$rowcount = mysql_num_rows($result) or die(mysql_error());
 
	if ($rowcount>0)	{
		while ($row = mysql_fetch_array($result)) {
			# code...

		echo '	<tr >';
		echo '<td>'.$row['FIRSTNAME']." ".$row['LASTNAME'].'</td>';
		echo '<td>'.$row['ORDERNUMBER'].'</td>';
		echo '<td>'.$row['DATEORDER'].'</td>';
		echo '<td>'.$row['CLAIMDATE'].'</td>';
		echo '<td>'.$row['PAYMENTMETHOD'].'</td> ';
		// echo '<td>'.$row['ALLQTY'].'</td>'
		echo '<td>'.$row['TOTALPRICE'].'</td>';
		echo '</tr>';


				@$overall += $row['TOTALPRICE'];
		}

	}else{
			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

	}
		 
	}
?>
</tbody>

</table>
<table>
 <tfoot class="margin-left:6%" >
	<tr  align="right"  >
		<td width="200px"> </td>
		<td width="200px"></td>
		<td width="200px"></td>
		<td width="200px"> </td>
		<td width="200px"> <h4 align="right"  >Overall Quantity :: <?php echo isset( $overallqty) ? $overallqty : 0; ?></h4> </td>
		<td width="200px" align="right"><h4 align="right"  > Overall Price ::  &#8369 <?php echo isset( $overall) ? $overall : 0; ?> </h4></td>
	</tr>
 	
</tfoot>
</table>
 
</span>
<button onclick="tablePrint();" class="btn btn_fixnmix"><span class="glyphicon glyphicon-print"></span> Print Report</button>
 
</form>
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
	$(document).ready(function() {
		oTable = jQuery('#list').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});		
</script>