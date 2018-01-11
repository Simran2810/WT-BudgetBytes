<?php  
	  @$customerid = $_GET['id'];	 

	  $customer = New Customer();
	  $singlecustomer = $customer->single_customer($customerid);
	?>

    <?php  
      $user_id = $_GET['id'];
      $user = New User();
      $singleuser = $user->single_user($user_id);

    ?>
<div class="container">
<div class="panel-body inf-content">
	 <div class="row">
        <div class="col-md-4">
        <a data-target="#myModal" data-toggle="modal" href="" title=
						"Click here to Change Image.">
            <img alt="" style="width:600px; height:400px;>" title="" class="img-square img-thumbnail isTooltip" src="../customer/<?php echo $singlecustomer->IMAGE; ?>" data-original-title="Usuario">          
          </a>  
        </div>
        <div class="col-md-6">

            <h1><strong>Customer Details</strong></h1><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
               
                    <tr>    
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-user  text-primary"></span>     -->
                                Id Number                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->CUSTOMERID; ?>     
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-cloud text-primary"></span>   -->
                                Name                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->FIRSTNAME . ' ' .$singlecustomer->LASTNAME; ?>  
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-bookmark text-primary"></span>  -->
                                City Address                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->CITYADDRESS; ?>
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                                Address                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->ADDRESS; ?>
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                                Email Address                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singleuser->UEMAIL; ?>
                        </td>
                    </tr>


                     <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                                Contact Number                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->CONTACTNUMBER; ?>
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <!-- <span class="glyphicon glyphicon-eye-open text-primary"></span>  -->
                                Zipcode                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo ': '.$singlecustomer->ZIPCODE; ?>
                        </td>
                    </tr>
                    
 
 
						<tr>        
                        <td>
                            
							<a href="index.php" class="btn btn-primary" name="back" type="submit">Back</a>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                                 
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>			