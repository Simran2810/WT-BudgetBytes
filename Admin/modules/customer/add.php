 
                      <?php 
                      $autonum = New Autonumber();
                      $res = $autonum->single_autonumber(1);

                       ?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

          <fieldset>
            <legend>New Customer</legend>

              <!--    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CUSTOMERID">Customer Id:</label>

                      <div class="col-md-8"> -->
                         <input class="form-control input-sm" id="CUSTOMERID" name="CUSTOMERID" placeholder=
                            "Customer Id" type="hidden" value="<?php echo $res->AUTO; ?>">
                     <!--  </div>
                    </div>
                  </div> -->

                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FIRSTNAME">First Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="FIRSTNAME" name="FIRSTNAME" placeholder=
                            "First Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "LASTNAME">Last Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="LASTNAME" name="LASTNAME" placeholder=
                            "Last Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CITYADDRESS">City Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="CITYADDRESS" name="CITYADDRESS" placeholder=
                            "City Address" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                            "Address" type="text" value="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "EMAIL">Email Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="UEMAIL" name="UEMAIL" placeholder=
                            "Email Address" type="email" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PASS">Password:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PASS" name="PASS" placeholder=
                            "Password" type="password" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CONTACTNUMBER">Contacat Number:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="CONTACTNUMBER" name="CONTACTNUMBER" placeholder=
                            "Contacat Number" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ZIPCODE">Zip Code:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ZIPCODE" name="ZIPCODE" placeholder=
                            "Zip Code" type="TEXT" value="">
                      </div>
                    </div>
                  </div>
 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "image">Upload Image:</label>

                      <div class="col-md-8">
                      <input type="file" name="image" value="" id="image"/>
                      </div>
                    </div>
                  </div>
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <a href="index.php" class="btn btn_katerina"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a>
                        <button class="btn btn_katerina" name="save" type="submit" ><strong>Save</strong></button>
                     </div>
                    </div>
                  </div>

              
          </fieldset> 

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

        </div><!--End of container-->