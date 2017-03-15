
<?php
echo "<center>";
	$data=array("ID","IDType","Type","Price");
	$data1=array("text1","text2","text3","text4");
	$con=mysqli_connect("localhost","root","","testorder");
	$result=mysqli_query($con,"SELECT * FROM  list WHERE ID=".$_POST['id']." ");
	while($row=mysqli_fetch_array($result,MYSQLI_NUM))
    {
        echo "<form name='form' method='post' action='e.php'>";
          for ($i=0; $i < 4 ; $i++)
          {
              if($i==0)
              {
                echo $data[$i]."<input type='text' value='".$row[$i]."' name='$data1[$i]' disabled><br><br>";
                echo '<input type="hidden" name="id" value="'.$row[0].'">';
              }
              else
                echo $data[$i]."<input type='text' value='".$row[$i]."' name='$data1[$i]'><br><br>";
        }
 
          echo"<input type='submit' name='submit' value='edit'>";
        echo "</form>";
    }
    echo "</center>";
?>