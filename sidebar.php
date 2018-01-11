 <?php
 require_once ("include/initialize.php"); 
 
if(isset($_POST['btnLogin'])){
    $email = trim($_POST['user_email']);
    $upass  = trim($_POST['user_pass']);
    $h_upass = sha1($upass);
    
     if ($email == '' OR $upass == '') {

        message("Invalid Username and Password!", "error");
        redirect("index.php");
           
      } else {  
  //customer
        $cus = new Customer();
        $cusres = $cus::cusAuthentication($email,$h_upass);

        if ($cusres==true){
           redirect(web_root."index.php?page=9");
        }
  //admin
        $user = new User();
        $res = $user::userAuthentication($email, $h_upass);
        if ($res==true) { 
         // message("You log on as  ".$_SESSION['TYPE'].".","success"); 
           redirect(web_root."admin/index.php");
        }  

        if($res==false OR $cusres==false){
           
           redirect(web_root."index.php");
        }
  }
 }
 if(isset($_GET['page'])<>8){
  unset($_SESSION['ordernumber']);
 }
 ?> 
 <div class="table-reponsive" style="">
 
 <div class="col-md-3">
      <!--<div class="jumbotron">-->
        <div class="">
          <div class="panel panel-default">
            <div class="panel-body">  
              <fieldset>  

        <div class="list-group"> 
         <form method="POST" action="index.php?page=2">
           <h2>Search</h2> 
              <div class="input-group" style="margin-top:5%;">
              <input type="text" name="txtsearch" placeholder = "product" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn_katerina" name="btnsearch" type="submit"><strong>Go!</strong></button>
              </span>
            </div><!-- /input-group -->
          </form>
 
          <h2>Categories</h2>
        <ul>
          <?php 
              $query = "SELECT * FROM `tblcategory` ";
              $mydb->setQuery($query);
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
        
          ?> 
          <li><a href="index.php?page=2&id=<?php echo $result->CATEGORYID; ?>"><?php echo $result->CATEGORY; ?></a></li>
          <?php
              } 
         ?>
          
        </ul>
<form  action="" onsubmit=" return validatepass()" method="POST">

<?php 

if (@!$_SESSION['cus_id']){
echo ' <h2>Login</h2> 

                <div class="col-md-12">
                <div class="form-group"> 
                <input   id="user_email" name="user_email" placeholder="Username" type="text" class="form-control input-sm" > 
                </div>
                <div class="form-group"> 
                <input name="user_pass" id="user_pass" placeholder="Password" type="password" class="form-control input-sm">
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-offset-1">
                <button type="submit" id="btnLogin" name="btnLogin" class="btn btn_katerina">Login</button>
                <a data-target="#smyModal" data-toggle="modal" class="signup" href="#">Sign Up</a>
                </div>
                </div>
 ';
}
 ?>
  </form>    
  <h4>Note</h4>

        <ul>
          <li>
            Sorry delivary service unavailable.

          </li>
          <li>
           Orders after 5 pm will be confirm on the next office hours.
           

          </li>
        </ul>
       </div>
       </form>
          </fieldset> 
            </div>

          </div>  
          
        </div>
    <!--  </div>-->
  </div>
 </div>
   <div class="modal fade" id="smyModal" tabindex="-1">

                   
         

</div><!-- /.modal -->
  