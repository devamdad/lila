<?php include 'header.php';?>
<?php 


	require_once('db_connection.php');
	$conn = db_connect();
	if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'item_cat' => $_POST["p_cat"],
                    'item_model' => $_POST["p_model"],
                    'item_sl' => $_POST["p_sl_no"],
                    'item_max' => $_POST["p_quantity"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                    'item_bp' => $_POST["proBuy_price"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'item_cat' => $_POST["p_cat"],
                    'item_model' => $_POST["p_model"],
                    'item_sl' => $_POST["p_sl_no"],
                    'item_max' => $_POST["p_quantity"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                    'item_bp' => $_POST["proBuy_price"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
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
						<h1 class="text-center mx-auto py-2" style="color:white;background-color: #171733;">CASH MEMO</h1>
						<div class="col-sm-12">
							<div class="card" style="box-shadow: 0 0 10px #171733">
						  		<div class="card-header">
						    		<h6 class="col-sm-3 float-left">Date : <?php echo date('d/m/Y');?></h6>
						    		<h6 class="col-sm-3 float-right text-right">New Order</h6>
						  		</div>
						  		<div class="card-body">
						  			<!-- Button trigger modal -->
									<button type="button" class="btn btn-info btn-block mb-4" data-toggle="modal" data-target="#exampleModal">
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
											
									      	<form method="post" action="cart.php?action=add&id=<?php echo $row["G_id"]; ?>">
												<div class="products col-sm-12 border">
													<h5 class="h6 col-sm-6 mt-3 float-left"><?php echo $row["P_cat"]." || ".$row["P_name"]." || ".$row["P_model"]; ?></h5>
					                                <h5 class=" col-sm-2 input-sm  h6 float-left mt-3 "><?php echo "&#x9f3; ".$row["P_sell_price"]; ?></h5>

					                                <input type="number" class="  input-sm mt-2 col-sm-1 h6 float-left form-control" name="quantity" value="1">

					                                <input id="max" type="text" class="col-sm-1 mt-2 input-sm h6 float-left form-control" value="<?php echo "MAX=".$row["P_quantity"];?>" readonly >


					                                <input type="hidden" name="hidden_name" value="<?php echo $row["P_name"]; ?>">
					                                <input type="hidden" name="proBuy_price" value="<?php echo $row["P_buy_price"]; ?>">

					                                <input type="hidden" name="hidden_price" value="<?php echo $row["P_sell_price"]; ?>">
					                                <input type="hidden" name="p_cat" value="<?php echo $row["P_cat"]; ?>">
					                                <input type="hidden" name="p_name" value="<?php echo $row["P_name"]; ?>">
					                                <input type="hidden" name="p_model" value="<?php echo $row["P_model"]; ?>">
					                                <input type="hidden" name="p_sl_no" value="<?php echo $row["P_sl_no"]; ?>">
					                                <input type="hidden" name="p_quantity" value="<?php echo $row["P_quantity"]; ?>">
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
									
									        <div class="table-responsive">
									        	<form action="cart_validate.php" class=" form-group" method="POST">
									        		<table class="table table-bordered">
										            <tr>
										                <th width="30%">Product Name</th>
										                <th width="10%">Quantity</th>
										                <th width="13%">Price Details</th>
										                <th width="10%">Total Price</th>
										                <th width="17%">Remove Item</th>
										            </tr>
											            <?php
										                if(!empty($_SESSION["cart"])){
										                    $total = 0;
										                    foreach ($_SESSION["cart"] as $key => $value) {
										                        ?>
										                        <tr>
										                            <td>
										                            	<input class="form-control" type="text" name = "pname[]"value="<?php echo $value["item_name"]; ?>" size="35" readonly>
										                            </td>
										                            <td>
										                            	<input class="form-control" type="text" name = "pq[]" value="<?php echo $value["item_quantity"]; ?>" size="4" readonly>
										                            </td>

										                            <td>
										                            	<input class="form-control" type="text" name = "pp[]"
										                            	value="<?php echo $value["product_price"]; ?>" readonly size="12">
										                            </td>
										                            
										                            <td>
										                            	<input class="form-control"  type="text" name = "ptp[]" readonly size="20" value="<?php echo $value["item_quantity"] * $value["product_price"]; ?>">
										                            </td>
										                           

										                             	<input type="hidden" name = "pid[]"
										                            	value="<?php echo $value["product_id"]; ?>" readonly size="10">

										                               <input type="hidden" name = "pcat[]"
										                            	value="<?php echo $value["item_cat"]; ?>" readonly size="10">

										                            	<input type="hidden" name = "pmodel[]"
										                            	value="<?php echo $value["item_model"]; ?>" readonly size="10">

										                            	<input type="hidden" name = "psl[]"
										                            	value="<?php echo $value["item_sl"]; ?>" readonly size="10">

										                            	<input type="hidden" name = "pmax[]"
										                            	value="<?php echo $value["item_max"]; ?>" readonly size="10">

										                            	<input type="hidden" name = "pbp[]"
										                            	value="<?php echo $value["item_bp"]; ?>" readonly size="10">
										                            

										                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
										                                        class="text-danger">Remove Item</span></a></td>

										                        </tr>
										                        <?php
										                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
										                    }
										                        ?>
										                        <tr>
										                            <td colspan="3" align="right">Total</td>
										                            <th align="right">
										                            	<input id="total" class="form-control" type="text" name="ptotal"value=" <?php echo $total; ?>"> 
										                            </th>
										                            <td>
										                            	<!--<th>
										                            		<input id="dis" type="text" placeholder="Discount">
										                            	</th> -->
										                            </td>
										                        </tr>
										                        <?php
										                    }
										                ?>

									            	</table>
									            	<div class="container  col-sm-11 my-auto" style="box-shadow: 0 0 10px #171733;">
									            		<div class="row">
										            		<input type="text" class="form-control  col-sm-5 my-3 ml-2 float-left" placeholder="Customer Name:" name="cname">

											            	<input type="text" class="form-control  col-sm-5 float-right my-3 ml-2 " placeholder="Phone Number:" name="cphone">

											            	<input type="text" class="form-control  col-sm-11  mb-2 ml-2 float-none" placeholder="Address:" name="caddress">

											            	<input type="text" class="form-control float-left col-sm-5  mb-2 ml-2 float-none" placeholder="Discount:" name="discount">

											            	<input type="text" class="form-control float-none col-sm-5   ml-2 " placeholder="Due:" name="due">
									            		</div>
									            		
									            		

									            	</div>
									            	
									            	<button class="btn btn-outline-info mt-2" type="submit" name="order">Process order</button>
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
	</div>
		<!--<script>
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


		</script>-->
<?php 
	include 'footer.php';
?>