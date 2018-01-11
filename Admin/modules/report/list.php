<?php
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-body">
		     
		<form class="form-inline" action="" method="post">
		<strong>Date Filter : </strong>
		  <div class="form-group">
		 <input class="form-control date start input-sm" size="20" type="date" value="<?php echo (isset($_SESSION['start'])) ? $_SESSION['start'] : ''; ?>" Placeholder="Check In" name="start" id="from" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
		 </div>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputPassword2">Check Out:</label>
		      <input class="form-control date end input-sm" size="20" type="date" value="<?php echo (isset($_SESSION['end'])) ? $_SESSION['end'] : ''; ?>"  name="end" id="end" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
		  </div>
		  
		  <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
		</form>
	


<form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<span id="printout">
<table  class="table table-bordered" cellspacing="0">
<thead>
<tr bgcolor="#00CED1">
<td ><strong>Name</strong></td>
<td ><strong>Order Number</strong></td>
<td ><strong>Date Ordered</strong></td>
<td ><strong>Date Claimed</strong></td> 
<td ><strong>Payment Method</strong></td>
<td ><strong>Total Price</strong></td>
<td ><strong>Status</strong></td>
</tr>
</thead>
<tbody>		
<?php
if(isset($_POST['submit'])){
	$_SESSION['start']=$_POST['start'];
	$_SESSION['end']=$_POST['end'];	
	$query = "SELECT  `FIRSTNAME` ,  ' ',  `LASTNAME` ,  `ORDERNUMBER` ,  `DATEORDER` ,  `PAYMENTMETHOD` ,  `CLAIMDATE` ,  `TOTALPRICE` ,  `STATS` 
		FROM  `tblcustomer` c,  `tblpayment` p
		WHERE c.`CUSTOMERID` = p.`CUSTOMERID` AND date(DATEORDER)>='".$_SESSION['start']."' AND date(CLAIMDATE) <='".$_SESSION['end']."'";
				
		$result = mysql_query($query) or die(mysql_error());

		$rowcount = mysql_num_rows($result) or die(mysql_error());
 
	if ($rowcount>0)	{
		while ($row = mysql_fetch_array($result)) {
			# code...

		echo '	<tr >
				<td>'.$row['FIRSTNAME']." ".$row['LASTNAME'].'</td>
				<td>'.$row['ORDERNUMBER'].'</td>
				<td>'.$row['DATEORDER'].'</td>
				<td>'.$row['CLAIMDATE'].'</td>
				<td>'.$row['PAYMENTMETHOD'].'</td>
				<td>'.$row['TOTALPRICE'].'</td>
				<td>'.$row['STATS'].'</td>
				</tr>';
		}

	}else{
			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

	}
		 

	  }
?>
</tbody>
</table>
</span>
<button onclick="tablePrint();" class="btn btn_fixnmix"><span class="glyphicon glyphicon-print"></span> Print Report</button>

</form>
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