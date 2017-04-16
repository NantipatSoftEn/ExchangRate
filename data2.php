<?php
require('fpdf181/fpdf.php');

class PDF extends FPDF
{
//Page header
  function Header()
  {

	//Arial bold 15
    $this->SetFont('Arial','B',15);

	//Title
      //$this->Cell(30,10,'REPORT','C');
    $this->Cell(40,20,"ID :  ".$_POST['ID']);
    $this->Ln();
    $this->Cell(40,10,"name :  ".$_POST['name']."   ".$_POST['lastname']);
    $this->Ln();
    $this->Cell(40,20,"Date:".date('Y-m-d')."   Time  ".date('h:i:sa'));   



    /*echo "CountryCode =".$_POST['CountryCode'][0]."<br>";


    echo "Rate=".$_POST['Rate'][0]."<br>";
    echo "ID=".$_POST['ID']."<br>";
    echo "name=".$_POST['name']."<br>";
    echo "lastname=".$_POST['lastname']."<br>";

    echo "Quanlity=".$_POST['Quanlity'][0]."<br>";
    echo "sum=".$_POST['sum'][0]."<br>";
    echo "sumall=".$_POST['sumall']."<br>";
    echo "count=".$_POST['counts']."<br>";*/



	//Line break
    $this->Ln(30);
  }

//Page footer
  function Footer()
  {
	//Position at 1.5 cm from bottom
    $this->SetY(-15);
	//Arial italic 8
    $this->SetFont('Arial','I',8);
	//Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }

  function FancyTable($header, $data)
  {
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');

    // Header
    $w = array(60, 35, 50, 45);
    for($i=0;$i<count($header);$i++)
      $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
      $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
      $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
      $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
      $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
      $this->Ln();
      $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
  }
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Times','',12);

//*** Insert Text ***//

$header = array('CountryCode ', 'Rate ', 'Quanlity ', 'Price(Bath)');

  $data=array(array());

  for($i=0;$i< $_POST['counts'];$i++)
  {
    for($j=0;$j<4;$j++)
    {
      if($j==0)
        $data[$i][$j]=$_POST['CountryCode'][$i];
      else if($j==1)
        $data[$i][$j]=$_POST['Rate'][$i];
      else if($j==2)
        $data[$i][$j]=$_POST['Quanlity'][$i];
      else if($j==3)
        $data[$i][$j]=$_POST['sum'][$i];

    }
  }


//***************************//

  $pdf->SetFont('Arial','',14);

  $pdf->AddPage();

  $pdf->FancyTable($header,$data);
  $pdf->Ln(10);
  $pdf->Cell(40,10,"Total exchange (Baht) :".$_POST['sumall']);
  $pdf->Output();

  ?>

