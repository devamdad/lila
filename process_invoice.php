<?php include 'header.php';?>
<?php
session_start();
$id = $_SESSION['ac_no_in'];


$pay = $_SESSION['pay_amount_in'];
$ins_left = $_SESSION['new_ins_left'];
$new_due = $_SESSION['new_emi_due'];
$new_ins = $_SESSION['new_ins_paid'];
$old_due = $_SESSION['emi_due'];


						
				
?>
</body>
	<div class="container col-sm-4 mt-5" style="min-height: 600px;">
					<?php 
						$id = $_SESSION['ac_no_in'];
						require_once('db_connection.php');
						$conn = db_connect();
						$get ="SELECT * FROM `accounts` WHERE `ac_no`='$id'";
						$result = mysqli_query($conn,$get);
						
						if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							
					 
						$name = $row['c_name'];
						$_SESSION['c_name_in'] = $name;

					    $ac=	$row['ac_no'];
	
						$phone = $row['c_phone'];

						$_SESSION['c_phone_in'] = $phone;

						$adddress =  $row['p_address'];

						$_SESSION['c_adddress_in'] = $adddress;

						$purchase_id =  $row['purchase_id'];

						$_SESSION['c_purchase_id_in'] = $purchase_id;

				?>
			
				<div class="input-group input-group-sm ">
				
					<div class="input-group-prepend">
					<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">ACCOUNT NO :</span>
					</div>
					<input type="text" class="form-control col-sm-12 mt-2 " name="ac_no" value=" <?php echo $ac;?>" readonly>
				</div>
				<div class="input-group input-group-sm">
				
					<div class="input-group-prepend">
					<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">NAME :</span>
					</div>
					<input type="text" class="form-control col-sm-12 mt-2 " name="ac_no" value=" <?php echo $name;?>" readonly>
				</div>
				<div class="input-group input-group-sm ">
				
					<div class="input-group-prepend">
					<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PHONE NO :</span>
					</div>
					<input type="text" class="form-control col-sm-12 mt-2 " name="ac_no" value=" <?php echo $phone;?>" readonly>
				</div>
				<div class="input-group input-group-sm ">
				
					<div class="input-group-prepend">
					<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PREVIOUS DUE :</span>
					</div>
					<input type="text" class="form-control col-sm-12 mt-2 " name="ac_no" value=" <?php echo $old_due;?>" readonly>
				</div>
				
				<div class="input-group input-group-sm ">
				
					<div class="input-group-prepend">
					<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PAYING  :</span>
					</div>
					<input type="text" class="form-control col-sm-12 mt-2 " name="ac_no" value=" <?php echo $pay;?>" readonly>
				</div>
				<div class="input-group input-group-sm ">
				
					<div class="input-group-prepend">
					<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">AMMOUNT LEFT :</span>
					</div>
					<input type="text" class="form-control col-sm-12 mt-2 " name="ac_no" value=" <?php echo $new_due;?>" readonly>
				</div>
				<div class="input-group input-group-sm ">
				
					<div class="input-group-prepend">
					<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">INSTALMENT LEFT :</span>
					</div>
					<input type="text" class="form-control col-sm-12 mt-2 " name="ac_no" value=" <?php echo $ins_left;?>" readonly>
				</div>
				 <?php  	}
				}
					?>
	
		
			
		
		<div class="col-sm-12 mb-4  mt-2 btn-group">
			<div class="col-sm-8 float-left">
				<form action="ins_invoice.php"  method="POST">
				<button name="ins_invoice" class=" btn btn-secondary btn-block btn-info">DOWNLOAD INVOICE</button>
				
			</form>
			</div>
			
			<div class="col-sm-4 float-left">
				<form action="unset_invoice.php"  method="POST">
				<button name="unset_invoice" class=" btn btn-secondary btn-block btn-warning">BACK</button>
				
			</form>
			</div>
		</div>

			

		
	</div>



	<?php include 'footer.php';?>