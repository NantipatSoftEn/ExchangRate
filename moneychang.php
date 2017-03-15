<script language="JavaScript">
	function confirmT(){return confirm('You need Update ?');}
	
</script>
<?php include_once('menu.php') ?>
<?php include_once('header.php') ?>

<?php

$NUMBER_CUR=13;   // number currency fix
$N;                                    
                                        //======getRateSell===========
function getRateSell($bank_name){
	global $NUMBER_CUR,$N;
	$postdata = http_build_query(
		array(
			'bank' => $bank_name
			)
		);

	$opts = array(
		'http'=>array(
			'method'=>"POST",
			'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
			"Content-Length: ".strlen($postdata)."\r\n".
			"User-Agent:MyAgent/1.0\r\n",
			'content' => $postdata
			)
		);

	$context = stream_context_create($opts);

    // Open the file using the HTTP headers set above
	$file = file_get_contents("http://www.bahtcheck.com/get_rate.php", false, $context);
	$html_1=array();
	$N=$NUMBER_CUR+$NUMBER_CUR+5+2;
	for ($i=5; $i <$N; $i=$i+2) {
		$html_1[$i]= explode("</span>", $file)[$i];
	}
	$html_2=array();
	$y=0;
    //shit element 
	for ($i=5; $i <$N; $i=$i+2)
	{
		$html_2[$y]=$html_1[$i];
		$y++;
	}
   /*  cheak shit element 
    for ($i=0; $i <11; $i++) {
         echo  $html_2[$i];
     }*/
     return  $html_2;
 }

 $bank = array("PENTOR","BBL","SCB","KBANK","KTB","BAY","UOB","TCAP","TMB","BOT","SUPERTH","SIAMEX","SIA");


 $curren = array("USD 50-100","USD 5-20","USD 1-2","GBP","EUR","JPY","HKD","MYR","SGD","BND","CNY","IDR","INR","KRW","LAK","PHP","TWD","AUD","NZD","CHF","DKK","NOK","SEK","CAD","RUB","VND","ZAR","AED","BHD","OMR","QAR","SAR","SCP");
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<div class="tile is-parent">
 		<article class="tile is-child notification is-info">
 			<p class="title">Update Currency</p>

 			<table class="table">
 				<thead>
 					<tr>
 						<?php
 						date_default_timezone_set("asia/bangkok");
 						echo "<th>Date:".date('Y-m-d')."&nbsp &nbspTime:".date('h:i:sa')."</th>"; 
 						?>
 					</tr>
 					<?php 
 					$con=mysqli_connect("localhost","root","","database");
 					$head=array("CountryCode","CurrencyTMB","Currency","Rate");
 					echo "<tr>";
 					for($i=0; $i<count($head) ; $i++)
 						echo "<th>".$head[$i]."</th>";
 					echo "</tr>";
 					$result=mysqli_query($con,"SELECT * FROM money");
 					$temp=0;
 					$bank_8_Sell=array();
 					$bank_8_Sell=getRateSell($bank[8]);
 					$j=0;	
 					?>
 				</thead>
 				<tbody>
 					<tr>
 						<?php  while($row=mysqli_fetch_array($result,MYSQLI_NUM))
 						{
 							echo '<form name="frm'.$row[0].'" method="post" action="T.php">';
 							echo "<tr>";
 							for($i=1; $i< 2; $i++)
 							{
 								echo '<td>'.$row[$i].'</td>';
 							}
 							
 							echo  '<td>'.$bank_8_Sell[$j].'</td>' ;
 							$j++;

 							echo '<td>'.$row[2].'</td>';
 							echo '<input type="hidden" name="id[]" value="'.$row[0].'">';

 							echo '<td><input type="text" name="data[]"></td>';
 							
 							echo "</tr>";
 						}
 						$result=mysqli_close($con);
 						?>

 					</tr>
 				</tbody>
 			</table>

 			<center><button class="button is-primary" onClick='return confirmT()';>Submit</button>
 				<a class="button is-warning"  onClick='window.location="moneychang.php";'>Refresh</a>
 				<a class="button is-danger"  onClick="window.history.back();"'>Back</a></center>
 			</form>

 		</article>
 		
 	</div>

 </script>
</body>
</html>