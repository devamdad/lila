<?php
 /*session_start();
 echo $_SESSION['profile']['c_name']; **
 echo "<br>";
 echo $_SESSION['profile']['c_phone']; **
 echo "<br>";
 echo $_SESSION['profile']['vid_no']; **
 echo "<br>";
 echo $_SESSION['profile']['fathers_name'];**
 echo "<br>";
 echo $_SESSION['profile']['mothers_name'];**
 echo "<br>";
 echo $_SESSION['profile']['add_type'];
 echo "<br>";
 echo $_SESSION['profile']['livin_time'];
 echo "<br>";
 echo $_SESSION['profile']['work_place'];
 echo "<br>";
 echo $_SESSION['profile']['work_time'];
 echo "<br>";
 echo $_SESSION['profile']['m_status'];
 echo "<br>";
 echo $_SESSION['profile']['earning_mem'];
 echo "<br>";
 echo $_SESSION['profile']['purchase_id'];
 echo "<br>";




  echo $_SESSION['profile']['g_one_name'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_phone'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_vid'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_f_name'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_m_name'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_age'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_pre_address'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_work_place'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_m_income'];
 echo "<br>";
  echo $_SESSION['profile']['g_one_p_address'];
 echo "<br>";



 echo $_SESSION['profile']['g_two_name'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_phone'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_vid'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_f_name'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_m_name'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_age'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_pre_address'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_work_place'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_m_income'];
 echo "<br>";
  echo $_SESSION['profile']['g_two_p_address'];
 echo "<br>";*/

session_start();


$date = date('d/m/y');
$ac = $_SESSION['profile']['ac_no'];
$pid = $_SESSION['profile']['purchase_id'];
$cp = $_SESSION['profile']['c_phone'];




require('fpdf/fpdf.php');


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object

ob_end_clean(); //    the buffer and never prints or returns anything.
ob_start(); // it starts buffering
$pdf = new FPDF();
$pdf->AddPage();

    $pdf->setFont("Times","B",28);
	$pdf-> Image('image/walton_logo.PNG',62,0,80,0);
	$pdf->SetTextColor(173,15,21);
	$pdf->Cell(190,25,"LILA ENTERPRISE",0,1,"C");
	$pdf->setFont("Arial",null,12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(190,-10,"L-8, Extention Pallabi, Mirpur-1216",0,1,"C");
	$pdf->Cell(190,20,"Mobile: 01911090433, 01624-710440",0,1,"C");
	$pdf->setFont("Arial","B",11);
	$pdf->Cell(20,10,"Account No ",0,0);
	$pdf->setFont("Arial","",11);
	$pdf->Cell(20,10," : ".$_SESSION['profile']['ac_no'],0,0);
	$pdf->Cell(120,10,"",0,0);
	$pdf->setFont("Arial","B",11);
	$pdf->Cell(10,10,"Date ",0,0);
	$pdf->setFont("Arial","",11);
	$pdf->Cell(20,10," :".$date,0,1);
	

	
	// CUSTOMER DETIALS HEADER 
	$pdf->setFont("Arial","B",11);
	$pdf->SetFillColor(16,82,168);
	$pdf->SetTextColor(252,252,252);
	$pdf->Cell(190,10," CUSTOMER DETAILS ",0,1,"C",true);

	$pdf->Cell(150,5,"",0,1);
	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Customer Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['c_name'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Phone Number ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['c_phone'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Father's Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['fathers_name'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Mother's Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['mothers_name'],0,1);

    $pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"NID ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['vid_no'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Age ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['c_age'],0,1);

	

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Address Type ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['add_type'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"living Time  ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['livin_time'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Work Place ",0,0);
	$pdf->setFont("Arial","",11);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['work_place'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Working Time ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['work_time'],0,1);



	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Marital Status ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['m_status'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Earning Member ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['earning_mem'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Present Address ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(150,10," :  ".$_SESSION['profile']['p_address'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Perm. Address ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(150,10," :  ".$_SESSION['profile']['perm_address'],0,1);

	$pdf->Cell(150,20,"",0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetFillColor(16,82,168);
	$pdf->SetTextColor(252,252,252);
	$pdf->Cell(190,10," PARCHAGE DETAILS ",0,1,"C",true);

	$pdf->Cell(150,5,"",0,1);
	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Product Id ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['e_p_id'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Product Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['emi_p_name'],0,1);


	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Product Model ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['emi_p_model'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Product Sl ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['emi_p_sl'],0,1);

	
	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Product Price ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['emi_sell_price'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Advance ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['emi_addvance'],0,1);

	
	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Due  ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['emi_due'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Instalment No ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['emi_ins_no'],0,1);

	
	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Instalment Paid ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['ins_paid'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Instalment Left ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['ins_left'],0,1);

	
	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Monthly Ins. ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['emi_month_ins'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Last Amount ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['last_paid_ammount'],0,1);

	
	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Last Pay. Date ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['l_emi_p_date'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Inst. Expire ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['product']['last_date'],0,1);


	//NEXT PAGE
	$pdf->Cell(190,21,"",0,1);
	$pdf->Cell(190,1,"",0,1);

	$pdf->setFont("Times","B",28);
	$pdf-> Image('image/walton_logo.PNG',62,0,80,0);
	$pdf->SetTextColor(173,15,21);
	$pdf->Cell(190,25,"LILA ENTERPRISE",0,1,"C");
	$pdf->setFont("Arial",null,12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(190,-10,"L-8, Extention Pallabi, Mirpur-1216",0,1,"C");
	$pdf->Cell(190,20,"Mobile: 01911090433, 01624-710440",0,1,"C");
	$pdf->setFont("Arial","B",11);
	$pdf->Cell(20,10,"Account No ",0,0);
	$pdf->setFont("Arial","",11);
	$pdf->Cell(20,10," : ".$_SESSION['profile']['ac_no'],0,0);
	$pdf->Cell(120,10,"",0,0);
	$pdf->setFont("Arial","B",11);
	$pdf->Cell(10,10,"Date ",0,0);
	$pdf->setFont("Arial","",11);
	$pdf->Cell(20,10," :".$date,0,1);


	// REFERENCE DETIALS HEADER 
	$pdf->setFont("Arial","B",11);
	$pdf->SetFillColor(16,82,168);
	$pdf->SetTextColor(252,252,252);
	$pdf->Cell(190,10," REFERENCE DETAILS (ONE) ",0,1,"C",true);
	$pdf->Cell(150,5,"",0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_one_name'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Phone No ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_one_phone'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"NID ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_one_vid'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Age ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_one_age'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Father's Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_one_f_name'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Mother's Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_one_m_name'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Work Place ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_one_work_place'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Monthly Income ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_one_m_income'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Present Address ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(150,10," :  ".$_SESSION['profile']['g_one_pre_address'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Perm. Address ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(150,10," :  ".$_SESSION['profile']['g_one_p_address'],0,1);


	$pdf->Cell(150,20,"",0,1);

	// REFERENCE  TWO DETIALS HEADER 
	$pdf->setFont("Arial","B",10);
	$pdf->SetFillColor(16,82,168);
	$pdf->SetTextColor(252,252,252);
	$pdf->Cell(190,10," REFERENCE DETAILS (TWO) ",0,1,"C",true);
	$pdf->Cell(150,5,"",0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_two_name'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Phone No ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_two_phone'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"NID ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_two_vid'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Age ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_two_age'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Father's Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_two_f_name'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Mother's Name ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_two_m_name'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Work Place ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_two_work_place'],0,0);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Monthly Income ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(65,10," :  ".$_SESSION['profile']['g_two_m_income'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Present Address ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(150,10," :  ".$_SESSION['profile']['g_two_pre_address'],0,1);

	$pdf->setFont("Arial","B",10);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,10,"Perm. Address ",0,0);
	$pdf->setFont("Arial","",9);
	$pdf->Cell(150,10," :  ".$_SESSION['profile']['g_two_p_address'],0,1);

	

	



	$directoryName = "PDF_INVOICE\ACCOUNTS\ACCOUNT_NO_$ac";

  //Check if the directory already exists.
	if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
   		 mkdir($directoryName, 0755);
	}

$pdf->Output("PDF_INVOICE/ACCOUNTS/ACCOUNT_NO_$ac/WP_".$ac.$pid."_".$cp.".pdf","F");
$pdf->Output();	

ob_end_flush();









?>