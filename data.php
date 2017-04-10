<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include_once('menu2.php') ?>
    <?php include_once('header.php') ?>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;
        }
    </script> 
</head>
<body>

    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
            <center><h1><b>รายงานสรุป</b></h1></center>
            <?php
            $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
            $objDB = mysql_select_db("upload2");
            $strSQL = "SELECT FilesName FROM files2  WHERE IDEmployee= '".$_POST['ID']."' ";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            ?>
            <?php
            while($objResult = mysql_fetch_array($objQuery))
            {
                ?>

                <center><img src="images_upload2/<?php echo $objResult["FilesName"] ;?>" width='128' height="128"></center></br>


                <?php
            }
            ?>
            <?php
            mysql_close($objConnect);
            ob_start();
            ?>  
            <?Php
        /*$content = ob_get_clean();
        require_once'/mpdf1/mpdf.php';
        $pdf = new mPDF('th', 'A4', '0', ' ');
        $pdf->SetDisplayMode('fullpage');
        $pdf->writeHTML($content);*/
        ?>
        <!--<div id='report'>-->
        <form name="form1" method="post" action="data2.php">';
           <?php
         //echo"<h1><b>รายงานสรุป</b></h1>";

           echo"ID  :" . $_POST['ID'] . "</br>";
           echo"คุณ  : " . $_POST['ID2'] . " " . $_POST['ID3'] . "</br>Date:".date('Y-m-d')."&nbsp &nbspTime:".date('h:i:sa')."</br>";

         echo '<input type="hidden" name="ID" value='.$_POST['ID'] .'>';
         echo '<input type="hidden" name="name" value='.$_POST['ID2'] .'>';
         echo '<input type="hidden" name="lastname" value='.$_POST['ID3'] .'>';

           echo"ได้ทำการแลกเปลื่อนเงินดังนี้";
           $head = array("CountryCode", "Rate ", "Quanlity", "Price(บาท)");
           date_default_timezone_set("asia/bangkok");
           echo"<table class='table'>";

           for ($i = 0; $i < count($head); $i++)
               echo "<td>" . $head[$i] . "</td>";
           echo "</tr>";
           $con = mysqli_connect("localhost", "root", "", "database");
           $result = mysqli_query($con, "SELECT * FROM money");
           $temp = 0;
           $sum;
           $sumall=0;
           $cheakm;
           while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
               $cheakm[]=$row[1];

               if( $_POST['txtVol2'][$temp] > 0)
               {
                   for ($i = 1; $i <= 2; $i++)
                    echo '<td>' . $row[$i] . '</td> ';

                
                 echo '<input type="hidden" name="CountryCode[]" value='.$row[1] .'>';
                 echo '<input type="hidden" name="Rate[]" value='.$row[0] .'>';
                echo"<td>" . $_POST['txtVol2'][$temp] . "</td>";
                echo '<input type="hidden" name="Quanlity" value='.$_POST['txtVol2'][$temp] .'>';
                $sum = $row[2] * $_POST['txtVol2'][$temp];
                echo"<td>" . $sum . "</td>";
                 echo '<input type="hidden" name="sum[]" value='.$sum.'>';
                $sumall = $sumall + $sum;
            }
            $temp++;
            echo "</tr>";

        }




        echo"</table>";
        $con = mysqli_connect("localhost", "root", "", "database2");
        for ($i = 0; $i< count( $cheakm); $i++) 
        {
            if($_POST['txtVol2'][$i]>0)
            {
             $result=mysqli_query($con,'INSERT INTO data VALUES
                ("'. $_POST['ID'].'"
                ,"'.date('Y-m-d').'"
                ,"'.$cheakm[$i].'"
                ,"'.$_POST['txtVol2'][$i].'");');
         }


     }
     echo" <center><br>ยอดรวมแลกเปลื่อน (บาท):" . $sumall."</center></br>";
     echo '<input type="hidden" name="sumall" value='.$sumall.'>';
     ?>
    



    </div>
    <center><input type='button' class="button is-success" value='PrintReport' onclick='printDiv("report")'>
       <a class='button is-danger'  onClick='window.location="FORM.php"'>Back</a>
       <input type='submit' class="button is-success" value='PrintReport' ></center>
 </form>

   </article>
</div>
</body>
</html>