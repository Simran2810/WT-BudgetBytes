
<div class="container">
	<?php
		check_message();
			
		?>
		<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
			<h3 align="left">List of Customer</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example"  class="table table-hover" cellspacing="0">
					
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		 CUSTOMERID</th>
				  		 <!-- <th>PICTURE</th> -->
				  		  <th>NAME</th>
				  		 <!-- <th>LASTNAME</th> -->
				  		 <!-- <th>CITYADDRESS</th> -->
				  		 <th>ADDRESS</th>
				  		<th>CONTACTNUMBER</th>
				  		<th>ZIPCODE</th> 
				  		<th></th> 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
				  		$query = "SELECT * FROM `tblcustomer` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CUSTOMERID. '"/>
				  				<a href="index.php?view=edit&id='.$result->CUSTOMERID.'">  <span class="glyphicon glyphicon-pencil"></a>
				  				<a href="index.php?view=edit&id='.$result->CUSTOMERID.'">' . $result->CUSTOMERID.'</a></td>';
				  		// echo '<td ><a href="index.php?view=view&id='.$result->CUSTOMERID.'"><img src="'. $result->IMAGE.'" width="60" height="60" title="'.$result->LASTNAME.'"/></a></td>';
				  		echo '<td>'. $result->FIRSTNAME.' ' . $result->LASTNAME .'</td>';
				  		// echo '<td>'. $result->LASTNAME.'</td>';
				  		// echo '<td>'. $result->CITYADDRESS.'</td>'; 
				  		echo '<td>'. $result->ADDRESS.'</td>';
				  		echo '<td>'. $result->CONTACTNUMBER.'</td>';
				  		echo '<td>'. $result->ZIPCODE.'</td>';
				  		echo '<td ><a href="index.php?view=view&id='.$result->CUSTOMERID.'" ><span class="glyphicon glyphicon-list"></span> View Information </a></td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  		</div><!--End of Panel Body-->
	  <!--	</div>End of Main Panel-->

</div><!--End of container-->
