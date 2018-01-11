 <!-- <div class="row">
  <div id="katerina-menu">
    <ul>
    <strong>
      <li class="active" ><a style="width:185px" href="<?php echo web_root; ?>index.php" accesskey="1" title="">HOME</a></li>
      <li><a style="width:263px" href="<?php echo web_root; ?>index.php?page=2" accesskey="2" title="">MENU</a></li>          
    
      <li><a style="width:249px" align="right" href="index.php?page=5" accesskey="4" title="">CUSTOMER CARE</a></li>
	  <li><a style="width:249px" align="right" href="index.php?page=3" accesskey="4" title="">ABOUT</a></li>
	
      <li><a align="center" width="30%"href="<?php echo web_root; ?>index.php?page=6"  accesskey="4"  class="img-cart" title=""><span class="glyphicon glyphicon-shopping-cart"></span><?php
               $countcart =isset($_SESSION['katerina_cart'])? count($_SESSION['katerina_cart']) : "0";
              echo $countcart;


                 ?></a></li>
				 
   
    </strong>
    </ul>
 
</div> 
  </div>-->
  
 
<div id="header-wrapper">
	<div id="header" class="container" style="background-image:url('images/food-1.jpg');height:200px; max-width:100%; ;opacity:0.8; ">

		<div id="logo">
			<span class="fa fa-pagelines" style="font-size:50px;"></span>
			<h1><a href="#">BudgetBytes</a></h1>
			<!--<img class="headimg" src="images/food-1.jpg" style="max-height:100%; max-width:100%; z-index:-999;" >-->

		<div id="menu">
			<ul>

				<li class="current_page_item"><a href="<?php echo web_root; ?>index.php" accesskey="1" title="">Home</a></li>
				<li><a href="<?php echo web_root; ?>index.php?page=2" accesskey="2" title="">Menu</a></li>
				<li><a href="index.php?page=5" accesskey="4" title="">Customer Care</a></li>
				
				<li><a href="index.php?page=3" accesskey="4" title="">About</a></li>
			</ul>
		</div>
	</div>
</div>