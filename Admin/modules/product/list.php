
<div class="container">
	<?php
		 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

		check_message();
			
		?>
	
			<div class="panel-body">
			<h3 align="left">List of Products</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example"  class="table table-hover" cellspacing="0">
					
				  <thead>
				  	<tr>
				  	 
				  		<th>No.</th> 
				  		 <th width="50">Image</th>
				  		 <th width="250px">Product Name</th> 
				  		<th width="150px">Category</th>  
				  		<th width="150px">Quantity</th> 
				  		<th width="30px">Price</th>
				  		<th width="50px">Status</th> 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php  
				  	$query = "SELECT * FROM `tblproducts` p  ,`tblcategory` c 
				  				WHERE   p.`CATEGORYID`=c.`CATEGORYID`";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  	
				  	 echo '<td align="center" ><a href="index.php?view=view&id='.$result->PRODUCTID.'"><img src="'. $result->IMAGES.'" width="50" height="50" title="'.$result->PRODUCTNAME.'"/></a></td>';
				  		
				  	echo '<td><a href="index.php?view=edit&id='.$result->PRODUCTID.'">' . $result->PRODUCTNAME.'</a></td>';
				  		
				  		 
				  		echo '<td>'. $result->CATEGORY.'</td>'; 
				  		echo '<td>'. $result->QTY.'</td>'; 
				  		echo '<td> &#8369 '.  number_format($result->PRICE,2).'</td>';
				  		if ($result->STATUS=='Available'){
				  			$stats = 'Available';
				  		}else{
				  			$stats = 'NotAvailable';
				  		}
				  		echo '<td align="left">
				  		<a href="controller.php?action=edit&id='.$result->PRODUCTID.'&stats='.$stats.'" class="btn btn_katerina btn-xs">'.$stats.'</a></td>';
				  	echo '</tr>';
				  } 
				  	?>
				  </tbody>
					
				 	
				</table>
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
			</div>
				</form>
	  		</div>

</div>
