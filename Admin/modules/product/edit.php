<?php  

   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

  $PROID = $_GET['id'];
  $product = New Product();
  $singleproduct = $product->single_product($PROID);

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
/*ala pa taposa..tulog taaht*/
</style>
    
  <script>
     function myFunction() {
    var x = document.getElementById("image").value; 

      image = document.getElementById('pic');
                image.src = x;
}
   
</script> 
    <!--/span-->  
        
       <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"  />
 
          <fieldset>
            <legend>Update Product</legend> 
                 
             <div class="container">     
                <div class="row">
                  <div class= "main col-xs-9">
                  
                <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-3 control-label" for=
                      "PRODUCTNAME">Name:</label>

                      <div class="col-md-8">
                        <input  id="PRODUCTID" name="PRODUCTID"   type="hidden" value="<?php echo $singleproduct->PRODUCTID; ?>">
                         <input class="form-control input-sm" id="PRODUCTNAME" name="PRODUCTNAME" placeholder=
                            "Product Name" type="text" value="<?php echo $singleproduct->PRODUCTNAME; ?>">
                      </div>
                       
                    </div>
               </div>
                       
                  
                 

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-3 control-label" for=
                      "CATEGORY">Category:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="CATEGORY" id="CATEGORY">
                          <option value="None">Select Category</option>
                          <?php
                            //Statement

                         $category = New Category();
                          $singleocategory = $category->single_category($singleproduct->CATEGORYID);
                          echo  '<option SELECTED value='.$singleocategory->CATEGORYID.' >'.$singleocategory->CATEGORY.'</option>';


                          $mydb->setQuery("SELECT * FROM `tblcategory` where CATEGORYID <> '".$singleocategory->CATEGORYID."'");
                          $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          echo  '<option  value='.$result->CATEGORYID.' >'.$result->CATEGORY.'</option>';
                          }
                          ?>
          
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-3 control-label" for=
                      "QTY">Quantity:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="QTY" name="QTY" placeholder=
                            "Quantity" type="number" value="<?php echo $singleproduct->QTY; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-3 control-label" for=
                      "PRICE">Price:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PRICE" name="PRICE" placeholder=
                            "Price" type="number" step="any" value="<?php echo $singleproduct->PRICE; ?>">
                      </div>
                    </div>
                  </div>

                  
             <div class="form-group">
                    <div class="col-md-12">
                      <label class="col-md-3 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <a href="index.php" class="btn btn_katerina"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a>
                         <button class="btn btn_katerina" name="save" type="submit" >Save</button>
                      </div>
                    </div>
                  </div>
                  </div>
            

                 <div class="sidebar col-xs-3">
                    <div class="form-group">
                    <div class="col-md-12">
                      <div class="col-md-8">
                         <img name="pic" id="pic" src="<?php echo $singleproduct->IMAGES; ?>" width="215" height="300" title=""/>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div><!--End of container-->            
   
  
       
   <!--  <footer>
        <p>© Company janno</p>
    </footer> -->
</div>
<!--/.fluid-container-->
 </fieldset> 
 </form>