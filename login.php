 <?php
 require_once ("include/initialize.php"); 
 if (@$_GET['page'] <= 2 or @$_GET['page'] > 5) {
  # code...
    unset($_SESSION['PRODUCTID']);
    // unset($_SESSION['QTY']);
    // unset($_SESSION['TOTAL']);
}  
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
 if(isset($_POST['MbtnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass2']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {
// echo "<script> alert('Invalid Username and Password!'); </script>";
// return false;
      message("Invalid Username and Password!", "error");
       redirect(web_root."index.php?page=6");
         
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
          
           redirect(web_root."index.php?page=6");
        }
 }
 }
 ?> 
 