<!DOCTYPE html>
<html>
<head>
    <title>Exchange Rate</title>
    <?php include_once('header.php') ?>
    <script language="JavaScript">
        function confirmDelete(){return confirm('Are you sure you want to delete this?');}
        function confirmEdit(){return confirm('Are you sure you want to Edit this?');}
    </script>

</head>
<body>
    <nav class="nav">
        <div class="nav-left">
            <a class="nav-item">

                <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
            </a>


            <a class="nav-item" href="home.php">
                Home
            </a>
            <a class="nav-item" href = "moneychang.php">
                Update Currency
            </a>
            <a class="nav-item" href = "Main.php">
                Report
            </a>

            <a class="nav-item" href = "Formdataemployee.php">
                Insert Data Customer
            </a>

            <a class="nav-item" href = "showdatabase.php">
                Edit Data Customer
            </a>

            <a class="nav-item" href = "datacustomer.php">
                Search Data Customer
            </a>

            <a class="nav-item" href = "tableratesell.php">
                Cheak Rate Money
            </a>
           <div class="nav-right nav-menu">
            <a class="nav-item" href = "logout.php">
                <b>Logout</b>
            </a>



        </div>

    </nav>

</body>
</html>