<?php
	session_start();
        include "dbConfig.php";
        date_default_timezone_set("asia/bangkok");
        $sql = "UPDATE member SET Logoutdate='".date('Y-m-d H:i:s')."' WHERE Username = '".$_SESSION['username']."' AND Password= '".$_SESSION['password']."' AND Access=1 " ;
       $query = mysql_query($sql);
       if ($query === false) {
                    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
                    exit;
                 }
	session_destroy();
	header("location:index.php");
?>