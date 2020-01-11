<?php
 include('header.php')
?>
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
				<div class="col-sm-10 float-right  pb-3">
					<div class="col-sm-8 mx-auto pt-1">
					   <form method="POST" action="validateProduct.php">
					   	  <div class="form-group">
						    <label for="exampleFormControlSelect1" class="font-weight-bold" >SELECT PRODUCT CETAGORY</label>
						    <select name="p_cetagory" class="form-control" id="exampleFormControlSelect1">
						      <option>REFRIGARETOR</option>
						      <option>TELEVISION</option>
						      <option>AC</option>
						      <option>OTHERS</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="productName" class="font-weight-bold">Product Name</label>
						    <input type="text" style="text-transform: uppercase;" class="form-control" id="productName" name="p_name" >
						  </div>
						  <div class="form-group">
						    <label for="modelNo" class="font-weight-bold">Model No</label>
						    <input type="text" style="text-transform: uppercase;" class="form-control" id="ModelNo" name="p_model">
						  </div>
						  <div class="form-group">
						    <label for="slNo" class="font-weight-bold">SL No</label>
						    <input type="text" style="text-transform: uppercase;" class="form-control" id="slNo" name="p_sl">
						  </div>
						  <div class="form-group">
						    <label for="quantity" class="font-weight-bold">Quantity</label>
						    <input type="text" style="text-transform: uppercase;" class="form-control" id="quantity" name="p_quantity">
						  </div>
						  <div class="form-group">
						    <label for="p_buy_price" class="font-weight-bold">Product Buy Price</label>
						    <input type="text" class="form-control" style="text-transform: uppercase;" id="p_buy_price" name="p_buy_price">
						  </div>
							<div class="form-group">
						    <label for="p_sell_price" class="font-weight-bold">Product Sell price</label>
						    <input type="text" class="form-control" style="text-transform: uppercase;" id="p_sell_price" name="p_sell_price">
						  </div>
						  <button type="submit" class="btn btn-primary btn-primery btn-block" name="add_prod"  >ADD PRODUCT</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
 include('footer.php')
?>