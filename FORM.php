<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include_once('menu2.php') ?>
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
    <div class="tile is-parent">
        <article class="tile is-child notification is-info">
            <p class="title">Service</p>
            <form  method="POST" action="addatabase.php" enctype="multipart/form-data">
                <label class="label">NamePictture</label>
                <p class="control has-icon has-icon-right">
                    <input class="input is-success" type="text" placeholder="Text input" name='txtName'>

                    <span class="icon is-small">
                        <i class="fa fa-check"></i>
                    </span>

                    <input type="file" class="button is-danger is-outlined" name="filUpload">
                </p>

                <label class="label">IDEmployee </label>
                <p class="control has-icon has-icon-right">
                    <input class="input is-success" type="text" placeholder="Telephone " name="text1">
                </p>
                <label class="label">Title</label>

                <p class="control">
                    <span class="select" >
                        <select name='selectTitel'>
                            <option  value='Mr.]'>Mr.</option>
                            <option value='Mrs'>Mrs.</option>
                            <option value='Miss'>Miss</option>
                            <option value='Ms.'>Ms.</option>
                            <option value='Dr.'>Dr.</option>
                        </select>
                    </span>
                </p>

                <label class="label">Name</label>
                <p class="control has-icon has-icon-right">
                    <input class="input is-success" type="text" placeholder="Name" name="text2">
                </p>

                <label class="label">LastName</label>
                <p class="control has-icon has-icon-right">
                    <input class="input is-success" type="text" placeholder="LastName" name="text3">
                </p>

                

                <label class="label">Address</label>
                <p class="control">
                    <textarea class="textarea" placeholder="Address" name="text4"></textarea>
                </p>

                <label class="label">Telephone </label>
                <p class="control has-icon has-icon-right">
                    <input class="input is-success" type="text" placeholder="Telephone " name="text5">
                </p>




                <label class="label">Email</label>
                <p class="control has-icon has-icon-right">
                    <input class="input is-success" type="text" placeholder="Email input" value="" name='text8' >
                </p>


                <label class="label">Birthdate</label>

                <p class="control has-icon has-icon-right">
                    <input class="input is-success" type="date" placeholder="" value="" name='date'>
                </p>

                <label class="label">Passport/ID</label>
                <p class="control has-icon has-icon-right">
                    <input class="input is-success" type="text" placeholder="Passport/ID" value="" name='text6' >
                </p>

                <label class="label">BloodType</label>
                <p class="control">
                    <span class="select">
                        <select  name='selectblood'>
                            <?php 
                            $bloodtype=array('','A','B','O','AB');
                            for ($i=0; $i <5; $i++)
                                echo "<option value='$bloodtype[$i]'>".$bloodtype[$i]."</option>";
                            ?>
                        </select>
                    </span>
                </p>

                <label class="label">Gender</label>
                <p class="control">
                    <span class="select">
                        <select  name='selectGender'>
                            <?php 
                            $Genders=array('','Female','Male');
                            for ($i=0; $i <3; $i++)
                                echo "<option value=' $Genders[$i]'>". $Genders[$i]."</option>";
                            ?>
                        </select>
                    </span>
                </p>





                <div class="control is-grouped">
                    <p class="control">
                        <button class="button is-primary" onClick='return confirmDelete()';>Submit</button>
                    </p>
                    <p class="control">
                        <a class="button is-warning"  onClick='window.location="FORM.php";'>Cancel</a>
                    </p>

                    <p class="control">
                        <a class="button is-danger"  onClick="window.history.back();"'>Back</a>
                    </p>
                </div>



            </form>
        </article>
    </div>
</body>
</html>