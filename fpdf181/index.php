<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>	
	<?php
	ob_start();
	require('fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Hello World!');
	$pdf->Cell(50,10,"Name",1,0);
	$pdf->Output();
	ob_end_flush(); 
	?>
</body>
</html>