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
						<div class="col-sm-3 float-left  py-3" style="background-color: #133340; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							<?php 
								$total = 0;	
								$totalemi = 0;
								$total_due_cash = 0; 
								$total_due_emi = 0;
								$cash_profit = 0;
								$emi_profit = 0;
								  require_once('db_connection.php');
  								$conn = db_connect();

								$query = "SELECT * FROM `cashSale` where year(curdate()) = year(BP_Buy_date) and month(curdate()) = month(BP_Buy_date)";
								$result = mysqli_query($conn,$query);
								$rowcount=mysqli_num_rows($result);
								if ($rowcount > 0){
									while ($row = mysqli_fetch_array($result)){
										
										$total = $total + $row[11];
										$total_due_cash = $total_due_cash + $row[14];

										$cash_profit = $cash_profit + $row[13];



									}


								}
								mysqli_close($conn);
								require_once('db_connection.php');
  								$conn = db_connect();
								$emiquery = "SELECT * FROM `emi_purchase` where year(curdate()) = year(buy_date) and month(curdate()) = month(buy_date)";
								$results = mysqli_query($conn,$emiquery);
								$count = mysqli_num_rows($results);
								if ($count > 0){
									while ($row = mysqli_fetch_array($results)){
										$totalemi = $totalemi + $row[6];
										$total_due_emi = $total_due_emi + $row[8];
										$emi_profit = $emi_profit + $row[15];
										
									}
								}
								$total_due = $total_due_emi + $total_due_cash;
								$totalsale= $rowcount + $count;
								?>
								<h1 class="text-center"><?php echo "TOTAL"."<br>".$totalsale;?></h1>
							
						</div>
						<div class="col-sm-3 float-left  py-3" style="background-color: #1a5972; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							<h1 class="text-center"><?php echo "CASH"."<br>".$rowcount;?></h1>
							

						</div>
						<div class="col-sm-3 float-left py-3" style="background-color: #2196a0; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							<h1 class="text-center"><?php echo "INSTALMENT"."<br>".$count;?></h1>
							

						</div>
						<div class="col-sm-3 float-left  py-3"  style="background-color: #317575; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							<h1 class="text-center"><?php echo "TOTAL DUE "."<br>".$total_due;?></h1>
							
							
						</div>
					</div>
					<div class="col-sm-12 max-auto">
						<div class="col-sm-6 float-left  py-3" style="background-color: #aa510d; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							
							<h1 class="text-center"><?php echo "TOTAL SALE CASH"."<br>".$total." BDT";?></h1>
							
						</div>
						
						<div class="col-sm-6 float-left py-3" style="background-color: #726c67; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							<h1 class="text-center"><?php echo "ON INSTALMENT"."<br>".$totalemi." BDT";?></h1>
							

						</div>
						<div class="col-sm-3 float-left  py-3" style="background-color: #bc5c18; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							<h1 class="text-center"><?php echo "ESTIMATE PROFIT"."<br>".$cash_profit." BDT";?></h1>
							

						</div>
						<a href="due.php">
							<div class="col-sm-3 float-left  py-3" style="background-color: #894e26; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							<h1 class="text-center"><?php echo "TOTAL DUE CASH"."<br>".$total_due_cash." BDT";?></h1>
							

							</div>
						</a>
						<div class="col-sm-3 float-left  py-3" style="background-color: #444444; color: white;">
							<h6 class="text-center">SALES THIS MONTH</h6>
							<h1 class="text-center"><?php echo "ESTIMATE PROFIT"."<br>".$emi_profit." BDT";?></h1>
							

						</div>
						<a href="accounts.php">
							<div class="col-sm-3 float-left  py-3" style="background-color: #515868; color: white;">
							<h6 class="text-center">ON INSTALMENT DUE</h6>
							<h1 class="text-center"><?php echo "DUE ON INSTALMENT"."<br>".$total_due_emi." BDT";?></h1>
							

							</div>
						</a>
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