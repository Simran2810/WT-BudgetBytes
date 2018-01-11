 <?php 
  if (!@isset($_SESSION['USERID'])){
      redirect("index.php");
     } 


    $customerid = $_SESSION['USERID'];
    $customer = New Customer();
    $singlecustomer = $customer->single_customer($customerid);
  ?>

<?php  

      $user_id = @$_SESSION['USERID'];
      $user = New User();
      $singleuser = $user->single_user($user_id);
   

 
if(!isset($_SESSION['ordernumber'])){
   redirect("index.php?page=9");
}
 

?> 
 
 <?php require_once ('headnav.php'); 
?>
 
  <form action="" method="post">


<div class="container"> 
<div class="col-sm-9"> 
 <?php check_message(); ?>
      <div class="">
        <div class="panel panel-default">
          <div class="panel-body">  
            <fieldset>  
           
  <span id="printout">
              <legend><h2 class="text-left">Billing Details</h2></legend>
 
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
              <td>: <?php echo $singlecustomer->FIRSTNAME .' '.$singlecustomer->LASTNAME; ?> </td>
              <td></td> 
               <td>Order Number :<?php echo $_SESSION['ordernumber']; ?></td>    
            </tr>
            <tr>
              <td>Address</td>
              <td>: <?php echo $singlecustomer->ADDRESS ; ?></td>
              <td><input type="hidden" name="ORDERNUMBER" id="ORDERNUMBER" value="<?php echo $res->AUTO; ?>"></td>
              <?php echo $_SESSION['ordernumber']; ?>
              
            </tr>
            <tr>
              <td>Email Address</td>
              <td>: <?php echo $singleuser->UEMAIL ; ?></td>
              <td></td>
             <?php echo $stats;?>
            </tr>
          <?php echo $singlecustomer->ZIPCODE ; ?></td>
            
            <tr>
              <td>Contact Number</td>
              <td>: <?php echo $singlecustomer->CONTACTNUMBER ; ?></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
          </table><br/>
              
                </strong>  
                        

              <table class="katerina-table" id="list">
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

                $query ="SELECT  `PRODUCTNAME`, `IMAGES`, `PRICE`,pm.`DATEORDER`, `O_QTY`, `O_PRICE`, `DATECLAIM`, `ORDERTYPE`  
                        FROM `tblorder` o, `tblproducts` p ,`tblpayment` pm 
                        WHERE o.`PRODUCTID`=p.`PRODUCTID` AND o.`ORDERNUMBER` = pm.`ORDERNUMBER` AND pm.`ORDERNUMBER`='".$_SESSION['ordernumber']."'";
                         $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result){ 
              ?>

                       <tr>
                         <td></td>
                          <td><img src="<?php echo web_root.'admin/modules/product/'.$result->IMAGES; ?>" onload="totalprice()" width="50px" height="50px"></td>
                          <td><?php echo $result->PRODUCTNAME ?></td> 
                          <td>&#8369 <?php echo  number_format( $result->PRICE,2); ?></td>
                          <td><?php echo $result->O_QTY?></td>
                          <td>&#8369 <output><?php echo number_format( $result->O_PRICE,2); ?></output></td>
                        </tr>
                <?php 
                  }
                ?>
 
              </div>
                </tbody>
              
              <tfoot >
              <?php 
                   $query = "SELECT * FROM `tblpayment` p ,`tblcustomer` c 
                  WHERE   p.`CUSTOMERID`=c.`CUSTOMERID` and ORDERNUMBER='".$_SESSION['ordernumber']."'";
              $mydb->setQuery($query);
              $cur = $mydb->loadSingleResult();

              if ($cur->PAYMENTMETHOD=="Cash on Delivery") {
                # code...
                $price = 25.00;
              }else{
                $price = 0.00;
              }


              $tot =   $cur->TOTALPRICE  - 25.00;
              ?>

   </tfoot>
       </table> <hr/>
                <div class="row">
                  <div class="col-md-6 pull-left">
                    <div>Claimed Date : <?php echo date_format(date_create($cur->CLAIMDATE),"M/d/Y h:i:s"); ?></div>
                    <div>Payment Method : <?php echo $cur->PAYMENTMETHOD; ?></div>

                  </div>
                  <div class="col-md-4 pull-right">
                    <div>Total Price : &#8369 <?php echo number_format($tot,2);?></div>
                    <div>Delivery Fee : &#8369 <?php echo number_format($price,2); ?></div>
                    <div>Overall Price : &#8369 <?php echo number_format($cur->TOTALPRICE,2); ?></div>
                  </div>
                </div>

           
            <div>
              <p>
                Your order is being process. Check your profile for the notification of confirmation.

              </p>


            </div>
   
                </span>
            </fieldset>
            

          </div>    
        </div>
      </div>
   </div>   </span>
<?php require_once 'sidebar.php';?>
   </div>  
</form>


<?php 



   

?>
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
 
   
    return false; 

    } 
   
</script>