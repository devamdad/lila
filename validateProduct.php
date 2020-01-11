<?php
  if (isset($_POST['add_prod'])) {
  	$p_cat = strtoupper($_POST['p_cetagory']);
  	$p_name = strtoupper($_POST['p_name']);
  	$p_model = strtoupper($_POST['p_model']);
  	$p_sl = strtoupper($_POST['p_sl']);
  	$p_quantity = strtoupper($_POST['p_quantity']);
  	$p_b_price = strtoupper($_POST['p_buy_price']);
    $p_s_price = strtoupper($_POST['p_sell_price']);
  	$error = '';


  	// validation product Cetagory 
  	if (!empty($p_cat)) {
  		$error = '';
  	} else {
  		$error .= 'Product cetagory can not be empty!';
  	}

  	// validation product name 
  	if (!empty($p_name)) {
  		$error = '';
  	} else {
  		$error .= 'Product Name can not be empty!';
  	}

  	// validation product model 
  	if (!empty($p_model)) {
  		$error = '';
  	} else {
  		$error .= 'Product model can not be empty!';
  	}

  	// validation product quantity 
  	if (!empty($p_quantity)) {
  		$error = '';
  	} else {
  		$error .= 'Product quantity can not be empty!';
  	}

  	// validation product price 
  	if (!empty($p_b_price)) {
  		$error = '';
  	} else {
  		$error .= 'Product buy price can not be empty!';
  	}

    if (!empty($p_s_price)) {
      $error = '';
    } else {
      $error .= 'Product Sell price can not be empty!';
    }

  
    

  	if (empty($error)) {
  		
  		/// Database Linking ///
		require_once('db_connection.php');
		$db_connt = db_connect();
    

		$sql_insert="INSERT INTO `products` (`G_id`, `P_cat`, `P_name`, `P_model`, `P_sl_no`, `P_quantity`, `P_buy_price`, `P_sell_price`, `P_stutus`, `P_create_date`, `P_emi_status`) VALUES (NULL,'$p_cat', '$p_name', '$p_model', '$p_sl', '$p_quantity', '$p_b_price', '$p_s_price', '0', CURRENT_TIMESTAMP, '0')";

    
		

    /// SQL Action ///
		$result= mysqli_query($db_connt,$sql_insert);



		if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:add-products.php');
		}
	}else{
		header('Location: store.php?error='.$error);
		print_r($error);
		}
	}else{
		echo '<h1 style="color:red; text-align:center;">Kaz ta thik hoy nai :( </h1>';
	}
  
?>