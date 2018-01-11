<?php
   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

      $autonum = New Autonumber();
      $result = $autonum->single_autonumber(4);

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data" 

        onmousemove="
         if (PRICE.value==''){
            PRICE.value = '';
        }else{
         if (!parseInt(PRICE.value)){
           PRICE.value = '';
         }}
        " 
        oninput="
        if (PRICE.value==''){
            PRICE.value = '';
        }else{
         if (!parseInt(PRICE.value)){
           PRICE.value = '';
         }
        }">

          <fieldset>
            <legend>New Product</legend>
                   
                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PRODUCTNAME">Name:</label>

                      <div class="col-md-8">
                          <input id="PRODUCTID" name="PRODUCTID" placeholder=
                            "Product Name" type="hidden" value="<?php  echo $result->AUTO ?>">
                         <input class="form-control input-sm" id="PRODUCTNAME" name="PRODUCTNAME" placeholder=
                            "Product Name" type="text" value="">
                      </div>
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Category:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="CATEGORY" id="CATEGORY">
                          <option value="None">Select Category</option>
                          <?php
                            //Statement
                          $mydb->setQuery("SELECT * FROM `tblcategory`");
                          $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                          echo  '<option value='.$result->CATEGORYID.' >'.$result->CATEGORY.'</option>';
                          }
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "QTY">Quantity:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="QTY" name="QTY" placeholder=
                            "Quantity" type="number" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PRICE">Price:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PRICE"  step="any" name="PRICE" placeholder=
                            "&#8369 Price " type="text" value="">
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