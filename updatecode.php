<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['updatedata']))
    {   
        
        $id =    $_POST['G_id'];
        $pname = strtoupper($_POST['P_name']);
        $pmodel = strtoupper($_POST['P_model']);
        $psl = $_POST['P_sl_no'];
        $pq = $_POST['P_quantity'];
        $pbp = $_POST['P_buy_price'];
        $psp = $_POST['P_sell_price'];

        $update = "UPDATE products 
                  SET P_name='$pname',
                      P_model='$pmodel',
                      P_sl_no='$psl',
                      P_quantity='$pq',
                      P_buy_price='$pbp',
                      P_sell_price='$psp'
                      WHERE 
                      G_id = '$id'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:update.php");
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