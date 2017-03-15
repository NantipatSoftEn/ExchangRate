<!DOCTYPE html>

<html>
<head>
    <title></title>
    <?php include_once('header.php') ?>
</head>
<body>
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
            <p class="title">Data Customer</p>
            <?php
            echo'<form name="frmSearch" method="get" action=' . $_SERVER['SCRIPT_NAME'] . '>';
            
            echo '<label class="label">Search</lable>';
            echo '<p class="control has-icon has-icon-right">';
            echo' <input name="txtKeyword" class="input is-success" type="text" id="txtKeyword"  value="" placeholder="Keyword">';
            echo '</p>';
            echo'<input type="submit" class="button is-primary" value="Search"></th>';
            echo'</form>';
            ?>



            <?php
            if (isset($_GET["txtKeyword"])) {
                $con = mysqli_connect("localhost", "root", "", "database2");
    /* if($con!=null)
    echo"Sucess"; */
    $result=  mysqli_query($con,"SELECT * FROM employee WHERE  IDEmployee='".$_GET["txtKeyword"]."' "
        . "OR Name= '".$_GET["txtKeyword"]."' "
        . "OR LastName= '".$_GET["txtKeyword"]."'"

        . "OR Telephone= '".$_GET["txtKeyword"]."' "
        
        . "OR Passport= '".$_GET["txtKeyword"]."'"
        . "OR Email= '".$_GET["txtKeyword"]."'" );
    /* if(!$result)
    die("connot"); */

    $data = array("IDEmployee",
        "Name",
        "LastName",
        "Address",
        "Telephone",
        "Birthdate",
        "Passport/ID",
        "Gender",
        "Blood",
        "Email",
        "Picture");
    echo'<table class="table">';
    echo '<thead>';
    echo '<tr>';
    for ($i = 0; $i < count($data); $i++)
        echo '<td>' . $data[$i] . '</td>';
    echo '<tr/>';
    echo '</thead>';
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {


        echo'<tr>';
        for ($i = 0; $i < 10; $i++)
            echo '<td>' . $row[$i] . '</td>';



        $objConnect = mysql_connect("localhost", "root", "") or die("Error Connect to Database");
        $objDB = mysql_select_db("upload2");
        $strSQL = "SELECT FilesName FROM files2  WHERE IDEmployee='" . $row[0] . "'";
        $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
        while ($objResult = mysql_fetch_array($objQuery)) {
            ?>
            <td><center><img src="images_upload2/<?php echo $objResult["FilesName"]; ?>" width='128' height='128'></center></br></td>
            <?php
        }
        echo'<tr/>';
    }

    $result = mysqli_close($con);
}else {
    $con = mysqli_connect("localhost", "root", "", "database2");
    /* if($con!=null)
    echo"Sucess"; */
    $result = mysqli_query($con, "SELECT * FROM employee");
    /* if(!$result)
    die("connot"); */

    $data = array("IDEmployee",
        "Name",
        "LastName",
        "Address",
        "Telephone",
        "Birthdate",
        "Passport/ID",
        "Gender",
        "Blood",
        "Email",
        "Picture");
    echo'<table class="table">';
    echo '<thead>';
    echo '<tr>';
    for ($i = 0; $i < count($data); $i++)
        echo '<td>' . $data[$i] . '</td>';
    echo '<tr/>';
    echo '</thead>';
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {


        echo'<tr>';
        for ($i = 0; $i < 10; $i++)
            echo '<td>' . $row[$i] . '</td>';



        $objConnect = mysql_connect("localhost", "root", "") or die("Error Connect to Database");
        $objDB = mysql_select_db("upload2");
        $strSQL = "SELECT FilesName FROM files2  WHERE IDEmployee='" . $row[0] . "'";
        $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
        while ($objResult = mysql_fetch_array($objQuery)) {
            ?>
            <td><center><img src="images_upload2/<?php echo $objResult["FilesName"]; ?>" width='128' height='128'></center></br></td>
            <?php
        }
        echo'<tr/>';
    }

    $result = mysqli_close($con);
}
?>

</article>
</div>
</body>
</html>