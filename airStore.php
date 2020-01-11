<?php include 'header.php';?>

	<div class="">
		<div class="row">
			<div class="storeContent col-sm-12 ">
				<div class="sideMenu col-sm-2  font-weight-bold">
					<a href="refrigeratorStore.php">REFRIGERATOR</a>
					<a href="televisionStore.php">TELEVISION</a>
					<a href="airStore.php">AIR CONDITIONER</a>
					<a href="otherStore.php">OTHERS</a>
					<a href="add-products.php">ADD PRODUCTS</a>
					<a href="update.php">UPDATE</a>
					<a href="payments.php"><button class="btn btn-sm btn-warning btn-block paybtn">PAYMENT</button></a>

				</div>
				<div  id="refrigerator" class="sideTable col-sm-10 float-right  " style="overflow-y: auto;; max-height:100vh;">
					<table class="table table-bordered " style="with:100%; ">
						<?php
							 require_once('db_connection.php');

							 $conn = db_connect(); // database connection 

							 $table_sql = "SELECT * FROM products WHERE P_cat = 'AC'";

							 $result = mysqli_query($conn,$table_sql);
						?>
						<thead style="background-color: #171733; color: white;">
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Product Name</th>
						      <th scope="col">Model No</th>
						      <th scope="col">SL No</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Price</th>
						    </tr>
						</thead>
						<tbody>
							<?php 
								while ($rows = mysqli_fetch_assoc($result)) 
								{
									
							?>
						    <tr>
						      <th scope="row"><?php echo $rows['G_id'];  ?></th>
						      <td><?php echo $rows['P_name']; ?></td>
						      <td><?php echo $rows['P_model'
						      ]; ?></td>
						      <td><?php echo $rows['P_sl_no']; ?></td>
						      <td><?php echo $rows['P_quantity']; ?></td>
						      <td><?php echo $rows['P_sell_price']; ?></td>
						    </tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
	
<?php include 'footer.php';?>