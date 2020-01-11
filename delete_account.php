<?php
require_once('db_connection.php');
$conn = db_connect();

if(isset($_POST['delete_ac']))
{
    $id = $_POST['ac_no'];

    $delete = "DELETE FROM accounts WHERE ac_no='$id'";
    $delete_result = mysqli_query($conn,$delete);

    if(mysqli_error($conn)){
            echo '<script> alert("Data Not deleted"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
    else{
           echo '<script> alert("Data deleted"); </script>';
           header("Location:accounts.php");
    }
}

?>