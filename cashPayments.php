<?php include 'header.php';?>
<div class="">
	<div class="row">
		<div class="storeContent col-sm-12 ">
			<div class="sideMenu col-sm-2  font-weight-bold">
				<a href="cashPayments.php">CASH FULL</a>
				<a href="">ACCOUNTS</a>
				<a href="">HISTORY</a>
				<a href="">SALE DETAILS</a>
				<a href="add-products.php">ADD PRODUCTS</a>
				<a href="update.php">UPDATE</a>
			</div>
			<div class="col-sm-10 float-right pt-2">
				<h1 class="text-center ">CASH MEMO</h1>
				<div class="col-sm-8 mx-auto ">
					<form action="">
						<div class="form-group row">
						   <label for="User_name" class="col-sm-2 col-form-label font-weight-bold">NAME:</label>
						   <div class="col-sm-10">
						     <input type="text" class="form-control" id="User_name">
						   </div>
						</div>
						<div class="form-group row">
						   <label for="User_phone" class="col-sm-2 col-form-label font-weight-bold">PHONE NO:</label>
						   <div class="col-sm-10">
						     <input type="text" class="form-control" id="User_phone">
						   </div>
						</div>
						<div class="form-group row">
						   <label for="User_address" class="col-sm-2 col-form-label font-weight-bold">ADDRESS:</label>
						   <div class="col-sm-10">
						     <input type="text" class="form-control" id="User_address">
						   </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php include 'footer.php';?>