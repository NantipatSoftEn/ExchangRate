<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include_once('header.php') ?>
    <script language="JavaScript">
        function confirmDelete(){return confirm('Are you sure you want to delete this?');}
        function confirmEdit(){return confirm('Are you sure you want to Edit this?');}
    </script>

</head>
<body>
    <?php
    session_start();
    //echo $_SESSION['username'];
    if ($_SESSION['username'] == "") {
        echo "<font size='7' ><center>Please Login!</center></font>";
        exit();
    }
    ?>
    <nav class="nav">
        <div class="nav-left">
            <a class="nav-item">
                <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
            </a>


            <a class="nav-item" href="menu.php">
                Home
            </a>
            <a class="nav-item" href = "Project1/moneychang.php">
                Update Currency
            </a>
            <a class="nav-item" href = "PhpProject1/Main.php">
                Report
            </a>
            <a class="nav-item" href = "Project1/menusubset.php">
                Data Employee
            </a>
            <a class="nav-item" href = "PhpProject3/datacustomer.php">
                Data Customer
            </a>
            <a class="nav-item" href = "http://www.bahtcheck.com/">
                Cheak rate Money
            </a>

        </div>
    </nav>
</body>
</html>