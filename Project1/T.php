<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include_once('header.php') ?>
</head>
<body>
	<?php
	$con=mysqli_connect("localhost","root","","database");
	for($k=0 ;$k < count($_POST['id']) ; $k++)
	{
		if(trim($_POST['data'][$k]) !="" && trim($_POST['data'][$k]) !="")
		{
			$result=mysqli_query($con,"UPDATE money   SET Money='".$_POST['data'][$k]."'  WHERE IDCountry=".$_POST['id'][$k]."   ");
            /*if(!$result)
              die("connotfuckyouuu");
              else */      
          }
  }
  $result=mysqli_close($con);
  ?>
  <div class="tile is-parent">
  	<article class="tile is-child notification is-success">
  		<div class="content">
  			<p class="subtitle"><h1><center>Update Sucess</center></h1></p>
  			<center><a class="button is-warning" onClick='window.history.back()'>Back</a></center>
  		</div>

  	</article>
  </div>


</body>
</html>