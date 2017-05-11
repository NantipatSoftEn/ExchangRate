<?php include "dbConfig.php";
session_start();
date_default_timezone_set("asia/bangkok");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST["name"];
	$password = $_POST["password"];
	if ($name == '' || $password == '') {
		$msg = "You must enter all fields";
	} else {

		$sql = "SELECT * FROM member WHERE Username = '$name' AND    Password = '$password' " ;
		$query = mysql_query($sql);

		if ($query === false) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}
        // 0 =Admin, 1=employee
		if($row=mysql_fetch_array($query))
		{    
			$_SESSION['username']=$name;
			$_SESSION['password']=$password;
			session_write_close();
			if($row[2] == 0)
			{

				date('Y-m-d H:i:s');
				header('Location: menu.php');
				exit;
			}
			else
			{

				$sql = "UPDATE member SET Logindate='".date('Y-m-d H:i:s')."' WHERE Username = '$name' AND   Password = '$password' AND Access=1  " ;
				$query = mysql_query($sql);
				if ($query === false) {
					echo "Could not successfully run query ($sql) from DB: " . mysql_error();
					exit;
				}
				header("location:menu2.php");
				exit;
			}

		}

		$msg = "Username and password do not match";
	}
}

?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  
<script type="text/javascript">  
	$(function(){  

		var nowDateTime=new Date("<?=date("m/d/Y H:i:s")?>");  
		var d=nowDateTime.getTime();  
		var mkHour,mkMinute,mkSecond;  
		setInterval(function(){  
			d=parseInt(d)+1000;  
			var nowDateTime=new Date(d);  
			mkHour=new String(nowDateTime.getHours());    
			if(mkHour.length==1){    
				mkHour="0"+mkHour;    
			}  
			mkMinute=new String(nowDateTime.getMinutes());    
			if(mkMinute.length==1){    
				mkMinute="0"+mkMinute;    
			}          
			mkSecond=new String(nowDateTime.getSeconds());    
			if(mkSecond.length==1){    
				mkSecond="0"+mkSecond;    
			}     
			var runDateTime="<p class='title'>Time :"+mkHour+":"+mkMinute+":"+mkSecond+"</p>";          
			$("#css_time_run").html(runDateTime);      
		},1000);  


	});  
</script>  
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include_once('header.php') ?>
	<link rel="stylesheet" href="css/form.css">
</head>
<body>
	<div class="tile">
		<div class="tile is-parent is-vertical">
			<article class="tile is-child notification is-primary">
				<p class="title"><a href = "ifream.html">CHEAK RATE MONEY CLICK</a></p>
				
				<?php
				echo "<center>";
				echo "<table class='table'>";
				echo "<tr>";
				date_default_timezone_set("asia/bangkok");
                       // echo "<td>Date:".date('Y-m-d')."&nbsp &nbspTime:".date('h:i:sa')."</td>";

				echo "</tr>";
				echo "<tr>";
				echo "<td>";
				echo "<table>";
				$con=mysqli_connect("localhost","root","","database");
				$head=array("","CountryCode ","Currency ");
				echo "<tr>";
				for($i=0; $i<count($head) ; $i++)
					echo "<th>".$head[$i]."</th>";
				echo "</tr>";
				$result=mysqli_query($con,"SELECT * FROM money");
				$temp=0;
				$picture_Rate=array('USD50-100.png
					','USD5-20.png'
					,'USD5-20.png'
					,'GBP.png'
					,'EUR.png',
					'JPY.png',
					'HKD.png',
					'MYR.png',
					'SGD.png',
					'BHD.png',
					'CNY.png',
					'IDR.png',
					'INR.png',);
				$j=0;
				while($row=mysqli_fetch_array($result,MYSQLI_NUM))
				{

					echo "<tr>";
					echo "<td><img src =Rate/".$picture_Rate[$j]."></td>"; 
					for($i=1; $i< 3; $i++)
						echo '<td>'.$row[$i].'</td>';
					echo "</tr>";
					$j++;
				}
				echo "</table>";


				$result=mysqli_close($con);
				echo "</table>";    
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "</center>";

				?>
			</article>

		</div>
		<div class="tile is-parent">
			<article class="tile is-child notification is-info">
				<p class="title">บริษัท เพียวนา จำกัด</p>
				
				<div class="wrapper">
					<form class="form-signin" name="frmregister"action="<?= $_SERVER['PHP_SELF'] ?>" method="post">       
						<font color="red"> <?php echo $msg; ?></font>
						
						<input type="text" class="form-control" name="name" placeholder="username" id="name" required="" autofocus="" />
						<br>
						<input type="password" class="form-control" name="password"  id="password" placeholder="Password" required=""/>      
						<br>
						<button class="btn btn-lg btn-primary btn-block button is-success"  type="submit">Login</button>   
					</form>
				</div>
			</article>
		</div>
	</div>
	<div class="tile is-parent">
		<article class="tile is-child notification is-danger">
			

			<div class="content">


				<div id="css_time_run">  	
					<?= "".date("H:i:s").""?>  
				</div>  
				<?php  echo "<p class='title'> Data :".date("Y-m-d")." </p>"?>
			</div>
		</article>
	</div>
</body>
</html>