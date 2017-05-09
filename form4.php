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
            echo"<center>รายงานค่าเรท ประจำวัน</center></br>";
            echo "รายได้ประจำวันที่:  " . date('d') . "</br></br>";
            echo"<table class='table'>";
            $head = array("CountryCode", "Rate",);
            echo "<tr>";
            for ($i = 0; $i < count($head); $i++)
                echo "<td>" . $head[$i] . "</td>";
            echo "</tr>";
            $con = mysqli_connect("localhost", "root", "", "database");
            $result = mysqli_query($con, "SELECT CountryCode,Money FROM money");
            $Money=array();
            $CountryCode=array();
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
            {
                $CountryCode[]=$row[0];
                $Money[]=$row[1];
            }

    echo '<form name="form4" method="post" action="report4.php">';
            for ($i=0; $i < count($CountryCode); $i++) { 
                echo "<tr>";

                echo "<td>".$CountryCode[$i]."</td>";
                echo "<td>". $Money[$i]."</td>";
             
                echo "</tr>";

                echo '<input type="hidden" name="CountryCode[]" value='.$CountryCode[$i].'>';
                echo '<input type="hidden" name="Rate[]" value='.$Money[$i].'>';
              

            }
             echo '<input type="hidden" name="size" value='.count($CountryCode).'>';

            echo "</table>";


            ?>
        </div>
        <center><input type='submit' class="button is-success" value='PrintReport' >
            <a class='button is-danger'  onClick='window.history.back();''>Back</a></center>
        </div>
    </form>

</article>
</div>
</body>
</html>