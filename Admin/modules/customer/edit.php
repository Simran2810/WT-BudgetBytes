<?php  
  $customerid = $_GET['id'];
  $customer = New Customer();
  $singlecustomer = $customer->single_customer($customerid);

  ?>

  <?php  
  $user_id = $_GET['id'];
  $user = New User();
  $singleuser = $user->single_user($user_id);

?> 
 <style type="text/css">
.sidebar-left .main{
  float:right;
}
.idebar-left .sidebar{
  float:left;
}

.sidebar-right .main{
  float:left;
}
.idebar-right .sidebar{
  float:right;
}
 
</style>
 
        
       <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"  />
  
          <fieldset>
            <legend>Update Customer</legend>
                <div class="container">     
                <div class="row">
                  <div class= "main col-xs-9">
                
                         <input class="form-control input-sm" id="CUSTOMERID" name="CUSTOMERID" placeholder=
                            "Customer Id" type="hidden" value="<?php echo $singlecustomer->CUSTOMERID; ?>">
               
                <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "FIRSTNAME">First Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="FIRSTNAME" name="FIRSTNAME" placeholder=
                            "First Name" type="text" value="<?php echo $singlecustomer->FIRSTNAME; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "LASTNAME">Last Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="LASTNAME" name="LASTNAME" placeholder=
                            "Last Name" type="text" value="<?php echo $singlecustomer->LASTNAME; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "CITYADDRESS">City Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="CITYADDRESS" name="CITYADDRESS" placeholder=
                            "City Address" type="text" value="<?php echo $singlecustomer->CITYADDRESS; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                            "Address" type="text" value="<?php echo $singlecustomer->ADDRESS; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "EMAIL">Email Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="UEMAIL" name="UEMAIL" placeholder=
                            "Email Address" type="email" value="<?php echo $singleuser->UEMAIL; ?>">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "PASS">Password:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PASS" name="PASS" placeholder=
                            "Password" type="password" value="<?php //echo $singleuser->PASS; ?>">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "CONTACTNUMBER">Contacat Number:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="CONTACTNUMBER" name="CONTACTNUMBER" placeholder=
                            "Contacat Number" type="text" value="<?php echo $singlecustomer->CONTACTNUMBER; ?>">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "ZIPCODE">Zip Code:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ZIPCODE" name="ZIPCODE" placeholder=
                            "Zip Code" type="TEXT" value="<?php echo $singlecustomer->ZIPCODE; ?>">
                      </div>
                    </div>
                  </div>
 
                   
                    <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <a href="index.php" class="btn btn-primary" name="back" type="submit">Back</a>
                        <button class="btn btn-primary" name="save" type="submit" >Save</button>
                      </div>
                    </div>
                  </div>
                  </div>
            
                 <div class="sidebar col-xs-3">
                    <div class="form-group">
                    <div class="col-md-12">
                      <div class="col-md-8">
                         <img name="pic" id="pic" src="<?php echo $singlecustomer->IMAGE; ?>" width="215" height="300" title=""/>
                      </div>
                    </div>
                  </div>   
                </div>
                    
                </div>
            
        </div><!--End of container-->            
   
  
       
    <footer>
        <p>© Company janno</p>
    </footer>
</div>
<!--/.fluid-container-->
 </fieldset> 
 </form>