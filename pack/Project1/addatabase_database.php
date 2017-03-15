<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include_once('header.php') ?>
</head>
<body>
    <?php session_start();
    //echo $_SESSION['username'];
    if($_SESSION['username'] == "")
    {
        echo "<font size='7' ><center>Please Login!</center></font>";
        exit();
    }
    ?>
    <?php
    if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"images_upload/".$_FILES["filUpload"]["name"]))
    {
        //echo "Copy/Upload Complete<br>";
        //*** Insert Record ***//
        $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
        $objDB = mysql_select_db("upload");
        $strSQL = "INSERT INTO files ";
        $strSQL .="(Name,FilesName) VALUES ('".$_POST["txtName"]."','".$_FILES["filUpload"]["name"]."')";
        $objQuery = mysql_query($strSQL);       
    }
    //$IDEmployee=$_POST['text1'];
    $Name=$_POST['selectTitel'].$_POST['text2'];
    $LastName=$_POST['text3'];
    $Position=$_POST['selectPosition'];
    $Address=$_POST['text4'];
    $Telephone=$_POST['text5'];
    $Education=$_POST['selectEducational'];
    $Birthdate=date('Y-m-d', strtotime($_POST['date']));
    $Passport=$_POST['text6'];
    $Gender=$_POST['selectGender'];
    $Status=$_POST['selectStatus'];
    $Access=$_POST['text7'];    
    $Blood=$_POST['selectblood'];
    $Email=$_POST['text8'];
    
    
    $con=mysqli_connect("localhost","root","","database");
    /*if($con!=null)
    echo"Sucess";*/
    
    $result=mysqli_query($con,'INSERT INTO employee VALUES
       (""
       ,"'.$Name.'"
       ,"'.$LastName.'"
       ,"'.$Position.'"
       ,"'.$Address.'"
       ,"'.$Telephone.'"
       ,"'.$Education.'"
       ,"'.$Birthdate.'"
       ,"'.$Passport.'"
       ,"'.$Gender.'"
       ,"'.$Status.'"
       ,"'.$Access.'"
       ,"'.$Blood.'"
       ,"'.$Email.'");');
    $result=mysqli_query($con,"SELECT * FROM employee");
    /*if(!$result)
    {
        die("connot");
    }
    else*/


    $result=mysqli_close($con);

    
    /*INSERT INTO `employee`(`
    IDEmployee`, 
    `Name`, 
    `LastName`, 
    `Position`, 
    `Address`, 
    `Telephone`, 
    `Education`, 
    `Birthdate`, 
    `Passport/ID`, 
    `Gender`, 
    `Status`, 
    `Access`, 
    `Blood`, 
    `Email`)*/

    


    
    
    

    
    ?>

    <div class="tile is-parent">
        <article class="tile is-child notification is-success">
            <div class="content">
                <p class="subtitle"><h1><center>Insert Sucess</center></h1></p>
                <center><a class="button is-warning" onClick='window.history.back()'>Back</a></center>
            </div>
        </article>
    </div>
</body>
</html>