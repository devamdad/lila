<?php
 if (isset($_POST['create_acc'])) {

    /* Personal information*/ 
    $c_name = strtoupper($_POST['c_name']);
  	$c_phone = $_POST['c_phone'];
  	$c_age = $_POST['c_age'];
  	$vid_no = $_POST['vid_no'];
    $pre_address = strtoupper($_POST['pre_address']);
    $livin_time = $_POST['livin_time'];
  	$add_type = strtoupper($_POST['add_type']);
    $fathers_name = strtoupper($_POST['fathers_name']);
    $mothers_name = strtoupper($_POST['mothers_name']);
    $family_mem = $_POST['family_mem'];
    $work_place = strtoupper($_POST['work_place']);
    $work_time = $_POST['work_time'];
    $earning_mem = $_POST['earning_mem'];
    $m_status = strtoupper($_POST['m_status']);
    $p_address = strtoupper($_POST['p_address']);
    $purchase_id = 0;

    /* reference one information*/ 
    $g_one_name = strtoupper($_POST['g_one_name']);
    $g_one_phone = $_POST['g_one_phone'];
    $g_one_age = $_POST['g_one_age'];
    $g_one_vid = $_POST['g_one_vid'];
    $g_one_pre_add = strtoupper($_POST['g_one_pre_add']);
    $g_one_f_name = strtoupper($_POST['g_one_f_name']);
    $g_one_m_name = strtoupper($_POST['g_one_m_name']);
    $g_one_w_place = strtoupper($_POST['g_one_w_place']);
    $g_one_m_income = $_POST['g_one_m_income'];
    $g_one_p_add = strtoupper($_POST['g_one_p_add']);

    /* reference two information*/ 
    $g_two_name = strtoupper($_POST['g_two_name']);
    $g_two_phone = $_POST['g_two_phone'];
    $g_two_age = $_POST['g_two_age'];
    $g_two_vid = $_POST['g_two_vid'];
    $g_two_pre_add = strtoupper($_POST['g_two_pre_add']);
    $g_two_f_name = strtoupper($_POST['g_two_f_name']);
    $g_two_m_name = strtoupper($_POST['g_two_m_name']);
    $g_two_w_place = strtoupper($_POST['g_two_w_place']);
    $g_two_m_income = $_POST['g_two_m_income'];
    $g_two_p_add = strtoupper($_POST['g_two_p_add']);


    $error = '';

    /* validation informations */
    if (!empty($c_name)) {
        $error = '';
    } else {
        $error .= 'Customer Name  can not be empty!';
    }

    if (!empty($c_phone)) {
        $error = '';
    } else {
        $error .= 'Customer Phone number  can not be empty!';
    }

    if (!empty($vid_no)) {
        $error = '';
    } else {
        $error .= 'Customer NID number can not be empty!';
    }

    /* validation reference informations */
    if (!empty($g_one_name)) {
        $error = '';
    } else {
        $error .= 'Customer reference name can not be empty!';
    }

    if (!empty($g_one_phone)) {
        $error = '';
    } else {
        $error .= 'Customer reference Phone number  can not be empty!';
    }

    if (!empty($g_one_vid)) {
        $error = '';
    } else {
        $error .= 'Customer reference NID number cetagory can not be empty!';
    }



    if (empty($error)) {
  		
        /// Database Linking ///
      require_once('db_connection.php');
      $db_connt = db_connect();
  

      $sql_insert="INSERT INTO `accounts`(`ac_no`, 
      `purchase_id`,
       `c_name`, 
       `c_age`, 
       `c_phone`,
        `p_address`,
        `vid_no`, 
        `g_one_name`,
        `g_one_phone`,
        `g_one_vid`,
        `g_one_pre_address`,
        `g_one_work_place`, 
        `fathers_name`, 
        `mothers_name`, 
        `perm_address`, 
        `add_type`, 
        `livin_time`, 
        `m_status`, 
        `work_place`, 
        `work_time`, 
        `family_mem`, 
        `earning_mem`, 
        `g_one_f_name`, 
        `g_one_m_name`, 
        `g_one_p_address`, 
        `g_one_age`, 
        `g_one_m_income`, 
        `g_two_name`, 
        `g_two_phone`, 
        `g_two_vid`, 
        `g_two_pre_address`, 
        `g_two_work_place`, 
        `g_two_f_name`, 
        `g_two_m_name`, 
        `g_two_p_address`, 
        `g_two_age`, 
        `g_two_m_income`, 
        `ifneeded`) 
        VALUES (
            NULL,
            '$purchase_id',
            '$c_name',
            '$c_age',
            '$c_phone',
            '$pre_address',
            '$vid_no',
            '$g_one_name',
            '$g_one_phone',
            '$g_one_vid',
            '$g_one_pre_add',
            '$g_one_w_place',
            '$fathers_name',
            '$mothers_name',
            '$p_address',
            '$add_type',
            '$livin_time',
            '$m_status ',
            '$work_place',
            '$work_time',
            '$family_mem ',
            '$earning_mem',
            '$g_one_f_name',
            '$g_one_m_name',
            '$g_one_p_add ',
            '$g_one_age',
            '$g_one_m_income',
            '$g_two_name',
            '$g_two_phone',
            '$g_two_vid',
            '$g_two_pre_add',
            '$g_two_w_place',
            '$g_two_f_name',
            '$g_two_m_name',
            '$g_two_p_add',
            '$g_two_age',
            '$g_two_m_income',
            NULL)";
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);



		if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:accounts.php');
		}
	}else{
		header('Location: create_ac.php?error='.$error);
		print_r($error);
		}
	}else{
		echo '<h1 style="color:red; text-align:center;">Kaz ta thik hoy nai :( </h1>';
	}

 
?>