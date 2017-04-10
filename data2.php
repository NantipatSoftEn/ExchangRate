<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

	ob_start();
	require('fpdf181/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(0,10,"CountryCode",1,0);
	$pdf->Cell(10,10,"Rate",1,0);
	$pdf->Cell(20,10,"Quanlity",1,0);
	$pdf->Cell(30,10,"Price",1,0);
	$pdf->Output();
	ob_end_flush(); 
	/*echo "CountryCode =".$_POST['CountryCode'][0]."<br>";
	echo "Rate=".$_POST['Rate'][0]."<br>";
	echo "ID=".$_POST['ID']."<br>";
	echo "name=".$_POST['name']."<br>";
	echo "lastname=".$_POST['lastname']."<br>";
	echo "Quanlity=".$_POST['Quanlity']."<br>";
	echo "sum=".$_POST['sum'][0]."<br>";
	echo "sumall=".$_POST['sumall']."<br>";*/


?> 

</body>
</html>