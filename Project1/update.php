<!DOCTYPE html>
<html>
<head>
  <title></title>
    <?php include_once('header.php') ?>
</head>
<body>
  <?php
  $con=mysqli_connect("localhost","root","","database");

  /*if($con!=null)
        echo"Sucess";*/
     $result=mysqli_query($con,"UPDATE employee   SET
    Name='".$_POST['text2']."',
    LastName='".$_POST['text3']."',
    Position ='".$_POST['text4']."' ,
    Address='".$_POST['text5']."',
    Telephone='".$_POST['text6']."',
    Education='".$_POST['text7']."',
    Birthdate='".$_POST['text8']."',
    Passport='".$_POST['text9']."',
    Gender='".$_POST['text10']."',
    Status='".$_POST['text11']."',
    Access='".$_POST['text12']."',
    Blood='".$_POST['text13']."',
    Email='".$_POST['text14']."'
    WHERE IDEmployee=".$_POST['id']."   ");
  /*if(!$result)
  {
        die("connotfuckyouuu");
  }
      else*/

  $result=mysqli_close($con);

?>
  <div class="tile is-parent">
    <article class="tile is-child notification is-success">
      <div class="content">
        <p class="subtitle"><h1><center>Update Sucess</center></h1></p>
        <center><a class="button is-warning" onClick='window.history.back()'>Back</a></center>
      </div>
    </article>
  </div>


</body>
</html>
