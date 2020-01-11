<?php
include('db_connection.php');
if(isset($_POST["P_cat"]) && !empty($_POST["P_cat"])){
    
    $query = $db->query("SELECT * FROM products WHERE P_cat = ".$_POST['P_cat']);
    $rowCount = $query->num_rows;
    if($rowCount > 0){
        echo '<option value="">Select child</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['G_id'].'">'.$row['P_name'].'</option>';
        }
    }else{
        echo '<option value="">child not available</option>';
    }
}

?>