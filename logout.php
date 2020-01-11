<?php
 if (isset($_POST['logout'])) {
 	$_SESSION['login'] = 0;
 	header('Location:login.php');
 } else {
 	
 }
 

?>