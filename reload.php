<?php
session_start();
$login=$_SESSION['login'];
session_destroy();
session_start();
$_SESSION['login'] = $login;
header('Location:sections.php');
?>