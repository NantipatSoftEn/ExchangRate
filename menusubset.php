
<?php
session_start();
//echo $_SESSION['username'];
if ($_SESSION['username'] == "") {
    echo "<font size='7' ><center>Please Login!</center></font>";
    exit();
}
?>
<html>
    <body>
    <center>
        <table>
            <tr>   
            <tr> 
                <td><font size='7' ><b> Menu</b></font></td>
            </tr>  
            <td><a href = "Formdataemployee.php"><font size='7'  ><b>เพิ่มข้อมูลพนักงาน</b></a><td>
                </tr>
            <tr>  
                <td><a href = "showdatabase.php"><font size='7' ><b>แก้ไขข้อมูลพนักงาน</b></a><br><td>
            </tr>
            <tr>  
                <!--<td><b> <a href="logout.php">Logout</a><b> </td>-->     
                            </tr>



                            </table>
                            </center>
                            </body>
                            </html>