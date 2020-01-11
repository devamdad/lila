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

							 $table_sql = "SELECT * FROM cashsale WHERE BP_due != 0";

							 $result = mysqli_query($conn,$table_sql);

							 
						?>
						<thead style="background-color: #171733; color: white;">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Phone No</th>
						      <th scope="col">Product</th>
						      <th scope="col">Address</th>
						      <th scope="col">Due</th>
						      <th scope="col">Update</th>
						      <th scope="col">Delete</th>

						    </tr>
						</thead>
						<tbody>
							<?php 
							
								while ($rows = mysqli_fetch_assoc($result)) 
								{ 
									
										$memo_no = $rows['memo_no'];

									
							?>
						    <tr>
						      <td><?php echo $rows['memo_no']; ?></td>
						      <td><?php echo $rows['B_name']; ?></td>
						      <td><?php echo $rows['B_phone']; ?></td>
						      <td><?php echo $rows['B_address']; ?></td>
						      <td><?php echo $rows['BP_name']; ?></td>
						      <td><?php echo $rows['BP_due']; ?></td>
						 	
						      <td>
						    	 <button type="submit" class=" editbtn btn btn-info btn-sm  float-left" style="overflow:hidden;">UPDATE</button>
						      </td>
						      <td>
						      	
						      	<button type="submit" name="deletebtn" class="deletebtn btn btn-danger btn-sm  float-left" style="overflow:hidden;">DELETE</button>
						    
						      </td>
						     
						      
						    </tr>
						<?php 
							
							} 
						?>
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

				        <form action="due_update.php" method="POST">

				            <div class="modal-body">

				                
				                <div class="form-group">
				                   <input class="form-control" type="text" name="memo_no" id="memo_no" readonly>
				                </div>

				                

				                <div class="form-group">
				                    
				                    <input type="text" name="B_name" id="B_name" class="form-control" placeholder=" Name">
				                </div>

				                <div class="form-group">
				                    
				                    <input type="text" name="B_phone" id="B_phone" class="form-control" placeholder="Phone Number">
				                </div>

				                <div class="form-group">
				                    
				                    <input type="text" name="B_address" id="B_address" class="form-control" placeholder="Address">
				                </div>

				                <div class="form-group">
				                    
				                    <input type="text" name="BP_name" id="BP_name" class="form-control" placeholder="Product Name">
				                </div>
				                <div class="form-group">
				                    
				                    <input type="text" name="BP_due" id="BP_due" class="form-control" placeholder="Due">
				                </div>
				           
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				                <button type="submit" name="due_update" class="btn btn-primary">Update</button>
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

					        <form action="due_delete.php" method="POST">

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
	<script>

		$(document).ready(function () {
		    $('.editbtn').on('click', function() {
		        
		        $('#editmodal').modal('show');

		        
		            $tr = $(this).closest('tr');

		            var data = $tr.children("td").map(function() {
		                return $(this).text();
		            }).get();

		            console.log(data);

		            $('#memo_no').val(data[0]);
		            $('#B_name').val(data[1]);
		            $('#B_phone').val(data[2]);
		            $('#B_address').val(data[3]);
		            $('#BP_name').val(data[4]);
		            $('#BP_due').val(data[5]);
		            
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