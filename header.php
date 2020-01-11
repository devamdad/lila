<?php
 session_start();
 if ($_SESSION['login'] == 0) {
 	header('Location:login.php');
 } else {
 	# code...
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Store</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/store.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="https://kit.fontawesome.com/7b815cfb16.js"></script>
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
    
	
</head>
<body>
	<!-- header section start-->
	<div class="header">
		<img src="image/walton-logo.PNG" alt="walton-logo">
		<h1><u>LILA ENTERPRISE</u></h1>
		<a href="reload.php"><img src="image/reload.SVG"  alt="reload" style="padding-bottom: 2px;margin-left: 5px; margin-top: -5px;"></a>
		<form action="logout.php" method="POST">
			<a href="" class="float-right mt-3 mr-4"><button class="btn btn-warning btn-sm" name="logout">logout</button></a>
		</form>
	
	</div>