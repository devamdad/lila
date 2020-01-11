<?php
session_start();

unset($_SESSION['paddress']);
unset($_SESSION['cphone']);
unset($_SESSION['cname']);
unset($_SESSION['ac_no']);
unset($_SESSION['memo_no']);
unset($_SESSION['monthly_ins']);
unset($_SESSION['ins_no']);
unset($_SESSION['due']);
unset($_SESSION['paid']);
unset($_SESSION['price']);
unset($_SESSION['pname']);
unset($_SESSION['emi']);



header('Location:emi.php');


?>