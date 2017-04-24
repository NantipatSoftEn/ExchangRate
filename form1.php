<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include_once('menu.php') ?>
    <?php include_once('header.php') ?>

</head>
<body>
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
            <p class="title"></p>

            <?php
            date_default_timezone_set("asia/bangkok");
            echo'<p align = "right"><font size = "2"> วันที่ออกรายงาน '.date('Y-m-d').' </font></p><br>';
            echo" <h1><U><center>บริษัท เพียวนา จำกัด</U></center></h1>";
            echo"<center>รายได้ประจำวัน</center></br>";
            echo "รายได้ประจำวันที่ :" . date('Y-m-d') . "</br></br>";


            echo"<table class='table'>";

            $head = array("CountryCode", "Total Price");
            echo "<tr>";

            for ($i = 0; $i < count($head); $i++)
               echo "<td>" . $head[$i] . "</td>";

           echo "</tr>";
           $CountryCode=array();
           $Money=array();
           $con = mysqli_connect("localhost", "root", "", "database");
           $result = mysqli_query($con, "SELECT CountryCode,Money FROM money");
           while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
           {
            $CountryCode[]=$row[0];
            $Money[]=$row[1];

        }


        $con = mysqli_connect("localhost", "root", "", "database2");
        $result = mysqli_query($con, "SELECT date,CountryCode,Quanlity FROM data where date=' ".date('Y-m-d')." '");
        $Quanlity=array(0,0,0,0,0,0,0,0,0,0,0,0,0);

        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        {
            /*echo  "row1=".$row[1]."     ";
            echo  "row2=".$row[2]."</br>";*/
            if ($row[1]=="USD 50-100")
                $Quanlity[0]+=$row[2];

            else if ($row[1]=="USD 5-20")
                $Quanlity[1]+=$row[2];

            else if ($row[1]=="USD 1-2")
                $Quanlity[2]+=$row[2];

            else if ($row[1]=="GBP")
                $Quanlity[3]+=$row[2];

            else if ($row[1]=="EUR")
                $Quanlity[4]+=$row[2];

            else if ($row[1]=="JPY")
                $Quanlity[5]+=$row[2];

            else if ($row[1]=="HKD")
                $Quanlity[6]+=$row[2];

            else if ($row[1]=="MYR")
                $Quanlity[7]+=$row[2];

            else if ($row[1]==" SGD")
                $Quanlity[8]+=$row[2];

            else if ($row[1]=="BND")
                $Quanlity[9]+=$row[2];

            else if ($row[1]=="CNY")
                $Quanlity[10]+=$row[2];

            else if ($row[1]=="IDR")
                $Quanlity[11]+=$row[2];

            else if ($row[1]=="INR")
                $Quanlity[12]+=$row[2];
            
        }
        $counts=0;
        echo '<form name="form1" method="post" action="report1.php">';
        for ($i=0; $i < count($Money); $i++) {
            if($Quanlity[$i]>0)
            {
             echo "<tr>";

             echo "<td>".$CountryCode[$i]."</td>";
             echo "<td>".$Quanlity[$i]."</td>";

             echo "</tr>";



             echo '<input type="hidden" name="CountryCode[]" value='.$CountryCode[$i] .'>';
             echo '<input type="hidden" name="Quanlity[]" value='.$Quanlity[$i] .'>';
             $counts++;
         } 


     }

     echo '<input type="hidden" name="counts" value='.$counts .'>';

     echo "</table>";

     ?>



     <center>
        <input type='submit' class="button is-success" value='PrintReport' >
        <a class='button is-danger'  onClick='window.history.back();''>Back</a></center>
    </div>
</form>
</article>
</div>
</body>
</html>