<?php include 'header.php';?>
<?php 
	session_start();

	require_once('db_connection.php');
	$conn = db_connect();
	if (isset($_POST["add"])) {
		if (isset($_SESSION["cart"])){
			 $item_array_id = array_column($_SESSION["cart"],"product_id");
			 if (!in_array($_GET["G_id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["G_id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
             );
		}
	}

	/*$sql_select_data = "SELECT * FROM products WHERE P_cat = 'refrigerator'";
	/*$result = mysqli_query($conn, $sql_select_data);
	//print_r($result) ;*/
 ?>

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
					<button onclick="myFunction()" class="dropbtn">CASH FULL</button>
					<div id="myDropdown" class="dropdown-content">
					    <a href="" >REFRIGERATOR</a>
					    <a href="#">TELEVISION</a>
					    <a href="#">AIR CONDITIO...</a>
					    <a href="#">OTHERS</a>
					</div>
					</div> 
					<a href="">ACCOUNTS</a>
					<a href="">HISTORY</a>
					<a href="">SALE DETAILS</a>
					<a href="add-products.php">ADD PRODUCTS</a>
					<a href="update.php">UPDATE</a>
				</div>
				<div class="sideTable  col-sm-10 pb-2" >
					<h1 class="text-center mx-auto py-2" style="color:white;background-color: #171733;">CASH MEMO</h1>
					<div class="col-sm-12">
						<div class="card" style="box-shadow: 0 0 10px #171733">
					  		<div class="card-header">
					    		<h4>New Order</h4>
					  		</div>
					  		<div class="card-body">
					  			<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Select Products
								</button>
						

								<!-- Modal -->
								<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-xl" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Select product</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <?php 
											$query = "SELECT * FROM `products` ORDER BY `G_id` ASC ";
												$result = mysqli_query($conn,$query);
												 if (mysqli_num_rows($result) > 0) {
												   	while ($row = mysqli_fetch_array($result)) {
										?>
								   		<div class=" ">
										
								      	<form action="fullCashPayment_ref.php?action=add&id=<?php echo $row["G_id"]; ?>">
											<div class="products col-sm-12 border">
												<h5 class="h6 col-sm-6 mt-3 float-left"><?php echo $row["P_cat"]." --> ".$row["P_name"]." --> ".$row["P_model"]; ?></h5>
				                                <h5 class=" col-sm-2 input-sm  h6 float-left mt-3 "><?php echo "&#x9f3; ".$row["P_sell_price"]; ?></h5>

				                                <input type="text" class="  input-sm mt-2 col-sm-1 h6 float-left form-control" name="quantity" value="1">

				                                <input id="max"type="text" class="col-sm-1 mt-2 input-sm h6 float-left form-control" name="quantity" value="<?php echo "MAX=".$row["P_quantity"];?>" readonly >


				                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
				                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
				                                <input type="submit" name="add"  class="btn-sm mt-2 btn h6 btn-success col-sm-1 float-right"
				                                       value="Add to Cart">
				                                
				                            </div>
										</form>

									</div>
								<?php
										}
									}

								?>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								       
								      </div>
								    </div>
								  </div>
								</div>
								<div style="clear: both"></div>
								        <div class="table-responsive">
								            <table class="table table-bordered">
								            <tr>
								                <th width="30%">Product Name</th>
								                <th width="10%">Quantity</th>
								                <th width="13%">Price Details</th>
								                <th width="10%">Total Price</th>
								                <th width="17%">Remove Item</th>
								            </tr>

							            </table>
							        </div>

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

		/*Product add and remove script*/
			








		/*$( document ).ready(function() {
    		$.ajax({
    			url:'loadData.php',
    			type:'post',
    			success:function(responceData){
    				$('#responce').html(responceData);
    			}
    		});
		});*/

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
<?php include 'footer.php';?>