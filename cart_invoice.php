<?php
session_start();

echo $_SESSION["memo_no_cart"];
//echo $_SESSION["cname"] ;
echo "<br>";
$ac = $_SESSION["memo_no"] ;
$pid = $_SESSION["pid"][0];
$cp = $_SESSION["cphone"];


$date = date('d/m/y');



//call the FPDF library
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
	$pdf->setFont("Times","B",12);
	$pdf->Cell(20,10,"Memo No ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->setFont("Times","",13);
	$pdf->Cell(20,10," : ".$_SESSION["memo_no_cart"],0,0);
	$pdf->Cell(120,10,"",0,0);
	$pdf->setFont("Times","B",12);
	$pdf->Cell(10,10,"Date ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(20,10," :".$date,0,1);
	$pdf->Cell(150,10,"",0,1);


	$pdf->setFont("Times","B",13);
	$pdf->Cell(40,10,"Customer Name ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(50,10," :  ".$_SESSION["cname"],0,1);


	$pdf->setFont("Times","B",13);
	$pdf->Cell(40,10,"Customer Phone ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(50,10," :  ".$_SESSION["cphone"],0,1);

	$pdf->setFont("Times","B",13);
	$pdf->Cell(40,10,"Customer Address ",0,0);
	$pdf->setFont("Times","",13);
	$pdf->Cell(150,10," :  ".$_SESSION["paddress"],0,1);


	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"",0,1);

	$pdf->setFont("Times","B",12);
	$pdf->SetFillColor(46,49,146);
	$pdf->SetTextColor(252,252,252);
	$pdf->Cell(10,10,"#",1,0,"C",true);
	$pdf->Cell(70,10,"Product Name",1,0,"C",true);
	$pdf->Cell(30,10,"Quantity",1,0,"C",true);
	$pdf->Cell(40,10,"Price",1,0,"C",true);
	$pdf->Cell(40,10,"Total (BDT)",1,1,"C",true);


	for ($i=0; $i < count($_SESSION["pid"]) ; $i++) { 
		$pdf->setFont("Times","",10);
		$pdf->SetFillColor(252,252,252);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(10,10, ($i+1) ,1,0,"C",true);
		$pdf->Cell(70,10, $_SESSION["pname"][$i],1,0,"C",true);
		$pdf->Cell(30,10, $_SESSION["pq"][$i],1,0,"C",true);
		$pdf->Cell(40,10, $_SESSION["pp"][$i],1,0,"C",true);
		$pdf->Cell(40,10, ($_SESSION["pq"][$i] * $_SESSION["pp"][$i]),1,1,"C",true);
	}
	$pdf->Cell(10,10,"",0,0,"C");
	$pdf->Cell(70,10,"",0,0,"C");
	$pdf->Cell(30,10,"",0,0,"C");
	$pdf->setFont("Times","B",12);
	$pdf->Cell(40,10,"Sub Total",1,0,"C",true);
	$pdf->setFont("Times","",10);
	$pdf->Cell(40,10,$_SESSION['ptotal'],1,1,"C",true);

	$pdf->Cell(10,10,"",0,0,"C");
	$pdf->Cell(70,10,"",0,0,"C");
	$pdf->Cell(30,10,"",0,0,"C");
	$pdf->setFont("Times","B",12);
	$pdf->Cell(40,10,"Discount",1,0,"C",true);
	$pdf->setFont("Times","",10);
	if ($_SESSION['discount'] > 0) {
		$pdf->Cell(40,10,$_SESSION['discount'],1,1,"C",true);
	} else {
		$pdf->Cell(40,10,"0",1,1,"C",true);
	}
	
	

	$pdf->Cell(10,10,"",0,0,"C");
	$pdf->Cell(70,10,"",0,0,"C");
	$pdf->Cell(30,10,"",0,0,"C");
	$pdf->setFont("Times","B",12);
	$pdf->Cell(40,10,"Total",1,0,"C");
	$pdf->setFont("Times","",10);
	$pdf->Cell(40,10,$_SESSION['p_new_total'],1,1,"C");

	$pdf->Cell(10,10,"",0,0,"C");
	$pdf->Cell(70,10,"",0,0,"C");
	$pdf->Cell(30,10,"",0,0,"C");
	$pdf->setFont("Times","B",12);
	$pdf->Cell(40,10,"Paid",1,0,"C");
	$pdf->setFont("Times","",10);
	$pdf->Cell(40,10,$_SESSION['paid'],1,1,"C");

	$pdf->Cell(10,10,"",0,0,"C");
	$pdf->Cell(70,10,"",0,0,"C");
	$pdf->Cell(30,10,"",0,0,"C");
	$pdf->setFont("Times","B",12);
	$pdf->Cell(40,10,"Due",1,0,"C");
	$pdf->setFont("Times","",10);
	$pdf->Cell(40,10,$_SESSION['due'],1,1,"C");

	$pdf->Cell(100,50,"",0,1);
	$pdf->Cell(50,10,"Buyers Signature",0,0,"L");
	$pdf->Cell(90,10,"",0,0);
	$pdf->Cell(50,10,"Showroom Menaeger's Signature",0,0,"R");


	$directoryName = "PDF_INVOICE\CASHSALE\MEMO_NO_$cp";

  //Check if the directory already exists.
	if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
   		 mkdir($directoryName, 0755);
	}

	$pdf->Output("PDF_INVOICE/CASHSALE/MEMO_NO_$cp/WCH_".$cp.".pdf","F");

	$pdf->Output();

	ob_end_flush();






?>