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

          //vertical scroll
         "scrollY":        "300px",
        "scrollCollapse": true,

        //ordering start at column 1
        "order": [[ 1, 'desc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );


</script> 



<script type="text/javascript"> 
 $(document).on("keyup", ".cusqty", function () {

      var productid = $(this).data('id');
      // alert(productid); 
      var qty = document.getElementById('QTY'+productid).value;
      // var price =  document.getElementById('PRICE'+productid).value; 
      var orignalprice =  document.getElementById('originalPRICE'+productid).value;
      var orignalqty =  document.getElementById('originalqty'+productid).value;
      var subtot;
        if ( parseInt(orignalqty) < parseInt(qty)){
          alert('The quantity that you put is greater than the available quantity of the product.');
            document.getElementById('QTY'+productid).value ="";
          $.ajax({    //create an ajax request to load_page.php
              type:"POST", 
              url: "index.php?page=6",  
               // url: "cart/controller.php?action=edit",                      
              dataType: "text",   //expect html to be returned  
              data:{updateid:productid},               
              success: function(data){                    
                $("#cart").html(data); 
                   // alert(data);
                  
              }

          });
        
          //return false;
        }

        subtot = parseFloat(orignalprice) * parseFloat(qty);


        document.getElementById('TOT'+productid).value = subtot.toFixed(2);
        document.getElementById('Osubtot'+productid).value  =  document.getElementById('TOT'+productid).value;

        var table = document.getElementById('table');
        var items = table.getElementsByTagName('output');

        var sum = 0;
        for(var i=0; i<items.length; i++)
          sum +=   parseFloat(items[i].value);

        var output = document.getElementById('sum');
        output.innerHTML =  sum.toFixed(2); 
        });

        $(document).on("change", ".cusqty", function () {
        var productid = $(this).data('id');
        // alert(productid);

        var qty = document.getElementById('QTY'+productid).value;
        // var price =  document.getElementById('PRICE'+productid).value; 
        var orignalprice =  document.getElementById('originalPRICE'+productid).value;
        var orignalqty =  document.getElementById('originalqty'+productid).value;

        var subtot;
         if ( parseInt(orignalqty) < parseInt(qty)){

            alert('The quantity that you put is greater than the available quantity of the product.');
             document.getElementById('QTY'+productid).value =orignalqty;
             subtot = parseFloat(orignalprice) * parseFloat(orignalqty);

          }else{
            subtot = parseFloat(orignalprice) * parseFloat(qty);

          }



$.ajax({    //create an ajax request to load_page.php
    type:"POST", 
    url: "index.php?page=6&QTY"+productid+"="+ qty + "&subTOT"+productid+"=" +  subtot.toFixed(2),  
     // url: "cart/controller.php?action=edit",                      
    dataType: "text",   //expect html to be returned  
    data:{updateid:productid},               
    success: function(data){                    
      $("#cart").html(data); 
         // alert(data); 
      }

    });
  });


 $(document).on("click", ".cusid", function () {

      var cusid = $(this).data('id');
      alert(cusid);
       $(".modal-body #cusid").val( cusid )

      });
</script>
 
<!-- Custom styles for this template -->
<link rel="stylesheet" href="<?php echo web_root; ?>css/prettyphoto/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<link href="css/facebox/facebox.css" media="screen" rel="stylesheet"  type="text/css" />
<link href="<?php echo web_root; ?>css/offcanvas.css" rel="stylesheet">  
<link href="<?php echo web_root; ?>css/katerina.css" rel="stylesheet" media="screen"> 
 

 
</head>

<body >
<?php
if (admin_logged_in()) {?>
      <script type="text/javascript">
        window.location =;
      </script>

    <?php
    } ?>

<?php if (isset($_SESSION['cus_id'])){ ?>

 <div class="navbar navbar-fixed-top navbar-katerina"   role="navigation">
   <strong>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"  href="#" title="View Sites"></a>
        </div> 
        <div class="collapse navbar-collapse" > 
     
          <ul class="nav navbar-nav" style="float:right;"> 
         
            <li class="dropdown-toggle">
      
                <a href="<?php echo web_root; ?>index.php?page=9"><span class="glyphicon glyphicon-user"></span> Profile </a>
          

           </li> 

             <li class="dropdown-toggle"> 
             <?php
                  $mydb->setQuery("SELECT count(*) as 'num'  FROM `tblpayment`  
                        WHERE `CUSTOMERID`='".$_SESSION['cus_id']."'  AND STATS in ('Confirmed','Cancelled') AND HVIEW=0")  ;    
                  
                  $res = $mydb->loadResultList();
                  foreach ($res as $key) {
                     # code...
                    $_SESSION['katerinaConfiremd'] = $key->num; 
                ?>
                 <a  id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope"> </span> (<?php echo $key->num;?>)</a>
                  <?php }?> 

                 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <?php 
                    $query = "SELECT * FROM `tblpayment` 
                  WHERE    `CUSTOMERID`='".$_SESSION['cus_id']."' AND STATS in ('Confirmed','Cancelled') AND HVIEW=0";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();

                  foreach ($cur as $result) {
                  ?>
                  
                  <li role="presentation"><a href="#" title="View list Of ordered" class="orderid"  data-target="#myOrdered" data-toggle="modal" data-id="<?php echo  $result->ORDERNUMBER; ?>"><?php echo  $result->STATS; ?> - Order Number ::<?php echo  $result->ORDERNUMBER; ?></a></li>

                  <?php }?> 
                 </ul>
                  
                <!-- <a href="<?php echo web_root; ?>index.php?page=9"><span class="glyphicon glyphicon-envelope"> </span> (<?php echo $key->num;?>)</a> -->
               
            </li>
            <li class="dropdown-toggle"> 
                <a href="<?php echo web_root; ?>logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                
            </li>
             
          </ul>  

        </div><!--/.navbar-collapse -->

   </div><!-- /.nav-collapse -->
   </strong>
 </div><!-- /.container -->
   <?php   }?>


 <!-- modalorder -->
 <div class="modal fade" id="myOrdered">
 </div>


   
<div class="container"> 
 <div class="row">
            <div class="col-md-3 portfolio-item"> 
                <img src="<?php echo web_root; ?>images/bblogo1.png"  height="150px" style="-webkit-border-radius:5px; -moz-border-radius:5px;" alt="Image">
                  
            </div>
            <div class="col-md-9 portfolio-item">
                <div class="row carousel-row">
        <div class="col-xs-12 col-xs-offset-2 slide-row">
            <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li> 
                 <li data-target="#carousel-1" data-slide-to="2"></li> 
              </ol>
            
            
              <!-- Wrapper for slides --> 
              <div class="carousel-inner" align="center"> 

                <?php
                $query = "SELECT * FROM `tblproducts` p  ,`tblcategory` c 
                  WHERE   p.`CATEGORYID`=c.`CATEGORYID` and QTY > 0 and STATUS='Available' LIMIT 1";
                   $mydb->setQuery($query);
                   $cur = $mydb->loadResultList();               
          
                foreach ($cur as $result) {
                   $image = web_root.'admin/modules/product/'.$result->IMAGES;
                    }?>


               <div class="item active">
                    <div style="float:left; width:370px; margin-left:10px;"> 
                        <div style="float:left; width:70px; margin-bottom:10px;"> 
                            <img src="<?php echo  $image ;?>"  width="810px"     height="150px" style="-webkit-border-radius:5px; -moz-border-radius:5px;" alt="Image">
                        </div>
                    </div>
                </div>
              <?php
                $query = "SELECT * FROM `tblproducts` p  ,`tblcategory` c 
                  WHERE   p.`CATEGORYID`=c.`CATEGORYID` and QTY > 0 and STATUS='Available' LIMIT 3";
                   $mydb->setQuery($query);
                   $cur = $mydb->loadResultList();               
          
                foreach ($cur as $result) { 
                $image = web_root.'admin/modules/product/'.$result->IMAGES;
                 
             echo   '<div class="item">
                    <div style="float:left; width:370px; margin-left:10px;"> 
                        <div style="float:left; width:70px; margin-bottom:10px;"> 
                           <a href="index.php?page=2&name='.$result->PRODUCTNAME.'" rel="prettyPhoto[mwaura]"> <img src="'.$image.'"   width="810px" height="150px" style="-webkit-border-radius:5px; -moz-border-radius:5px;" alt="Image"></a>
                        </div>
                    </div>
                </div>';
               } ?>
                 
              </div>
            </div>
             
           
    </div>
    </div>
              
  </div>
 </div>

 
  <!-- start content --> 
<?php require_once $content; ?>

     
   
</div> <hr/> 
 <footer>
        <p align="left" >&copy; BudgetBytes</p>
        </footer>
      <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
     <script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
     <script type="text/javascript" src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
  
<script type="text/javascript">
 




  $("#form_datetime").datetimepicker({
      // format: 'dd MM yyyy - hh:ii',
        format: 'hh:ii:s', 
      autoclose: true

  });
 
 
function validatedate(){ 
 
    
      var city =   document.getElementById('addr').value;


      // alert(city );


      var txtime =  document.getElementById('ftime').value


      var tprice = document.getElementById('alltot').value 
      var pmethod = document.getElementById('paymethod').value
      var onum = document.getElementById('ORDERNUMBER').value
 

    if (pmethod=='Cash on Delivery'){ 

        if (city=="santiago City" || city=="Santiago city" || city=="Santiago" || city=="santiago" || city=="santiago city" || city=="Santiago City" || city=="SANTIAGO CITY"){
         window.location = "index.php?page=7&price="+tprice+"&time="+txtime+"&paymethod="+pmethod+"&ordernumber="+onum;
        }else{
           alert('Order cannot be process. We accept delivery only in Santiago city.');
        return false;
        }

       
    }else {
      window.location = "index.php?page=7&price="+tprice+"&time="+txtime+"&paymethod="+pmethod+"&ordernumber="+onum; 
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
 
 function totalprice() {
var table = document.getElementById('table');
      var items = table.getElementsByTagName('output');


      var sum = 0;
      for(var i=0; i<items.length; i++)
        sum +=   parseFloat(items[i].value);

      var output = document.getElementById('sum');
      output.innerHTML =  sum.toFixed(2); 

     
    var paymethod = document.getElementById('paymethod').value;
    var fee = 0.00
         
     if (paymethod=='Cash on Delivery'){
 
        fee = 25;
        document.getElementById('note').innerHTML = "*Products will be deliver 30 minutes after confirmation.<br/> Please check your profile from time to time for notification. "
   
     }else{
        fee = 0;
        document.getElementById('note').innerHTML = "*Products can be claim anytime during <br/>office hours from 7 am to 5 pm."
     }

    
    var overall = 0;
     document.getElementById('fee').innerHTML = fee.toFixed(2);

    overall = sum + parseFloat(fee);

    var overallprice = document.getElementById('overall');

    overallprice.innerHTML = overall.toFixed(2); 

    document.getElementById("alltot").value = overallprice.innerHTML ;


 }




   
  </script>     

</body>
</html>