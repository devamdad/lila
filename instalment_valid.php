<?php
session_start();

require_once('db_connection.php');
$conn = db_connect();

if(isset($_POST['pay_ins'])){
	$ac_no =    $_POST['ac_no'];

  $_SESSION['ac_no_in'] = $ac_no;
  
	$pay_amount =  $_POST['pay_amount'];
  $_SESSION['pay_amount_in'] = $pay_amount;
	$emi_due =  $_POST['emi_due'];
  $_SESSION['emi_due'] = $emi_due;

	$ins_left =  $_POST['ins_left'];
	$emi_ins_no =  $_POST['emi_ins_no'];
	$date = date('d/m/y');



	
	$new_ins_left = $ins_left - 1;
   $_SESSION['new_ins_left'] = $new_ins_left;

	$new_emi_due = $emi_due - $pay_amount;
  $_SESSION['new_emi_due'] = $new_emi_due;

	$new_ins_paid = $emi_ins_no - $new_ins_left;
  $_SESSION['new_ins_paid'] = $new_ins_paid;

	$update = "UPDATE emi_purchase 
                  SET emi_due='$new_emi_due',
                      ins_paid='$new_ins_paid',
                      ins_left='$new_ins_left',
                      l_emi_p_date=CURRENT_TIMESTAMP,
                      last_paid_ammount='$pay_amount'
                      WHERE 
                      a_no = '$ac_no'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:process_invoice.php");
        }

	





}
?>