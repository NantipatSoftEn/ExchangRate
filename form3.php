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
			function DateThai($strDate)
			{
				$m = null;
				if($strDate =='01')
					$m = "January";
				else if($strDate =='02')
					$m = "February";
				else if($strDate =='03')
					$m = "March";
				else if($strDate =='04')
					$m = "April";
				else if($strDate =='05')
					$m = "May";
				else if($strDate =='06')
					$m = "June";
				else if($strDate =='07')
					$m = "July";
				else if($strDate =='08')
					$m = "August";
				else if($strDate =='09')
					$m = "September";
				else if($strDate =='10')
					$m = "October";
				else if($strDate =='11')
					$m = "November";
				else if($strDate =='12')
					$m = "December";
				return $m;
			}

			date_default_timezone_set("asia/bangkok");
			echo'<p align = "right"><font size = "2"> วันที่ออกรายงาน '.date('Y-m-d').' </font></p><br>';
			echo" <h1><U><center>บริษัท เพียวนา จำกัด</U></center></h1>";
			echo"<center>-รายงานรายได้ประจำเดือน</center></br>";
			echo "รายได้ประจำเดือนที่:	" . DateThai(date('m')) . "</br></br>";
			echo"<table class='table'>";
			$head = array("CountryCode", "Quantity","Price","Date");
			echo "<tr>";
			for ($i = 0; $i < count($head); $i++)
				echo "<td>" . $head[$i] . "</td>";
			echo "</tr>";
			$con = mysqli_connect("localhost", "root", "", "database");
			$result = mysqli_query($con, "SELECT CountryCode,Money FROM money");
			$Money=array();
			$CountryCode=array();
			while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
			{
				$CountryCode[]=$row[0];
				$Money[]=$row[1];
			}

			$con=mysqli_connect("localhost","root","","database2");
			$result=mysqli_query($con,"SELECT CountryCode,Quanlity,date FROM data where MONTH(Date)=' ".date('m')." '");
			$Rate_compare=array('','','','','','','','','','','','','');
			echo '<form name="form3" method="post" action="report3.php">';

			while($row=mysqli_fetch_array($result,MYSQLI_NUM))
			{
	
			
				$Rate_compare[$row[0]]=array($row[1],$row[2]);
			}
				
			$sum_mouth=0;

			for ($i=0; $i < count($CountryCode); $i++) { 
				echo "<tr>";
				echo $CountryCode[$i]."</br>";
				echo "<td>".$CountryCode[$i]."</td>";
				echo "<td>".$Rate_compare[$CountryCode[$i]][0]."</td>";
				echo "<td>".$Rate_compare[$CountryCode[$i]][0]*$Money[$i]."</td>";
				echo "<td>".$Rate_compare[$CountryCode[$i]][1]."</td>";
				echo "</tr>";

				echo '<input type="hidden" name="CountryCode[]" value='.$CountryCode[$i].'>';
				$sum_mouth+=$Rate_compare[$CountryCode[$i]][0]*$Money[$i];

				
				echo '<input type="hidden" name="Quanlity[]" value='.$Rate_compare[$CountryCode[$i]][0]*$Money[$i] .'>';
				echo '<input type="hidden" name="Price[]" value='.$Rate_compare[$CountryCode[$i]][0]*$Money[$i].'>';
				echo '<input type="hidden" name="date[]" value='.$Rate_compare[$CountryCode[$i]][1].'>';
				

			}
			echo "<td>Total :".$sum_mouth." Bath</td>";
			echo '<input type="hidden" name="size" value='.count($CountryCode).'>';
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