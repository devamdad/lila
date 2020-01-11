<?php
session_start();
$ac = $_SESSION['ac_no_in'];
$pid = $_SESSION['c_purchase_id_in'];
$cp=$_SESSION['c_phone_in'];

$date = date('d/m/y');

require('fpdf/fpdf.php');

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
	$pdf->setFont("Times","B",12);
	$pdf->Cell(20,10,"Account No ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(20,10," : ".$_SESSION["ac_no_in"],0,0);
	$pdf->Cell(120,10,"",0,0);
	$pdf->setFont("Times","B",12);
	$pdf->Cell(10,10,"Date ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(20,10," :".$date,0,1);
	$pdf->Cell(150,10,"",0,1);

	$pdf->setFont("Times","B",13);
	$pdf->Cell(40,10,"Customer Name ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(50,10," :  ".$_SESSION["c_name_in"],0,1);

	$pdf->setFont("Times","B",13);
	$pdf->Cell(40,10,"Customer Phone ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(50,10," :  ".$_SESSION["c_phone_in"],0,1);

	$pdf->setFont("Times","B",13);
	$pdf->Cell(40,10,"Customer Address ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(150,10," :  ".$_SESSION["c_adddress_in"],0,1);

	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"",0,1);

	$pdf->setFont("Times","B",12);
	$pdf->SetFillColor(46,49,146);
	$pdf->SetTextColor(252,252,252);
	$pdf->Cell(10,10,"#",1,0,"C",true);
	$pdf->Cell(40,10,"Previous Due",1,0,"C",true);
	$pdf->Cell(40,10,"Paid",1,0,"C",true);
	$pdf->Cell(40,10,"Due Left",1,0,"C",true);
	$pdf->Cell(40,10,"Instalment Left",1,1,"C",true);

	$pdf->setFont("Times","",10);
	$pdf->SetFillColor(252,252,252);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(40,10,$_SESSION['emi_due'],1,0,"C",true);
	$pdf->Cell(40,10,$_SESSION['pay_amount_in'],1,0,"C",true);
	$pdf->Cell(40,10,$_SESSION['new_emi_due'],1,0,"C",true);
	$pdf->Cell(40,10,$_SESSION['new_ins_left'],1,1,"C",true);

	$pdf->Cell(150,120,"",0,1);
	$pdf->Cell(50,10,"Buyers Signature",0,0,"L");
	$pdf->Cell(90,10,"",0,0);
	$pdf->Cell(50,10,"Showroom Menaeger's Signature",0,0,"R");

	$directoryName = "PDF_INVOICE\ACCOUNTS\ACCOUNT_NO_$ac";

  //Check if the directory already exists.
	if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
   		 mkdir($directoryName, 0755);
	}

$pdf->Output("PDF_INVOICE/ACCOUNTS/ACCOUNT_NO_$ac/WINS_".$ac.$pid."_".$cp.".pdf","F");

	$pdf->Output();

	ob_end_flush();


?>