<?php require_once ('../headnav.php'); 
?>
<?php  
	 
	  $customer = New Customer();
	  $singlecustomer = $customer->single_customer($_SESSION['USERID']);
	?>

<?php  
 
  $user = New User();
  $singleuser = $user->single_user($_SESSION['USERID']);

?>    
<link href="../css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<hr>
<div class="container">

    <div class="row">

  		<div class="col-sm-3"><!--left col-->
               <div class="panel panel-default">            
            <div class="panel-body">
            <a href="/users" >
            <img title="profile image" width="222" height="250" src="<?php echo $singlecustomer->IMAGE; ?>">
            </a>
             </div>
          <ul class="list-group">
          
          </div>
         
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2014</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> Joseph Doe</li>
            
          </ul> 
               
         
          
        </div> 
    	<div class="col-sm-9">
    	<?php
		check_message();
			
		?>

          <h1> <?php echo $singlecustomer->FIRSTNAME .' '.$singlecustomer->LASTNAME; ?>  </h1>

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">List of Orders</a></li>
            <li><a href="#messages" data-toggle="tab">Profile</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
              <hr/>
                <form action="controller.php?action=delete" Method="POST">  					
				<table id="katerina" class="table table-hover"  > 
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th> 
				  		<input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  
				  		ITEMS</th>				  		 
				  		<th width="40px">PRICE</th>
				  		<th width="30px">QUANTITY</th>
				  		<th width="30px">TOTAL</th>
				  		<th width="200px">ORDER DATE</th>	
				  		<th>STATUS</th> 
				 
				  	</tr>	
				  </thead> 	 
			  <tbody>
				  	<?php 
				  		$query = "SELECT * FROM `tblproducts` p , `tblorder` o ,`tblcustomer` c 
				  				WHERE  p.`PRODUCTID`=o.`PRODUCTID` and o.`CUSTOMERID`=c.`CUSTOMERID` and c.`CUSTOMERID`='".$_SESSION['USERID']."'";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->ORDERID. '"/> 
				  				 ' . $result->PRODUCTNAME.'</td>';
				  		echo '<td>&#8369 '. $result->PRICE.'</td>';
				  		echo '<td align="center" >'. $result->O_QTY.'</td>';
				  		echo '<td>&#8369 '. $result->O_PRICE.'</td>';
				  		echo '<td>'. $result->DATEORDER.'</td>';
				  		echo '<td >'. $result->STATS.'</td>';
				  		
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>
				<div class="btn-group">
				  <!-- <a href="index.php?view=add" class="btn btn-default">New</a> -->
				  <div></div>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
            
                <hr>
                <div class="row">
                  <div class="col-md-4 col-md-offset-4 text-center">
                  	<ul class="pagination" id="myPager"></ul>
                  </div>
                </div>
              </div><!--/table-resp-->
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <ul class="list-group">   
                  <li class="list-group-item text-muted">Basic Information</li>
                  <li class="list-group-item text-left"><strong>Id Number </strong>
					<?php echo ': '.$singlecustomer->CUSTOMERID; ?> 2.13.2014</li>
			                  <li class="list-group-item text-left"><strong>First Name </strong> 
					 <?php echo ': '.$singlecustomer->FIRSTNAME; ?></li>
			                  <li class="list-group-item text-left">
					<strong>Last Name </strong>
					<?php echo ': '.$singlecustomer->LASTNAME; ?></li>
			                  <li class="list-group-item text-left"><strong>City Address </strong>
					<?php echo ': '.$singlecustomer->CITYADDRESS; ?></li>
			                  <li class="list-group-item text-left">
					<strong>Address </strong>
					<?php echo ': '.$singlecustomer->ADDRESS; ?></li>
			                  <li class="list-group-item text-left">
					<strong>Email Address </strong>
					<?php echo ': '.$singleuser->UEMAIL; ?></li> 
					<li class="list-group-item text-left">
					<strong>Contact Number </strong>
					<?php echo ': '.$singlecustomer->CONTACTNUMBER; ?></li>
					<li class="list-group-item text-left">
					<strong>Zip Code</strong>
					<?php echo ': '.$singlecustomer->ZIPCODE; ?></li>
                 
                </ul> 
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
            		
               	
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-5">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-5">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-5">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-5">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-5">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-5">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-5">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-5">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div> 

                      <div class="form-group">
                           <div class="col-xs-5">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

 
 
		 <!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal" type=
									"button">×</button>

									<h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
								</div>

								<form action="controller.php?action=photos&id=<?php echo $customerid; ?>" enctype="multipart/form-data" method=
								"post">
									<div class="modal-body">
										<div class="form-group">
											<div class="rows">
												<div class="col-md-12">
													<div class="rows">
														<div class="col-md-8">
															<input name="MAX_FILE_SIZE" type=
															"hidden" value="1000000"> <input id=
															"photo" name="photo" type=
															"file">
														</div>

														<div class="col-md-4"></div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn btn-default" data-dismiss="modal" type=
										"button">Close</button> <button class="btn btn-primary"
										name="savephoto" type="submit">Upload Photo</button>
									</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
  