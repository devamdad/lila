<?php
session_start();

unset($_SESSION['cname']);
unset($_SESSION['pq']);
unset($_SESSION['cphone']);
unset($_SESSION['paddress']);
unset($_SESSION['p_new_total']);
unset($_SESSION['paid']);
unset($_SESSION['pid']);
unset($_SESSION['pname']);
unset($_SESSION['pq']);
unset($_SESSION['pp']);
unset($_SESSION['ptotal']);
unset($_SESSION['discount']);
unset($_SESSION['due']);
unset($_SESSION['paid']);
unset($_SESSION['memo_no_cart']);
unset($_SESSION['cart']);


header('Location:cart.php');


?>