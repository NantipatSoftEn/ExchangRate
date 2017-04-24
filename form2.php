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
			echo"<center>รายได้ประจำวัน</center></br>";
			echo "รายได้ประจำวันที่ :" . date('Y-m-d') . "</br></br>";


			echo"<table class='table'>";

			$head = array("CountryCode", "Currency");
			echo "<tr>";
			for ($i = 0; $i < count($head); $i++)
				echo "<td>" . $head[$i] . "</td>";
			echo "</tr>";
			$con=mysqli_connect("localhost","root","","database");
			$result=mysqli_query($con,"SELECT * FROM money");
			$Rate_compare=array();
			while($row=mysqli_fetch_array($result,MYSQLI_NUM))
				$Rate_compare[$row[1]]=$row[2];

			$order = range(1,count($Rate_compare));
			array_multisort($Rate_compare, SORT_DESC, $order, SORT_DESC);
			$i=6;
			echo '<form name="form2" method="post" action="report2.php">';
			foreach ($Rate_compare as $key => $value) 
			{
				echo "<tr>";
				echo "<td>".$key."</td>";
				echo "<td>".$value."</td>";
				echo "</tr>";
				echo '<input type="hidden" name="CountryCode[]" value='.$key .'>';
				echo '<input type="hidden" name="Currency[]" value='.$value .'>';
				$i--;
				if($i==0)
					break;
			}
			echo "</table>";


			?>



			<center>
				<input type='submit' class="button is-success" value='PrintReport' >
				<a class='button is-danger'  onClick='window.history.back();''>Back</a></center>
			</div>
		</form>
	</article>
</div>
</body>
</html>