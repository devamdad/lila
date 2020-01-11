<?php include 'header.php';?>
	<div class="">
		<div class="row">
			<div class="col-sm-12 ">
				<div class="sideMenu col-sm-2  font-weight-bold">
					<a href="cart.php">CASH SELL</a>
					<a href="emi.php">INSTALMENT SELL</a>
					<a href="create_ac.php">CREATE ACCOUNT</a>
					<a href="accounts.php">ACCOUNTS</a>
					<a href="pay_dashboard.php">DASHBOARD</a>
					<a href="due.php">DUES</a>
					
					<a href="update.php"><button  class="btn btn-sm btn-warning storebtn">STORE</button></a>


				</div>
				<div  id="refrigerator" class="sideTable col-sm-10 float-right  " style="overflow-y: auto;; max-height:100vh;">
					<table class="table table-bordered  " style="with:100%; ">
						<?php
							 require_once('db_connection.php');

							 $conn = db_connect(); // database connection 

							 $table_sql = "SELECT * FROM accounts";

							 $result = mysqli_query($conn,$table_sql);
							 
						?>
						<thead style="background-color: #171733; color: white;">
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Name</th>
						      <th scope="col">Phone No</th>
						      <th scope="col">Address</th>
						      <th scope="col">Purchase Id</th>
						      <th scope="col">Details</th>

						    </tr>
						</thead>
						<tbody>
							<?php 
								while ($rows = mysqli_fetch_assoc($result)) 
								{ 
									
							?>
						    <tr>
						      <td scope="row"><?php echo $rows['ac_no']; ?></td>
						      <td><?php echo $rows['c_name']; ?></td>
						      <td><?php echo $rows['c_phone']; ?></td>
						      <td><?php echo $rows['p_address']; ?></td>
						      <td><?php echo $rows['purchase_id']; ?></td>
						 	
						      <td>
						      	<form action="profile.php?id=<?php echo $rows["ac_no"]; ?>" method="POST">
						      		<input type="hidden" name="account_no" value="<?php echo $rows["ac_no"]; ?>">
						      		<input type="hidden" name="purchase_id" value="<?php echo $rows["purchase_id"]; ?>">
						      		<button type="submit" name="profile" class="btn btn-info btn-sm  float-left" style="overflow:hidden;"><i class="far fa-eye"></i> View Details</button>
						      	</form>
						      	
						      </td>
						      
						    </tr>
						<?php 
							
							} 
						?>
						</tbody>
					</table>
				</div>
<?php include 'footer.php';?>