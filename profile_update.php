<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['update_profile']))
    {   
        
        $ac_no =    $_POST['ac_no'];
        $c_name = strtoupper($_POST['c_name']);
        $c_phone = $_POST['c_phone'];
        $vid_no = $_POST['vid_no'];
        $fathers_name = strtoupper($_POST['fathers_name']);
        $mothers_name = strtoupper($_POST['mothers_name']);
        $p_address = strtoupper($_POST['p_address']);
        $c_age = $_POST['c_age'];
        $perm_address = strtoupper($_POST['perm_address']);
        $add_type = strtoupper($_POST['add_type']);
        $livin_time = $_POST['livin_time'];
        $work_place = strtoupper($_POST['work_place']);
        $work_time = $_POST['work_time'];
        $earning_mem = $_POST['earning_mem'];
        $purchase_id = $_POST['purchase_id'];


        $update = "UPDATE accounts 
                  SET purchase_id='$purchase_id',
                      c_name='$c_name',
                      c_age='$c_age',
                      c_phone='$c_phone',
                      p_address='$p_address',
                      vid_no='$vid_no',
                      fathers_name='$fathers_name',
                      mothers_name='$mothers_name',
                      perm_address='$perm_address',
                      add_type='$add_type',
                      livin_time='$livin_time',
                      work_place='$work_place',
                      work_time='$work_time',
                      earning_mem='$earning_mem'
                      WHERE 
                      ac_no = '$ac_no'";
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