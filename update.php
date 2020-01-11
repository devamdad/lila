<?php
	require_once('db_connection.php');

	$conn = db_connect(); // database connection 

	

	/*$create_table_products = "CREATE TABLE products (
 		G_id int NOT NULL AUTO_INCREMENT,
 		P_cat varchar(20) NOT NULL,
 		P_name varchar(100) NOT NULL,
 		P_model varchar(50) NOT NULL,
 		P_sl_no  varchar(50),
 		P_unique_id varchar(20) UNIQUE,
 		P_quantity int NOT NULL,
 		P_buy_price int,
 		P_sell_price int,
 		P_stutus int DEFAULT 0,
 		P_create_date TIMESTAMP,
 		P_emi_status int DEFAULT 0,
 		PRIMARY KEY (G_id)
	)";
	if ($conn->query($create_table_products)) {
		echo "Table others created successfully";
	} else {
    echo "Error creating table: " . $conn->error;
	} */

	

	$conn->close();

?>
<?php include 'header.php';?>

	<div class="">
		<div class="row">
			<div class="col-sm-12 ">
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
					<table class="table table-bordered  " style="with:100%; ">
						<?php
							 require_once('db_connection.php');

							 $conn = db_connect(); // database connection 

							 $table_sql = "SELECT * FROM products";

							 $result = mysqli_query($conn,$table_sql);
							 
						?>
						<thead style="background-color: #171733; color: white;">
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Product Name</th>
						      <th scope="col">Model No</th>
						      <th scope="col">SL No</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Buy Price</th>
							  <th scope="col">Price</th>
						      <th scope="col">Edit</th>
						      <th scope="col">Delete</th>

						    </tr>
						</thead>
						<tbody>
							<?php 
								while ($rows = mysqli_fetch_assoc($result)) 
								{ 
									
							?>
						    <tr>
						      <td scope="row"><?php echo $rows['G_id']; ?></td>
						      <td><?php echo $rows['P_name']; ?></td>
						      <td><?php echo $rows['P_model']; ?></td>
						      <td><?php echo $rows['P_sl_no']; ?></td>
						      <td><?php echo $rows['P_quantity']; ?></td>
						      <td><?php echo $rows['P_buy_price']; ?></td>
						      <td><?php echo $rows['P_sell_price']; ?></td>
						      <td>
						      	<button type="button" data-toggle="modal" data-target="#editmodal" class="btn btn-info btn-sm editbtn float-left" style="overflow:hidden;"><i class="fas fa-edit"></i> Edit</button>
						      </td>
						      <td>
						      	<button type="button" data-toggle="modal" data-target="#deletemodal" class="btn btn-danger btn-sm deletebtn float-left" style="overflow:hidden;"><i class="fas fa-trash-alt"></i> Delete</button>
						      </td>
						    </tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- ####################################################################################################################### -->

				<!-- EDIT POP UP FORM -->
				<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel"> Edit Products </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				        <form action="updatecode.php" method="POST">

				            <div class="modal-body">

				                <input type="hidden" name="G_id" id="G_id">

				                <div class="form-group">
				                    
				                    <input type="text" name="P_name" id="P_name" class="form-control" placeholder="Enter Product Name">
				                </div>

				                <div class="form-group">
				                    
				                    <input type="text" name="P_model" id="P_model" class="form-control" placeholder="Enter Product Model">
				                </div>

				                <div class="form-group">
				                    
				                    <input type="text" name="P_sl_no" id="P_sl_no" class="form-control" placeholder="Enter Product SL NO">
				                </div>

				                <div class="form-group">
				                    
				                    <input type="text" name="P_quantity" id="P_quantity" class="form-control" placeholder="Product Quantity">
				                </div>
				                <div class="form-group">
				                    
				                    <input type="text" name="P_buy_price" id="P_buy_price" class="form-control" placeholder="Product Buy Price">
				                </div>
				                <div class="form-group">
				                    
				                    <input type="text" name="P_sell_price" id="P_sell_price" class="form-control" placeholder="Product Sell Price">
				                </div>
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
				            </div>
				        </form>

				    </div>
				  </div>
				</div>


					<!-- ####################################################################################################################### -->

					<!-- DELETE POP UP FORM (Bootstrap MODAL) -->

					<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>

					        <form action="deletecode.php" method="POST">

					            <div class="modal-body">

					                <input type="hidden" name="delete_id" id="delete_id">

					                <h4 class="text-danger"> Do you want to Delete this product ??</h4>
					                <small>It can Effect other sections</small>
					            </div>
					            <div class="modal-footer">
					                <button type="button" class="btn btn-secondary" data-dismiss="modal">  NO </button>
					                <button type="submit" name="deletedata" class="btn btn-primary"> Yes!! Delete it. </button>
					            </div>
					        </form>

					    </div>
					  </div>
					</div>

				
			</div>
		</div>
	</div>
	<script>

		$(document).ready(function () {
		    $('.editbtn').on('click', function() {
		        
		        $('#editmodal').modal('show');

		        
		            $tr = $(this).closest('tr');

		            var data = $tr.children("td").map(function() {
		                return $(this).text();
		            }).get();

		            console.log(data);

		            $('#G_id').val(data[0]);
		            $('#P_name').val(data[1]);
		            $('#P_model').val(data[2]);
		            $('#P_sl_no').val(data[3]);
		            $('#P_quantity').val(data[4]);
		            $('#P_buy_price').val(data[5]);
		            $('#P_sell_price').val(data[6]);
		    });
		});


</script>
<script>

$(document).ready(function () {

    $('.deletebtn').on('click', function() {
        
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
       
      
    });
});

</script>
	
<?php include 'footer.php';?>