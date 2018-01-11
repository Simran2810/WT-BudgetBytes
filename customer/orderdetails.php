<?php 

   if (!isset($_SESSION['cus_id'])){
      redirect(web_root."index.php");
     }


if (isset($_GET['ordernumber'])){
  (($_GET['price'])? $_GET['price'] : 0 );
   $datef =  date('Y-m-d') . ' ' . $_GET['time'];
  (($_GET['paymethod'])? $_GET['paymethod'] : '' );
   (($_GET['ordernumber'])? $_GET['ordernumber'] :0);
   addtocarttwo($_GET['ordernumber'],$_GET['price'], $datef,$_GET['paymethod']);
  redirect("customer/controller.php?action=processorder&date=".$datef."&ordernumber=".$_GET['ordernumber']."&paymethod=".$_GET['paymethod']);
 
}

     

    $customerid =$_SESSION['cus_id'];
    $customer = New Customer();
    $singlecustomer = $customer->single_customer($customerid);
  ?>
 
<?php 
  $autonum = New Autonumber();
  $res = $autonum->single_autonumber(3);

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php require_once ('headnav.php'); 
?>

<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body onload="totalprice()">

 
 <form onsubmit="return orderfilter()" action="customer/controller.php?action=processorder" method="post" >
<div class="container">
<?php echo check_message(); ?>

  <div class="col-sm-9"> 
      <div class="">
        <div class="panel panel-default">
          <div class="panel-body">  
            <fieldset> 

              <legend><h2 class="text-left">Order Details</h2></legend>
          <strong>
          <table>
          <thead>
            <tr>
              <th width="200px"></th>
              <th width="300px"></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Name</td>
              <td>:<?php echo $singlecustomer->FIRSTNAME .' '.$singlecustomer->LASTNAME; ?> </td>
              <td><input type="hidden" id="addr" name="addr" value="<?php echo $singlecustomer->CITYADDRESS ; ?>"></td>
              <!-- <td>Date: <?php echo $_POST['form_datetime'];?> </td> -->
            </tr>
            <tr>
              <td>Address</td>
              <td>: <?php echo $singlecustomer->ADDRESS ; ?></td>
              <td><input type="hidden" name="ORDERNUMBER" id="ORDERNUMBER" value="<?php echo $res->AUTO; ?>"></td>
              <td>Order Number :<?php echo $res->AUTO; ?></td>
              
            </tr>
          
          </tbody>
          </table><br/>
             
          </strong>  
              <table class="katerina-table" id="table">
                <thead >
                <tr>
                  <th width="10">#</th>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th style="width:100px">Price</th>
                  <th style="width:120px">Total</th>
                  </tr>
                </thead>
                <tbody>    
                       
              <?php
                if (!empty($_SESSION['katerina_cart'])){ 
                  echo '<script>totalprice();</script>';
                      $count_cart = count($_SESSION['katerina_cart']);
                      for ($i=0; $i < $count_cart  ; $i++) { 
                      $query = "SELECT * FROM `tblproducts` p , `tblcategory` c 
                        WHERE  p.`CATEGORYID`=c.`CATEGORYID` and PRODUCTID='".$_SESSION['katerina_cart'][$i]['productid']."'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result){ 
              ?>

                         <tr>
                         <td></td>
                          <td><img src="admin/modules/product/<?php echo $result->IMAGES ?>"  width="50px" height="50px"></td>
                          <td><?php echo $result->PRODUCTNAME ?></td>
                          <td><?php echo $_SESSION['katerina_cart'][$i]['qty'] ?></td>
                          <td>&#8369 <?php echo  $result->PRICE ?></td>
                          <td>&#8369 <output><?php echo $_SESSION['katerina_cart'][$i]['price']?></output></td>
                        </tr>
              <?php
                        }

                      }
                }
              ?>
            

                </tbody>
      
              </table> 
              <table class="katerina-table">
              <thead>
                <tr>
                  <th width="150px"></th>
                  <th></th>
                  <th></th> 
                  <th></th>                 
                </tr>
              </thead>
              <tbody>
              <tr> 
                 <td>Payment Method</td>
                 <td>
                  <!-- <input type="text" id="date"> -->
                <!-- <input type="button" id="btn"  value="Show"/> -->
                 <select onchange="totalprice()" class="form-control" id="paymethod" name="paymethod">
                        <option value="Cash on Delivery">Cash on Delivery</option>
                        <option value="Cash on Pickup">Cash on Pickup</option>
                      </select>
                 <input type="hidden"  placeholder="HH-MM-AM/PM"  id="ftime" name="ftime" value="<?php echo date('y-m-d h:i:s') ?>"  class="form-control"/>

              <!--    <input type="text" value="<?php //echo date("m/d/Y h:i:s"); ?>" 
                          id="form_datetime" name="form_datetime" class="form-control input-sm"/></td> -->
                 <td><div   align="right"> Total Price : </div>
                 <div   align="right"> Delivery Fee : </div></td>
                  <td><div   align="left"> &#8369 <span id="sum">0.00</span></div>
                  <div   align="left">  &#8369 <span id="fee">0.00</span></div></td>

             <tr> 
                 <td></td>
                 <td><div id="note"></div></td>
                 <td><div align="right"> Overall Price :</div></td>
                 <td><div align="left"> &#8369 <span id="overall"></span></div>
                 <input type="hidden" name="alltot" id="alltot" value=""/></td>
             </tr>
                  </tbody> 
               </table> 
           </fieldset><br/>
               <a href="index.php?page=6" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>View Cart</strong></a>
              <strong><button type="button" class="btn btn_katerina pull-right" name="btn" id="btn" onclick="return validatedate();"   /></strong>Submit Order <span class="glyphicon glyphicon-chevron-right"></span></button> 
          </div>    
        </div>
      </div>
   </div> 
   </form>
<?php require_once 'sidebar.php';?>
 </div>


</body>
</html>