<?php

     $dataname=array("รายงานรายได้ประจำวัน",
                "รานงานสกุลเงินที่ขายดีที่สุดประจำวัน",
                "รายงานรายได้ประจำเดือน",
                "รายงานค่าเรท ประจำวัน",
                "รายงานสกุลเงินที่ขายดีที่สุดประจำเดือน");
     $data=array("form1.php","form2.php","form3.php","form4.php","form5.php",);
    for ($i = 0; $i < count($dataname); $i++) {
        if($_POST['select']==$dataname[$i])
            echo "<script type='text/javascript'>window.location.href ='$data[$i]'</script>";   
        
}
?>