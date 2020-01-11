<?php include 'header.php';?>



<style>
	

	.dropbtn {
	  background-color: #3498DB;
	  color: white;
	  padding: 10px 40px;
	  font-size: 18px;
	  border: none;
	  cursor: pointer;
	}
	.dropbtn:hover, .dropbtn:focus {
	  background-color: #2980B9;
	}

	.dropdown {
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f1f1f1;
	  min-width: 160px;
	  z-index: 1;
	}

	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}
	.dropdown-content a:hover {background-color: #F1F1F1}
	.show {display:block;} 
</style>
<div class="">
		<div class="row">
			<div class="storeContent col-sm-12 ">
				<div class="sideMenu col-sm-2  font-weight-bold">
					<a href="cart.php">CASH SELL</a>
						<a href="emi.php">INSTALMENT SELL</a>
						<a href="create_ac.php">CREATE ACCOUNT</a>
						<a href="accounts.php">ACCOUNTS</a>
						<a href="pay_dashboard.php">DASHBOARD</a>
						<a href="due.php">DUES</a>
						
						<a href="update.php"><button  class="btn btn-sm btn-warning storebtn">STORE</button></a>
				</div>
				<div class="sideTable  col-sm-10 pb-2" >
					<h1 class="text-center mx-auto py-2" style="color:white;background-color: #171733;">DASHBOARD</h1>
					<div class="col-sm-12 max-auto">
						<a href="accounts.php" class="text-center">
							<div class="col-sm-4 float-left  py-3" style="background-color: #133340; color: white; min-height:180px;">
							<h6 class="text-center">TODAY PAYING DATE</h6>
							<?php 
								  require_once('db_connection.php');
  								$conn = db_connect();

								$query = "SELECT * FROM `cashSale` where year(curdate()) = year(BP_Buy_date) and day(curdate()) = day(BP_Buy_date)";
								$result = mysqli_query($conn,$query);
								$rowcount=mysqli_num_rows($result);
								if ($rowcount > 0){
									while ($row = mysqli_fetch_array($result)){
										
										



									}


								}
								mysqli_close($conn);
								require_once('db_connection.php');
  								$conn = db_connect();
								$emiquery = "SELECT * FROM `emi_purchase` where year(curdate()) = year(buy_date) and day(curdate()) = day(buy_date)";
								$results = mysqli_query($conn,$emiquery);
								$count = mysqli_num_rows($results);
								if ($count > 0){
									while ($row = mysqli_fetch_array($results)){
										
										
									}
								}
								$day = date('d');
								
								
								
								
								mysqli_close($conn);
								require_once('db_connection.php');
  								$conn = db_connect();
								$emiquery = "SELECT * FROM `emi_purchase` WHERE payment_day = '$day'";
								$results = mysqli_query($conn,$emiquery);
								$count = mysqli_num_rows($results);
								if ($count > 0){
									while ($row = mysqli_fetch_array($results)){
											
									  ?>
									 
									  	<button class="btn btn-sm btn-block text-center btn-warning"><?php echo "ACCOUNT NO : ".$row[1];?></button> 
									
										
										


									<?php  
									
									}

								} 
								else{
										echo "<h1>"."NO ACCOUNTS"."</h1>";
									}

								?>
						</div></a>
						<div class="col-sm-4 float-left  py-3" style="background-color: #1a5972; color: white;min-height:180px;">
							<h6 class="text-center">SALES TODAY</h6>
							<h1 class="text-center"><?php echo "CASH"."<br>".$rowcount;?></h1>
							

						</div>
						<div class="col-sm-4 float-left  py-3" style="background-color: #2196a0; color: white;min-height:180px;;">
							<h6 class="text-center">SALES TODAY</h6>
							<h1 class="text-center"><?php echo "ON INSTALMENT"."<br>".$count;?></h1>
							

						</div>
						
						
					</div>
					


					
				</div>
				
			
		</div>
	</div>
	











<!--	<script>
		
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
	</script>-->
	
<?php include 'footer.php';?>