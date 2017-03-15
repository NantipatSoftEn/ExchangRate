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
    echo" <h3><center>5  อันดับผู้แลกสกุลเงินบ่อยที่สุดประจำปี</center></h3>";
    echo "ประจำเดือน :".date('Y')."
        </br></br>1.ชื่อ-สกุล : Corey Taylor   สัญชาติ  สหรัฐอเมริกา</br>
        ที่อยู่:มลรัฐไอโอว่า</br>
        จำนวนเงินที่แลกทั้งหมด: 848646 บาท</br>
1 CAD : 424323 บาท</br>
2 USD : 212161 บาท</br>
3 TU :  106080 บาท</br>  

</br></br2.>2.ชื่อ-สกุล : Sid Wilson  สัญชาติ  สหรัฐอเมริกา</br>
        ที่อยู่:มลรัฐไอโอว่า</br>
        จำนวนเงินที่แลกทั้งหมด: 80000 บาท</br>
1 CAD : 40000 บาท</br>
2 USD : 20000 บาท</br>
3 TU :  10000 บาท</br>  

</br></br>3.ชื่อ-สกุล : Joey Jordison   สัญชาติ  สหรัฐอเมริกา</br>
        ที่อยู่:มลรัฐไอโอว่า</br>
        จำนวนเงินที่แลกทั้งหมด: 100000 บาท</br>
1 CAD : 50000 บาท</br>
2 USD : 25000 บาท</br>
3 TU :  12500 บาท</br>  

</br></br>4.ชื่อ-สกุล : Corey Taylor   สัญชาติ  สหรัฐอเมริกา</br>
        ที่อยู่:มลรัฐไอโอว่า</br>
        จำนวนเงินที่แลกทั้งหมด: 848646 บาท</br>
1 CAD : 424323 บาท</br>
2 USD : 212161 บาท</br>
3 TU :  106080 บาท</br>  

</br></br>5.ชื่อ-สกุล : CPaul Gray   สัญชาติ  สหรัฐอเมริกา</br>
        ที่อยู่:มลรัฐไอโอว่า</br>
        จำนวนเงินที่แลกทั้งหมด: 848646 บาท</br>
จำนวนเงินที่แลกทั้งหมด:...บาท</br>
1 CAD : 424323 บาท</br>
2 USD : 212161 บาท</br>
3 TU :  106080 บาท</br>  ";
    
    ?>
</div>
 <center><input type='button' value='PrintReport' onclick='printDiv("report")'></center>