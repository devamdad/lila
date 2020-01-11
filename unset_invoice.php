<?php
session_start();

unset($_SESSION['c_purchase_id_in']);
unset($_SESSION['c_adddress_in']);
unset($_SESSION['c_phone_in']);
unset($_SESSION['c_name_in']);
unset($_SESSION['ac_no_in']);
unset($_SESSION['emi_due']);
unset($_SESSION['new_ins_paid']);
unset($_SESSION['new_emi_due']);
unset($_SESSION['new_ins_left']);
unset($_SESSION['pay_amount_in']);
unset($_SESSION['c_purchase_id_in']);
unset($_SESSION['c_purchase_id_in']);

header('Location:accounts.php');


?>