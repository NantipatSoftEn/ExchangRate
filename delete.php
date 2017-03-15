<!DOCTYPE html>
<html>
<head>
	
	<?php include_once('header.php') ?>
     <?php include_once('menu.php') ?>
</head>
<body>
  <?php



  $con=mysqli_connect("localhost","root","","database");
  /*if($con!=null)
  echo"Sucess";*/

  $result=mysqli_query($con,'DELETE  FROM  employee WHERE IDEmployee="'.$_POST['id'].'"');

  /*if(!$result)
  die("connot");
  else*/

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
