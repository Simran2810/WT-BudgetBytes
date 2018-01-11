<?php
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

?>
	<h3 align="left">List of User</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-hover" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>
				  		  
				  		 Account Name</th>
				  		<th>Username</th>
				  		<th>Type</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	
				  		$mydb->setQuery("SELECT * 
											FROM  `tblusers` WHERE not TYPE = 'Customer'");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td>
				  				<a href="index.php?view=edit&id='.$result->USERID.'">' . $result->NAME.'</a></td>';
				  		echo '<td>'. $result->USERNAME.'</td>';
				  		echo '<td>'. $result->TYPE.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
				<?php
			
					echo '
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  </div>';
		 ?>
			
				</form>
	

</div> 