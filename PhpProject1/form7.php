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
                echo'<p align = "right"><font size = "2"> วันที่ออกรายงาน '.date('Y-m-d').' </font></p><br>';
                echo" <h1><U><center>บริษัท เพียวนา จำกัด</U></center></h1>";
                echo"<center>รายได้ประจำปี</center></br>";
                echo "รายได้ประจำปีที่ :" . date('Y') . "</br></br>";
                echo"รายได้ทั้งหมด :  526343 บาท";
                $data = array(
                    'USD :',
                    'GBP :',
                    'EUR :',
                    'AUD :',
                    'CHF :',
                    'CAD :',
                    'SEK :',
                    'DKK :',
                    'NOK :',
                    'SGD :',
                    'JPY :',
                    'KRW :',
                    'MYR :',
                    'HKD :',
                    'CNY/RMB:',
                    'TW/NT :',
                    'ZAR :',
                    'RUB :',
                    'UAE :',
                    'INR :',
                    'PHP :',
                    'BND :',
                    'OMR :',
                    'QAR :',
                    'HBD :',
                    'KWD :',
                    'VND :',
                    'IDR :'
                    );
                echo "<table class='table'>";
                for ($i = 0; $i < count($data); $i++) {
                    echo "<tr>";
                    echo"<td>".$data[$i]."</td>";
                    if($i==1)
                        echo"<td>44200</td>";
                    if($i==7)
                        echo"<td>9888</td>";
                    if($i==8)
                        echo"<td>55555</td>";
                    if($i==15)
                        echo"<td>338900</td>";
                    if($i==20)
                        echo"<td>77800</td>";
                    echo "</tr>";
                }
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