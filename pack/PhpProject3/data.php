<!DOCTYPE html>
<html>
<head>
    <title></title>
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
        $content = ob_get_clean();
        require_once'/mpdf1/mpdf.php';
        $pdf = new mPDF('P', 'A4', 'fr', 'UTF');
        $pdf->writeHTML($content);
        ?>
        <div id='report'>
         <?php
         //echo"<h1><b>รายงานสรุป</b></h1>";
         echo"ID  :" . $_POST['ID'] . "</br>";
         echo"คุณ  : " . $_POST['ID2'] . " " . $_POST['ID3'] . "</br>Date:".date('Y-m-d')."&nbsp &nbspTime:".date('h:i:sa')."</br>";
         echo"ได้ทำการแลกเปลื่อนเงินดังนี้";
         $head = array("CountryCode", "Rate ", "Quanlity", "Price(บาท)");
         date_default_timezone_set("asia/bangkok");
         echo"<table class='table'>";

         for ($i = 0; $i < count($head); $i++)
         echo "<td>" . $head[$i] . "</td>";
         echo "</tr>";
         $con = mysqli_connect("localhost", "root", "", "database2");
         $result = mysqli_query($con, "SELECT * FROM money");
         $temp = 0;
         $sum;
         $sumall;
         $cheakm;
         while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
         $cheakm[]=$row[1];
         echo "<tr>";
         for ($i = 1; $i <= 2; $i++)
         echo '<td>' . $row[$i] . '</td> ';
         echo"<td>" . $_POST['txtVol2'][$temp] . "</td>";
         $sum = $row[2] * $_POST['txtVol2'][$temp];
         echo"<td>" . $sum . "</td>";
         $sumall = $sumall + $sum;

         $temp++;

         echo "</tr>";

     }




     echo"</table>";

     for ($i = 0; $i< count( $cheakm); $i++) {
     $result=mysqli_query($con,'INSERT INTO data VALUES
     ("'. $_POST['ID'].'"
     ,"'.date('Y-m-d').'"
     ,"'.$cheakm[$i].'"
     ,"'.$_POST['txtVol2'][$i].'");');

 }
 echo" <center><br>ยอดรวมแลกเปลื่อน (บาท):" . $sumall."</center></br>";

 ?>
 <center><input type='button' class="button is-success" value='PrintReport' onclick='printDiv("report")'>
 <a class='button is-danger'  onClick='window.location="FORM.php"'>Back</a></center>
 
</div>
</article>
</div>
</body>
</html>