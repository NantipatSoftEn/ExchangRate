<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include_once('header.php') ?>
</head>
<body>
    <?php session_start();
    //echo $_SESSION['username'];
    if($_SESSION['username'] == "")
    {
        echo "<font size='7' ><center>Please Login!</center></font>";
        exit();
    }
    ?>
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
            <p class="title">Service</p>
            <?php
            if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"images_upload2/".$_FILES["filUpload"]["name"]))
            {

                $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
                $objDB = mysql_select_db("upload2");
                $strSQL = "INSERT INTO files2 ";
                $strSQL .="(Name,FilesName,IDEmployee) VALUES ('".$_POST["txtName"]."','".$_FILES["filUpload"]["name"]."','".$_POST["text1"]."')";
                $objQuery = mysql_query($strSQL);       
            }
            $IDEmployee=$_POST['text1'];
            $Name=$_POST['selectTitel'].$_POST['text2'];    
            $LastName=$_POST['text3'];

            $Address=$_POST['text4'];
            $Telephone=$_POST['text5'];

            $Birthdate=date('Y-m-d', strtotime($_POST['date']));
            $Passport=$_POST['text6'];
            $Gender=$_POST['selectGender'];


            $Blood=$_POST['selectblood'];
            $Email=$_POST['text8'];
            $con=mysqli_connect("localhost","root","","database2");
    /*if($con!=null)
        echo"Sucess";
    */
        $result=mysqli_query($con,'INSERT INTO employee VALUES
         ("'.$IDEmployee.'"
         ,"'.$Name.'"
         ,"'.$LastName.'"

         ,"'.$Address.'"
         ,"'.$Telephone.'"

         ,"'.$Birthdate.'"
         ,"'.$Passport.'"
         ,"'.$Gender.'"

         ,"'.$Blood.'"
         ,"'.$Email.'");');
        $result=mysqli_query($con,"SELECT * FROM employee");
        if(!$result)
        {
            die("connot");
        }
        else
            echo"<center>";
    //echo"<h1>Insert Sucess</h1>";
    //$result=mysqli_close($con);
    //echo"<br/><input  type='button'  onClick='window.history.back()' value='Back'>";
        echo"</center>";



        ?>
        <script language="JavaScript">
            function confirmT(){return confirm('Save ?');}

        </script>
        <SCRIPT language=JavaScript>
            function check_number() {
               e_k=event.keyCode
         //if (((e_k < 48) || (e_k > 57)) && e_k != 46 ) {
           if (e_k != 13 && (e_k < 48) || (e_k > 57)) {
              event.returnValue = false;
              alert("ต้องเป็นตัวเลขเท่านั้น... \nกรุณาตรวจสอบข้อมูลของท่านอีกครั้ง...");
          }
      }
      
      function fncCal()
      {
        var tot = 0;
        var sum = 0;
        
        
        for(i=0;i<=document.form1.hdnLine.value;i++)
        {

            tot = parseInt(eval("document.form1.txtVol1_"+i+".value")) * parseInt(eval("document.form1.txtVol2_"+i+".value"))
            eval("document.form1.txtVol3_"+i+".value="+tot);
            sum = tot + sum;
            document.form1.txtSum.value=sum;
            
            
            
        }
        
        
    }

</script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("upload2");
$strSQL = "SELECT FilesName FROM files2  WHERE IDEmployee= '".$IDEmployee."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
    ?>
    <center><img src="images_upload2/<?php echo $objResult["FilesName"] ;?>" width='128' height='128'></center></br>

    <?php
}
?>

<?php
mysql_close($objConnect);
?>
<?php

        echo "<table class='table'>";
                                $con=mysqli_connect("localhost","root","","database2");
                                echo"<tr>";
                                    echo"<th>ID  :".$_POST['text1']." ";
                                    echo"คุณ : ".$_POST['text2']." ".$_POST['text3']."</th>";
                                echo"</tr>";
                echo "<tr>";
                date_default_timezone_set("asia/bangkok");
                                                
                        echo "<th>Date:".date('Y-m-d')."&nbsp &nbspTime:".date('h:i:sa')."</th>";
                        
                echo "</tr>";
                echo "<tr>";
                    echo "<td>";
                    echo "<table>";
                    echo "<table class='table'>";
                    $head=array("CountryCode","Rate","Quanlity","Price(บาท)");
                    echo " <thead>";
                    echo "<tr>";
                    for($i=0; $i<count($head) ; $i++)
                        echo "<th>".$head[$i]."</th>";
                    echo "</tr>";
                    echo " </thead>";
                    $result=mysqli_query($con,"SELECT * FROM money");
                    $temp=0;
                    echo '<form name="form1" method="post" action="data.php">';
                    while($row=mysqli_fetch_array($result,MYSQLI_NUM))
                    {

                        echo "<tr>";
                        for($i=1; $i< 3; $i++)
                            echo '<td>'.$row[$i].'</td> ';
                                                                                //send CountryCode
                        echo' <input name="txt[]" type="hidden" value='.$row[1].'> ';
                                                                                //rate Quanlity  Price
                        echo' <input name="txtVol1[]" id="txtVol1_'.$temp.'" type="hidden" value='.$row[2].'> '
                        . '<td><input name="txtVol2[]" id="txtVol2_'.$temp.'" type="text" value=0  onkeypress="check_number();" > </td> '
                        . '<td><input name="txtVol3[]" id="txtVol3_'.$temp.'" type="text" disabled></td>';



                        echo "</tr>";
                        $temp++;
                    }

                    echo "</table>";
                    echo'<input type="hidden" name="hdnLine" value='.$temp.'>';

                    echo'ยอดรวมแลกเปลื่อน (บาท):<input name="txtSum" class="input is-success"  id="txtSim" type="text" disabled>';

                    echo'<center><input type="button" class="button is-warning" value="Calculater" onClick="fncCal();"></center>';




                    echo "<center>";
                    echo'<input name="ID" type="hidden" value='.$IDEmployee.' type="text" >';
                    echo'<input name="ID2" type="hidden" value='.$Name.' type="text" >';
                    echo'<input name="ID3" type="hidden" value='.$LastName.' type="text" >';


                    echo '<br/><br/><input type="Submit" class="button is-success" value="บันทึกข้อมูล" onClick="return confirmT();"> &nbsp;';
                    echo"<input  type='button'  class='button is-danger' onClick='window.history.back()' value='Back'>";
                    echo "</center>";
                    echo '</form>';

                    $result=mysqli_close($con);
                    echo "</table>";    
                    echo "</td>";
                    echo "</tr>";
                    echo "</table>";




                    ?>
                </article>
            </div>
        </body>
        </html>