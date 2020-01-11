<?php

  if (isset($_POST['order'])) {
      $pname = $_POST['pname']; //array
      $pq = $_POST['pq']; //array
      $pp = $_POST['pp']; //array
      $ptp =$_POST['ptp']; //array
      $pid = $_POST['pid']; //array
      $pcat = $_POST['pcat']; //array
      $pmodel = $_POST['pmodel']; //array
      $pmax = $_POST['pmax']; //array
      $pbp = $_POST['pbp']; //array
      $psl = $_POST['psl']; //array
      $discount = $_POST['discount']; //array
      $ptotal = $_POST['ptotal']; //variable
      $cname = $_POST['cname']; //variable
      $cphone = $_POST['cphone']; //variable
      $caddress = $_POST['caddress']; //variable
      $due = $_POST['due']; //variable
      if($discount > 0){
        $p_new_total = $ptotal - $discount;
        $paid = $p_new_total - $due;
      }else{
        $p_new_total = $ptotal;
        $paid = $p_new_total;
      }
     

      $due_status = 0;
      $error = '';
      $BP_profit = [] ;
      $cUid = rand(10,100);
      $pro_b_cost = [];
    

      // Cart session for invoice

      $_SESSION['cname'] = $cname;
      $_SESSION['pq'] = $pq;
      $_SESSION["cphone"]=$cphone;

      $_SESSION["paddress"] = $caddress;
      $_SESSION["p_new_total"] = $p_new_total;
      $_SESSION["paid"] = $paid;
     

      $_SESSION["pid"] = $pid;
      $_SESSION["pname"] = $pname;
      $_SESSION["pq"] = $pq;
      $_SESSION["pp"] = $pp;

      $_SESSION["ptotal"] = $ptotal;
      $_SESSION["discount"] = $discount;
      $_SESSION["due"] = $due;
      $_SESSION["paid"] = $paid;


      //

      /*
 


      /*========== validating prducts =========   */
      if (!empty($pname) && !empty($pq) && !empty($pp) &&  !empty($ptp) &&  !empty($pid) && !empty($pcat) && !empty($pmodel) && !empty($pmax) && !empty($pbp) && !empty($ptotal) && !empty($cname) && !empty($cphone)) {
         $error = '';
      } else {
         $error .= 'Please select products First';
      }
      /*========== on empty error  =========   */
      if (empty($error)) {
        /// Database Linking ///
        require_once('db_connection.php');
        $db_connt = db_connect();

        for($i = 0 ; $i < count($pname) ; $i++){
            $pUq =  $pmax[$i] - $pq[$i];
            $update = "UPDATE products
                    SET 
                    P_quantity = '$pUq'
                    WHERE
                    G_id = '$pid[$i]'";
        }
        $result= mysqli_query($db_connt,$update);
         
        if(mysqli_error($db_connt)){
            echo 'Error: '.mysqli_error($db_connt);
        }else{
            //$success = 'product insert Complete Successfully';
            //header('Location: add-products.php?success='.$success);
            //header('Location:add-products.php');
            if (count($pname) == 1) {
                
                
                

                $pro_b_cost = $pbp[0] *  $pq[0];
               
                /*print_r($pro_b_cost);
                echo "<br>";
                echo $ptp[0];
                echo "<br>";
                echo $pro_b_cost;*/

                $BP_profit = $ptotal  - $pro_b_cost;
               
               // print_r($BP_profit);
               

                if ($due  > 0 ) {
                   $due_status = 1;
                }


                $sql_insert="INSERT INTO `cashsale`(`memo_no`, `B_name`, `B_phone`, `B_address`, `B_unique_id`, `BP_cat`, `BP_name`, `BP_model`, `BP_SL`, `B_product_quantity`, `BP_buy_price`, `BP_sell_price`, `Bp_discount`, `BP_profit`, `BP_due`, `BP_Buy_date`, `BP_emi_status`) VALUES (NULL,'$cname','$cphone','$caddress','$cUid','$pcat[0]','$pname[0]','$pmodel[0]','$psl[0]','$pq[0]','$pbp[0]','$pp[0]','$discount','$BP_profit','$due',CURRENT_TIMESTAMP,'$due_status')";
                $insert= mysqli_query($db_connt,$sql_insert);
               


                if(mysqli_error($db_connt)){
                echo 'Error: '.mysqli_error($db_connt);
                }else {
                        /*header('location:invoice.php');*/
                }
              } else {
               for($i = 0;$i < count($pname) ; $i++){
                  $pro_b_cost[$i] = $pbp[$i] *  $pq[$i];
                  $BP_profit[$i] = $ptp[$i] - $pro_b_cost[$i];
                  


                  $cUid .= "$i";
                  if ($due  > 0 ) {
                   $due_status = 1;
                  }
                  if ($i == 0) {
                    if ($discount = 0) {
                      $BP_profit[$i] = $BP_profit[$i];
                    } else {
                      $BP_profit[$i] -= $discount; 
                    }
                    
                  
                    $sql_insert="INSERT INTO `cashsale`(`memo_no`, `B_name`, `B_phone`, `B_address`, `B_unique_id`, `BP_cat`, `BP_name`, `BP_model`, `BP_SL`, `B_product_quantity`, `BP_buy_price`, `BP_sell_price`, `Bp_discount`, `BP_profit`, `BP_due`, `BP_Buy_date`, `BP_emi_status`) VALUES (NULL,'$cname','$cphone','$caddress','$cUid','$pcat[$i]','$pname[$i]','$pmodel[$i]','$psl[$i]','$pq[$i]','$pbp[$i]','$pp[$i]','$discount','$BP_profit[$i]','$due',CURRENT_TIMESTAMP,'$due_status')";
                  } else {
                    $sql_insert="INSERT INTO `cashsale`(`memo_no`, `B_name`, `B_phone`, `B_address`, `B_unique_id`, `BP_cat`, `BP_name`, `BP_model`, `BP_SL`, `B_product_quantity`, `BP_buy_price`, `BP_sell_price`, `Bp_discount`, `BP_profit`, `BP_due`, `BP_Buy_date`, `BP_emi_status`) VALUES (NULL,'$cname','$cphone','$caddress','$cUid','$pcat[$i]','$pname[$i]','$pmodel[$i]','$psl[$i]','$pq[$i]','$pbp[$i]','$pp[$i]',NULL,'$BP_profit[$i]',NULL,CURRENT_TIMESTAMP,NULL)";
                     
                  }
                  $insert= mysqli_query($db_connt,$sql_insert);


                  /*print_r($pro_b_cost[$i]);
                  echo "<br>";
                  print_r($BP_profit[$i]);
                  echo "<br>";*/
                  
                  
                
                }   
            }
             require_once('db_connection.php');
                      $db_connt = db_connect();

                      $getid = "select * from `cashsale` ORDER BY memo_no DESC LIMIT 1;";
                      $result = mysqli_query($db_connt,$getid);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                        
                        $memo_no = $row["memo_no"]; 
                       
                        $_SESSION["memo_no_cart"] = $memo_no; 

                       

                }
               }
            
         }
        }
        

      } else {
          # code...
      }
?>
<?php
/*// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('<h1><?php echo $cname;?></h1>');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('cashsale.pdf',array('Attachment'=>1));*/
?>
<?php include 'header.php';?>
</body>
  <div class="container col-sm-4 " style="min-height: 600px;">
      <div class="input-group input-group-sm ">
        <div class="input-group-prepend">
          <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">NAME :</span>
        </div>
        <input type="text" class="form-control col-sm-12 mt-2 float-left" name="ac_no" value=" <?php echo $cname;?>" readonly>
        <div class="input-group input-group-sm ">
          <div class="input-group-prepend">
            <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">PHONE NO :</span>
          </div>
          <input type="text" class="form-control col-sm-12 mt-2 float-left" name="ac_no" value=" <?php echo $cphone;?>" readonly>
      
        </div>
      <?php
        for($i = 0;$i < count($pname) ; $i++){ 
          ?>
          <div class="input-group input-group-sm ">
          <div class="input-group-prepend">
            <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">PRODUCT NAME :</span>
          </div>
          <input type="text" class="form-control col-sm-12 mt-2 float-left" name="ac_no" value=" <?php echo $pname[$i];?>" readonly>
      
        </div>
        <div class="input-group input-group-sm ">
          <div class="input-group-prepend">
            <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">PRODUCT QUANTITY :</span>
          </div>
          <input type="text" class="form-control col-sm-12 mt-2 float-left" name="ac_no" value=" <?php echo $pq[$i];?>" readonly>
      
        </div>
         <div class="input-group input-group-sm ">
          <div class="input-group-prepend">
            <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">PRODUCT PRICE :</span>
          </div>
          <input type="text" class="form-control col-sm-12 mt-2 float-left" name="ac_no" value=" <?php echo $pp[$i];?>" readonly>
      
        </div>
        <?php
        }
      ?>
      <div class="input-group input-group-sm ">
          <div class="input-group-prepend">
            <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">TOTAL :</span>
          </div>
          <input type="text" class="form-control col-sm-12 mt-2 float-left" name="ac_no" value=" <?php echo $ptotal;?>" readonly>
      
        </div>
        <div class="input-group input-group-sm ">
          <div class="input-group-prepend">
            <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">DISCOUNT :</span>
          </div>
          <input type="text" class="form-control col-sm-12 mt-2 float-left" name="ac_no" value=" <?php echo $discount;?>" readonly>
      
        </div>
        <div class="input-group input-group-sm ">
          <div class="input-group-prepend">
            <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">DUE :</span>
          </div>
          <input type="text" class="form-control col-sm-12 mt-2 float-left" name="ac_no" value=" <?php echo $due;?>" readonly>
      
        </div>
</div>
    

    <div class="col-sm-12 mb-4  mt-2 btn-group">
      <div class="col-sm-8 float-left">
        <form action="cart_invoice.php"  name="cart_invoice"  target="_blank">
        <button name="cart_invoice" class=" btn btn-secondary btn-block btn-info">DOWNLOAD INVOICE</button>
        
      </form>
      </div>
      
      <div class="col-sm-4 float-left">
        <form action="unset_cart.php"  method="POST">
        <button name="unset_invoice" class=" btn btn-secondary btn-block btn-warning">BACK</button>
        
      </form>
      </div>
    </div>
    
  </div>


  <?php include 'footer.php';?>





