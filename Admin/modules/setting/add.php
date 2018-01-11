<?php
   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

?>

 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

          <fieldset>
            <legend>New Setting</legend>
                      
                  
              

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DESCRIPTION">Description:</label>

                      <div class="col-md-8">
                      <textarea class="form-control input-sm" id="DESCRIPTION" name="DESCRIPTION" rows="6">
                        
                      </textarea> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "TYPE">Type:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="TYPE" id="TYPE">
                          <option value="About">About Us</option>
                          <option value="Countact">Countact Us</option> 
                          <option value="CustomerCare">Customer Care</option>
                          <option value="Mission">Mission</option>
                          <option value="Vision">Vision</option>
                        </select> 
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