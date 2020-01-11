<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sections</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<style>
	.paymenteDiv{
		background-color: white;
		width: 400px;
		height: 300px;
		border-radius: 5px;
	}
	.paymenteDiv img{
		padding-top: 20px; 
		width: 200px;
		height: 180px;

	}
	.storeDiv{
		background-color: white;
		width: 400px;
		height: 300px;
		border-radius: 5px;
	}
	.storeDiv img{
		padding-top: 20px; 
		width: 200px;
		height: 180px;

	}
</style>

<body>
	<div class="container" >
		<div class="row mt-5 text-center">
			<div class="col-sm-12 section">

				<!--payment section-->

				<div class="paymenteDiv col-sm-6 float-left ml-5">
					<div class="">
						<img src="image/money1.PNG" alt="Payments icon">
					</div>
					
					<a href="payments.php"><button class="paymentSection font-weight-bold" type="submit">PAYMENTS</button></a>
				</div>



				<!--store section-->
				<div class="storeDiv col-sm-6 float-right mr-5">
					<div class="">
						<img src="image/store1.PNG" alt="Store icon">
					</div>
					
					<a href="store.php"><button class="storeSection font-weight-bold" type="submit">STORE</button></a>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>