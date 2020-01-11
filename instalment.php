<?php

	if(isset($_POST['pay_ins'])){
		$ac_no= $_POST['ac_no'];

		$c_name= $_POST['c_name'];
		$c_phone= $_POST['c_phone'];
		$e_p_id= $_POST['e_p_id'];
		$emi_p_name= $_POST['emi_p_name'];
		$emi_p_model= $_POST['emi_p_model'];
		$emi_due= $_POST['emi_due'];
		$emi_month_ins= $_POST['emi_month_ins'];
		$ins_left= $_POST['ins_left'];
		$emi_ins_no= $_POST['emi_ins_no'];
	}
							

?>
<?php include 'header.php';?>
	<div class="">
		<div class="row">
			<div class="col-sm-12 ">
				<div class="sideMenu col-sm-2  font-weight-bold">
					<a href="refrigeratorStore.php">REFRIGERATOR</a>
					<a href="televisionStore.php"><i class="fas fa-tv"></i> TELEVISION</a>
					<a href="airStore.php"><i class="fas fa-fan"></i> AIR-CONDITIONER</a>
					<a href="otherStore.php">OTHERS</a>
					<!--<div class="dropdown font-weight-bold">
					  <button class="dropbtn font-weight-bolder">ADD PRODUCTS</button>
					  <div class="dropdown-content">
					    <a href="refrigerator.php">REFRIGERATOR</a>
					    <a href="#">TELEVISION</a>
					    <a href="#">AIR CONDITIO...</a>
					    <a href="#">OTHERS</a>
					  </div>
					</div> -->
					<a href="add-products.php"><i class="far fa-plus-square"></i> ADD PRODUCTS</a>
					<a href="update.php">UPDATE</a>



				</div>
				<div class="sideTable  col-sm-10 pb-2" >
						<h1 class="text-center mx-auto py-2" style="color:white;background-color: #171733;">PAY INSTALMENT</h1>
						
						<div class="col-sm-11 mx-auto mt-5 ">
							<div class="card " style="box-shadow: 0 0 10px #171733">
						  		<div class="card-header">
						    		<h6 class="col-sm-3 float-left">Date : <?php echo date('d/m/Y');?></h6>
						    		<h6 class="col-sm-3 float-right text-right">New Order</h6>
						  		</div>
						  		<div class="card-body">
						  			
									    <form method="POST" action="instalment_valid.php">
												<div class=" col-sm-12 border ">
													<div class="input-group input-group-sm mb-3">
													  <div class="input-group-prepend">
													    <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">ACCOUNT NO :</span>
													  </div>
													  <input type="text" class="form-control col-sm-1 mt-2 float-left" name="ac_no" value=" <?php echo $ac_no;?>" readonly>
													  


													  <div class="input-group-prepend">
													    <span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">CUSTOMER NAME :</span>
													  </div>
													  <input type="text" class="form-control col-sm-3 mt-2 float-left" name="c_name" value=" <?php echo $c_name;?>" readonly>


													  <div class="input-group-prepend">
													    <span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">PHONE NUMBER :</span>
													  </div>
													  <input type="text" class="form-control col-sm-3 mt-2 float-left" name="c_phone" value=" <?php echo $c_phone;?>" readonly>
													</div>
													<div class="input-group input-group-sm mb-3">
														<div class="input-group-prepend">
													     <span class="input-group-text mt-2  float-left" id="inputGroup-sizing-sm">PURCHAGE ID :</span>
													    </div>
													  <input type="text" class="form-control col-sm-1 mt-2 float-left" name="e_p_id" value=" <?php echo $e_p_id;?>" readonly>

													  <div class="input-group-prepend">
													    <span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">PRODUCT NAME : </span>
													  </div>
													  <input type="text" class="form-control col-sm-3 mt-2 float-left" name="emi_p_name" value="<?php echo $emi_p_name;?>" readonly>

													  <div class="input-group-prepend">
													      <span class="input-group-text mt-2 ml-2 float-left" id="inputGroup-sizing-sm">PRODUCT MODEL:</span>
													    </div>
													 <input type="text" class="form-control col-sm-3 mt-2 float-left" name="emi_p_model" value="<?php echo $emi_p_model;?>" readonly>
											


													</div>
													<div class=" col-sm-11 mx-auto border-right-0 mt-3 ">
														<div class="col-sm-6 float-left mx-auto ">
															<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																     
																     <span class="input-group-text mt-2 " id="inputGroup-sizing-sm">INSTALMENT LEFT :</span>
																    </div>
																  <input type="text" class="form-control col-sm-12 mt-2 " name="ins_left" value=" <?php echo $ins_left;?>" readonly>
															</div>
															<div class="input-group input-group-sm">

																  <div class="input-group-prepend">
																    <span class="input-group-text   " id="inputGroup-sizing-sm">MONTHLY INS : </span>
																  </div>
																  <input type="text" class="form-control col-sm-12  " name="emi_month_ins" value="<?php echo $emi_month_ins;?>" readonly>
															</div>
															<div class="input-group input-group-sm">

																  <div class="input-group-prepend">
																      <span class="input-group-text  " id="inputGroup-sizing-sm">DUE AMOUNT :</span>
																    </div>
																 <input type="text" class="form-control col-sm-12  " name="emi_due" value="<?php echo $emi_due;?>" readonly>
																 <input type="hidden"  name="emi_ins_no" value="<?php echo $emi_ins_no;?>"  >

															</div>
														</div>
														<div class="col-sm-6 float-left">
															
															<div class="input-group input-group mb-3">
																<div class="input-group-prepend">
															      <span class="input-group-text mt-2 " id="inputGroup-sizing">PAY AMOUNT :</span>
															    </div>
															 	<input type="text" class="form-control col-sm-12 mt-2 float-left" name="pay_amount" value="" >


															</div>
															<button name="pay_ins" class="btn btn-info  mb-2 btn-block">PAY INSTALMENT</button>
														</div>
													</div>

												</div>
													
													

											</form>
									</div>
							</div>
						</div>
					</div>
			</div>



<?php include 'footer.php';?>