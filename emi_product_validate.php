<?php
	

	if (isset($_POST['emi_order'])) {
		$pname =  $_POST['pname']; //array
		$pid = $_POST['pid']; //array
		$pmodel = $_POST['pmodel']; //array
		$pbp = $_POST['pbp']; //array
		$psl = $_POST['psl']; //array
		$pmax = $_POST['pmax']; //array
		
		$after_sale_pmax = $pmax[0]-1;

		
		$ac_no = $_POST['ac_no']; //variable
		$emi_sell_price = $_POST['emi_sell_price']; //variable
		$emi_status = 1;

		$emi_advance = $_POST['emi_advance']; //variable
		$emi_due = $_POST['emi_due']; //variable
		$ins_no = $_POST['ins_no']; //variable
		$pday = $_POST['pday']; //variable
		$ep_address = strtoupper($_POST['ep_address']); //variable 

		$monthly_ins = round($emi_due/$ins_no)+1;
		

		$_SESSION['pname'] = $pname;
		$_SESSION['price'] = $emi_sell_price ;
		$_SESSION['paid'] = $emi_advance ;
		$_SESSION['due'] = $emi_due ;
		$_SESSION['ins_no'] = $ins_no ;
		$_SESSION['monthly_ins'] = $monthly_ins ;


		

		$emi_profit  = $emi_sell_price - $pbp[0] ; // calculating estimate profir of this product
		
	
		$d = "+".$ins_no."months";
		$expire_date = date("y/m/d",strtotime("$d"));
		//echo $expire_date;
		
		$error ="";

		if ( !empty($ac_no) && !empty($emi_sell_price) &&  !empty($emi_due)) {
         $error = '';
     	 } else {
         $error .= 'Please fill in all the fields properly';
      	}

      	/*if ($emi_sell_price  > $pbp) {
      		$error = '';
      	} else {
      		$error .= 'Product sell price is greater then buy price!';
      	}
*/
      	if (empty($error)) {
      		/// Database Linking ///
        	require_once('db_connection.php');
       		$db_connt = db_connect();
       		$insert= "INSERT INTO `emi_purchase`(`e_p_id`, `a_no`, `emi_p_name`, `emi_p_model`, `emi_p_sl`, `emi_b_price`, `emi_sell_price`, `emi_addvance`, `emi_due`, `emi_ins_no`, `emi_month_ins`, `product_use_add`, `ins_paid`, `ins_left`, `emi_status`, `emi_profit`, `payment_day`, `l_emi_p_date`, `buy_date`, `last_date`, `last_paid_ammount`) VALUES (NULL,'$ac_no','$pname[0]','$pmodel[0]','$psl[0]','$pbp[0]','$emi_sell_price','$emi_advance','$emi_due','$ins_no','$monthly_ins','$ep_address','','$ins_no','$emi_status','$emi_profit','$pday','',CURRENT_TIMESTAMP,'$expire_date','')";

       		$result= mysqli_query($db_connt,$insert);
       		if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			
			require_once('db_connection.php');
       		$db_connt = db_connect();

			$getid = "select * from `emi_purchase` ORDER BY e_p_id DESC LIMIT 1;";
			
				$result = mysqli_query($db_connt,$getid);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							
						$id = $row["e_p_id"]; 
						$_SESSION["memo_no"] = $id;
						$acount_no = $row["a_no"]; 
						

			$update = "UPDATE accounts
                    SET 
                    purchase_id = '$id'
                    WHERE
                    ac_no = '$acount_no'";
			}
			$update_result = mysqli_query($db_connt,$update);
			if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}
		else{
			
			require_once('db_connection.php');
       		$db_connt = db_connect();
			$productUpdate = "UPDATE products
                    SET 
                    P_quantity = '$after_sale_pmax',
                    P_emi_status = '1'
                    WHERE
                    G_id = '$pid[0]'";
             $proUpdateResult = mysqli_query($db_connt,$productUpdate);
			if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{





			require_once('db_connection.php');
       		$db_connt = db_connect();
       		$query = "SELECT * FROM `accounts` WHERE ac_no = '$acount_no'";
			$result = mysqli_query($db_connt,$query);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
						
						$_SESSION["ac_no"] = $row['ac_no'];
						$_SESSION["cname"] = $row['c_name'];
						$_SESSION["cphone"] = $row['c_phone'];
						$_SESSION["paddress"] = $row['p_address'];
						
						
					}
				}
			
			



			}
		}
		}
		else{
			print_r($result);
		}
			
			
			/*$update = "UPDATE accounts
                    SET 
                    purchase_id = '$e_p_id'
                    WHERE
                    ac_no = '$ac_no'";*/
		}
		}else{
		header('Location: emi.php?error='.$error);
		print_r($error);
		}
	
      	}else{

      	}
      	



?>

<?php include 'header.php';?>
</body>
	<div class="container col-sm-8 mt-5" style="min-height: 600px;">
			<div class="input-group input-group-sm mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">ACCOUNT NO :</span>
				</div>
				<input type="text" class="form-control col-sm-1 mt-2 float-left" name="ac_no" value=" <?php echo $ac_no;?>" readonly>
			<div class="input-group-prepend">
				<span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">CUSTOMER NAME :</span>
			 </div>
			<input type="text" class="form-control col-sm-4 mt-2 float-left" name="c_name" value=" <?php echo $_SESSION["cname"];?>" readonly>
			<div class="input-group-prepend">
				<span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">PHONE NUMBER :</span>
			</div>
			<input type="text" class="form-control col-sm-3 mt-2 float-left" name="c_phone" value=" <?php echo $_SESSION["cphone"];?>" readonly>
		</div>
		<div class="input-group input-group-sm mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">MEMO NO :</span>
				</div>
				<input type="text" class="form-control col-sm-1 mt-2 mr-3  float-left" name="memo_no" value=" <?php echo $_SESSION["memo_no"];?>" readonly>

				<div class="input-group-prepend">
					<span class="input-group-text mt-2 ml-3 float-left" id="inputGroup-sizing-sm">PRODUCT NAME : </span>
				</div>
				<input type="text" class="form-control col-sm-3 mt-2 float-left" value="<?php echo $_SESSION['pname'][0];?>" readonly>

				<div class="input-group-prepend">
					<span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">PRODUCT PRICE:</span>
				</div>
				<input type="text" class="form-control col-sm-3 mt-2 float-left"  value="<?php echo $_SESSION['price'];?>" readonly>
		</div>
			<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">TOTAL DUE :</span>
					</div>
					<input type="text" class="form-control col-sm-1 mt-2 mr-4 float-left" name="memo_no" value=" <?php echo $_SESSION["due"];?>" readonly>

					<div class="input-group-prepend">
						<span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">INSTALMENT NO : </span>
					</div>
					<input type="text" class="form-control col-sm-3 mt-2 float-left" value="<?php echo $_SESSION['ins_no'];?>" readonly>

					<div class="input-group-prepend">
						<span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">MONTHLY INS:</span>
					</div>
					<input type="text" class="form-control col-sm-3 mt-2 float-left"  value="<?php echo $monthly_ins;?>" readonly>
			</div>

		<div class="col-sm-12 mb-4  mt-2 btn-group">
	      <div class="col-sm-8 float-left">
	        <form action="emi_invoice.php"  name="emi_invoice"  target="_blank">
	        <button name="emi_invoice" class=" btn btn-secondary btn-block btn-info">DOWNLOAD INVOICE</button>
	        
	      </form>
	      </div>
      
	      <div class="col-sm-4 float-left">
	        <form action="unset_emi.php"  method="POST">
	        <button name="unset_emi" class=" btn btn-secondary btn-block btn-warning">BACK</button>
	        
	      </form>
      </div>
    </div>
		
	</div>


	<?php include 'footer.php';?>
	






