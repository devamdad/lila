<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['due_update']))
    {   
        
        $memo_no =    $_POST['memo_no'];
        $B_name = strtoupper($_POST['B_name']);
        $B_address = strtoupper($_POST['B_address']);
        $B_phone = $_POST['B_phone'];
        $BP_name = $_POST['BP_name'];
        $BP_due = $_POST['BP_due'];

        $update = "UPDATE cashsale 
                  SET B_name='$B_name',
                      B_address='$B_address',
                      B_phone='$B_phone',
                      BP_name='$BP_name',
                      BP_due='$BP_due'
            		  WHERE 
                      memo_no = '$memo_no'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:due.php");
        }

        /*if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:update.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }*/
    }
?>