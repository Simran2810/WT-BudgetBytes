<?php  
	   if (!isset($_SESSION['cus_id'])){
      redirect("index.php");
     }


     if($_SESSION['katerinaConfiremd']>0){
       $query = "update `tblpayment` SET `HVIEW` = true WHERE `CUSTOMERID`='".$_SESSION['cus_id']."' AND STATS in ('Confirmed','Cancelled')  AND HVIEW=0";
        mysql_query($query);
     }
    

	  $customer = New Customer();
	  $singlecustomer = $customer->single_customer($_SESSION['cus_id']);
	?>
    
 
<div class="container">
 <?php require_once ('headnav.php'); 
?>

<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
    <div class="row">

  		<div class="col-sm-3"><!--left col-->
               <div class="panel panel-default">            
            <div class="panel-body">
            <a href="" data-target="#myModal" data-toggle="modal" >
            <img title="profile image" width="222" height="250" src="<?php echo 'customer/'. $singlecustomer->IMAGE; ?>">
            </a>
             </div>
          <ul class="list-group">
          
          </div>
         
            <li class="list-group-item text-muted">Profile</li>
             <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> <?php echo $singlecustomer->FIRSTNAME .' '.$singlecustomer->LASTNAME; ?> </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span><?php echo date_format(date_create($singlecustomer->DATEJOIN),'M. d, y');?></li>
            <!-- <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li> -->
           
            
          </ul> 
               
        
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
    	<?php
		check_message();
			
		?>

          <!-- <h1> <?php echo $singlecustomer->FIRSTNAME .' '.$singlecustomer->LASTNAME; ?>  </h1> -->

          <ul class="nav nav-tabs" id="myTab">
            <!--<li class="active"><a href="#home" data-toggle="tab">List of Orders</a></li>-->
            <li class="active"><a href="#messages" data-toggle="tab" style="color:gray">Basic Information</a></li>
            <li><a href="#settings" data-toggle="tab" style="color: gray">Update Account</a></li>
          </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
              <hr/>
                <form action="customer/controller.php?action=delete" Method="POST">  					
				<!--<table id="example" class="table table-hover"  > 
				  <thead>
				  	<tr>
				  		<th>No.</th>
              <th>ORDER NO.#</th>
              <th>DATE ORDER</th>  
              <th >TOTAL PRICE</th>
              <th >PAYMENT METHOD</th>  
              <th>STATUS</th>
              <th width="150px">REMARKS</th> 
				 
				  	</tr>	
				  </thead> 	 
			  <tbody>
				  	<?php 
                    $query = "SELECT * FROM `tblpayment` p ,`tblcustomer` c 
                  WHERE   p.`CUSTOMERID`=c.`CUSTOMERID` and c.`CUSTOMERID`='".$_SESSION['cus_id']."'";
              $mydb->setQuery($query);
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              ?>
              <tr>
              <td width="5%" align="center"></td>
              <!-- <td> <a href="#" class="get-id"  data-target="#myModal" data-toggle="modal" data-id="<?php echo  $result->ORDERNUMBER; ?>"><?php echo  $result->ORDERNUMBER; ?></a>
                   </td> -->
              <td> <a href="#" title="View list Of ordered" class="orderid"  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDERNUMBER; ?>"><?php echo  $result->ORDERNUMBER; ?></a>
               
              </td>
                  <td><?php echo date_format(date_create($result->DATEORDER),"M/d/Y h:i:s") ; ?></td>
                  <td> &#8369 <?php echo  $result->TOTALPRICE; ?></td>
                  <td><?php echo  $result->PAYMENTMETHOD; ?></td>
                  <td><?php echo  $result->STATS; ?></td>
                  <td><?php echo  $result->REMARKS; ?></td>
              </tr>
               


            <?php
				   
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>-->
				<div class="btn-group">
				  <!-- <a href="index.php?view=add" class="btn btn-default">New</a> -->
				  <div></div>
				  <!-- <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button> -->
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
               
               <ul class="list-group">   <!-- 
                  <li class="list-group-item text-left"><strong>Id Number </strong>
					<?php echo ': '.$singlecustomer->CUSTOMERID; ?></li> -->
			                  <li class="list-group-item text-left"><strong>First Name </strong> 
					 <?php echo ': '.$singlecustomer->FIRSTNAME; ?></li>
			                  <li class="list-group-item text-left">
					<strong>Last Name </strong>
					<?php echo ': '.$singlecustomer->LASTNAME; ?></li><!-- 
			                  <li class="list-group-item text-left"><strong>City Address </strong>
					<?php echo ': '.$singlecustomer->CITYADDRESS; ?></li> -->
			                  <li class="list-group-item text-left">
					<strong>Address </strong>
					<?php echo ': '.$singlecustomer->ADDRESS; ?></li>
			                  <li class="list-group-item text-left">
					<strong>Username </strong>
					<?php echo ': '.$singlecustomer->cus_uname; ?></li> 
					<li class="list-group-item text-left">
					<strong>Contact Number </strong>
					<?php echo ': '.$singlecustomer->CONTACTNUMBER; ?></li>
					<li class="list-group-item text-left">
					<strong>Zip Code</strong>
					<?php echo ': '.$singlecustomer->ZIPCODE; ?></li>
                  
                </ul> 
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings" >
            		 
                  <hr>
                  <form onsubmit="return profilepass()" class="form" action="customer/controller.php?action=edit" method="post" id="registrationForm">
                      <div class="form-group" style="color:white">
                          
                          <div class="col-xs-5">
                              <label for="FIRSTNAME"><h4>First name</h4></label>
                              <input value="<?php echo  $singlecustomer->FIRSTNAME; ?>"  type="text" class="form-control" name="FIRSTNAME" id="FIRSTNAME" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group" style="color:white">
                          
                          <div class="col-xs-5">
                            <label for="LASTNAME"><h4>Last name</h4></label>
                              <input value="<?php echo $singlecustomer->LASTNAME; ?>" type="text" class="form-control" name="LASTNAME" id="LASTNAME" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>

                      <div class="form-group" style="color:white">
                          <div class="col-xs-5">
                             <label for="ADDRESS"><h4>Address</h4></label>
                              <input value="<?php echo  $singlecustomer->ADDRESS; ?>" type="text" class="form-control" name="ADDRESS" id="ADDRESS" placeholder="enter address" title="enter your Address.">
                          </div>
                      </div>

                      <div class="form-group" style="color:white">
                          
                          <div class="col-xs-5">
                              <label for="CONTACTNUMBER"><h4>Phone</h4></label>
                              <input value="<?php echo $singlecustomer->CONTACTNUMBER; ?>" type="text" class="form-control" name="CONTACTNUMBER" id="CONTACTNUMBER" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div> 
                    
                      <div class="form-group" style="color:white">
                          
                          <div class="col-xs-5">
                              <label for="USERNAME"><h4>User Name</h4></label>
                              <input value="<?php echo $singlecustomer->cus_uname;  ?>" type="text" class="form-control" name="USERNAME" id="USERNAME" placeholder="Username" title="enter your username.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                   
                      <div class="form-group" style="color:white">
                          
                          <div class="col-xs-5">
                              <label for="password1"><h4>Password</h4></label>
                              <input value="" type="password" class="form-control" name="password1" id="password1" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group" style="color:white">
                          
                          <div class="col-xs-5">
                            <label for="password2"><h4>Verify</h4></label>
                              <input value="" type="password" class="form-control" name="password2" id="password2" placeholder="confirm password" title="enter your password2.">
                          </div>
                      </div> 
                      <div class="col-xs-5" style="color:white">
                              <label for="ZIPCODE"><h4>Zip Code</h4></label>
                              <input value="<?php echo $singlecustomer->ZIPCODE; ?>" type="text" class="form-control" id="ZIPCODE" name="ZIPCODE" placeholder="zipcode" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group" style="color:white">
                           <div class="col-xs-5">
                                <br>
                              	<button class="btn btn-lg btn-success" name="save" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
              <!-- </div> -->
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
 <!-- modalorder -->
<!--  <div class="modal fade" id="myOrdered">
 </div> -->

		 <!-- Modal photo -->
					<div class="modal fade" id="myModal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal" type=
									"button">×</button>

									<h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
								</div>

								<form action="customer/controller.php?action=photos" enctype="multipart/form-data" method=
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
  