<?php
session_start();

if (isset($_POST['profile'])) {
 $ac_no = $_POST['account_no']; 
 $purchase_id = $_POST['purchase_id']; 

  
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

				
				<div class="sideTable col-sm-10 " >
					<h1 class="text-center mx-auto py-2" style="color:white;background-color: #171733;"> PROFILE</h1>
					
					<div class="col-sm-12">
						<div class="col-sm-4 float-left" >
							<div class="card col-sm-12 card-block" style="width: 100%;">
							  <div class="card-header font-weight-bold">
							    ACOUNTS DETAILS
							  </div>
							  <?php
								  require_once('db_connection.php');
								  $db_connt = db_connect();
								  $getid = "SELECT * FROM `accounts` WHERE ac_no =  '$ac_no'";
								   $result = mysqli_query($db_connt,$getid);
								         if (mysqli_num_rows($result) > 0) {
								             while ($row = mysqli_fetch_array($result)) {
					                 	     $_SESSION['profile'] = array(
					                 	     'ac_no' => $row['ac_no'],
					                 	     'c_name' => $row['c_name'],
					                 	     'c_phone' => $row['c_phone'],
					                 	     'vid_no' => $row['vid_no'],
					                 	     'fathers_name' => $row['fathers_name'],
					                 	     'mothers_name' => $row['mothers_name'],
					                 	     'c_age' => $row['c_age'],
					                 	     'p_address' => $row['p_address'],
					                 	     'perm_address'=>$row['perm_address'],
					                 	     'add_type' => $row['add_type'],
					                 	     'livin_time' => $row['livin_time'],
					                 	     'work_place' => $row['work_place'],
					                 	     'work_time' => $row['work_time'],
					                 	     'm_status' => $row['m_status'],
					                 	     'earning_mem' => $row['earning_mem'],
					                 	     'purchase_id' => $row['purchase_id'],
					                 	     'g_one_name' => $row['g_one_name'],
					                 	     'g_one_phone' => $row['g_one_phone'],
					                 	     'g_one_vid' => $row['g_one_vid'],
					                 	     'g_one_f_name' => $row['g_one_f_name'],
					                 	     'g_one_m_name' => $row['g_one_m_name'],
					                 	     'g_one_age' => $row['g_one_age'],
					                 	     'g_one_pre_address' => $row['g_one_pre_address'],
					                 	     'g_one_work_place' => $row['g_one_work_place'],
					                 	     'g_one_m_income' => $row['g_one_m_income'],
					                 	     'g_one_p_address' => $row['g_one_p_address'],
					                 	     'g_two_name' => $row['g_two_name'],
					                 	     'g_two_phone' => $row['g_two_phone'],
					                 	     'g_two_vid' => $row['g_two_vid'],
					                 	     'g_two_f_name' => $row['g_two_f_name'],
					                 	     'g_two_m_name' => $row['g_two_m_name'],
					                 	     'g_two_age' => $row['g_two_age'],
					                 	     'g_two_pre_address' => $row['g_two_pre_address'],
					                 	     'g_two_work_place' => $row['g_two_work_place'],
					                 	     'g_two_m_income' => $row['g_two_m_income'],
					                 	     'g_two_p_address' => $row['g_two_p_address'],

					                 	 );
									
								?>
							  <ul class="list-group list-group-flush">
							  	<li class="list-group-item">ACCOUNT NO : <?php echo $row['ac_no'];?></li>
							    <li class="list-group-item">NAME : <?php echo $row['c_name'];?></li>
							    <li class="list-group-item">PHONE : <?php echo $row['c_phone'];?></li>
							    <li class="list-group-item">NID : <?php echo $row['vid_no'];?></li>
							    <li class="list-group-item">FATHER'S NAME : <?php echo $row['fathers_name'];?></li>
							    <li class="list-group-item">MOTHER'S NAME : <?php echo $row['mothers_name'];?></li>
							    <li class="list-group-item">AGE : <?php echo $row['c_age'];?></li>
							    <li class="list-group-item">PRESENT ADDRESS : <?php echo $row['p_address'];?></li>
							    <li class="list-group-item">ADDRESS TYPE: <?php echo $row['add_type'];?></li>
							    <li class="list-group-item">LIVING TIME : <?php echo $row['livin_time'];?></li>
							    <li class="list-group-item">WORKING PLACE : <?php echo $row['work_place'];?></li>
							    <li class="list-group-item">WORKING TIME : <?php echo $row['work_time'];?></li>
							    <li class="list-group-item">MARITAL STATUS : <?php if($row['m_status'] == 1){
							    		echo "MARRIED";

							    }else{
							    	echo "SINGLE";

							    }?>
							    	
							    </li>
							    <li class="list-group-item">EARNING MEMBER : <?php echo $row['earning_mem'];?></li>
							    <li class="list-group-item">PERMANENT ADDRESS : <?php echo $row['perm_address'];?></li>
							    <li class="list-group-item">PURCHAGE ID : <?php echo $row['purchase_id'];?></li>
							    <li class="list-group-item"><button class="btn btn-warning btn-block edit_ac_btn btn-sm" id="">EDIT</button></li>

							  </ul>
							 <button class="btn btn-danger btn-block deletebtn ">DELETE</button>
							 
							</div>
						</div>
						
						<div class="col-sm-4 float-left">
							<div class="card  " style="width: 100%;">
							  <div class="card-header font-weight-bold">
							    REFERENCE DETAILS
							  </div>
							  <ul class="list-group list-group-flush">
							    <li class="list-group-item">NAME(1) : <?php echo $row['g_one_name'];?></li>
							    <li class="list-group-item">PHONE(1) : <?php echo $row['g_one_phone'];?></li>
							    <li class="list-group-item">NID(1) : <?php echo $row['g_one_vid'];?></li>
							    <li class="list-group-item">FATHER'S NAME(1) : <?php echo $row['g_one_f_name'];?></li>
							    <li class="list-group-item">MOTHER'S NAME(1) : <?php echo $row['g_one_m_name'];?></li>
							    <li class="list-group-item">AGE(1) : <?php echo $row['g_one_age'];?></li>
							    <li class="list-group-item">PRESENT ADDRESS(1) : <?php echo $row['g_one_pre_address'];?>
							    	
							    </li>
							    <li class="list-group-item">WORKING PLACE(1): <?php echo $row['g_one_work_place'];?>
							    	
							    </li>
							    <li class="list-group-item">MONTHLY INCOME(1) : <?php echo $row['g_one_m_income'];?></li>
							    <li class="list-group-item">PERMANENT ADDRESS(1) : <?php echo $row['g_one_p_address'];?></li>

							    <li class="list-group-item">NAME(2) : <?php echo $row['g_two_name'];?></li>
							    <li class="list-group-item">PHONE(2) : <?php echo $row['g_two_phone'];?></li>
							    <li class="list-group-item">NID(2) : <?php echo $row['g_two_vid'];?></li>
							    <li class="list-group-item">FATHER'S NAME(2) : <?php echo $row['g_two_f_name'];?></li>
							    <li class="list-group-item">MOTHER'S NAME(2) : <?php echo $row['g_two_m_name'];?></li>
							    <li class="list-group-item">AGE(2) : <?php echo $row['g_two_age'];?></li>
							    <li class="list-group-item">PRESENT ADDRESS(2) : <?php echo $row['g_two_pre_address'];?>
							
							    </li>
							    <li class="list-group-item">WORKING PLACE(2): <?php echo $row['g_two_work_place'];?>
							    	
							    </li>
							    <li class="list-group-item">MONTHLY INCOME(2) : <?php echo $row['g_two_m_income'];?></li>
							    <li class="list-group-item">PERMANENT ADDRESS(2) : <?php echo $row['g_two_p_address'];?></li>
							    <li class="list-group-item"><button class="btn btn-warning btn-block btn-sm edit_ref_btn">EDIT</button></li>
							  </ul>
							   <?php
									}
								 }
								?>
							</div>
						</div>
						<div class="col-sm-4 float-left">
							<div class="card  " style="width: 100%;">
							  <div class="card-header font-weight-bold">
							    PURCHAGE DETAILS
							  </div>
							  <?php
								  require_once('db_connection.php');
								  $db_connt = db_connect();
								  $getPid = "SELECT * FROM `emi_purchase` WHERE e_p_id = '$purchase_id'";
								  $query = mysqli_query($db_connt,$getPid);
								         if (mysqli_num_rows($query) > 0) {
								             while ($row = mysqli_fetch_array($query)) {
					                 		 
								            
					                 		 $_SESSION['product'] = array(
					                 	     'e_p_id' => $row['e_p_id'],
					                 	     'emi_p_name' => $row['emi_p_name'],
					                 	     'emi_p_model' => $row['emi_p_model'],
					                 	     'emi_p_sl' => $row['emi_p_sl'],
					                 	     'emi_sell_price' => $row['emi_sell_price'],
					                 	     'emi_addvance' => $row['emi_addvance'],
					                 	     'emi_due' => $row['emi_due'],
					                 	     'emi_ins_no' => $row['emi_ins_no'],
					                 	     'ins_paid' => $row['ins_paid'],
					                 	     'ins_left' => $row['ins_left'],
					                 	     'emi_month_ins' => $row['emi_month_ins'],
					                 	     'last_paid_ammount' => $row['last_paid_ammount'],
					                 	     'l_emi_p_date' => $row['l_emi_p_date'],
					                 	     'last_date' => $row['last_date'],
					         

					                 	 );
									
									
								?>
							  <ul class="list-group list-group-flush">
							    <li class="list-group-item">PURCHAGE NO: <?php echo $row['e_p_id'];?></li>
							    <li class="list-group-item">PRODUCT NAME: <?php echo $row['emi_p_name'];?></li>
							    <li class="list-group-item">PRODUCT MODEL: <?php echo $row['emi_p_model'];?></li>
							    <li class="list-group-item">PRODUCT SL: <?php echo $row['emi_p_sl'];?></li>
							    <li class="list-group-item">PRICE: <?php echo $row['emi_sell_price'];?></li>
							    <li class="list-group-item">ADVANCE: <?php echo $row['emi_addvance'];?></li>
							    <li class="list-group-item">DUE : <?php echo $row['emi_due'];?></li>
							    <li class="list-group-item">TOTAL INSTALMENT : <?php echo $row['emi_ins_no'];?></li>
							    <li class="list-group-item">INSTALMENT PAID : <?php echo $row['ins_paid'];?></li>
							    <li class="list-group-item">INSTALMENT LEFT : <?php echo $row['ins_left'];?></li>
							    <li class="list-group-item">MONTHLY INSTALMENT : <?php echo $row['emi_month_ins'];?></li>
							    <li class="list-group-item">LAST INSTALMENT AMMOUNT : <?php echo $row['last_paid_ammount'];?></li>
							    <li class="list-group-item">LAST INSTALMENT PAID DATE : <?php echo $row['l_emi_p_date'];?></li>
							    <li class="list-group-item">INSTALMENT END ON : <?php echo $row['last_date'];?></li>
							    <li class="list-group-item"><button class="btn btn-warning btn-block btn-sm edit_pro_btn">EDIT</button></li>
							    
							    	
							   
							    
							  </ul>
							  <?php
							  	 }

								}

							  ?>
							 
							  
							</div>
							<form action="download_profile.php">
								<button class="btn btn-success btn-block mb-2">DOWNLOAD PROFILE</button>
							</form>
							<form action="instalment.php" method="POST">
								<input type="hidden" name="ac_no" value="<?php echo $_SESSION['profile']['ac_no'];?>">
								<input type="hidden" name="c_name" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['profile']['c_name'];?>">

								<input type="hidden" name="c_phone" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['profile']['c_phone'];?>">

								<input type="hidden" name="e_p_id" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['product']['e_p_id'];?>">

								<input type="hidden" name="emi_p_name" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['product']['emi_p_name'];?>">

								<input type="hidden" name="emi_p_model" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['product']['emi_p_model'];?>">

								<input type="hidden" name="emi_due" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['product']['emi_due'];?>">

								<input type="hidden" name="emi_month_ins" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['product']['emi_month_ins'];?>">

								<input type="hidden" name="ins_left" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['product']['ins_left'];?>">

								<input type="hidden" name="emi_ins_no" class="form-control form-control-sm mb-2" value="<?php echo $_SESSION['product']['emi_ins_no'];?>">

								

								<button class="btn btn-info btn-block" name="pay_ins">PAY INSTALMENT</button>
							</form>
						</div>
					</div>
				</div>







				<!-- ####################################################################################################################### -->

				<!-- EDIT Profile  UP FORM -->
				<div class="modal fade" id="edit_ac_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title font-weight-bold" id="exampleModalLabel"> EDIT ACCOUNTS DETAILS </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				        <form action="profile_update.php" method="POST">
				        	

				            <div class="modal-body">
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">ACCOUNT NO :</span>
									</div>
									<input type="text" class="form-control col-sm-12 mt-2 " name="ac_no" value=" <?php echo $_SESSION['profile']['ac_no'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="c_name" value=" <?php echo $_SESSION['profile']['c_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PHONE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="c_phone" value=" <?php echo $_SESSION['profile']['c_phone'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">NID :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="vid_no" value=" <?php echo $_SESSION['profile']['vid_no'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">FATHER'S NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="fathers_name" value=" <?php echo $_SESSION['profile']['fathers_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">MOTHER'S NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="mothers_name" value=" <?php echo $_SESSION['profile']['mothers_name'];?>" >
								</div>
				                <div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">AGE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="c_age" value=" <?php echo $_SESSION['profile']['c_age'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PRESENT ADDRESS :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="p_address" value=" <?php echo $_SESSION['profile']['p_address'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">ADDRESS TYPE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="add_type" value=" <?php echo $_SESSION['profile']['add_type'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">LIVING TIME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="livin_time" value=" <?php echo $_SESSION['profile']['livin_time'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">WORK PLACE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="work_place" value=" <?php echo $_SESSION['profile']['work_place'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">WORK TIME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="work_time" value=" <?php echo $_SESSION['profile']['work_time'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">EARNING MEMBER :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="earning_mem" value=" <?php echo $_SESSION['profile']['earning_mem'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PERM ADDRESS :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="perm_address" value=" <?php echo $_SESSION['profile']['perm_address'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PURCHAGE ID :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="purchase_id" value=" <?php echo $_SESSION['profile']['purchase_id'];?>" >
								</div>

				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				                <button type="submit" name="update_profile" class="btn btn-primary">UPDATE</button>
				            </div>
				        </form>

				    </div>
				  </div>
				</div>



				<!-- ####################################################################################################################### -->

				<!-- EDIT REFERENCE  FORM -->
				<div class="modal fade" id="edit_ref_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header ">
				        <h5 class="modal-title font-weight-bold " id="exampleModalLabel"> EDIT REFERENCE DETAILS </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				        <form action="update_ref.php" method="POST">
				        	

				            <div class="modal-body col-sm-6 float-left">
				            	<h6 class="font-weight-bold">REFERENCE ONE DETAILS</h6>

				                <input type="hidden" name="ac_no" value="<?php echo $_SESSION['profile']['ac_no'];?>">
				                <div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_name" value=" <?php echo $_SESSION['profile']['g_one_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PHONE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_phone" value=" <?php echo $_SESSION['profile']['g_one_phone'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">NID :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_vid" value=" <?php echo $_SESSION['profile']['g_one_vid'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">FATHER'S NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_f_name" value=" <?php echo $_SESSION['profile']['g_one_f_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">MOTHER'S NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_m_name" value=" <?php echo $_SESSION['profile']['g_one_m_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">AGE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_age" value=" <?php echo $_SESSION['profile']['g_one_age'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PRESENT ADDRESS :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_pre_address" value=" <?php echo $_SESSION['profile']['g_one_pre_address'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">WORK PLACE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_work_place" value=" <?php echo $_SESSION['profile']['g_one_work_place'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">MONTHLY INCOME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_m_income" value=" <?php echo $_SESSION['profile']['g_one_m_income'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PERM ADDRESS :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_one_p_address" value=" <?php echo $_SESSION['profile']['g_one_p_address'];?>" >
								</div>
							</div>
				            <div class="modal-body col-sm-6 float-left">
				            	<h6 class="font-weight-bold">REFERENCE TWO DETAILS</h6>


				                 <div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_name" value=" <?php echo $_SESSION['profile']['g_two_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PHONE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_phone" value=" <?php echo $_SESSION['profile']['g_two_phone'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">NID :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_vid" value=" <?php echo $_SESSION['profile']['g_two_vid'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">FATHER'S NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_f_name" value=" <?php echo $_SESSION['profile']['g_two_f_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">MOTHER'S NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_m_name" value=" <?php echo $_SESSION['profile']['g_two_m_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">AGE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_age" value=" <?php echo $_SESSION['profile']['g_two_age'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PRESENT ADDRESS :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_pre_address" value=" <?php echo $_SESSION['profile']['g_two_pre_address'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">WORK PLACE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_work_place" value=" <?php echo $_SESSION['profile']['g_two_work_place'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">MONTHLY INCOME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_m_income" value=" <?php echo $_SESSION['profile']['g_two_m_income'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PERM ADDRESS :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="g_two_p_address" value=" <?php echo $_SESSION['profile']['g_two_p_address'];?>" >
								</div>

							   

							    
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				                <button type="submit" name="update_ref" class="btn btn-primary btn-sm">UPDATE</button>
				            </div>
				        </form>

				    </div>
				  </div>
				</div>



				<!-- EDIT PURCHAGE   FORM -->
				<div class="modal fade" id="edit_pro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title font-weight-bold" id="exampleModalLabel"> EDIT ACCOUNTS DETAILS </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				        <form action="update_pro.php" method="POST">
				        	

				            <div class="modal-body">

				                <input type="hidden" name="e_p_id" value="<?php echo $_SESSION['product']['e_p_id'];?>">
				                <div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PRODUCT'S NAME :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="emi_p_name" value=" <?php echo $_SESSION['product']['emi_p_name'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PRODUCT'S MODEL :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="emi_p_model" value=" <?php echo $_SESSION['product']['emi_p_model'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PRODUCT'S SL :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="emi_p_sl" value=" <?php echo $_SESSION['product']['emi_p_sl'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">PRICE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="emi_sell_price" value=" <?php echo $_SESSION['product']['emi_sell_price'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">ADVANCE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="emi_addvance" value=" <?php echo $_SESSION['product']['emi_addvance'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">DUE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="emi_due" value=" <?php echo $_SESSION['product']['emi_due'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">INSTALMENT NO :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="emi_ins_no" value=" <?php echo $_SESSION['product']['emi_ins_no'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">INSTALMENT PAID :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="ins_paid" value=" <?php echo $_SESSION['product']['ins_paid'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">INSTALMENT LEFT :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="ins_left" value=" <?php echo $_SESSION['product']['ins_left'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">MONTHLY INSTALMENT :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="emi_month_ins" value=" <?php echo $_SESSION['product']['emi_month_ins'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">LAST PAID AMOUNT :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="last_paid_ammount" value=" <?php echo $_SESSION['product']['last_paid_ammount'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">LAST PAID DATE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="l_emi_p_date" value=" <?php echo $_SESSION['product']['l_emi_p_date'];?>" >
								</div>
								<div class="input-group input-group-sm ">
				
									<div class="input-group-prepend">
									<span class="input-group-text mt-2  " id="inputGroup-sizing-sm">EXPIRE DATE :</span>
									</div>

									<input type="text" class="form-control col-sm-12 mt-2 " name="last_date" value=" <?php echo $_SESSION['product']['last_date'];?>" >
								</div>
							  
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				                <button type="submit" name="update_pro" class="btn btn-primary">UPDATE</button>
				            </div>
				        </form>

				    </div>
				  </div>
				</div>

				<!-- ####################################################################################################################### -->

					<!-- DELETE POP UP FORM -->

					<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>

					        <form action="delete_account.php" method="POST">

					            <div class="modal-body">

					                <input type="hidden" name="ac_no" value="<?php echo $_SESSION['profile']['ac_no'];?>">

					                <h4 class="text-danger"> Do You Want To Delete Account ??</h4>
					                <small>It can Effect other sections</small>
					            </div>
					            <div class="modal-footer">
					                <button type="button" class="btn btn-secondary" data-dismiss="modal">  NO </button>
					                <button type="submit" name="delete_ac" class="btn btn-primary"> Yes!! Delete it. </button>
					            </div>
					        </form>

					    </div>
					  </div>
					</div>




<script>

		$(document).ready(function () {
		    $('.edit_ac_btn').on('click', function() {
		        
		        $('#edit_ac_modal').modal('show');

		        
		            /*$ul = $(this).closest('ul');

		            var data = $ul.children("li").map(function() {
		                return $(this).text();
		            }).get();

		            console.log(data);

		            $('#G_id').val(data[0]);
		            $('#P_name').val(data[1]);
		            $('#P_model').val(data[2]);
		            $('#P_sl_no').val(data[3]);
		            $('#P_quantity').val(data[4]);
		            $('#P_buy_price').val(data[5]);
		            $('#P_sell_price').val(data[6]);*/
		    });
		});

</script>

<script>


	$(document).ready(function () {
		    $('.edit_ref_btn').on('click', function() {
		        
		        $('#edit_ref_modal').modal('show');


		     });
		});
	
</script>

<script>


	$(document).ready(function () {
		    $('.edit_pro_btn').on('click', function() {
		        
		        $('#edit_pro_modal').modal('show');


		     });
		});
	
</script>

<script>

$(document).ready(function () {

    $('.deletebtn').on('click', function() {
        
        $('#deletemodal').modal('show');

          
       
      
    });
});

</script>
				


<?php include 'footer.php';?>