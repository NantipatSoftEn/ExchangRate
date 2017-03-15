<?php include "dbConfig.php";
session_start();
date_default_timezone_set("asia/bangkok");
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $password = $_POST["password"];
    if ($name == '' || $password == '') {
        $msg = "You must enter all fields";
    } else {

        $sql = "SELECT * FROM member WHERE Username = '$name' AND    Password = '$password' " ;
        $query = mysql_query($sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        // 0 =Admin, 1=employee
        if($row=mysql_fetch_array($query))
        {    
         $_SESSION['username']=$name;
         $_SESSION['password']=$password;
         session_write_close();
         if($row[2] == 0)
         {

            date('Y-m-d H:i:s');
            header('Location: menu.php');
            exit;
        }
        else
        {

         $sql = "UPDATE member SET Logindate='".date('Y-m-d H:i:s')."' WHERE Username = '$name' AND   Password = '$password' AND Access=1  " ;
         $query = mysql_query($sql);
         if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        header("location:menu2.php");
        exit;
    }

}

$msg = "Username and password do not match";
}
}

?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  
<script type="text/javascript">  
    $(function(){  


        var nowDateTime=new Date("<?=date("m/d/Y H:i:s")?>");  
        var d=nowDateTime.getTime();  
        var mkHour,mkMinute,mkSecond;  
        setInterval(function(){  
            d=parseInt(d)+1000;  
            var nowDateTime=new Date(d);  
            mkHour=new String(nowDateTime.getHours());    
            if(mkHour.length==1){    
                mkHour="0"+mkHour;    
            }  
            mkMinute=new String(nowDateTime.getMinutes());    
            if(mkMinute.length==1){    
                mkMinute="0"+mkMinute;    
            }          
            mkSecond=new String(nowDateTime.getSeconds());    
            if(mkSecond.length==1){    
                mkSecond="0"+mkSecond;    
            }     
            var runDateTime=mkHour+":"+mkMinute+":"+mkSecond;          
            $("#css_time_run").html(runDateTime);      
        },1000);  


    });  
</script>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>

    <link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
    <center>
     <form name="frmregister"action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
      <table class="form" border="0">
        <tr>
            <td></td><td><h1><U><center>บริษัท เพียวนา จำกัด</U></center></h1></td>
        </tr>    
        <tr>

           <td></td>
           <td style="color:red;">
            <?php echo $msg; ?></td>
        </tr> 

        <tr>
            <th><label for="name"><strong>Name:</strong></label></th>
            <td><input class="inp-text" name="name" id="name" type="text" size="30" /></td>
        </tr>
        <tr>
            <th><label for="name"><strong>Password:</strong></label></th>
            <td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
        </tr>
        <tr>
           <td></td>
           <td class="submit-button-right">
            <input class="send_btn" type="submit" value="Submit" alt="Submit" title="Submit" />

            <input class="send_btn" type="reset" value="Reset" alt="Reset" title="Reset" /></td>

        </tr>

    </table>


    <?php  echo "Time :".date("Y-m-d")?>
    <div id="css_time_run">  
        <?=date("H:i:s")?>  

    </div>  
    <a href = "ifream.html"><font size='4' ><b>CHEAK RATE MONEY CLICK</b>


    </form>


    <?php
    echo "<center>";
    echo "<table border='1'>";
    echo "<tr>";
    date_default_timezone_set("asia/bangkok");
                       // echo "<td>Date:".date('Y-m-d')."&nbsp &nbspTime:".date('h:i:sa')."</td>";
    
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<table>";
    $con=mysqli_connect("localhost","root","","database");
    $head=array("CountryCode ","Currency ");
    echo "<tr>";
    for($i=0; $i<count($head) ; $i++)
        echo "<td>".$head[$i]."</td>";
    echo "</tr>";
    $result=mysqli_query($con,"SELECT * FROM money");
    $temp=0;
    
    while($row=mysqli_fetch_array($result,MYSQLI_NUM))
    {
        
        echo "<tr>";
        for($i=1; $i< 3; $i++)
            echo '<td>'.$row[$i].'</td>';
        echo "</tr>";
    }
    echo "</table>";
    
    
    $result=mysqli_close($con);
    echo "</table>";    
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</center>";
    
    ?>

    <center>
    </body>
    </html>

