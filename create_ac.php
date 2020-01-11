<?php include 'header.php';?>

	

<style>
	#max{
		color: red;
	}


	 /* Dropdown Button */
	.dropbtn {
	  background-color: #21668D;
	  color: white;
	  padding: 10px 40px;
	  font-size: 18px;
	  border: none;
	  cursor: pointer;
	}

	/* Dropdown button on hover & focus */
	.dropbtn:hover, .dropbtn:focus {
	  background-color: #AD0F15;
	}

	/* The container <div> - needed to position the dropdown content */
	.dropdown {
	  position: relative;
	  display: inline-block;
	}

	/* Dropdown Content (Hidden by Default) */
	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f1f1f1;
	  min-width: 160px;
	  z-index: 1;
	}

	/* Links inside the dropdown */
	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	/* Change color of dropdown links on hover */
	.dropdown-content a:hover {background-color: #F1F1F1}

	/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
	.show {display:block;} 
</style>



<div class="">
	<div class="row" >
		<div class="storeContent col-sm-12 ">
			<div class="sideMenu col-sm-2  font-weight-bold">
				<div class="dropdown">
					
					<div id="myDropdown" class="dropdown-content">
					   
					</div>
					</div> 
						<a href="cart.php">CASH SELL</a>
						<a href="emi.php">INSTALMENT SELL</a>
						<a href="create_ac.php">CREATE ACCOUNT</a>
						<a href="accounts.php">ACCOUNTS</a>
						<a href="pay_dashboard.php">DASHBOARD</a>
						<a href="due.php">DUES</a>
						
						<a href="update.php"><button  class="btn btn-sm btn-warning storebtn">STORE</button></a>
					</div>
					<div class="sideTable  col-sm-10 pb-2" >
						<h1 class="text-center mx-auto py-2" style="color:white;background-color: #171733;">CREATE ACCOUNT</h1>
						<div class="col-sm-12">
							<div class="card" style="box-shadow: 0 0 10px #171733">
						  		<div class="card-header">
						    		<h4 class="text-center">ACCOUNT INFORMATION</h4>
						  		</div>
						  		<div class="card-body " >
						  			
						  			<!--FORM STARTS HERE-->

						  			<form action="validate_ac.php" method="POST">
						  				<div class=" row col-sm-12 mx-auto" >
									        <div class="container col-sm-12 my-2 mx-auto" style="box-shadow: 0 0 10px #171733;">
									            <h3 class="text-center mt-2">PERSONAL INFORMATION</h3>		
									            <input type="text" class="form-control  col-sm-4 my-2 ml-2 float-left" placeholder="Customer Full Name: *" name="c_name">

										        <input type="text" class="form-control  col-sm-2 float-right my-2  " placeholder="Phone Number: *" name="c_phone">

										        <input type="text" class="form-control  my-2 mr-5 col-sm-1 float-right" placeholder="Age: *" name="c_age">

										        <input type="text" class="form-control  my-2 ml-5 col-sm-3 float-left" placeholder="NID: *" name="vid_no">

										        <input type="text" class="form-control  col-sm-8  my-2 ml-2 float-left" placeholder="Full Present Address:" name="pre_address">

										        <input type="text" class="form-control  col-sm-2  my-2 ml-5 float-left" placeholder="Living Time" name="livin_time">

										        <select name="add_type" class="form-control  col-sm-1  my-2 ml-2 float-right">
													<option value="Own">Own</option>
													<option value="Rent">Rent</option>
												</select> 

												<input type="text" class="form-control  col-sm-5 my-2 ml-2 float-left" placeholder="Fathers Full Name:" name="fathers_name">

												<input type="text" class="form-control  col-sm-4 my-2 ml-5 float-left" placeholder="Mothers Full Name:" name="mothers_name">

												<input type="text" class="form-control  col-sm-2 my-2  mb-2 float-right" placeholder="Family Member:" name="family_mem">

												<input type="text" class="form-control  col-sm-5  my-2 ml-2 float-left" placeholder="Company or Institude:" name="work_place">

										        <input type="text" class="form-control  col-sm-2  my-2 ml-5 float-left" placeholder="Work Time" name="work_time">

										        <input type="text" class="form-control  col-sm-2  my-2 ml-1 float-left" placeholder="Earning Member:" name="earning_mem">

										        <select name="m_status" class="form-control  mb-4 col-sm-2  my-2 ml-2 float-right">
													<option value="Own">Married</option>
													<option value="Rent">Single</option>
												</select> 

												<input type="text" class="form-control  col-sm-8 mb-4 my-2 ml-2 float-left" placeholder="Full Permanent Address:" name="p_address">
											</div>


											<div class="col-sm-12 my-3 mx-auto" style="box-shadow: 0 0 10px #171733;">
									            <h3 class="text-center mt-2">REFERENCE INFORMATION (ONE)</h3>		
									            	
									            <input type="text" class="form-control  col-sm-4 my-2 ml-2 float-left" placeholder="Reference Full Name: *" name="g_one_name">

										        <input type="text" class="form-control  col-sm-2 float-right my-2  " placeholder="Phone Number: *" name="g_one_phone">

										        <input type="text" class="form-control  my-2 mr-5 col-sm-1 float-right" placeholder="Age: *" name="g_one_age">

										        <input type="text" class="form-control  my-2 ml-5 col-sm-3 float-left" placeholder="NID: *" name="g_one_vid">

										        <input type="text" class="form-control  col-sm-8  my-2 ml-2 mr-2 float-left" placeholder="Full Present Address:" name="g_one_pre_add">

										        <input type="text" class="form-control  col-sm-4 my-2 ml-2 float-left" placeholder="Fathers Full Name:" name="g_one_f_name">

												<input type="text" class="form-control  col-sm-4 my-2 ml-5 float-left" placeholder="Mothers Full Name:" name="g_one_m_name">


												<input type="text" class="form-control  col-sm-3  my-2 ml-4 float-left" placeholder="Company or Institude:" name="g_one_w_place">

												<input type="text" class="form-control  my-2  mb-4 col-sm-3 float-right" placeholder="Monthly Income: " name="g_one_m_income">

												<input type="text" class="form-control  col-sm-8 mb-4 my-2 ml-2 float-left" placeholder="Full Permanent Address:" name="g_one_p_add">
											</div>

											<div class="col-sm-12 my-3 mx-auto" style="box-shadow: 0 0 10px #171733;">
									            <h3 class="text-center mt-2">REFERENCE INFORMATION (TWO)</h3>		
									            	
									            <input type="text" class="form-control  col-sm-4 my-2 ml-2 float-left" placeholder="Reference Full Name: *" name="g_two_name">

										        <input type="text" class="form-control  col-sm-2 float-right my-2  " placeholder="Phone Number: *" name="g_two_phone">

										        <input type="text" class="form-control  my-2 mr-5 col-sm-1 float-right" placeholder="Age: *" name="g_two_age">

										        <input type="text" class="form-control  my-2 ml-5 col-sm-3 float-left" placeholder="NID: *" name="g_two_vid">

										        <input type="text" class="form-control  col-sm-8  my-2 ml-2 mr-2 float-left" placeholder="Full Present Address:" name="g_two_pre_add">

										        <input type="text" class="form-control  col-sm-4 my-2 ml-2 float-left" placeholder="Fathers Full Name:" name="g_two_f_name">

												<input type="text" class="form-control  col-sm-4 my-2 ml-5 float-left" placeholder="Mothers Full Name:" name="g_two_m_name">


												<input type="text" class="form-control  col-sm-3  my-2 ml-4 float-left" placeholder="Company or Institude:" name="g_two_w_place">

												<input type="text" class="form-control  my-2  mb-4 col-sm-3 float-right" placeholder="Monthly Income: " name="g_two_m_income">

												<input type="text" class="form-control  col-sm-8 mb-4 my-2 ml-2 float-left" placeholder="Full Permanent Address:" name="g_two_p_add">
											</div>
											<button class="btn btn-outline-info btn-lg btn-block" name="create_acc">CREATE ACCOUNT</button>

										</div>
						  				
						  			</form>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
		<script>
				/* $('#dis').change(function(){
				 	$('#total').html()
				 })*/

				function myFunction() {
					  document.getElementById("myDropdown").classList.toggle("show");
					}

					
					window.onclick = function(event) {
					  if (!event.target.matches('.dropbtn')) {
					    var dropdowns = document.getElementsByClassName("dropdown-content");
					    var i;
					    for (i = 0; i < dropdowns.length; i++) {
					      var openDropdown = dropdowns[i];
					      if (openDropdown.classList.contains('show')) {
					        openDropdown.classList.remove('show');
					      }
					    }
					  }
					}


		</script>
<?php 
	include 'footer.php';
?>