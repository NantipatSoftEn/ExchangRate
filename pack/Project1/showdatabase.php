<!DOCTYPE html>
<META HTTP-EQUIV='Refresh' CONTENT = '3;URL=showdatabase.php'>
<html>
<head>
  <title></title>
  <?php include_once('header.php') ?>
  <script language="JavaScript">
    function confirmDelete(){return confirm('Are you sure you want to delete this?');}
    function confirmEdit(){return confirm('Are you sure you want to Edit this?');}
  </script>
</head>
<body>
  <?php
  
  $con=mysqli_connect("localhost","root","","database");
  /*if($con!=null)
  echo"Sucess";*/
  $result=mysqli_query($con,"SELECT * FROM employee");
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
  echo'<table class="table">';
  echo '<thead>';
  echo '<tr>';
  for ($i=0; $i < count($data); $i++)
    echo '<th>'.$data[$i].'</th>';
  echo '<tr/>';      
  echo '</thead>';
  while($row=mysqli_fetch_array($result,MYSQLI_NUM))
  {

    echo '<form name="frmDelete'.$row[0].'" method="post" action="delete.php">'."\n";
    echo'<tr>';
    for($i=0; $i<14; $i++)
      echo '<td>'.$row[$i].'</td>';
    
    
    echo '<input type="hidden" name="id" value="'.$row[0].'">';
    echo '<td><input type="submit"  class="button is-danger" value="Delete" onClick=" confirmDelete();" ></td>';
    echo'</form>';
    
    echo '<form name="frmEdit'.$row[0].'" method="post" action="edit.php">'."\n";
    echo '<input type="hidden"  name="id" value="'.$row[0].'">';
    echo '<td><input type="submit"  class="button is-warning"value="Edit" onClick="return confirmEdit();" ></td>';
    echo'</form>';
    $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
    $objDB = mysql_select_db("upload");
    $strSQL = "SELECT FilesName FROM files   WHERE FilesID=".$row[0]."";
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    while($objResult = mysql_fetch_array($objQuery))
    {
      ?>
      <td><center><img src="images_upload/<?php echo $objResult["FilesName"] ;?>" width='128' height='128'></center></br></td>
      <?php
    }
    echo'<tr/>';
    
    
  }
  
  $result=mysqli_close($con);

  ?>
</body>
</html>