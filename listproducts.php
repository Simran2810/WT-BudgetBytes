  <?php require_once ('headnav.php'); 
?>
<link href="css/footer.css" rel="stylesheet">

<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<br>
 <div class="table-reponsive">
 <div class="container">
 <div class="col-sm-9">
 <?php    check_message(); ?>
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body">  
              <fieldset>  
              <?php 
              



              if (@$_GET['id']){
                $category = new Category();
                $result = $category->single_category(@$_GET['id']);
 
                  echo '<legend><h2 class="text-left">'.$result->CATEGORY.'</h2></legend>'; 
                }else{
                      echo '<legend><h2 class="text-left">Menu</h2></legend>';
                } 
              if(isset($_POST['btnsearch'])){
                // $query = "SELECT * FROM `tblproducts` p , `tblorigin` o ,`tblcategory` c 
                //   WHERE  p.`ORIGINID`=o.`ORIGINID` and p.`CATEGORYID`=c.`CATEGORYID` and STATUS='Available' and 
                //   p.`PRODUCTNAME` like '%".@$_POST['txtsearch']."%'";
                 $query = "SELECT * FROM `tblproducts` p  ,`tblcategory` c 
                  WHERE   p.`CATEGORYID`=c.`CATEGORYID` and STATUS='Available' and QTY > 0 and 
                  p.`PRODUCTNAME` like '%".@$_POST['txtsearch']."%'";
              }else{
                // $query = "SELECT * FROM `tblproducts` p , `tblorigin` o ,`tblcategory` c 
                //   WHERE  p.`ORIGINID`=o.`ORIGINID` and p.`CATEGORYID`=c.`CATEGORYID` and STATUS='Available' and 
                //   p.`CATEGORYID` like '%".@$_GET['id']."%'";
                 $query = "SELECT * FROM `tblproducts` p , `tblcategory` c 
                  WHERE p.`CATEGORYID`=c.`CATEGORYID` and STATUS='Available' and QTY > 0 and 
                  p.`CATEGORYID` like '%".@$_GET['id']."%'";
              }


              if(isset($_GET['name'])){
                 $query = "SELECT * FROM `tblproducts` p , `tblcategory` c 
                  WHERE p.`CATEGORYID`=c.`CATEGORYID` and STATUS='Available' and QTY > 0 and 
                  p.`PRODUCTNAME` like '%".@$_GET['name']."%'";
              }

                $mydb->setQuery($query);
                $cur = $mydb->executeQuery();

                $num_rows=mysql_num_rows($cur);
                if ($num_rows==0) {
                  # code...
                  echo '<h2 class="text-left">The Product is not Available. Try to search another products.</h2>';
                }else{
                $cur = $mydb->loadResultList();               
          
                foreach ($cur as $result) { 
                $image = 'admin/modules/product/'.$result->IMAGES;

             if ($result->PRICE < 50){
                $fixedqty = round(50/$result->PRICE);
                if ($result->QTY < $fixedqty){
                 $btn = "Unavailable";
                }else{
                  $btn = "Order Now!";
                }
              }else{
                  $btn = "Order Now!";
                
              } 
            ?>
             <div style="float:left; width:370px; margin-left:10px;"> 
             <div style="float:left; width:70px; margin-bottom:10px;">       
              <img src="<?php echo $image; ?>" width="180px" height="200px" style="-webkit-border-radius:5px; -moz-border-radius:5px;"/>
            </div>  
        
           <div style="float:right; height:125px; width:180px; margin:0px; color:#000033;"> 
          <form   method="POST" action="cart/controller.php?action=add"> 
              <input type="hidden" name="PRODUCTID" value="<?php echo $result->PRODUCTID ;?>"/>
              <input type="hidden" name="PRICE" value="<?php echo number_format($result->PRICE,2) ;?>"/> 
            <?php
              echo '<p><strong>Name: '.$result->PRODUCTNAME.'<br/>   
                   <strong>Price: </strong>  &#8369 '. number_format($result->PRICE,2). '<br/>
                    <strong>Available Quantity: '.$result->QTY.'<br/>  
                   </p>';
                  ?>
                     <div class="form-group">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12">
                                <!-- <input type="submit" class="btn btn-primary btn-sm" data-target="#myModal" data-toggle="modal" name="btnbook"   value="Order Now!"/> -->
                                <?php 
                                // if (isset($_SESSION['TYPE'])){
                                // if ($_SESSION['TYPE']=='Administrator'){

                                // }elseif ($_SESSION['TYPE']=='Customer'){
                                echo   '<button  type="submit"  class="btn btn_katerina btn-sm"  name="btnorder"><strong>'.$btn.'</strong></button>';
                                // }
                              // }else{
                              //   echo   '<button type="button" class="btn btn_katerina btn-sm" data-target="#myModal" data-toggle="modal" name="btnorder"><strong>'.$btn.'</strong></button>';
                              //     // $btn = '<input type="button" data-target="#myModal" data-toggle="modal" class="btn btn_katerina btn-sm"  name="btnorder"   value="Order Now!"/>';
                              //   }
// }

                                   
                                ?>
                                  <br/>                
                               </div>
                            </div>
                          </div>
             
                  
              </form>
             </div>
            </div>
            

            <?php  
              }
              }
              ?>
              </fieldset> 
            </div>

          </div>  
          
        </div>
    <!--  </div>-->
    
    </div>
    <!--/span--> 

<?php require_once 'sidebar.php';?>
 </div>
</div>
      </form>
      
<div class="modal fade" id="myModal" tabindex="-1"> 
            <div class="modal-dialog"  style="width:50%">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Have already an account?</h4>
                </div>
 
                  <div class="modal-body" > 

                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#home" data-toggle="tab">Login</a></li> 
                  <li><a href="#settings" data-toggle="tab">Register</a></li>
                </ul>
                
                    <div class="tab-content"> 
                      <div class="tab-pane active" id="home">
                      <form action="login.php" enctype="multipart/form-data" method=
                        "post">
                          <div class="modal-body">
                              <div class="col-md-12">
                              <div class="form-group"> 
                              <label for="first_name">Username</label>
                              <input   id="user_email" name="user_email" placeholder="Email Address" type="email" class="form-control input-sm" > 
                              </div>
                              <div class="form-group"> 
                              <label for="first_name">Password</label>
                              <input name="user_pass" id="user_pass" placeholder="Password" type="password" class="form-control">
                              </div>
                              </div>
                              <div class="modal-footer">
                              <p align="left">&copy; Katerina Ordering System</p>
                              <button class="btn btn-default" data-dismiss="modal" type=
                              "button">Close</button> <button class="btn btn_katerina"
                              name="MbtnLogin" type="submit">Sign In</button>
                            </div>
                            
                          </div>

                      
                        </form>
                            
                       </div><!--/tab-pane-->
            
                       <div class="tab-pane" id="settings">
                  
  <form class="form-horizontal span6" action="customer/controller.php?action=add" method="POST" enctype="multipart/form-data">
   
            <legend><h2 class="text-left">Sign Up</h2></legend>
 
                      <?php 
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

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "CITYADDRESS">City Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="CITYADDRESS" name="CITYADDRESS" placeholder=
                            "City Address" type="text" value="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                            "Address" type="text" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "EMAIL">Email Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="UEMAIL" name="UEMAIL" placeholder=
                            "Email Address" type="email" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "PASS">Password:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PASS" name="PASS" placeholder=
                            "Password" type="password" value="">
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
              
        
        
                          <div class="modal-footer"><p align="left">&copy; Katerina Ordering System</p>
                            <button class="btn btn-default" data-dismiss="modal" type=
                            "button">Close</button> <button class="btn btn_katerina"
                            name="btnsignup" type="submit">Sign Up</button> 
                          </div> 
                          </form> 
                  </div> <!-- /.modal-body -->
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
  </div>
  </div>
