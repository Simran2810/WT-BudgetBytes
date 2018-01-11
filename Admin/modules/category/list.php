<?php 
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

?>
	<h3 align="left">List of Category</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-hover" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>
				  	
				  		 Category</th>
				  		<th></th>
				  		<th></th>
				  		
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tblcategory`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td><value="'.$result->CATEGORYID. '"/>
				  				<a href="index.php?view=edit&id='.$result->CATEGORYID.'">  <span class="glyphicon glyphicon-pencil"></a>
				  				<a href="index.php?view=edit&id='.$result->CATEGORYID.'">' . $result->CATEGORY.'</a></td>';
				  		echo '<td> </td>';
				  		echo '<td> </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
					<?php
					if($_SESSION['TYPE']=='Administrator'){
					//echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
					; }?>
				</div>
			
			
				</form>
	

</div> 