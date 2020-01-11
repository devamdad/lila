<?php
 session_start();
 require_once('db_connection.php');
 $conn = db_connect();


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Walton Showroom</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/main.css">
	
</head>
<style>
	.login_logo{
		
		padding-bottom: 10px;

	}
	.login_logo h1{
	color:#0e3d8c;
	font-family: "Times New Roman", Times, serif;
	font-size: 40px;
	padding-left: 5px;

	}
	.login_logo img{
	float: left;
	padding-top: 10px;
	padding-right: 10px;
	margin-left:20px;
	max-height: 60px;
	max-width: 60px;

	
	}
	
	.form-control:focus {
  		border-color: #17479E !important;
  		box-shadow: 0 0 5px rgba(98, 101, 228, 1) !important;
	}
	.btn-outline-danger,
	.btn-outline-danger:hover,
	.btn-outline-danger:active,
	.btn-outline-danger:visited,
	.btn-outline-danger:focus {
    background-color: #17479E;
    border-color: white;
    color: white;
}



</style>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="login col-sm-5 mt-5 mx-auto justify-content-center text-justify ">
				<div class="login_logo" >
					<img src="image/walton-logo.PNG" alt="walton-logo">
					<h1><u>LILA ENTERPRISE</u></h1>
				</div>
				<form action="" method="post">
				  <div class="form-group">
				    <input type="text" class="form-control" name="uname" value="<?php if(isset($_COOKIE["user"])) { echo $_COOKIE["user"]; } ?>" placeholder="Enter Username">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" name="upass" value="<?php if(isset($_COOKIE["pass"])) { echo $_COOKIE["pass"]; } ?>"placeholder="Password">
				  </div>
				    
				  <button type="submit" name="login" class="btn btn-outline-danger font-weight-bolder btn-block ">login</button>
				</form>
			</div> 			
		</div>

	</div>
</body>
</html>
<?php
 if (isset($_POST['login'])) {
 	$user = $_POST['uname'];
 	$pass = $_POST['upass'];
 	
 	$select = "SELECT * FROM admin WHERE uname = '$user' AND upass = '$pass'";

 	$result = mysqli_query($conn,$select);
	$count = mysqli_num_rows($result);
 	
 	if ($count == 1) {
 		
 		
 		$_SESSION['login'] = 1;
 		header('Location:sections.php');

 	} else {
 		$_SESSION['login'] = 0;
 		header('Location:login.php');
 	}
 	

 } else {
 	
 }
 
?>
