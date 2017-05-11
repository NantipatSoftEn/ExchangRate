
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
			echo"<center>รายงานสกุลเงินที่ขายดีที่สุดประจำวัน</center></br>";
			echo "รายได้ประจำวันที่ :" . date('Y-m-d') . "</br></br>";


			echo"<table class='table'>";

			$head = array("CountryCode", "Total Price");
			echo "<tr>";

			for ($i = 0; $i < count($head); $i++)
				echo "<td>" . $head[$i] . "</td>";

			echo "</tr>";
			$CountryCode=array();
			$Money=array();
			$con = mysqli_connect("localhost", "root", "", "database");
			$result = mysqli_query($con, "SELECT CountryCode,Money FROM money");
			while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
			{
				$CountryCode[]=$row[0];
				$Money[]=$row[1];

			}


			$con = mysqli_connect("localhost", "root", "", "database2");
			$result = mysqli_query($con, "SELECT date,CountryCode,Quanlity FROM data where date=' ".date('Y-m-d')." '");
			$Quanlity=array(0,0,0,0,0,0,0,0,0,0,0,0,0);
			$Rate_compare=array('','','','','','','','','','','','','');
			while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
			{

				if ($row[1]=="USD-50-100")
				{
					$Quanlity[0]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[0];
				}	

				else if ($row[1]=="USD-5-20")
				{
					$Quanlity[1]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[1];
				}

				else if ($row[1]=="USD-1-2")
				{
					$Quanlity[2]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[2];
				}

				else if ($row[1]=="GBP")
				{
					$Quanlity[3]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[3];
				}

				else if ($row[1]=="EUR")
				{
					$Quanlity[4]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[4];
				}

				else if ($row[1]=="JPY")
				{
					$Quanlity[5]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[5];
				}

				else if ($row[1]=="HKD")
				{
					$Quanlity[6]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[6];
				}

				else if ($row[1]=="MYR")
				{
					$Quanlity[7]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[7];
				}

				else if ($row[1]==" SGD")
				{
					$Quanlity[8]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[8];
				}

				else if ($row[1]=="BND")
				{
					$Quanlity[9]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[9];
				}

				else if ($row[1]=="CNY")
				{
					$Quanlity[10]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[10];
				}

				else if ($row[1]=="IDR")
				{
					$Quanlity[11]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[11];
				}

				else if ($row[1]=="INR")
				{
					$Quanlity[12]+=$row[2];
					$Rate_compare[$row[1]]=$Quanlity[12];
				}

			}
			$counts=0;
			echo $Rate_compare["USD-50-100"]."</br>";
			echo $Rate_compare["USD-50-100"]."</br>";
			echo $Rate_compare["USD-50-100"]."</br>";
			echo $Rate_compare["USD-50-100"]."</br>";
			echo $Rate_compare["USD-50-100"]."</br>";
			echo $Rate_compare["USD-50-100"]."</br>";
			

			$order = range(1,count($Rate_compare));
			$i=6;
			array_multisort($Rate_compare, SORT_DESC, $order, SORT_DESC);
			echo '<form name="form1" method="post" action="report2.php">';
			foreach ($Rate_compare as $key => $value) 
			{
				if ($value  > 0) {

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
			}
			echo '<input type="hidden" name="counts" value='.$counts .'>';

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