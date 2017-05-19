<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include_once('menu.php') ?>
	<?php include_once('header.php') ?>

</head>
<body>
	<div class="tile is-parent">
		<article class="tile is-child notification is-info">
			<p class="title"></p>
			<?php
			

			date_default_timezone_set("asia/bangkok");
			echo'<p align = "right"><font size = "2"> วันที่ออกรายงาน '.date('Y-m-d').' </font></p><br>';
			echo" <h1><U><center>บริษัท เพียวนา จำกัด</U></center></h1>";
			echo"<center>รายงานรายได้ประจำเดือน</center></br>";
			?>
			<form action="page.php" method="post" name="frmMain">
			<span class="select">
			<select name="lmName1" OnChange="window.location='?item='+this.value;">
			<?php 

			
			$m=array('January','February','March','April','May','June','July','August','September','October','November','December');
			$d=array('01','02','03','04','05','06','07','08','09','10','11','12');
			echo "<option> Select Month</option>";
			for ($i=0; $i < count($m) ; $i++) { 
				echo "<option value=$d[$i]>$m[$i]</option>";
			}
			echo '</select>';
			echo '</span>';
			echo '</form>';
			echo"<table class='table'>";
			$head = array("CountryCode", "Quantity","Price","Date");
			echo "<tr>";
			for ($i = 0; $i < count($head); $i++)
				echo "<td>" . $head[$i] . "</td>";
			echo "</tr>";
			$con = mysqli_connect("localhost", "root", "", "database");
			$result = mysqli_query($con, "SELECT Money FROM money");
			$Money=array();
			
			while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
			{
				$Money[]=$row[0];
			}

			$con=mysqli_connect("localhost","root","","database2");
			$result=mysqli_query($con,"SELECT CountryCode,Quanlity,date FROM data where MONTH(Date)=' ".date($_GET["item"])." '");
			$Rate_compare=array();
			echo '<form name="form3" method="post" action="report3.php">';
			$i=0;
			while($row=mysqli_fetch_array($result,MYSQLI_NUM))
			{

				$Rate_compare[$i]=array($row[0],$row[1],$row[2]);
				$i++;
			}

			$sum_mouth=0;
			$Price=0;
			$CountryCode=array('USD-50-100',
				'USD-5-20',
				'USD-1-2',
				'GBP',
				'EUR',
				'JPY',
				'HKD',
				'MYR',
				'SGD',
				'BND',
				'CNY',
				'IDR',	
				'INR',);
			for ($i=0; $i < count($Rate_compare); $i++) { 
				echo "<tr>";

				echo "<td>".$Rate_compare[$i][0]."</td>";
				echo "<td>".$Rate_compare[$i][1]."</td>";

				if($Rate_compare[$i][0] == 'USD-50-100')
				{
					$Price=$Rate_compare[$i][1]*$Money[0];
				}
				else if($Rate_compare[$i][0] == 'USD-5-20')
				{
					$Price=$Rate_compare[$i][1]*$Money[1];
				}
				else if($Rate_compare[$i][0] == 'USD-1-2')
				{
					$Price=$Rate_compare[$i][1]*$Money[2];
				}
				else if($Rate_compare[$i][0] == 'GBP')
				{
					$Price=$Rate_compare[$i][1]*$Money[3];
				}
				else if($Rate_compare[$i][0] == 'EUR')
				{
					$Price=$Rate_compare[$i][1]*$Money[4];
				}
				else if($Rate_compare[$i][0] == 'JPY')
				{
					$Price=$Rate_compare[$i][1]*$Money[5];
				}
				else if($Rate_compare[$i][0] == 'HKD')
				{
					$Price=$Rate_compare[$i][1]*$Money[6];
				}
				else if($Rate_compare[$i][0] == 'MYR')
				{
					$Price=$Rate_compare[$i][1]*$Money[7];
				}
				else if($Rate_compare[$i][0] == 'SGD')
				{
					$Price=$Rate_compare[$i][1]*$Money[8];
				}
				else if($Rate_compare[$i][0] == 'BND')
				{
					$Price=$Rate_compare[$i][1]*$Money[9];
				}
				else if($Rate_compare[$i][0] == 'CNY')
				{
					$Price=$Rate_compare[$i][1]*$Money[10];
				}
				else if($Rate_compare[$i][0] == 'IDR')
				{
					$Price=$Rate_compare[$i][1]*$Money[11];
				}
				else if($Rate_compare[$i][0] == 'INR')
				{
					$Price=$Rate_compare[$i][1]*$Money[12];
				}

				echo "<td>".$Price."</td>";
				echo "<td>".$Rate_compare[$i][2]."</td>";
				echo "</tr>";

				echo '<input type="hidden" name="CountryCode[]" value='.$Rate_compare[$i][0].'>';
				$sum_mouth+=$Price;


				echo '<input type="hidden" name="Quanlity[]" value='.$Rate_compare[$i][1].'>';
				echo '<input type="hidden" name="Price[]" value='.$Price.'>';
				echo '<input type="hidden" name="date[]" value='.$Rate_compare[$i][2].'>';


			}
			echo "<td>Total :".$sum_mouth." Bath</td>";
			echo '<input type="hidden" name="size" value='.count($Rate_compare).'>';
			echo '<input type="hidden" name="summouth" value='.$sum_mouth.'>';
			echo "</table>";


			?>
		</div>
		<center><input type='submit' class="button is-success" value='PrintReport' >
			<a class='button is-danger'  onClick='window.history.back();''>Back</a></center>
		</div>
	</form>

</article>
</div>
</body>
</html>