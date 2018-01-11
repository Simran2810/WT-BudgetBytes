<?php require_once 'include/initialize.php'; ?>



 <div class="modal-dialog"  style="width:50%">
  <div class="modal-content">
    <div class="modal-header">
      <button class="close" data-dismiss="modal" type=
      "button">×</button> 
          
   
            <legend><h2 class="text-left">Sign Up</h2></legend> 

               <?php // require_once 'cart/signmodal.php'; ?>
               <?php //require_once 'include/initialize.php'; ?>

              <form  class="form-horizontal span6" action="" name="personal" method="POST" enctype="multipart/form-data">
              <?php 
              // echo isset($_POST['FIRSTNAME'])? 'yes' : '';
              $autonum = New Autonumber();
              $res = $autonum->single_autonumber(1);

               ?> 
                  
                <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "FIRSTNAME">First Name:</label>
                      <input  id="CUSTOMERID" name="CUSTOMERID"  type="HIDDEN" value="<?php echo $res->AUTO; ?>"> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="FIRSTNAME" name="FIRSTNAME" placeholder=
                            "First Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "LASTNAME">Last Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="LASTNAME" name="LASTNAME" placeholder=
                            "Last Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                  
                <div class="panel panel-default">
                <div class="panel-head" style="margin-left:3%"><h3>address</h3></div>
                    <div class="panel-body">
                      <div class="form-group">
                        <div class="col-md-10">
                          <label class="col-md-4 control-label" for=
                          "HOMENUMBER">Home Number:</label>

                          <div class="col-md-8">
                             <input class="form-control input-sm" id="HOMENUMBER" name="HOMENUMBER" placeholder=
                                "Home Number" type="text" value="">
                          </div>
                        </div>
                      </div>

                       <div class="form-group">
                        <div class="col-md-10">
                          <label class="col-md-4 control-label" for=
                          "STREET">Street / Village:</label>

                          <div class="col-md-8">
                             <input class="form-control input-sm" id="STREET" name="STREET" placeholder=
                                "Street" type="text" value="">
                          </div>
                        </div>
                      </div>

                       <div class="form-group">
                        <div class="col-md-10">


                          <label class="col-md-4 control-label" for=
                          "BARANGGY">Barangay:</label>

                          <div class="col-md-8">
                             <input class="form-control input-sm" id="BARANGGY" name="BARANGGY" placeholder=
                                "Barangay" type="text" value="">
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="col-md-10">
                          <label class="col-md-4 control-label" for=
                          "CITYADDRESS">City:</label>

                          <div class="col-md-8">
                             <input class="form-control input-sm" id="CITYADDRESS" name="CITYADDRESS" placeholder=
                                "City Address" type="text" value="">
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
            

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "USERNAME">Username:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="USERNAME" name="USERNAME" placeholder=
                            "username" type="text" value="">
                      </div>
                    </div>
                  </div> 
                  
                   <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "PASS">Password:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PASS" name="PASS" placeholder=
                            "Password" type="password" value=""><span></span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "PASS"></label>

                      <div class="col-md-8">
                      <p>Note</p>
                        Password must be atleast 8 to 15 characters. Only letter, numeric digits, underscore and first character must be a letter.
                     </div> 
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "CONTACTNUMBER">Contact Number:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="CONTACTNUMBER" name="CONTACTNUMBER" placeholder=
                            "Contact Number" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "ZIPCODE">Zip Code:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ZIPCODE" name="ZIPCODE" placeholder=
                            "Zip Code" type="number" value="">
                      </div>
                    </div>
                  </div>
 
                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4" align = "right"for=
                      "image">Upload Image:</label>

                      <div class="col-md-8">
                      <input type="file" name="image" value="" id="image"/>
                      </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <div class="col-md-10">
                       <label class="col-md-4" align = "right"for=
                      "image"></label>
                      <div class="col-md-8">
                    <p>
           
                     
                      </div>
                    </div>
                  </div>

            
               
                  <div class="modal-footer"><p align="left">&copy; Katerina Ordering System</p>
                    <button class="btn btn-default" data-dismiss="modal" type=
                    "button">Close</button> 
                    <input type="button" data-target="#smyModal" data-toggle="modal"  value="Sign Up"  class="submit btn btn_katerina" onclick="return personalInfo();"/>
                  
                  </div> 
         
                </form> 
             
        </div> 
    </div>
  </div>
 
 <script language="javascript" type="text/javascript">
        function OpenPopupCenter(pageURL, title, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4; 
            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        } 
    </script>