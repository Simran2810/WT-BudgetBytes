
               <?php
                 if (!isset($_SESSION['TYPE'])=='Administrator'){
                    redirect(web_root."index.php");
                   }

               // if(isset($_POST['proceed'])){
               //          $_SESSION['FIRSTNAME'] = $_REQUEST['FIRSTNAME'];
               //          $_SESSION['LASTNAME'] = $_REQUEST['LASTNAME'];
               //          $_SESSION['ADDRESS'] = $_REQUEST['ADDRESS'];
               //          $_SESSION['CONTACTNUMBER'] = $_REQUEST['CONTACTNUMBER'];

               //          if(isset($_SESSION['FIRSTNAME'])){
               //            redirect('index.php?view=add');
               //          }
               //        }

                 ?>

        <form class="form-horizontal span6" action="" method="POST"  />
          <fieldset>
            <legend>Add New Order</legend> 
        
          <div class="panel-body katerina-panel">
             <legend>Customer Details</legend>
            <table class="katerina-table">
              <thead>
                <!-- <tr style="font:20px">
                  <th>Customer Details</th>
                  <th></th>
                  <th></th>
                </tr> -->
              </thead> 
              <tbody>
                <tr>
                <td width="100px">First Name </td><td  width="350px"> 
                         <input  id="FIRSTNAME" name="FIRSTNAME"  class="form-control input-sm"  type="text" value="<?php echo isset($_SESSION['FIRSTNAME'])? $_SESSION['FIRSTNAME'] : ""; ?>"></td>
                <td width="100px">Last Name</td><td> <input  id="LASTNAME" name="LASTNAME"  class="form-control input-sm"  type="text" value="<?php echo isset($_SESSION['LASTNAME'])? $_SESSION['LASTNAME'] : ""; ?>"></td>
                </tr>
                <tr>
                <td>Address </td><td> <input  id="ADDRESS" name="ADDRESS"  class="form-control input-sm"  type="text" value="<?php echo isset($_SESSION['ADDRESS'])? $_SESSION['ADDRESS'] : ""; ?>"></td>
                 <td  width="100px">Contact Number  </td><td  width="350px"> <input  id="CONTACTNUMBER" name="CONTACTNUMBER"  class="form-control input-sm"  type="number" value="<?php  echo isset($_SESSION['CONTACTNUMBER'])? $_SESSION['CONTACTNUMBER'] : "";?>"></td>
              </tr>        
              </tbody> 
             <tfoot><tr><td></td></tr></tfoot>
            </table>
            <!-- </div><br/> -->
       <a href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                <button   class="btn btn_katerina pull-right" name="proceed"  type="submit" ><strong>Proceed</strong> <span class="glyphicon glyphicon-chevron-right"></span></button> 
           <!-- </fieldset> --> 
            <!-- <legend>Order Products</legend>   -->
         <!-- <div class="panel-body katerina-panel"> -->
        