<script language="JavaScript">
	function confirmDelete(){return confirm('Are you sure you want to delete this?');}
</script>
<?php
echo'<form name="frmSearch" method="get" action='.$_SERVER['SCRIPT_NAME'].'>';
  echo '<table width="599" border="1">';
    echo '<tr>';
      echo '<th>Keyword';
     echo' <input name="txtKeyword" type="text" id="txtKeyword"  value=>';
     
      echo'<input type="submit" value="Search"></th>';
    echo'</tr>';
  echo '</table>';
   echo'</form>';
    ?>
    <?php
	
	$con=mysqli_connect("localhost","root","","database");
	/*if($con!=null)
        echo"Sucess";*/
        if(isset($_GET["txtKeyword"]) ){
        
    $result=  mysqli_query($con,"SELECT * FROM employee WHERE  IDEmployee='".$_GET["txtKeyword"]."' "
            . "OR Name= '".$_GET["txtKeyword"]."' "
            . "OR LastName= '".$_GET["txtKeyword"]."'"
            . "OR Position= '".$_GET["txtKeyword"]."'"
            . "OR Telephone= '".$_GET["txtKeyword"]."' "
            . "OR Education= '".$_GET["txtKeyword"]."'"
            . "OR Passport= '".$_GET["txtKeyword"]."'"
            . "OR Email= '".$_GET["txtKeyword"]."'" );
	/*if(!$result)
        die("connot");*/

	$data=array("IDEmployee",
	"Name",
	"LastName",
	"Position",
	"Address",
	"Telephone",
	"Education",	
	"Birthdate",
	"Passport/ID",
	"Gender",
	"Status",
	"Access",
	"Blood",	
	"Email",
	"Delect",
	"Edit",
	"Picture");
    echo'<table border="1">';
    echo '<tr>';
		for ($i=0; $i < count($data); $i++)
			echo '<td>'.$data[$i].'</td>';
	echo '<tr/>';		   
	while($row=mysqli_fetch_array($result,MYSQLI_NUM))
	{
		
		echo '<form name="frmDelete'.$row[0].'" method="post" action="delete.php">'."\n";
		echo'<tr>';
		for($i=0; $i<14; $i++)
			echo '<td>'.$row[$i].'</td>';
		
		
		echo '<input type="hidden" name="id" value="'.$row[0].'">';
			echo '<td><input type="submit" value="Delete" onClick="return confirmDelete();" ></td>';
		echo'</form>';
		
		echo '<form name="frmEdit'.$row[0].'" method="post" action="edit.php">'."\n";
			echo '<input type="hidden" name="id" value="'.$row[0].'">';
			echo '<td><input type="submit" value="Edit" onClick="return confirmEdit();" ></td>';
		echo'</form>';
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("upload");
		$strSQL = "SELECT FilesName FROM files   WHERE FilesID=".$row[0]."";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		while($objResult = mysql_fetch_array($objQuery))
		{
			?>
			<td><center><img src="images/<?php echo $objResult["FilesName"] ;?>" width='128' height='128'></center></br></td>
			<?php
		}
		echo'<tr/>';
		
		
	}
	
	$result=mysqli_close($con);
        }
        else 
        {
             $result=mysqli_query($con,"SELECT * FROM employee WHERE  1   ");
	/*if(!$result)
        die("connot");*/
   
	$data=array("IDEmployee",
	"Name",
	"LastName",
	"Position",
	"Address",
	"Telephone",
	"Education",	
	"Birthdate",
	"Passport/ID",
	"Gender",
	"Status",
	"Access",
	"Blood",	
	"Email",
	"Delect",
	"Edit",
	"Picture");
    echo'<table border="1">';
    echo '<tr>';
		for ($i=0; $i < count($data); $i++)
			echo '<td>'.$data[$i].'</td>';
	echo '<tr/>';		   
	while($row=mysqli_fetch_array($result,MYSQLI_NUM))
	{
		
		echo '<form name="frmDelete'.$row[0].'" method="post" action="delete.php">'."\n";
		echo'<tr>';
		for($i=0; $i<14; $i++)
			echo '<td>'.$row[$i].'</td>';
		
		
		echo '<input type="hidden" name="id" value="'.$row[0].'">';
			echo '<td><input type="submit" value="Delete" onClick="return confirmDelete();" ></td>';
		echo'</form>';
		
		echo '<form name="frmEdit'.$row[0].'" method="post" action="edit.php">'."\n";
			echo '<input type="hidden" name="id" value="'.$row[0].'">';
			echo '<td><input type="submit" value="Edit" onClick="return confirmEdit();" ></td>';
		echo'</form>';
		$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
		$objDB = mysql_select_db("upload");
		$strSQL = "SELECT FilesName FROM files   WHERE FilesID=".$row[0]."";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		while($objResult = mysql_fetch_array($objQuery))
		{
			?>
			<td><center><img src="images/<?php echo $objResult["FilesName"] ;?>" width='128' height='128'></center></br></td>
			<?php
		}
		echo'<tr/>';
		
		
	}
	
	$result=mysqli_close($con);
        }
?>