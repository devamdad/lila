<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['update_pro']))
    {   
        
        $e_p_id =    $_POST['e_p_id'];
        $emi_p_name = strtoupper($_POST['emi_p_name']);
        $emi_p_model = $_POST['emi_p_model'];
        $emi_p_sl = $_POST['emi_p_sl'];
        $emi_sell_price = $_POST['emi_sell_price'];
        $emi_addvance = $_POST['emi_addvance'];
        $emi_due = $_POST['emi_due'];
        $emi_ins_no = $_POST['emi_ins_no'];
        $ins_paid = $_POST['ins_paid'];
        $ins_left = $_POST['ins_left'];
        $emi_month_ins = $_POST['emi_month_ins'];
        $last_paid_ammount = $_POST['last_paid_ammount'];
        $l_emi_p_date = $_POST['l_emi_p_date'];
        $last_date = $_POST['last_date'];



        $update = "UPDATE emi_purchase 
                  SET emi_p_name='$emi_p_name',
                      emi_p_model='$emi_p_model',
                      emi_p_sl='$emi_p_sl',
                      emi_sell_price='$emi_sell_price',
                      emi_addvance='$emi_addvance',
                      emi_due='$emi_due',
                      emi_ins_no='$emi_ins_no',
                      ins_paid='$ins_paid',
                      ins_left='$ins_left',
                      emi_month_ins='$emi_month_ins',
                      last_paid_ammount='$last_paid_ammount',
                      l_emi_p_date='$l_emi_p_date',
                      last_date='$last_date'
                      WHERE 
                      e_p_id = '$e_p_id'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:accounts.php");
        }
    }

    
?>