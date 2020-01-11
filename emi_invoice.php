<?php

session_start();
//echo $_SESSION["cname"] ;
echo "<br>";
 $ac = $_SESSION["ac_no"] ;
 $pid =$_SESSION["memo_no"];
 $cp=$_SESSION["cphone"];

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
	$pdf->Cell(20,10," : ".$_SESSION["memo_no"],0,0);
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

	$pdf->setFont("Times","",10);
	$pdf->SetFillColor(252,252,252);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(10,10,"1",1,0,"C");
	$pdf->Cell(70,10,$_SESSION['pname'][0],1,0,"C",true);
	$pdf->Cell(30,10,"1",1,0,"C",true);
	$pdf->Cell(40,10,$_SESSION['price'],1,0,"C",true);
	$pdf->Cell(40,10,$_SESSION['price'],1,1,"C",true);

	$pdf->Cell(10,10,"",0,0,"C",true);
	$pdf->Cell(70,10,"",0,0,"C",true);
	$pdf->Cell(30,10,"",0,0,"C",true);
	$pdf->setFont("Times","B",12);
	$pdf->Cell(40,10,"Sub Total",1,0,"C",true);
	$pdf->setFont("Times","",10);
	$pdf->Cell(40,10,$_SESSION['price'],1,1,"C",true);

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

	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"",0,1);

	$pdf->setFont("Times","B",12);
	$pdf->SetFillColor(46,49,146);
	$pdf->SetTextColor(252,252,252);
	$pdf->Cell(10,10,"#",1,0,"C",true);
	$pdf->Cell(50,10,"Due Amount",1,0,"C",true);
	$pdf->Cell(50,10,"Installment No",1,0,"C",true);
	$pdf->Cell(50,10,"Per Installment",1,1,"C",true);

	$pdf->setFont("Times","",12);
	$pdf->SetFillColor(252,252,252);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(10,10,"#",1,0,"C",true);
	$pdf->Cell(50,10,$_SESSION['due'],1,0,"C",true);
	$pdf->Cell(50,10,$_SESSION['ins_no'],1,0,"C",true);
	$pdf->Cell(50,10,$_SESSION['monthly_ins'],1,0,"C",true);

	$pdf->Cell(100,60,"",0,1);
	$pdf->Cell(50,10,"Buyers Signature",0,0,"L");
	$pdf->Cell(90,10,"",0,0);
	$pdf->Cell(50,10,"Showroom Menaeger's Signature",0,0,"R");
	


	/*$pdf->Cell(25,10,"Signature",0,0,"L");

	$pdf->Cell(25,10,"Signature",0,0,"R");*/
	$directoryName = "PDF_INVOICE\ACCOUNTS\ACCOUNT_NO_$ac";

  //Check if the directory already exists.
	if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
   		 mkdir($directoryName, 0755);
	}

$pdf->Output("PDF_INVOICE/ACCOUNTS/ACCOUNT_NO_$ac/WINV_".$ac.$pid."_".$cp.".pdf","F");

	$pdf->Output();

	ob_end_flush();


	/*$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"Sub Total",0,0);
	$pdf->Cell(50,10,": ".$_SESSION['price'],0,1);
	$pdf->Cell(50,10,"Paid",0,0);
	$pdf->Cell(50,10,": ".$_SESSION['paid'],0,1);
	$pdf->Cell(50,10,"Due Amount",0,0);
	$pdf->Cell(50,10,": ".$_SESSION['due'],0,1);*/




//add new page
/*$pdf->AddPage();


$pdf->Image('image/walton_logo.png',80,5,50,20);
$pdf->Cell(65);
$pdf->SetTextColor(173,15,21);
$pdf->Cell(0,30,'LILA ENTERPRISE',0,1);

$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(10,9,9);
$pdf->SetMargins(50,5,0);
$pdf->Cell(57,0,'',0,0);
$pdf->Cell(0,-15,'L-8 Extention Pallabi, Mirpur, Dhaka-1216',0,1);
$pdf->Cell(22,0,'',0,0);
$pdf->Cell(0,25,'Mobile: 01911-090433, 01624710440 ',0,0);
$pdf->Cell(40,10,"",0,1);

$pdf->Cell(50,10,"Date 01911-090433 01911-09043301911-090433",0,0);
$pdf->Cell(50,10,"Cash memo",0,0);
$pdf->Cell(50,10,"Date",0,0);*/



//Cell(width , height , text , border , end line , [align] )

/*$pdf->Cell(130 ,5,'GEMUL APPLIANCES.CO',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[Street Address]',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[City, Country, ZIP]',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,'[dd/mm/yyyy]',0,1);//end of line

$pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Company Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Address]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Phone]',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(25 ,5,'Taxable',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,'UltraCool Fridge',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'3,250',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Supaclean Diswasher',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,200',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Something Else',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,000',1,1,'R');//end of line

//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

//output the result
$pdf->Output();

ob_end_flush();*/

?>