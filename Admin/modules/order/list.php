
<div class="container">
	<?php
		 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

		check_message();
			
		?>

 

		<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
			<h3 align="left">List of Orders</h3>
			    <form action="controller.php?action=add" Method="POST">  					
				
                  <table id="example" class="table table-hover" cellspacing="0">
			 		<thead>
			 		<tr >
				  		<th>No.</th>
				  		<th>ORDER NO.#</th>
				  		<th>CUSTOMER</th>
				  		<th>DATEORDER</th>	 
				  		<th >TOTAL PRICE</th>
				  		<th >PAYMENT METHOD</th>	
				  		<th>STATUS</th>
				  		<th width="100px">ACTION</th>
				 
				  	</tr>	
			   		</thead>
			   		<tbody>
				  	<?php 
				  		$query = "SELECT * FROM `tblpayment` p ,`tblcustomer` c 
				  				WHERE   p.`CUSTOMERID`=c.`CUSTOMERID` ORDER BY p.`ID` desc ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
						?>

 

					<?php
						echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td><a href="#myModal" title="View list Of ordered" data-target="#myModal" data-toggle="modal" class="Aorderid" data-id="'.$result->ORDERNUMBER.'">'.$result->ORDERNUMBER .'</a> </td>';  
				  		echo '<td><a href="index.php?view=view&customerid='.$result->CUSTOMERID.'" title="View customer information">'. $result->FIRSTNAME.' '. $result->LASTNAME.'</a></td>';
				  		echo '<td>'. date_format(date_create($result->DATEORDER),"M/d/Y h:i:s").'</td>';
				  		echo '<td> &#8369 '.number_format($result->TOTALPRICE ,2).'</td>';
				  		echo '<td >'.$result->PAYMENTMETHOD .'</td>';
				  		// echo '<td>'.$result->REMARKS .'</td>';
				  		// echo '<td></td>';
				  		echo '<td >'. $result->STATS.'</td>';
				  		echo '<td><a href="controller.php?action=edit&id='.$result->ORDERNUMBER.'&actions=cancel" class="btn btn-danger btn-xs">Cancel</a>
				  				<a href="controller.php?action=edit&id='.$result->ORDERNUMBER.'&actions=confirm"  class="btn btn_katerina btn-xs">Confirm</a></td>';
				  		
				  		echo '</tr>';
 
				  	} 
				  	?>
				 </tbody>
				 	
				</table>
				
				</form>
	  		</div><!--End of Panel Body-->
	  	</div><!--End of Main Panel-->

  <div class="modal fade" id="myModal" tabindex="-1">
						
	</div><!-- /.modal -->
