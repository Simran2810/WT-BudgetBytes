<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Katerina Ordering System</title>


<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>css/jquery.dataTables.css"> 
<link href="<?php echo web_root; ?>css/katerina.css" rel="stylesheet" media="screen">

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/katerina.js"></script> 

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],

        l
         "scrollY":        "300px",
        "scrollCollapse": true,

        "order": [[ 1, 'desc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

</script>

<script type="text/javascript" charset="utf-8">
  
$(document).on("click", ".get-id", function () {
   var p_id = $(this).data('id');

     $(".modal-body #PRODUCTID").val( p_id );
   
});


 
</script>



<link href="<?php echo web_root; ?>css/offcanvas.css" rel="stylesheet">  

 

</head>

<body>
<?php
if (customer_logged_in()) {?>
      <script type="text/javascript">
        window.location ="<?php echo web_root; ?>index.php";
      </script>

    <?php
    } ?>


 <div class="navbar navbar-fixed-top navbar-katerina"   role="navigation">
   <strong>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        
        </div>

        <div class="collapse navbar-collapse" >
          <ul class="nav navbar-nav">
          <?php if($_SESSION['TYPE']=='Administrator' || $_SESSION['TYPE']=='Staff' ){ 
                ?>
            <li class=" <?php echo (currentpage() == 'index.php') ? "active" : false;?>"><a href="<?php echo web_root; ?>admin/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="<?php echo (curPageName() == 'product') ? "active" : false;?>">
              
                <a href="<?php echo web_root; ?>admin/modules/product/index.php"><span class="glyphicon glyphicon-barcode"></span> Products</a>
             <?php
              }?>         
            </li>
             <li class="<?php echo (curPageName() == 'order') ? "active" : false;?>">
              <?php  if($_SESSION['TYPE']=='Administrator' || $_SESSION['TYPE']=='Staff' ){ 
                $query = "SELECT * FROM tblpayment WHERE STATS = 'Pending'";
               $mydb->setQuery($query);
               $cur = $mydb->executeQuery();
               $rowscount = $mydb->num_rows($cur);
               $res = isset($rowscount)? $rowscount : 0;
                ?>
                <a href="<?php echo web_root; ?>admin/modules/order/index.php"><span class="glyphicon glyphicon-list-alt"></span> Orders (<?php echo $res; ?>)</a>
             <?php
             
              }?>         
            </li>
         <li class="<?php echo (curPageName() == 'category') ? "active" : false;?>">
              <?php if($_SESSION['TYPE']=='Administrator'){ 
                ?>
                <a href="<?php echo web_root; ?>admin/modules/category/index.php"><span class="glyphicon glyphicon-th-list"></span> Category</a>
             <?php
              }?>         
            </li>
            <li class="<?php echo (curPageName() == 'user') ? "active" : false;?>">
              <?php if($_SESSION['TYPE']=='Administrator'){ 
                ?>
                <a href="<?php echo web_root; ?>admin/modules/user/index.php" ><span class="glyphicon glyphicon-user"></span>  Manage User</a>
             <?php
              }?>             
                <ul class="dropdown-menu">
                  <li><a href="<?php echo web_root; ?>admin/modules/#">User</a></li>
                </ul>  

            </li>
             <li class="<?php echo (curPageName() == 'report') ? "active" : false;?>">
             	<?php  
                if ($_SESSION['TYPE']=='Administrator' || $_SESSION['TYPE']=='Staff' ) {

                ?>
                <a href="<?php echo web_root; ?>admin/modules/report/index.php"><span class="glyphicon glyphicon-report"></span> Reports</a> 
             <?php
               }?>  
             </li>
            <li class="<?php echo (currentpage() == 'logout.php') ? "active" : false;?>">
             <?php if($_SESSION['TYPE']=='Administrator' || $_SESSION['TYPE']=='Customer'  || $_SESSION['TYPE']=='Staff'){ 
                ?>
                <a href="<?php echo web_root; ?>logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                 <?php  }?>   
            </li>
          </ul>           
        </div>

   </div>
   </strong>
 </div>
 
<?php 
if (isset($_GET['view'])<>'billing'){
    unset($_SESSION['katerina_cart']);
      unset($_SESSION['FIRSTNAME']);
      unset($_SESSION['LASTNAME']);
      unset($_SESSION['ADDRESS']);
      unset($_SESSION['CONTACTNUMBER']);
      unset($_SESSION['CLAIMEDDATE']);
      unset($_SESSION['CUSTOMERID']); 
      unset($_SESSION['paymethod']) ;
      unset($_SESSION['ORDERNUMBER']);
      unset($_SESSION['alltot']);
}
?>

<div class="container">
<?php  check_message(); ?>
 
  <?php require_once $content;?>

</div> 


<hr>
      <footer>
        <p align="Left">&copy; Katerina System </p></footer>
   
       <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
     <script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
     <script type="text/javascript" src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
    

<script type="text/javascript"> 

    $("#form_datetime").datetimepicker({
      language: 'en',
   
        format: 'mm/dd/yyyy', 
        autoclose: true

  });
  $("#end_datetime").datetimepicker({
      language: 'en',
      
        format: 'mm/dd/yyyy', 
        autoclose: true

  });

function validatedate(){
  
      var fname = document.getElementById('FIRSTNAME').value;
      var lname = document.getElementById('LASTNAME').value;
      var address = document.getElementById('ADDRESS').value;
      var contact = document.getElementById('CONTACTNUMBER').value;  
      var CUSTOMERID  = document.getElementById('CUSTOMERID').value; 
      var ORDERNUMBER  =document.getElementById('ORDERNUMBER').value;
      var alltot  =document.getElementById('sum').innerHTML;
 
     if (fname=='' || lname=='' || address=='' || contact==''){
        alert("Invalid to proceed the order. You must fill up all the empty fields.");
      }else{
        window.location = 'index.php?view=orderdetails&&CUSTOMERID='+CUSTOMERID+"&ORDERNUMBER="+ORDERNUMBER+"&fname="+fname+"&lname="+lname+"&address="+address+"&contact="+contact+"&alltot="+alltot;
      }
  }
</script>  

    <script type="text/javascript">
  $('.form_curdate').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_bdatess').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
</script>
<script>
  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
   function checkNumber(textBox){
        while (textBox.value.length > 0 && isNaN(textBox.value)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
      //
      function checkText(textBox)
      {
        var alphaExp = /^[a-zA-Z]+$/;
        while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
          textBox.value = textBox.value.substring(0, textBox.value.length - 1)
        }
        textBox.value = trim(textBox.value);
      }
      function calculate(){  

     var first = document.getElementById('first').value; 
     var second = document.getElementById('second').value; 
     var third = document.getElementById('third').value;  
     var fourth = document.getElementById('fourth').value;  

    var totalVal = parseInt(first) + parseInt(second) + parseInt(third) + parseInt(fourth) ;
    document.getElementById('finalave').value = totalVal;
     document.getElementById('finalave').value = Math.round((parseInt(totalVal)/4));  
        }
 

  function totalprice() {

  var table = document.getElementById('table');
    var items = table.getElementsByTagName('output');
    var sum = 0;

   
    for(var i=0; i<items.length; i++)
        sum +=  parseFloat(items[i].value);        

    var totprice = document.getElementById('sum');
    totprice.innerHTML =  sum.toFixed(2);
 

var paymethod = document.getElementById('paymethod').value;
var fee = 0.00
  
 if (paymethod=='Cash on Delivery'){
    fee = 10;
 }else{
    fee = 0;
 }

    
    var overall = 0;
     document.getElementById('fee').innerHTML = fee.toFixed(2);

    overall = sum + parseFloat(fee);

    var overallprice = document.getElementById('overall');

    overallprice.innerHTML = overall.toFixed(2); 

    document.getElementById("alltot").value = overallprice.innerHTML ;


 }
  </script>    
   

  </div>

</body>
</html>