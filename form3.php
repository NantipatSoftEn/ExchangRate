<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include_once('menu.php') ?>
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
            <p class="title"></p>
            <?php
            ob_start();
            ?>
            <?Php
            $content = ob_get_clean();
            require_once '/mpdf1/mpdf.php';
            $pdf = new mPDF('P', 'A4', 'fr', 'UTF');
            $pdf->writeHTML($content);
            ?> 
            <div id="report">
                
                <?php
                date_default_timezone_set("asia/bangkok");
                echo'<p align = "right"><font size = "2"> วันที่ออกรายงาน ' . date('Y-m-d') . ' </font></p><br>';
                echo" <h1><U><center>บริษัท เพียวนา จำกัด</U></center></h1>";
                echo" <h3><center>5 อันดับสกุลเงินที่ขายได้น้อยที่สุดประจำวัน</center></h3>";
                echo "รายได้ประจำวันที่ :" . date('Y-m-d') . "</br></br>";
                echo "<table class='table'>";
                echo "<tr><th>1</th>  <td>USD</td>  <td>10</td>";
                echo "<tr><th>2</th>  <td> GBP </td>  <td> 878</td>";
                echo "<tr><th>3</th>  <td>SEK</td>   <td>1220</td>";
                echo "<tr><th>4</th>  <td> CAD</td>  <td> 1340</td>";
                echo "<tr><th>5</th>  <td> NOK </td>  <td> 2000</td>";
                echo "</table>";
                ?>
            </div>
            <center><input type='button' class="button is-success" value='PrintReport' onclick='printDiv("report")'>
                <a class='button is-danger'  onClick='window.history.back();''>Back</a></center>
            </div>

        </article>
    </div>
</body>
</html>