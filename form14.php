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
    echo" <h3><center>5  รายงานพนักงานประจำปี</center></h3>";
    echo "ประจำเดือน :".date('Y-m')."</br></br>";
    echo"1. ชื่อ สมปอง สกุล สยอง</br>
รหัสพนักงาน 0001</br>
ระยะเวลาทำงานทั้งหมด 1000 วัน </br>
ขาด 20 ครั้ง </br>
ลา  30 ครั้ง </br>
เข้างานสาย 50 ครั้ง </br>
</br></br>2. ชื่อ สมขาว สกุล ขาวมาก</br>
รหัสพนักงาน 0002</br>
ระยะเวลาทำงานทั้งหมด 500 วัน </br>
ขาด 0 ครั้ง </br>
ลา  0 ครั้ง </br>
เข้างานสาย 0 ครั้ง</br>
</br></br>3. ชื่อ สมมง สกุล มุงมิ้ง</br>
รหัสพนักงาน 0003</br>
ระยะเวลาทำงานทั้งหมดวัน 20</br>
ขาด 0 ครั้ง  </br>
ลา  0 ครั้ง</br>
เข้างานสาย  0ครั้ง</br>
</br></br>4. ชื่อ สมอาจ สกุล ขยันจริง</br>
รหัสพนักงาน 0004</br>
ระยะเวลาทำงานทั้งหมด  300 วัน</br>
ขาด 60 ครั้ง</br>
ลา  50 ครั้ง</br>
เข้างานสาย 100 ครั้ง </br>";

    
    ?>
</div>
 <center><input type='button' value='PrintReport' onclick='printDiv("report")'></center>
